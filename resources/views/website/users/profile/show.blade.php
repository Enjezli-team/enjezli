<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
<link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.14.0-beta2/css/bootstrap-select.min.css"
    integrity="sha512-mR/b5Y7FRsKqrYZou7uysnOdCIJib/7r5QeJMFvLNHNhtye3xJp1TdJVPLtetkukFn227nKpXD9OjUc09lx97Q=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
<link rel="stylesheet" href="{{ asset('auth_assets/project_assests/css/style.css ') }}">
<link rel="stylesheet" href="{{ asset('css/model.css ') }}">
@extends('website.layouts.master_dash')
@section('content')
<!-- End Navbar -->
@if (session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session()->get('success') }}

                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @elseif(session()->has('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session()->get('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
                 
<div class="container-fluid mt-5 ">
    <div class="page-header min-height-300 border-radius-xl mt-4 text-center text-white d-flex justify-content-center" style="">
                    <span class="mask bg-gradient-dark" ></span>
                    

                    <div class='text-center' style='z-index:12'>
                    <h3 class='text-white'>عرض الملف الشخصي</h3>
                                        <p>     , تعرض هذه الصفحة معلومات الملف الشخصي
المراجعات , والاعمال , التقيممات
                   
                    </p>
                    </div>
    </div>
    <div class="card card-body blur shadow-blur mx-4 mt-n6 overflow-hidden">
        <div class="row gx-4">
            <div class="col-auto">
                <div class=" avatar-xl position-relative">
                    <img src="{{ asset("images/".$data->image) }}"  alt="profile_image" class="w-50 border-radius-lg shadow-sm">
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
                    <ul class="nav nav-pills nav-fill p-1 bg-transparent" role="tablist" style='display:none'>
                        <li class="nav-item">
                            <a href="">
                                <span class="ms-1">تقييم</span>
                            </a>
                        </li>

                        <li class="nav-item" style='display:none'>
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
    </div>
</div>
<div class="container-fluid pb-4">
    <div class="row">
        <div class="col-12 col-xl-4 " >
            <div class="card h-100">
                <div class="card-header pb-0 p-3">
                    <div class="row">
                        <div class="col-md-8 d-flex align-items-center justify-content-between">
                            <h6 class=" mb-0 ">المعلومات الشخصية</h6>
                        </div>
                        <div class="col-md-4 text-start ">
                            <a href="/profiles/{{$data->sal_profile->id}}/edit">
                                <i class="fas fa-user-edit text-secondary text-sm " data-bs-toggle="tooltip " data-bs-placement="top " title="Edit Profile "></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body p-3 p card_custom">
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
        <div class="col-12 col-xl-4 mt-3 ">
            <div class="card h-100 ">
                <div class="card-header pb-0 p-3 d-flex align-items-center justify-content-between ">
                    <h6 class="mb-0 ">المهارات</h6>
                </div>
                <div class="card-body p-3 p card_custom">
                    <ul class="list-group ">

                        @forelse($data->sal_skills as $skill)
                        <li class="list-group-item border-0 d-flex  justify-content-between align-items-center mb-1">
                            <h6 class="mb-0 text-sm ">{{$skill->sal_skill_u->title}}</h6>
                            <button type="button" class="btn btn-link pe-3 ps-0 mb-0  " data-bs-toggle="modal"
                                        data-bs-target="#cancel{{ $skill->id }}">
                                        <i class="fa fa-trash  text_primary"></i>
                                    </button>
                            <div class="modal fade" id="cancel{{ $skill->id }}" tabindex="-1"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">حذف مهاره </h5>
                                            <button type="button" class="btn-close " data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>

                                        <div class="modal-body">
                                            هل أنت متأكد من حذف المهاره  ؟
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-success"
                                                data-bs-dismiss="modal">إلغاء</button>
                                                <form action="/profiles/{{$skill->id}}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-danger" type="submit">
                                                       تاكيد
                                                    </button>
                                                    </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
    
        <div class="col-12 col-xl-4 mt-3 ">
            <div class="card h-100 " s>
                <div class="card-header pb-0 p-3 d-flex align-items-center justify-content-between ">
                    <h6 class="mb-0 ">المراجعات {{$data->sal_review_to->count()}} </h6>
                </div>
                <div class="card-body p-3 p card_custom">
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
        <div class="col-12 mt-4 ">
            <div class="card mb-4 ">
                <div class="card-header pb-0 p-3 ">
                    <h6 class="mb-1 ">أعمالي</h6>
                </div>
                <div class="card-body p-3 ">
                    <div class="row ">
                        <div class="col-xl-3 col-md-6 mb-xl-0 mb-4 ">
                            <div class="card h-100 card-plain border ">
                                <div class="card-body d-flex flex-column justify-content-center text-center ">
                                    <a href="/works/create ">
                                        <i class="fa fa-plus text-secondary mb-3 "></i>
                                        <h5 class=" text-secondary "> إضافة عمل جديد </h5>
                                    </a>
                                </div>
                            </div>
                        </div>
                        @forelse($data->sal_works as $work)
                        <div class="col-xl-3 col-md-6 mb-xl-0 mb-2   " style='box-shadow: 0 0 1px grey;
    border-radius: 1rem;'>
                            <div class="card card-blog card-plain ">
                                
                                    <div class="col-md-4 text-start d-flex justify-content-end align-items-baseline " style="width: 100%">
                                        <a class="btn btn-link pe-3 ps-0 mb-0  " href="/works/{{$work->id}}">
                                            <i class="fa fa-eye  text_primary"></i>
                                        </a>
                                        <a class="btn btn-link pe-3 ps-0 mb-0  " href="/works/{{$work->id}}/edit">
                                            <i class="fa fa-edit  text_primary"></i>
                                        </a>
                                        <button type="button" class="btn btn-link pe-3 ps-0 mb-0  " data-bs-toggle="modal"
                                        data-bs-target="#cancel{{ $work->id }}">
                                        <i class="fa fa-trash  text_primary"></i>
                                    </button>
                                    </div>
                                
                                
                            <div class="modal fade" id="cancel{{ $work->id }}" tabindex="-1"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">حذف العمل </h5>
                                            <button type="button" class="btn-close " data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>

                                        <div class="modal-body">
                                            هل أنت متأكد من حذف العمل  ؟
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-success"
                                                data-bs-dismiss="modal">إلغاء</button>
                                                <form action="/works/{{$work->id}}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-danger" type="submit">
                                                        تاكيد
                                                    </button>
                                                    </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                <div class="position-relative ">
                                    <a class="d-block shadow-xl border-radius-xl ">
                                        <img src="{{asset("images/".$work->file)}}" alt="img-blur-shadow " class="img-fluid shadow border-radius-xl ">
                                    </a>
                                </div>

                                <div class="card-body px-1 pb-0 ">
                                    <a href="javascript:; ">
                                        <h5>
                                            {{$work-> title}} </p>
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
<script src="https://code.jquery.com/jquery-3.6.0.min.js"
                                integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
                                integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4"
                                crossorigin="anonymous"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.14.0-beta2/js/bootstrap-select.min.js"
                                integrity="sha512-FHZVRMUW9FsXobt+ONiix6Z0tIkxvQfxtCSirkKc5Sb4TKHmqq1dZa8DphF0XqKb3ldLu/wgMa8mT6uXiLlRlw=="
                                crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@endsection
