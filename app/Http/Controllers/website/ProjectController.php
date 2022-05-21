<?php

namespace App\Http\Controllers\website;

use Illuminate\Support\Facades\Validator;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Http\Controllers\NotificationController;
use App\Models\Project;
use App\Models\Offer;
use App\Models\Skill;
use App\Models\ProjectSkill;
use App\Models\UserAttachment;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\UserSkill;
use Exception;
use App\Models\user;
use App\Models\Review;




class ProjectController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $data = Project::with(['sal_created_by', 'sal_skills_by.sal_skill'])->where('status', 1)->paginate(4);
    return view('website.users.project.index', compact('data'));
  }


  /**
   * Show the projects for  un registerd  users  .
   *
   * @return \Illuminate\Http\Response
   */


  public function index_without_auth()
  {
    $data = Project::with(['sal_created_by', 'sal_skills_by.sal_skill'])->where('status', 1)->get();
    return view('website.users.project.all_projects', compact('data'));
  }


  /**
   * Show the project detauls for  un registerd  users  .
   *
   * @return \Illuminate\Http\Response
   */

  public function show_without_auth($id) //'sal_created_by',
  {
    $data = Project::with([
      'sal_created_by', 'sal_project_attach',
      'sal_skills_by.sal_skill',
      'sal_offers.sal_provider_by.sal_profile', 'sal_offers.sal_offer_attach'
    ])->where('id', $id)->first();


    if ($data != null) {


      $canMakeOffer = 0;
      if (!Auth()->check()) {
        $data = Project::with([
          'sal_created_by', 'sal_project_attach',
          'sal_skills_by.sal_skill',
          'sal_offers.sal_provider_by.sal_profile', 'sal_offers.sal_offer_attach'
        ])->where('id', $id)->where('status', '<>', 0)->first();
        if ($data != null) {
          return view('website.users.project.project_details_th', compact('data', 'canMakeOffer'));
        } else {
          return response(['error' => true, 'error-msg' => 'Not found'], 404);
        }
      } else {
        $has_offer = Offer::where('project_id', $id)
          ->where('provider_id', Auth::user()->id)->exists();


        if (Auth::user()->hasRole('provider') && Auth::user()->id != $data->user_id &&  $has_offer != 1) {
          $canMakeOffer = 1;
        }
        if (Auth::User()->id != $data->user_id) {
          $data = Project::with([
            'sal_created_by', 'sal_project_attach',
            'sal_skills_by.sal_skill',
            'sal_offers.sal_provider_by.sal_profile', 'sal_offers.sal_offer_attach'
          ])->where('id', $id)->where('status', '<>', 0)->first();
        }
        if ($data != null) {
          return view('website.users.project.project_details_th', compact('data', 'canMakeOffer'));
        } else {
          return response(['error' => true, 'error-msg' => 'Not found'], 404);
        }
      }
    } else {
      return response(['error' => true, 'error-msg' => 'Not found'], 404);
    }
  }


  /**
   * Show the projects of a certain seeker  .
   *
   * @return \Illuminate\Http\Response
   */

  public function My_projects()
  {
    $data = Project::with(['sal_created_by', 'sal_offers'])
      ->where('user_id', Auth::user()->id)->get();
    return view('website.users.project.projects_d', compact('data'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */


  public function createProject()
  {
    $data = Skill::All();
    return view('website.users.project.createProject', compact('data'));
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    Validator::validate($request->all(), [
      'title' => array(
        'required',
        'min:10',

      ),
      'price' => ['required', 'numeric', 'gt:0'],
      'duration' => ['required', 'numeric', 'gt:0'],
      'description' =>  array(
        'required'
      ),
      'skills' => ['required'],

    ], [
      'title.required' => 'يجب ادخال عنوان المشروع',
      'title.min' => 'لا يقل  عن 10 حروف',
      'title.min' => 'لا يزيد  عن 50 حرف',
      'price.required' => 'يجب ادخال السعر ',
      'price.numeric' => 'يجب ادخال قيمة رقمية ',
      'price.gt' => 'يجب ادخال قيمة موجبة ',
      'duration.gt' => 'يجب ادخال قيمة موجبة ',
      'duration.required' => 'يجب ادخال المدة ',
      'duration.numeric' => 'يجب ادخال رقم ',
      'description.required' => 'يجب أدخال وصف المشروع ',
      'skills.required' => 'يجب أدخال اختيار مهارات للمشروع  '

    ]);
    $project = new Project;
    $project->title = $request->title;
    $project->price = $request->price;
    $project->net_price = $request->price;
    $project->duration = $request->duration;
    $project->description = $request->description;
    $project->user_id = Auth::user()->id;
    $noError = 0;
    if ($project->save()) {

      foreach ($request->skills as $skill) {
        $ProjectSkill = new ProjectSkill;
        $ProjectSkill->project_id = $project->id;
        $ProjectSkill->skill_id = $skill;
        $ProjectSkill->save();
        $noError = 1;
      }
      if ($request->hasFile('files')) {
        foreach ($request->file('files') as $file) {
          $Attachments = new UserAttachment;
          $Attachments->attach_id = $project->id;
          $Attachments->attach_type = '1';
          $fileNme = time() . '.' . $file->getClientOriginalExtension();
          $file->move(public_path('images'), $fileNme);
          $Attachments->file_name = $fileNme;
          $Attachments->file_type = $file->getClientOriginalExtension();
          $Attachments->user_id = $project->user_id;
          $Attachments->save();
          $noError = 2;
        }
      }

      if ($noError >= 1) {
        $userSkills = UserSkill::whereIn('skill_id', $request->skills)->groupBy('user_id')->get(['user_id']);
        foreach ($userSkills as $userSkill) {

          // $data = ['receiver_id' => $userSkill->user_id, 'sender_id' => Auth::user()->id, 'title' => 'title of notify', 'is_read' => 0, 'message' => '   تم اضافة مشروع جديد ', 'link' => '/home'];
          $data = ['receiver_id' => $userSkill->user_id, 'sender_id' => Auth::user()->id, 'title' => 'title of notify', 'is_read' => 0, 'message' => '   تم اضافة مشروع جديد ',  'body' => "/projects/$project->id", 'link' => "/projects/$project->id"];

          NotificationController::hiNotification($data);
        }

        return redirect('/My_projects')->with(['success' => '  تمت الاضافة بنجاح']);
      } else {
        return redirect('/My_projects')->with(['error' => ' فشلت  الاضافة ']);
      }
    };
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */


  public function show($id)
  {
    try {
      $data = Project::with([
        'sal_created_by', 'sal_project_attach',
        'sal_skills_by.sal_skill',
        'sal_offers.sal_provider_by.sal_profile',
        'sal_offers.sal_provider_by.sal_review_to',
        'sal_offers.sal_offer_attach'
      ])->where('id', $id)->first();

      $canMakeOffer = 0;
      if (!Auth()->check()) {
        $data = Project::with([
          'sal_created_by', 'sal_project_attach',
          'sal_skills_by.sal_skill',
          'sal_offers.sal_provider_by.sal_profile', 'sal_offers.sal_offer_attach'
        ])->where('id', $id)->where('status', '<>', 0)->first();
        return view('website.users.project.show', compact('data', 'canMakeOffer'));
      } else {
        $has_offer = Offer::where('project_id', $id)
          ->where('provider_id', Auth::user()->id)->exists();
        if (Auth::user()->hasRole('provider') && Auth::user()->id != $data->user_id &&  $has_offer != 1) {
          $canMakeOffer = 1;
        }
        if (Auth::User()->id != $data->user_id) {
          $data = Project::with([
            'sal_created_by', 'sal_project_attach',
            'sal_skills_by.sal_skill',
            'sal_offers.sal_provider_by.sal_profile', 'sal_offers.sal_offer_attach'
          ])->where('id', $id)->where('status', '<>', 0)->first();
        }

        return view('website.users.project.show', compact('data', 'canMakeOffer'));
      }
    } catch (Exception $e) {
      abort(404);
    }
  }


  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($project_id)
  {

    try {
      $data = Project::with(['sal_offers'])->where('id', $project_id)->first();
      if ($data->user_id == Auth()->user()->id && $data->status == 1 || $data->status == 0) {
        $skills = Skill::All();
        return view('website.users.project.edit', compact('data', 'skills'));
      } else {
        abort(404);
      }
    } catch (Exception $e) {
      abort(404);
    }
  }


  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $project_id)
  {
    try {
      Validator::validate($request->all(), [
        'title' => array(
          'required',
          'min:10',
          'max:50',
          // 'regex:/^[a-zA-Z\s]+$/u'
        ),
        'price' => ['required', 'numeric', 'gt:0'],
        'duration' => ['required', 'numeric', 'gt:0'],
        'description' =>  array(
          'required',
          // 'regex:/(^([a-zA-Z\s]+)(\d+)?[.،:؛]?$)/u'
        ),
        'skills' => ['required'],

      ], [
        'title.required' => 'يجب ادخال عنوان المشروع',
        'title.min' => 'لا يقل  عن 10 حروف',
        'title.min' => 'لا يزيد  عن 50 حرف',
        'price.required' => 'يجب ادخال السعر ',
        'price.numeric' => 'يجب ادخال رقم ',
        'duration.required' => 'يجب ادخال المدة ',
        'duration.numeric' => 'يجب ادخال رقم ',
        'price.gt' => 'يجب ادخال قيمة موجبة ',
        'duration.gt' => 'يجب ادخال قيمة موجبة ',
        'description.required' => 'يجب أدخال وصف المشروع ',
        'skills.required' => 'يجب أدخال اختيار مهارات للمشروع  '

      ]);

      $project = Project::find($project_id);
      $project->title = $request->title;
      $project->price = $request->price;
      $project->net_price = $request->price;
      $project->duration = $request->duration;
      $project->description = $request->description;
      $noError = 0;
      if ($project->save()) {

        if ($request->has('skills')) {
          ProjectSkill::where('project_id', $project_id)->delete();
          foreach ($request->skills as $skill) {
            $ProjectSkill = new ProjectSkill;
            $ProjectSkill->project_id = $project->id;
            $ProjectSkill->skill_id = $skill;
            $ProjectSkill->save();
            $noError = 1;
          }
        }

        if ($request->hasFile('files')) {
          UserAttachment::where('attach_id', $project_id)
            ->where('attach_type', '1')->delete();
          foreach ($request->file('files') as $file) {
            $Attachments = new UserAttachment;
            $Attachments->attach_id = $project->id;
            $Attachments->attach_type = '1';
            $fileNme = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images'), $fileNme);
            $Attachments->file_name = $fileNme;
            $Attachments->file_type = $file->getClientOriginalExtension();
            $Attachments->user_id = $project->user_id;
            $Attachments->save();
            $noError = 2;
          }
        }
        if ($noError >= 1) {
          return redirect('/My_projects')->with(['success' => '  تمت التعديل بنجاح']);
        } else {
          return redirect('/My_projects')->with(['success' => ' فشل التعديل ']);
        }
      };
    } catch (Exception $e) {
      abort(404);
    }
  }
  /**
   *  Search about certain project based on its skills
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */

  public function search(Request $request)
  {
    $projects = Project::with('sal_created_by', 'sal_skills_by.sal_skill', 'sal_offers')->whereRelation("sal_skills_by.sal_skill", 'title', 'LIKE', '%' . $request->search . "%")->get();
    $data = "";
    return response(['data' =>  $projects]);
  }

  /**
   *  activate  and unactivate a project by admin 
   *
   * @param int $project_id ,$status
   * @return \Illuminate\Http\Response
   */
  public function changeStatus($project_id, $status)
  {

    $project = Project::find($project_id);
    try {
      $project->status = $status;
      if ($project->save()) {
        return redirect()->back()->with(['success' => 'تم تعديل البيانات بنجاح']);
      }
      return redirect()->back()->with(['error' => 'لم يتم تعديل البيانات ']);
    } catch (Exception $e) {
      abort(404);
    }
  }

  /**
   *  close project in case it does not have accepted offer
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */

  public function close(Request $request)
  {
    try {

      $project = Project::find($request->project_id);
      if ($project->status == 1) {
        $project->status = 10; //close it;
        if ($project->save()) {
          return redirect()->back()->with(['success' => 'تم تعديل البيانات بنجاح']);
        }
        return redirect()->back()->with(['error' => 'لم يتم تعديل البيانات ']);
      }
    } catch (Exception $e) {
      abort(404);
    }
  }








  /**
   *  Test payment gateway 
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */


  public function testApi()
  {

    $data = [
      "order_reference" => "1",
      "products" => [
        array(
          "id" => 1,
          "product_name" => "تصميم موقع",
          "quantity" => 1,
          "unit_amount" => 100
        )
      ], "currency" => "USD",
      "total_amount" => 1500,
      "success_url" => "https://company.com/success",
      "cancel_url" => "https://company.com/cancel",
      "metadata" => [
        "Customer name" => "somename",
        "order id" => 0
      ]

    ];

    $curl = curl_init();

    curl_setopt_array($curl, array(
      CURLOPT_URL => "https://waslpayment.com/api/test/merchant/payment_order",
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 30000,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "POST",
      CURLOPT_POSTFIELDS => json_encode($data),

      CURLOPT_HTTPHEADER => array(
        "private-key: rRQ26GcsZzoEhbrP2HZvLYDbn9C9et",
        "public-key: HGvTMLDssJghr9tlN9gr4DVYt0qyBy",
        "Content-Type:  application/x-www-form-urlencoded"


      ),
    ));

    $response = curl_exec($curl);
    $err = curl_error($curl);
    curl_close($curl);

    if ($err) {
      echo " Error #:" . $err;
    } else {
      $result = json_decode($response, true);
      echo $response;
    }
  }





  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    //
  }
}
