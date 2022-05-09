<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
<link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.14.0-beta2/css/bootstrap-select.min.css"
    integrity="sha512-mR/b5Y7FRsKqrYZou7uysnOdCIJib/7r5QeJMFvLNHNhtye3xJp1TdJVPLtetkukFn227nKpXD9OjUc09lx97Q=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
<link rel="stylesheet" href="{{ asset('auth_assets/project_assests/css/project_details.css ') }}">
<style>
    a{
      text-decoration: none;  
    }
    .note{
        padding: 5px 8px;
        /* background-color: #e7f7ee; */
        font-size: .8rem;
        /* color:#28b661; */
        color:var(--dark_blue);
        /* color:white; */
        background-color: var(--light_blue);
        /* background-color:   #ecf1f48f; */
      
        /* background-color:#f1f3f5; */

        
        /* align-self: flex-start; */
        border-radius: 3px;
    }
    .noteSkill{
        padding: 5px 8px;
        font-size: .8rem;
        color:var(--dark_blue);
        background-color:#ecf1f48f;
        border-radius: 3px;
    }
.status{


    padding: 5px 8px;
        /* background-color: #e7f7ee; */
        font-size: .8rem;
        /* color:#28b661; */
        /* color:var(--dark_blue); */
      color:#ff9b20;
      background-color:#fff8ec;
        /* background-color:#f1f3f5; */

/*         
        align-self: flex-start; */
        border-radius: 3px;
    
}
.personal_info_container{

    border-radius:12px;
}
</style>
@extends("website.layouts.master")

@section('content')

    <div class="container mt-5 details_container">

        <div class='title'>
            <h3>{{$data['title']}}</h3>
        </div>

    {{-- <div class="container mt-5"> --}}
        <div class="row">
            <div class="col-lg-8 ">
                <!-- تفاصيل المشروع -->
                <div class="card-header">  {{Auth::user()->name}}</div>
                <div class="card-header"> 
                     {{-- {{Auth::user()->Role}} --}}
                    {{-- @forelse (Auth::user()->Role as $role)
                    {{  $role}}
                   
                @empty
                    
                @endforelse  --}}
                 
               
               </div>
                <div class="card mb-4 personal_info_container myworks">
                    <div class="card-header"> تفاصيل المشروع</div>
                    <div class="card-body">
                        <div class="row">
                            <div class="">
                                <ul class="list-unstyled mb-0 list-unstyled job_det">
                                    {{ $data['description'] }}

                                    {{-- <li>البحث عن مصمم بلغة الفلاتر وقاعة بيانات فاير بيس</li>
                                    <li>الموقع يدعم اللغتين</li>
                                    <li>امكانية الدفع عبر الموقع</li>
                                    <li>البحث عن مصمم بلغة الفلاتر وقاعة بيانات فاير بيس</li>
                                    <li>الموقع يدعم اللغتين</li>
                                    <li>امكانية الدفع عبر الموقع</li> --}}
                                </ul>
                            </div>
                            {{-- <div class="text-start"> <button class="show_more "> تنزيل الوصف</button>
                            </div> --}}
                            <ul class="list-unstyled mb-0 list-unstyled job_det attachment_contianer">
                                @if (!$data->sal_project_attach->isEmpty())
                                    <h4> ملفات توضيحية</h4>
                                        @forelse ($data->sal_project_attach as $attach)
                                            <li>
                                                    <a href='{{$attach->file_name}}' style='color:black'>{{$loop->iteration}}.{{$attach->file_type}}</a>
                                            </li>  
                                        @empty
                                            
                                        @endforelse
                                   
                    
                                     
                                 @endif
                                 
                             </ul>
                        </div>
                    </div>
                </div>
                <!-- المهارات المطلوبة-->
                <div class="card mb-4 personal_info_container myworks">
                    <div class="card-header">المهارات المطلوبة</div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6">
                                <ul class="list-unstyled mb-0">
                                 
                                    @forelse ($data->sal_skills_by as $skill)
                                        {{-- {{ $skill->sal_skill->title }} --}}
                                        <span class="note">{{$skill->sal_skill->title}}</span>
                                    @empty
                                        <div> لا توجد مهارات </div>
                                    @endforelse




                                </ul>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- اضافة عرض
                -->
              
                @if ($canMakeOffer && $data->status==1)
                <div class="">
                    <div class=" card p-5  personal_info_container myworks">
                        <div class="card-header"> اضافة عرض </div>
                        <form method="POST" action="{{ route('offers.store') }}" enctype="multipart/form-data">
                            @csrf
                            <input style="display:none" id="face" name="project_id" type="number" class="form-control"
                                value="{{ $data->id }}">
                            <div class="user-box mt-3">
                                <label><b> مدة التسليم </b>(أيام) </label>
                                <input id="face" name="duration" type="number" class="form-control">
                                @error('description')
                                    <small class="text-danger">{{ $message }}*</small>
                                @enderror
                                {{-- <span class="invalid-feedback" role="alert">
                                                <div class='dan_mesg_po'> </div>
                                            </span>
                                <span id='name-error' class="invalid-feedback dan_mesg_po" role="alert">
    
                                            </span> --}}

                            </div>


                            <div class="user-box mt-3">
                                <label><b> سعر العرض </b> ($)</label>
                                <input id="face" name="price" type="text" class="form-control">


                                <small class="text-danger">سوف تكون مستحقاتك 12.00$ بعد خصم عمولة موقع مستقل</small>

                                @error('price')
                                    <small class="text-danger">{{ $message }}*</small>
                                @enderror
                                {{-- <span class="invalid-feedback" role="alert">
                                                <div class='dan_mesg_po'> </div>
                                            </span>
                                <span id='name-error' class="invalid-feedback dan_mesg_po" role="alert">
    
                                            </span> --}}

                            </div>



                            <div class="user-box mt-2">

                                <label> <b>تفاصيل العرض </b> </label>
                                <textarea id="face" name="description" type="text" class="form-control" rows="6"></textarea>
                                @error('description')
                                    <small class="text-danger">{{ $message }}*</small>
                                @enderror
                                {{-- <span class="invalid-feedback" role="alert">
                                                <div class='dan_mesg_po'> </div>
                                            </span>
                                <span id='name-error' class="invalid-feedback dan_mesg_po" role="alert">
    
                                            </span> --}}

                            </div>







                            <div class="user-box mt-2">

                                <div class="input-group custom-file-button">
                                    <label class="input-group-text" for="inputGroupFile">ملفات توضيحية</label>
                                    <input type="file" name="files[]" class="form-control" id="inputGroupFile" multiple>
                                </div>

                            </div>




                            <div class="text-start mt-3">
                                <button class="show_more " type='submit'> اضف عرضك</button>
                            </div>

                        </form>


                    </div>
                </div>
                @endif

               


                <div class="accordion mt-3 " id="accordionExample">
                    <div class="accordion-item">

                        @if (!$data->sal_offers->isEmpty())
                            <h2 class="accordion-header d-flex justify-content-between align-items-center p-3 pt-1 pm-1"
                                id="headingOne">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    العروض المقدمة

                                </button>
                                <div class="select">
                                    <select id="standard-select">
                                        <option value="">الاحدث</option>
                                        <option value="">الاقدم</option>
                                    </select>
                                </div>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                                data-bs-parent="#accordionExample">

                                @foreach ($data->sal_offers as $offer)
                                    <div class="accordion-body" id='offer{{$offer->id}}'>

                                        <div class="personal_info_container myworks">
                                            <div class="d-flex align-items-center justify-content-between">
                                                <div class="d-flex align-items-start">
                                                    <div class="img_con">

                                                    </div>
                                                    <div class="container_card">
                                                        <header class="">

                                                            <div>
                                                                <h3> {{ $offer->sal_provider_by->name }}</h3>
                                                                <h4> {{ $offer->sal_provider_by->sal_profile->Job_title }}
                                                                </h4>
                                                            </div>
                                                            <div>
                                                                <div class="evaluated">

                                                                    <ion-icon name="star" class='gold'></ion-icon>
                                                                    <ion-icon name="star" class='gold'></ion-icon>
                                                                    <ion-icon name="star" class='gold'></ion-icon>
                                                                    <ion-icon name="star" class='gold'></ion-icon>
                                                                    <ion-icon name="star-half-outline"></ion-icon>
                                                                </div>
                                                                <span>
                                                                   @php
                                                                    $currentDate=strtotime(\Carbon\Carbon::now());//'2022-05-5'
                                                                       $oldDate=strtotime($offer->created_at);
                                                                       $deference=  $currentDate - $oldDate;
                                                                    //    echo $deference;
                                                                        $days=floor($deference/(60*60*24));
                                                                        $hours=floor($deference/(60*60));
                                                                        $minutes= floor($deference/(60));
                                                                        $seconds= floor($deference/(60));
                                                                        $time='';
                                                                //         if( ){
                                                                //         $time=$days. يوم
                                                                //     }
                                                                //     elseif( $hours>0){
                                                                //         $time=$days. ساعة
                                                                //     }
                                                                //     elseif( $minutes>0){
                                                                //         $time= $minutes. دقيقة
                                                                //     }
                                                                //     else{
                                                                //         $time=  $seconds.ثانية
                                                                //     }
                                                                   
                                                                //    echo $time ;
                                                                     
                                                                   @endphp
                                                                    
                                                                   @if ($days>0)
                                                                   {{$days}}يوم
                                                                   @elseif( $hours>0)
                                                                   منذ  {{$hours }} ساعة
                                                                
                                                                   @elseif($minutes>0)
                                                                   منذ {{$minutes }} دقيقة
                                                                   @else
                                                                   منذ {{$seconds}} ثانية
                                                                   @endif
                                                                    {{-- {{ time_elapsed_string($offer->created_at,'2013-5-01 00:22:35')}}; --}}
                                                               
                                                               </span>
                                                               
                                            
                                                            </div>

                                                        </header>




                                                    </div>
                                                </div>
                                                 {{-- if the user is the publisher of th e offer and the status of the 
                                                        the offer is in the first status "not accepted by the seeker 
                                                        so that he can edit the offer " and the project is in the first status "receiving offers"--}}

                                            @if (Auth::user()->id==$offer->provider_id && $offer->status==1 && $data->status==1)
                                            <div class="select">
                                                <a href="{{route('offers.edit',$offer->id)}}" style="color:black ;text-decoration:none" class="note"> تعديل</a>
                                              
                                            </div>
                                            {{-- if the user is the publisher of the project let hime 
                                                accept and reject the accepted once  before the offer last confirmation --}}

                                            @elseif(Auth::user()->id==$data['user_id']&& $offer->status==1 && $data->status==1)
                                            {{-- //&&$data->handled_by==null --}}
                                                <form action="{{route('acceptOffer')}}" method="post">
                                                    @csrf
                                                    <input style="display:none" type="text" name="offer_id" value='{{$offer->id}}'>
                                                    <button style="color:black ;border:none" type='submit ' class="note"> قبول العرض</button>
                                                </form>

                                                  {{-- if the user is the publisher of the project let him
                                                     accept and reject the accepted once  before the offer last confirmation --}}
                                                {{-- cancel offer will return the offer to the default status which is 1 --}}
                                                {{-- 4 dont accept offers --}}


                                            @elseif(Auth::user()->id==$data['user_id']&&$offer->status==2 && $data->status==4 )
                                            <form action="{{route('cancelConfirm')}}" method="post">
                                                
                                                {{-- $data->status==4  dont accept offers--}}
                                                @csrf

                                               
                                                <input style="display:none" type="text" name="offer_id" value='{{$offer->id}}'>
                                                <input style="display:none" type="text" name="project_owner" value='{{$data['user_id']}}'>
                                                <input style="display:none" type="text" name="project_id" value='{{$data['id']}}'>
                                                <button  style="color:black ;border:none" type='submit 'class="note"> الغاء الموافقة </button>
                                            </form>
                                          
                                            @elseif(Auth::user()->id==$data['user_id']&&$offer->status==4)
                                                <a style="color:black;text-decoration:none" class="status ">تم رفضه</a> 
                                            {{-- <a href="" style="color:black"> الغاء  الموافقة</a> --}}

                                            {{-- @elseif(Auth::user()->id==$data['user_id']&&$offer->status==4)
                                            <a style="color:black">ملغي</a> --}}
                                            @elseif(Auth::user()->id==$data['user_id']&&$offer->status==3&&$data->status==2||Auth::user()->id==$data->handled_by)
                                            <a style="color:black" class="status">قيد التنفيذ </a>

                                            {{-- if the seeker receives the work so that the project is delivered closed and the offer is closed --}}



                                            @elseif(Auth::user()->id==$data['user_id']&&$offer->status==3&&$data->status==3 ||Auth::user()->id==$data->handled_by)
                                            {{-- <a style="color:black" class="status">تم التسليم  </a>  --}}
                                            <form action="{{route('confirmDelivery')}}" method="post">
                                                @csrf
                                                <input style="display:none" type="text" name="offer_id" value='{{$offer->id}}'>
                                                <input style="display:none" type="text" name="project_owner" value='{{$data['user_id']}}'>
                                                <input style="display:none" type="text" name="project_id" value='{{$data['id']}}'>
                                                <button  style="color:black ;border:none" type='submit ' class="note"> تأكيد الاستلام  </button>
                                            </form>
                                            
                                            @elseif(Auth::user()->id==$data['user_id']&&$offer->status==3&&$data->status==5 ||Auth::user()->id==$data->handled_by)
                                            <a style="color:black" class="status">مغلق </a> 
                                            
                                            @endif
                                            
                                            </div>
                                          
                                     
                                            {{-- @if($data->status==1 && $offer->status== 1 && Auth::user()->id==$offer->provider_id)

                                                <a style="color:black" class="status">بانتظار الموافقة</a> 
                                                <form action="{{route('cancelOffer')}}" method="post">
                                                    @csrf
                                                    <input style="display:none" type="text" name="offer_id" value='{{$offer->id}}'>
                                                    <button  style="color:black ;border:none;background:transparent" type='submit '>   إلغاء عرض السعر   </button>
                                                </form>
                                            
                                            @elseif($data->status==1 && $offer->status==2)
                                            <a style="color:black" class="status">تمت الموافقة </a> 
                                                <form action="{{route('confirmOffer')}}" method="post">
                                                    @csrf
                                                    <input style="display:none" type="text" name="project_id" value='{{$data->id}}'>
                                                    <button  style="color:black ;border:none;background:transparent" type='submit '>  تأكيد قبول المشروع  </button>
                                                </form>
                                                <form action="{{route('cancelOffer')}}" method="post">
                                                    @csrf
                                                    <input style="display:none" type="text" name="offer_id" value='{{$offer->id}}'>
                                                    <button  style="color:black ;border:none;background:transparent" type='submit '>    رفض المشروع    </button>
                                                </form>
                                                @elseif($data->status==2 && $offer->status==3)
                                                <a style="color:black" class="status">قيد التنفيذ </a> 
                                                @elseif($data->status==3 && $offer->status==3)
                                                <a style="color:black" class="status">تم التسليم  </a> 
                                          @endif --}}
                                         
                                          @if(Auth::user()->id==$data['user_id']||Auth::user()->id==$offer->provider_id)
                                          السعر  <span class="desc">
                                            {{$offer->price}}
                                          
                                         </span> 
                                          المدة <span class="desc"> {{$offer->duration}}</span>
                                          <div class="desc"> {{ $offer->description}}</div>
                                          <ul class="list-unstyled mb-0 list-unstyled job_det attachment_contianer">
                                            @if (!$offer->sal_offer_attach->isEmpty())
                                                <h4> ملفات توضيحية</h4>
                                                    @forelse ($offer->sal_offer_attach as $offer_attach)
                                                        <li>
                                                                <a href='{{$offer_attach->file_name}}' style='color:black'>{{$loop->iteration}}.{{$offer_attach->file_type}}</a>
                                                        </li>  
                                                    @empty
                                                        
                                                    @endforelse
                                               
                                
                                                 
                                             @endif
                                             
                                         </ul>
                                            @else
                                            <div class="desc"> {{ Str::substr($offer->description,0, 80)}}...</div>
                                          @endif
                                      </div>
                                        </div>
                               
                                @endforeach



                            </div>

                            {{-- @else
                                   <div> لا توجد عروض</div> --}}
                        @endif








                    </div>

                </div>








            </div>
            <!-- Side -->
            <div class="col-lg-4 ">
                <!-- بطاقة المشروع-->

                <div class="card mb-4 personal_info_container myworks">
                    <div class="card-header">بطاقة المشروع</div>
                    <div class="card-body">
                        <ul>
                            <li class="d-flex justify-content-between align-items-center  gap-10">
                                حالة المشروع
                               
                                 @if($data->status ==4)
                                    لا يتلقى عروض
                                  
                                {{-- @elseif($data->status == 2)
                                    قيد التنفيذ --}}
                                    
                                 @elseif($data->status == 5)
                                  مغلق
                                  @elseif ($data->status == 1)
                                
                                  <span>مفتوح</span>
                                  @elseif($data->status == 0)
                                  معلق
                                @endif
                            </li>
                            {{-- <li class="d-flex justify-content-between align-items-center">
                                تاريخ النشر <span>منذ ساعه</span>
                            </li> --}}
                            <li class="d-flex justify-content-between align-items-center">
                                الميزانية <span>${{ $data->price }}</span>
                            </li>
                            <li class="d-flex justify-content-between align-items-center">
                                مدة التنفيذ
                                <span><span>{{ $data->duration }}</span>ايام
                                </span>
                            </li>
                            {{-- <li class="d-flex justify-content-between align-items-center">
                                متوسط العروض <span>{{$offers_avg}}$</span>
                            </li> --}}
                            <li class="d-flex justify-content-between align-items-center">
                                {{-- عدد العروض <span>{{ $offers_count }}</span> --}}
                                 عدد العروض <span>{{ $data->sal_offers->count() }}</span>
                                
                            </li>
                        </ul>
                    </div>
                    <div>

                        @if ($data->status == 1 || $data->status == 2|| $data->status == 3)
                        <div class="d-grid">
                            <label class="d-flex align-items-baseline gap-2">
                                <input type="radio" class="option-input radio" name="example"
                                    @if ($data->status == 1) checked
                             @else
                                disabled @endif />
                                مرحلة تلقي العروض </label>
                            <label class="d-flex align-items-baseline gap-2">
                                <input type="radio" class="option-input radio" name="example"
                                    @if ($data->status == 2) checked
                                @else
                                     disabled @endif />
                                مرحلة التنفيذ</label>
                            <label class="d-flex align-items-baseline gap-2"> <input type="radio" class="option-input radio"
                                    name="example"
                                    @if ($data->status == 3) checked
                            @else
                            {{-- مرحلة المراجعة قبل ما يأكد التسليم من طالب الخدمة --}}
                                 disabled @endif />
                                مرحلة التسليم </label>
                        </div>
                        @endIf
                    </div>

                </div>

                <div class="personal_info_container myworks">
                    <h5>صاحب المشروع</h5>

                    <div class="d-flex align-items-flex-start">
                        <div class="img_con">
                            <img src="
                            @if($data->sal_created_by->image!=null)
                            {{$data->sal_created_by->image}}
                            @endif" alt="">
                        </div>
                        <div class="container_card">
                            <header class="">

                                <div>
                                    <h3> {{ $data->sal_created_by->name }}</h3>
                                    <h4> مدير شركة </h4>
                                </div>
                        </div>
                    </div>

                    </header>




                </div>


            </div>

        </div>


        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
                integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
        </script>

    @endsection
