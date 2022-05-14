@extends('website.layouts.master')
@section('content')
<script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>

<link id="pagestyle" href="{{asset('user_dash_assets/css/soft-ui-dashboard.css')}}?v=1.0.3" rel="stylesheet" />


<div class="container-fluid py-4 mt-5">
<div class="page-header min-height-300 border-radius-xl mt-4" style="min-height: 70px !important;
border-right: 4px solid #5ab1c5;
border-radius: 4px;background-color: white;
padding: 10px 10px;">
   <h6>معرض الاعمال</h6>
    </div>

    <div class="row mt-4">
        <div class="col-lg-12 mb-lg-0 mb-4">
            <div class="card">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-lg-6 mb-lg-0 mb-4 ">
                            <div class="d-flex flex-column h-100">
                                <p class="mb-1 pt-2 text-bold"> تفاصيل العمل</p>
                                <h5 class="font-weight-bolder">{{$data->title}}</h5>
                                <p class="mb-5">{{$data->description}}</p>
                                <a class="text-dark font-weight-bold ps-1 mb-0 icon-move-left mt-auto" href="{{$data->link}}">
                                    {{$data->link}}
                                    <i class="fas fa-arrow-left text-sm ms-1" aria-hidden="true"></i>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-4 me-auto ms-0 text-center">
                            <div class="bg-gradient-primary border-radius-lg min-height-200">
                                <div class="position-relative pt-5 pb-4">
                                    <img class="max-width-500 w-100 position-relative z-index-2" src={{asset('images/'.$data->file)}}>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-12 mb-lg-0 mt-2">
            <div class="card">
                <div class="card-body p-3">
                    <div class="row">
                        @forelse($data->sal_work_attach as $attach)
                        <div class="col-lg-3 mb-lg-0 mb-4 ">
                            <h6 class="mb-0 text-sm">
                                {{$attach->file_name}}
                                <i class="fas fa-arrow-left text-sm ms-1" aria-hidden="true"></i>
                            </h6>

                        </div>
                        @empty
                        <div class="col-lg-12 mb-lg-0 mb-4 ">
                            <h6 class="mb-0 text-sm">
                                لاتوجد ملفات توضيحيه
                            </h6>

                        </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
