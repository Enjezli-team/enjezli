@extends('website.layouts.master')
@section('content')
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <style>
        .mo_footer {
            display: flex;
            align-items: center;
            justify-items: space-between;
            gap: 15px;
        }


        @media (max-width: 800px) {
            .mo_footer {
                display: grid !important;
                align-items: center !important;
                justify-items: center;
                gap: 15px;
            }

        }

        .fa-star {
            color: gold;
        }

    </style>
    <link id="pagestyle" href="{{ asset('user_dash_assets/css/soft-ui-dashboard.css') }}?v=1.0.3" rel="stylesheet" />
    <div class="container-fluid py-4 mt-5 bg-white ">
        <div class="page-header min-height-150 border-radius-xl mt-4 d-flex justify-content-center"
            style="background-position-y: 50%;">
            <span class="mask bg-gradient-dark opacity-6"></span>
            <div class='text-center  text-white ' style='z-index:11'>
                <h5 class="text-white text-center">
                    تقوم هذه الصفحة بعرض كافة المنجزيين
                </h5>

            </div>
        </div>
        <div class="row">
            <div class="col-12 mt-4 ">
                <div class="card mb-4 ">

                    <div class="card-body p-3 min-height-400" style="background-color: #cce5ed;">
                        <div class="row ">
                            @forelse($data as $item)
                                <div class="card card-body blur shadow-blur mx-4  overflow-hidden col-5 margin-12 mb-3">
                                    <div class="row gx-4">
                                        <div class="col-auto">
                                            <div class="avatar avatar-xl position-relative">
                                                <img src={{ asset('images/' . $item->user->image) }} alt="profile_image"
                                                    class="w-100 border-radius-lg shadow-sm">
                                            </div>

                                        </div>

                                        <div class="col-auto my-auto">

                                            <div class="">
                                                <h5 class="mb-1">
                                                    {{ $item->user->name }}
                                                </h5>
                                                <p class="mb-0 font-weight-bold text-sm">
                                                    {{ $item->user->sal_profile->Job_title }}

                                                </p>
                                            </div>
                                        </div>
                                        <div class="col-lg-12  p-3 mb-3">
                                            <div class="nav-wrapper position-relative end-0">
                                                {{ Str::substr($item->user->sal_profile->description, 0, 50) }}
                                                ....

                                            </div>
                                        </div>
                                    </div>
                                    <div class=" mo_footer border-0 ps-0 pb-0   ">
                                        <div>
                                            <a class="btn btn-facebook btn-simple mb-0 ps-1 pe-2 py-0 "
                                                href=" {{ $item->user->sal_profile->facebook }}">
                                                <i class="fab fa-facebook fa-lg "></i>
                                            </a>
                                            <a class="btn btn-twitter btn-simple mb-0 ps-1 pe-2 py-0 "
                                                href=" {{ $item->user->sal_profile->tweeter }} ">
                                                <i class="fab fa-twitter fa-lg "></i>
                                            </a>
                                            <a class="btn btn-instagram btn-simple mb-0 ps-1 pe-2 py-0 "
                                                href=" {{ $item->user->sal_profile->github }} ">
                                                <i class="fab fa-instagram fa-lg "></i>
                                            </a>


                                        </div>
                                        <div class="ratings col d-flex justify-content-center ">
                                            {{-- @for ($i = 0; $i <= $item->user->ratings; $i++)
                                        <i class="fa fa-star rating-color "></i>

                                        @endfor --}}
                                            @for ($i = 0; $i < 5; $i++)
                                                @if (floor($item->user->ratings) - $i >= 1)
                                                    {{-- Full Start --}}
                                                    <i class="fas fa-star text-warning"> </i>
                                                @elseif ($item->user->ratings - $i > 0)
                                                    {{-- Half Start --}}
                                                    <i class="fas fa-star-half-alt text-warning">
                                                    </i>
                                                @else
                                                    {{-- Empty Start --}}
                                                    <i class="far fa-star text-warning"> </i>
                                                @endif
                                            @endfor

                                        </div>
                                        <div class="btn-grou  " style="float: left;" role="group"
                                            aria-label="Basic outlined example">
                                            <a href="/providers/{{ $item->user->id }}"
                                                class="btn btn-sm  btn-outline-primary border-0">عرض المزيد</a>
                                            <a href="/chat/{{ $item->user->id }}"
                                                class="btn btn-sm btn-outline-primary border-0"> مراسله</a>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <div class="card card-body blur shadow-blur mx-4  overflow-hidden col-5 margin-12">
                                    <h6 class=" mb-0 "> لا يوجد مزودي خدمات</h6>
                                </div>
                            @endforelse
                        </div>
                        {!! $data->links('website.layouts.pagination') !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
