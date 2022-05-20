@extends('website.layouts.master')
@section('content')
<style>
.card_cust{height: 401px;
    overflow-x: auto;}
    .fa-star{color:gold;}
    .evaluate{
            width: 124px;
    background: #639fae;
    padding: 3px 19px;
    border-radius: 0.25rem;
    color: white;
    translate:.8s;
    }
     .evaluate:hover{
background:white;    border:1px solid  #639fae;
    color:#639fae;
    }
</style>
<script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>

<link id="pagestyle" href="{{asset('user_dash_assets/css/soft-ui-dashboard.css')}}?v=1.0.3" rel="stylesheet" />


<div class="container-fluid py-4 mt-5">
    <div class="page-header min-height-100 border-radius-xl mt-4" style="background-image: url('user_dash_assets/img/curved-images/curved0.jpg'); background-position-y: 50%;">
        
    </div>
    <div class="card card-body blur shadow-blur mx-4 mt-n6 overflow-hidden">
        <div class="row gx-4">
            <div class="col-auto">
                <div class=" avatar-xl position-relative">
                    <img src={{asset("images/".$data->image)}} alt="profile_image" class="w-50 border-radius-lg shadow-sm">
                </div>
            </div>
            <div class="col-auto my-auto">
                <div class="h-100">
                    <h5 class="mb-1">
                        {{$data->name}}
                    </h5>
                    <p class="mb-0 font-weight-bold text-sm">
                        {{$data->sal_profile->Job_title}}
                    </p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 my-sm-auto ms-sm-auto me-sm-0 mx-auto mt-3">
                <div class="nav-wrapper position-relative end-0">
                    <ul class="nav nav-pills nav-fill p-1 bg-transparent" role="tablist">
                        <li class="nav-item">
                            <a href="" class=evaluate>
                                تقييم
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link mb-0 px-0 py-1 " data-bs-toggle="tab" href="javascript:;" role="tab" aria-selected="false">
                                <svg class="text-dark" width="16px" height="16px" viewBox="0 0 40 44" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                    <title>document</title>
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <g transform="translate(-1870.000000, -591.000000)" fill="#FFFFFF" fill-rule="nonzero">
                                            <g transform="translate(1716.000000, 291.000000)">
                                                <g transform="translate(154.000000, 300.000000)">
                                                    <path class="color-background" d="M40,40 L36.3636364,40 L36.3636364,3.63636364 L5.45454545,3.63636364 L5.45454545,0 L38.1818182,0 C39.1854545,0 40,0.814545455 40,1.81818182 L40,40 Z" opacity="0.603585379"></path>
                                                    <path class="color-background" d="M30.9090909,7.27272727 L1.81818182,7.27272727 C0.814545455,7.27272727 0,8.08727273 0,9.09090909 L0,41.8181818 C0,42.8218182 0.814545455,43.6363636 1.81818182,43.6363636 L30.9090909,43.6363636 C31.9127273,43.6363636 32.7272727,42.8218182 32.7272727,41.8181818 L32.7272727,9.09090909 C32.7272727,8.08727273 31.9127273,7.27272727 30.9090909,7.27272727 Z M18.1818182,34.5454545 L7.27272727,34.5454545 L7.27272727,30.9090909 L18.1818182,30.9090909 L18.1818182,34.5454545 Z M25.4545455,27.2727273 L7.27272727,27.2727273 L7.27272727,23.6363636 L25.4545455,23.6363636 L25.4545455,27.2727273 Z M25.4545455,20 L7.27272727,20 L7.27272727,16.3636364 L25.4545455,16.3636364 L25.4545455,20 Z">
                                                    </path>
                                                </g>
                                            </g>
                                        </g>
                                    </g>
                                </svg>
                                <span class="ms-1">رسالة</span>
                            </a>
                        </li>

                    </ul>
                </div>
            </div>
        </div>
       <div class='d-flex justify-content-between'>
        <div class="border-0 ps-0 pb-0 ">

            <a class="btn btn-facebook btn-simple mb-0 ps-1 pe-2 py-0 " href="  {{$data->sal_profile->facebook}}">
                <i class="fab fa-facebook fa-lg "></i>
            </a>
            <a class="btn btn-twitter btn-simple mb-0 ps-1 pe-2 py-0 " href="  {{$data->sal_profile->tweeter}}">
                <i class="fab fa-twitter fa-lg "></i>
            </a>
            <a class="btn btn-instagram btn-simple mb-0 ps-1 pe-2 py-0 " href="  {{$data->sal_profile->github}}">
                <i class="fab fa-instagram fa-lg "></i>
            </a>
        </div>
        <div>
        <i class="fa fa-star" aria-hidden="true"></i>
        <i class="fa fa-star" aria-hidden="true"></i>
        <i class="fa fa-star" aria-hidden="true"></i>
        <i class="fa fa-star" aria-hidden="true"></i>
        <i class="fa fa-star" aria-hidden="true"></i>
        </div>
       </div>
    </div>
</div>
<div class="container-fluid py-4">
    <div class="row ">
        <div class="col-12 col-xl-4 mb-3 ">
            <div class="card h-100 ">
                <div class="card-header pb-0 p-3 d-flex align-items-center justify-content-between ">
                    <h6 class="mb-0 ">المهارات</h6>
                </div>
                <div class="card-body p-3 card_cust ">
                    <ul class="list-group ">

                        @forelse($data->sal_skills as $skill)
                        <li class="list-group-item border-0 d-flex  justify-content-between align-items-center mb-1">
                            <h6 class="mb-0 text-sm ">{{$skill->sal_skill_u->title}}</h6>

                        </li>
                        @empty
                        <li class="list-group-item border-0 d-flex  justify-content-between align-items-center mb-2 ">
                            <h6 class="mb-0 text-sm ">لا يوجد</h6>

                        </li>
                        @endforelse
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-12 col-xl-4 mb-3">
            <div class="card h-100">
                <div class="card-header pb-0 p-3">
                    <div class="row">
                        <div class="col-md-8 d-flex align-items-center justify-content-between">
                            <h6 class=" mb-0 ">المعلومات الشخصية</h6>
                        </div>
                        <div class="col-md-4 text-start ">

                        </div>
                    </div>
                </div>
                <div class="card-body p-3 p card_cust">
                    <p class="text-sm ">
                        وصف
                    </p>
                    <p class="text-sm ">

                        {{$data->sal_profile->description}}
                    </p>
                    <hr class="horizontal gray-light my-4 ">
                    <ul class="list-group ">
                        <li class="list-group-item border-0 ps-0 pt-0 text-sm "><strong class="text-dark ">الاسم:</strong> &nbsp;{{$data->name}}</li>
                        <li class="list-group-item border-0 ps-0 text-sm "><strong class="text-dark ">الجوال:</strong> &nbsp; {{$data->sal_profile->phone}}</li>
                        <li class="list-group-item border-0 ps-0 text-sm "><strong class="text-dark ">الايميل:</strong> &nbsp; {{$data->email}}</li>
                        <li class="list-group-item border-0 ps-0 text-sm "><strong class="text-dark ">الدولة:</strong> &nbsp; {{$data->sal_profile->country}}</li>

                    </ul>
                </div>
            </div>
        </div>
        <div class="col-12 col-xl-4  mb-3">
            <div class="card h-100 " style="">
                <div class="card-header pb-0 p-3 d-flex align-items-center justify-content-between ">
                    <h6 class="mb-0 ">المراجعات {{$data->sal_review_to->count()}} </h6>
                </div>
                <div class="card-body p-3 card_cust ">
                    <ul class="list-group ">

                        @forelse($data->sal_review_to as $review)
                        <li class="list-group-item border-0 d-flex align-items-center px-0 mb-2 ">
                            <div class="d-flex align-items-start flex-column justify-content-center ">
                                <div class="avatar mr-1 mb-1 ">
                                    <img src={{asset("images/".$review->sal_project->sal_created_by->image)}} alt="kal " class="border-radius-lg shadow ">
                                </div>
                                <div class="ratings col d-flex">
                                    @for($i=0 ;$i<=$review->rate ; $i++)
                                        <i class="fa fa-star rating-color text-primary"></i>
                                        @endfor

                                </div>
                                <h6 class="mb-0 text-sm ">{{$review->sal_project->sal_created_by->name}}</h6>
                                <p class="mb-0 text-xs ">{{$review->created_at}}</p>
                                <p class="mb-0 text-xs " style="    word-wrap: break-word;">{{$review->comment}}</p>
                            </div>
                        </li>
                        @empty
                        <li class="list-group-item border-0 d-flex align-items-center px-0 mb-2 ">
                            <h6 class="mb-0 text-sm ">لا يوجد</h6>

                        </li>
                        @endforelse
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-12 mt-4 mb-3 ">
            <div class="card mb-4 ">
                <div class="card-header pb-0 p-3 ">
                    <h6 class="mb-1 ">معرض الاعمال</h6>
                </div>
                <div class="card-body p-3 ">
                    <div class="row ">

                        @forelse($data->sal_works as $work)
                        <div class="col-xl-3 col-md-6 mb-xl-0 mb-4 ">
                            <div class="card card-blog card-plain ">

                                <div class="position-relative ">
                                    <a class="d-block shadow-xl border-radius-xl ">
                                        <img src={{asset("images/".$work->file)}} alt="img-blur-shadow " class="img-fluid shadow border-radius-xl ">
                                    </a>
                                </div>

                                <div class="card-body px-1 pb-0 ">
                                    <a href="/work_data/{{$work->id}} ">
                                        <h5>
                                            {{$work->title}} </p>
                                        </h5>
                                    </a>
                                    <p class="mb-4 text-sm ">
                                        {{$work->description}}
                                    </p>
                                </div>
                            </div>
                        </div>
                        @empty
                        <div class="col-xl-3 col-md-6 mb-xl-0 mb-4 ">
                            <h6 class="mb-0 text-sm ">لا يوجد</h6>
                        </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
