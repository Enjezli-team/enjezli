@extends('website.layouts.master')
@section('content')
<script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>

<link id="pagestyle" href="{{asset('user_dash_assets/css/soft-ui-dashboard.css')}}?v=1.0.3" rel="stylesheet" />
<div class="container-fluid py-4 mt-5">
    <div class="page-header min-height-300 border-radius-xl mt-4" style="background-image: url('user_dash_assets/img/curved-images/curved0.jpg'); background-position-y: 50%;">
        <span class="mask bg-gradient-primary opacity-6"></span>
    </div>
    <div class="row">
        <div class="col-12 mt-4 ">
            <div class="card mb-4 ">

                <div class="card-body p-3 " style="background-color: #fff;">
                    <div class="row ">
                        @forelse($data as $item)
                        <div class="card card-body blur shadow-blur mx-4  overflow-hidden col-5 margin-12 mb-3">
                            <div class="row gx-4">
                                <div class="col-auto">
                                    <div class="avatar avatar-xl position-relative">
                                        <img src={{asset('images/'.$item->user->image)}} alt="profile_image" class="w-100 border-radius-lg shadow-sm">
                                    </div>

                                </div>

                                <div class="col-auto my-auto">

                                    <div class="h-100">
                                        <h5 class="mb-1">
                                            {{$item->user->name}}
                                        </h5>
                                        <p class="mb-0 font-weight-bold text-sm">
                                            {{$item->user->sal_profile->Job_title}}

                                        </p>
                                    </div>
                                </div>
                                <div class="col-lg-8 col-md-6 my-sm-auto ms-sm-auto me-sm-0 mx-auto mb-3">
                                    <div class="nav-wrapper position-relative end-0">
                                        {{$item->user->sal_profile->description}}
                                    </div>
                                </div>
                            </div>
                            <div class="border-0 ps-0 pb-0  d-flex align-items-center justify-content-between">
                                <div>
                                    <a class="btn btn-facebook btn-simple mb-0 ps-1 pe-2 py-0 " href=" {{$item->user->sal_profile->facebook}}">
                                        <i class="fab fa-facebook fa-lg "></i>
                                    </a>
                                    <a class="btn btn-twitter btn-simple mb-0 ps-1 pe-2 py-0 " href=" {{$item->user->sal_profile->tweeter}} ">
                                        <i class="fab fa-twitter fa-lg "></i>
                                    </a>
                                    <a class="btn btn-instagram btn-simple mb-0 ps-1 pe-2 py-0 " href=" {{$item->user->sal_profile->github}} ">
                                        <i class="fab fa-instagram fa-lg "></i>
                                    </a>


                                </div>
                                <div class="ratings col d-flex justify-content-center ">
                                    @for($i=0 ;$i<=$item->user->ratings ; $i++)
                                        <i class="fa fa-star rating-color text-primary"></i>
                                        @endfor

                                </div>
                                <div class="btn-grou  " style="float: left;" role="group" aria-label="Basic outlined example">
                                    <a href="/providers/{{$item->user->id}}" class="btn btn-sm  btn-outline-primary border-0">عرض المزيد</a>
                                    <a href="/chat/{{$item->user->id}}" class="btn btn-sm btn-outline-primary border-0"> مراسله</a>
                                </div>
                            </div>
                        </div>
                        @empty
                        <div class="card card-body blur shadow-blur mx-4  overflow-hidden col-5 margin-12">
                            <h6 class=" mb-0 "> لا يوجد مزودي خدمات</h6>
                        </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
