<link rel="stylesheet" href="{{ asset('auth_assets/project_assests/css/project_card.css ') }}">
<link rel="stylesheet" href="{{ asset('css/model.css ') }}">


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
@extends('website.layouts.master_dash')
@section('content')
    <!-- End Navbar -->
    <div class="container-fluid mt-5 ">
        <div class="page-header min-height-300 border-radius-xl mt-4 text-center text-white d-flex justify-content-center"
            style="">
            <span class="mask bg-gradient-dark"></span>
            <div class='text-center' style='z-index:12'>
                <h3 class='text-white'>
                 عرض العروض
                 [                        {{ $offers->count() }}
]
                 </h3>
                <p>
تعرض هذه الصفحة العروض التي قدمت اليها
                </p>
            </div>
        </div>

    </div>
    <div class="container-fluid pb-4">
        <div class="row">
  @if (!$offers->isEmpty())
            @foreach ($offers as $offer)
            <div class="col-12 col-xl-4 mt-3 ">
                <div class="card h-100 ">
                      <div class="">
                        <a href="projects/{{ $offer->sal_project_id->id }}#offer{{ $offer->id }}">
                            <div class="personal_info_container myworks" style="width: auto;height:415px">
                                <div class="container_card">
                                    <div class="">
                                        <h2 class="h4">{{ $offer->sal_project_id->title }}</h2>
                                        <div class='mt-3 mb-3'>
                                            <div class="flex  align-items-baseline gap-2">
                                                <span>
                                                    <ion-icon name="person-outline"></ion-icon>
                                                </span>
                                                <h5></h5>
                                            </div>
                                            <div class="flex gap-2">
                                                <span>
                                                    <ion-icon name="time-outline"></ion-icon>
                                                </span>
                                                <span class="aut_pub"></span>

                                            </div>
                                        </div>

                                        <div>
                                          {{ Str::substr($offer->description, 0, 50) }}
                                         ...معرفة المزيد 


                                        </div>
                                        <div class="liks_shows">
                                            <ul class="d-grid w-100 gap-1 pe-0" >
                                        <div class='d-flex w-100 justify-content-between align-items-center'>
                                            <div>
                                               <li>
                                                    <a href="">
                                                        <span  class="price">    {{ $offer->price }}$</span>
                                                    </a>
                                                </li>
                                            </div>
                                              
                                              <div>
                                                <li>
                                                    <a href="" class="w-50">
                                                        <span> الفترة</span>
                                                        :
                                                        <span>   {{ $offer->duration }}يوم</span>
                                                    </a>
                                                </li>
                                             

                                           
                                              </div>
                                        </div>
                                                {{-- {{ $item->sal_skill}}
                                <div class='skills ' style=''>
                                    @foreach ($item->sal_skills_by as $skill)
                                    {{ $skill->sal_skill->title }}<br>
                                    @endforeach
                                </div> --}}
                                                <li class='d-flex gap-2'>
                                                    <a href="" class="status">
                                                    الحالة:
                                                    
                                              @if ($offer->sal_project_id->status == 1 && $offer->status == 0)
                                            <a style="    color: #3a416f;
    background: #fce4ec;
    padding: 1px 12px;" class="status">ملغي</a>
                                        @elseif($offer->sal_project_id->status == 1 && $offer->status == 1)
                                            <a style="    color: #3a416f;
    background: #c9e1e9;
    padding: 1px 12px;" class="status">بانتظار الموافقة </a>
                                        @elseif($offer->sal_project_id->status == 4 && $offer->status == 1)
                                            <a style="    color: #3a416f;
    background: #a5d6a7;
    padding: 1px 12px;" class="status"> مقبول</a>
                                        @elseif($offer->sal_project_id->status == 4 && $offer->status == 2)
                                            <a style="    color: #3a416f;
    background: #a5d6a7;
    padding: 1px 12px;" class="status">تمت موافقتك </a>
                                        @elseif($offer->sal_project_id->status == 2 && $offer->status == 3)
                                            <a style="    color: #3a416f;
    background: #4fc3f796;
    padding: 1px 12px;" class="status">قيد التنفيذ </a>
                                        @elseif($offer->sal_project_id->status == 3 && $offer->status == 3)
                                            {{-- <a style="color:black" class="status">تم التسليم  </a> --}}
                                            <a style="    color: #3a416f;
    background: #4fc3f796;
    padding: 1px 12px;" class="status"> قيد التسليم </a>
                                        @elseif($offer->sal_project_id->status == 5 && $offer->status == 3)
                                            <a style="    color: #3a416f;
    background: #a5d6a7;
    padding: 1px 12px;" class="status"> تم الاستلام </a>
                                        @elseif($offer->sal_project_id->status == 1 && $offer->status == 4)
                                            <a style="    color: #3a416f;
    background: #fce4ec;
    padding: 1px 12px;" class="status">مرفوض</a>
                                        @endif


                                                    </a>
                                                </li>
                                           
                                           
                                            </ul>
                                        </div>

                                    </div>

                                    <div class="hr">
                                    </div>
                                    <div class="liks_shows">

                                            @if ($offer->sal_project_id->status == 1 && $offer->status == 0)
                            @elseif($offer->sal_project_id->status == 1 && $offer->status == 1)
                                {{-- <form action="{{ route('cancelOffer', $offer->id) }}" method="post">
                                    @csrf
                                    <input style="display:none" type="text" name="offer_id" value='{{ $offer->id }}'>
                                    <button style="color:black ;border:none;background:transparent" type='submit '> إلغاء
                                        العرض </button>
                                </form> --}}
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#cancel{{ $offer->id }}">
                                    الغاء العرض
                                </button>
                                <div class="modal fade" id="cancel{{ $offer->id }}" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">الغاء عرض</h5>
                                                <button type="button" class="btn-close " data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>

                                            <div class="modal-body">
                                                هل أنت متأكد من الغاء العرض ؟
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-success"
                                                    data-bs-dismiss="modal">إلغاء</button>

                                                <a href="{{ route('cancelOffer', $offer->id) }}"> <button type="button"
                                                        class="btn btn-danger"> تأكيد</button></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- @elseif($offer->sal_project_id->status==1 && $offer->status==1) --}}
                            @elseif($offer->sal_project_id->status == 4 && $offer->status == 2)
                                {{-- <form action="{{ route('confirmOffer') }}" method="post">
                                    @csrf
                                    <input style="display:none" type="text" name="project_id"
                                        value='{{ $offer->sal_project_id->id }}'>
                                    <input style="display:none" type="text" name="offer_id" value='{{ $offer->id }}'>

                                    <button style="color:black ;border:none;background:transparent" type='submit '> قبول
                                        المشروع </button>
                                </form> --}}
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#accept{{ $offer->id }}">
                                    قبول
                                </button>

                                <!-- Modal -->

                                <div class="modal fade" id="accept{{ $offer->id }}" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">قبول مشروع</h5>
                                                <button type="button" class="btn-close " data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>

                                            <div class="modal-body">
                                                هل أنت متأكد من قبول المشروع ؟
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-success"
                                                    data-bs-dismiss="modal">إلغاء</button>

                                                <a
                                                    href="/offer/confirm/{{ $offer->id }}/{{ $offer->sal_project_id->id }}">
                                                    <button type="button" class="btn btn-danger"> تأكيد</button></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#reject{{ $offer->id }}">
                                    رفض
                                </button>

                                <!-- Modal -->

                                <div class="modal fade" id="reject{{ $offer->id }}" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">رفض المشروع </h5>
                                                <button type="button" class="btn-close " data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>

                                            <div class="modal-body">
                                                هل أنت متأكد من رفض المشروع ؟
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-success"
                                                    data-bs-dismiss="modal">إلغاء</button>

                                                <a href="{{ route('cancelOffer', $offer->id) }}"> <button type="button"
                                                        class="btn btn-danger"> تأكيد</button></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                {{-- <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static"
                                    data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                ...
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                                <a href="{{ route('cancelOffer', $offer->id) }}"><button type="button"
                                                        class="btn btn-primary">تأكيد</button></a>
                                            </div>
                                        </div>
                                    </div>
                                </div> --}}
                            @elseif($offer->sal_project_id->status == 4 && $offer->status == 2)
                                {{-- <form action="{{ route('confirmOffer') }}" method="post">
                                    @csrf
                                    <input style="display:none" type="text" name="project_id"
                                        value='{{ $offer->sal_project_id->id }}'>
                                    <input style="display:none" type="text" name="offer_id" value='{{ $offer->id }}'>

                                    <button style="color:black ;border:none;background:transparent" type='submit '> قبول
                                        المشروع </button>
                                </form> --}}
                                {{-- <form action="{{ route('cancelOffer') }}" method="post">
                                    @csrf
                                    <input style="display:none" type="text" name="offer_id" value='{{ $offer->id }}'>
                                    <button style="color:black ;border:none;background:transparent" type='submit '> رفض
                                        المشروع </button>
                                </form> --}}
                            @elseif($offer->sal_project_id->status == 2 && $offer->status == 3)
                                {{-- <form action="{{ route('finishWork') }}" method="post">

                                    @csrf
                                    <input style="display:none" type="text" name="project_id"
                                        value='{{ $offer->sal_project_id->id }}'>
                                    <input style="display:none" type="text" name="offer_id" value='{{ $offer->id }}'>

                                    <button style="color:black ;border:none;background:transparent" type='submit '> تسليم
                                        المشروع </button>
                                </form> --}}
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#deliver{{ $offer->id }}">
                                    تسليم
                                </button>

                                <!-- Modal -->

                                <div class="modal fade" id="deliver{{ $offer->id }}" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">تسليم المشروع </h5>
                                                <button type="button" class="btn-close " data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>

                                            <div class="modal-body">
                                                هل أنت متأكد من تسليم المشروع ؟

                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-success"
                                                    data-bs-dismiss="modal">إلغاء</button>
                                                <form action="{{ route('finishWork') }}" method="post">

                                                    @csrf
                                                    <input style="display:none" type="text" name="project_id"
                                                        value='{{ $offer->sal_project_id->id }}'>
                                                    <input style="display:none" type="text" name="offer_id"
                                                        value='{{ $offer->id }}'>

                                                    <button style="color:black ;border:none;background:transparent"
                                                        type='button ' class="btn btn-danger"> تسليم
                                                        المشروع </button>
                                                    {{-- <a href="{{ route('cancelOffer', $offer->id) }}"> <button
                                                            type="button" class="btn btn-danger"> تأكيد</button></a> --}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif

  

  
                                        
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
      @endforeach
        @endif

        </div>



    </div>
    </div>
@endsection
