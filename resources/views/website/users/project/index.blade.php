<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link rel="stylesheet" href="{{ asset('auth_assets/project_assests/css/project_card.css ') }}">
<style>
    /****search effect******/


    /****search effect******/

    .search {
        cursor: pointer;
        color: #186d80;
        font-size: 18px;
    }

    .search-box {
        width: fit-content;
        height: fit-content;
        position: relative;
    }

    .input-search {
        height: 50px;
        width: 50px;
        border-style: none;
        padding: 10px;
        letter-spacing: 2px;
        outline: none;
        border-radius: 25px;
        transition: all .5s ease-in-out;
        background-color: transparent;
        padding-right: 40px;
        color: #257587;
    }

    .input-search::placeholder {
        color: gray;
        letter-spacing: 2px;
    }

    .btn-search {
        width: 50px;
        height: 50px;
        border-style: none;
        font-size: 16px;
        font-weight: bold;
        outline: none;
        cursor: pointer;
        border-radius: 50%;
        position: absolute;
        right: 0px;
        color: black;
        background-color: transparent;
        pointer-events: painted;
    }

    .btn-search:focus~.input-search {
        width: 177px;
        border-radius: 0px;
        background-color: transparent;
        border-bottom: 1px solid gray;
        transition: all 500ms cubic-bezier(0, 0.110, 0.35, 2);
    }

    .input-search:focus {
        width: 177px;
        border-radius: 0px;
        background-color: transparent;
        border-bottom: 1px solid gray;
        transition: all 500ms cubic-bezier(0, 0.110, 0.35, 2);
    }

    @media (min-width:768px) {
        .input-search:focus {
            width: 170px;
        }
    }

    .show_more {
        background-color: #186d80;
        color: white;
        border-radius: 0.25rem;
    }

    .show_more:hover {
        background-color: white;
        color: #186d80;
    }

    .price {
        font-size: 33px;
        color: #186d80;
    }

</style>
@extends('website.layouts.master')

@section('content')
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>

    <link id="pagestyle" href="{{ asset('user_dash_assets/css/soft-ui-dashboard.css') }}?v=1.0.3" rel="stylesheet" />


    <div class="container-fluid py-3 mt-5">
        <div class="page-header min-height-300 border-radius-xl  mt-5" style="min-height: 70px !important;
                                                                                                                border-right: 4px solid #5ab1c5;
                                                                                                                border-radius: 4px;background-color: white;
                                                                                                                padding: 10px 10px;
                                                                                                                ">
            <h6> تصفح المشاريع </h6>
            <div class="search-box">
                <button class="btn-search">
                    <ion-icon name="search" class="search"></ion-icon>
                </button>
                <input type="text" class="input-search search search-input" placeholder=" ابحث عن ....">
            </div>
        </div>
        <div class="profile mt-1">
            {{-- <livewire:search /> --}}

            <div class=" row mt-md-5 mt-lg-5 mt-sm-3 min-height-400" style='row-gap:24px!important'>
                @forelse ($data as $item)
                    <div class="col-md-4 col-sm-12 cards_contianer ">
                        <a class='title ' href="{{ route('projects.show', $item['id']) }}">
                            <div class="personal_info_container myworks" style="width: auto;height:411px">
                                <div class="container_card">
                                    <div class="">
                                        <h2 class="h4">{{ $item['title'] }}</h2>
                                        <div class='mt-3 mb-3'>
                                            <div class="flex  align-items-baseline gap-2">
                                                <span>
                                                    <ion-icon name="person-outline"></ion-icon>
                                                </span>
                                                <h5>{{ $item->sal_created_by->name }} </h5>
                                            </div>
                                            <div class="flex gap-2">
                                                <span>
                                                    <ion-icon name="time-outline"></ion-icon>
                                                </span>
                                                <span class="aut_pub">{{ $item['created_at'] }}</span>

                                            </div>
                                        </div>

                                        <div>
                                            {{ Str::substr($item->description, 0, 50) }} ...معرفة المزيد


                                        </div>
                                        <div class="liks_shows">
                                            <ul class="d-grid w-100 gap-1" style=''>
                                                <div class='d-flex w-100 justify-content-between'
                                                    style='flex-direction: row-reverse;'>
                                                    <div>
                                                        <li>
                                                            <span class="price">{{ $item['price'] }}$</span>
                                                        </li>
                                                    </div>

                                                    <div>
                                                        <li>
                                                            <span> الفترة</span>
                                                            :
                                                            <span>{{ $item['duration'] }}يوم</span>

                                                        </li>


                                                        <li>
                                                            <span>العروض</span>
                                                            :
                                                            <span> {{ $item->sal_offers->count() }}</span>
                                                        </li>
                                                    </div>
                                                </div>
                                                {{-- {{ $item->sal_skill}}
                                <div class='skills ' style=''>
                                    @foreach ($item->sal_skills_by as $skill)
                                    {{ $skill->sal_skill->title }}<br>
                                    @endforeach
                                </div> --}}
                                                <li>
                                                    <a href="" class="status">

                                                        <span>الحالة </span>
                                                        :
                                                        @if ($item['status'] == 0)
                                                            <span class="text-success text-sm mr-2"> مفتوح </span>
                                                            <span class="text-error text-sm mr-2"> بإنتظار الموافقة </span>
                                                        @elseif($item['status'] == 2)
                                                            <span class="text-success text-sm mr-2"> مغلق </span>
                                                        @endif


                                                    </a>
                                                </li>


                                            </ul>
                                        </div>

                                    </div>

                                    <div class="hr">
                                    </div>
                                    <div class="liks_shows">
                                        <a href="/projects/{{ $item['id'] }}"><button class="show_more">
                                                التقديم</button></a>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                @empty
                    <div style="text-align:center;color:white ; font-weight: bold;font-size:2rem;margin-top:100px;"> لا توجد
                        مشاريع</div>
                @endforelse




            </div>
        </div>
        {!! $data->links('website.layouts.pagination') !!}
        {{-- <nav aria-label="Page navigation exampled-flex justify-content-center">
            <ul class="pagination justify-content-center">
                <li class="page-item">
                    <a class="page-link" href="#" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                    <a class="page-link" href="#" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
            </ul>
        </nav> --}}
    </div>
    </div>
@endsection
