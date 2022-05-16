@extends('website.users.user_dashboard.layout.master')
@section('content')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="{{ asset('css/user_dashboard.css') }}">

    <link rel="stylesheet" href="{{ asset('css/user_offer.css') }}">

    <section class="home">
        <div class="page_title">
            <div class='title shadow'>

                <span class='p_relative'>

                    العروض
                    <span class='myproject_count'>
                        {{ $offers->count() }}

                    </span>

                </span>


            </div>

        </div>
        @if (!$offers->isEmpty())
            @foreach ($offers as $offer)
                <div class='porto_container'>



                    <div class=' porto shadow'>

                        <div class='edit'>

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
                                                <h5 class="modal-title" id="exampleModalLabel"> الغاء العرض </h5>
                                                <button type="button" class="btn-close " data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>

                                            <div class="modal-body">
                                                هل أنت متأكد من الغاء العرض ؟
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-success"
                                                    data-bs-dismiss="modal">Cancel</button>

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
                                                    data-bs-dismiss="modal">Cancel</button>

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
                                                    data-bs-dismiss="modal">Cancel</button>

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
                                                    data-bs-dismiss="modal">Cancel</button>
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
                        <a href="projects/{{ $offer->sal_project_id->id }}#offer{{ $offer->id }}">

                            <div class='img_container'>
                                <div class='img_project'>
                                </div>
                                <div class='personal_info_first'>
                                    <div class='phone'>
                                        <i class='bx bx-time'></i> <span class='time'> 22/2/2 22:22pm
                                        </span>
                                    </div>

                                </div>
                            </div>




                            <div class='personal_desc'>

                                <div class='title_desc'>
                                    <h5><i class='bx bxs-quote-right'></i></h5>

                                    <span> {{ $offer->sal_project_id->title }}</span>
                                    <h5><i class='bx bxs-quote-left'></i></h5>

                                </div>
                                <div class='desc'>
                                    {{ Str::substr($offer->description, 0, 80) }}...
                                </div>
                                <div class='details'>
                                    <div>
                                        السعر
                                        <span>
                                            {{ $offer->price }}
                                        </span>
                                        $

                                    </div>

                                    <div>
                                        الحالة
                                        @if ($offer->sal_project_id->status == 1 && $offer->status == 0)
                                            <a style="color:black" class="status">ملغي</a>
                                        @elseif($offer->sal_project_id->status == 1 && $offer->status == 1)
                                            <a style="color:black" class="status">بانتظار الموافقة </a>
                                        @elseif($offer->sal_project_id->status == 4 && $offer->status == 1)
                                            <a style="color:black" class="status"> مقبول</a>
                                        @elseif($offer->sal_project_id->status == 4 && $offer->status == 2)
                                            <a style="color:black" class="status">تمت موافقتك </a>
                                        @elseif($offer->sal_project_id->status == 2 && $offer->status == 3)
                                            <a style="color:black" class="status">قيد التنفيذ </a>
                                        @elseif($offer->sal_project_id->status == 3 && $offer->status == 3)
                                            {{-- <a style="color:black" class="status">تم التسليم  </a> --}}
                                            <a style="color:black" class="status"> قيد التسليم </a>
                                        @elseif($offer->sal_project_id->status == 5 && $offer->status == 3)
                                            <a style="color:black" class="status"> تم الاستلام </a>
                                        @elseif($offer->sal_project_id->status == 1 && $offer->status == 4)
                                            <a style="color:black" class="status">مرفوض</a>
                                        @endif



                                    </div>
                                    <div>
                                        المدة
                                        <span>
                                            {{ $offer->duration }}
                                        </span>
                                        ايام
                                    </div>

                                </div>

                            </div>

                    </div>

                    </a>

                    <div>
            @endforeach
        @endif

        </div>


    </section>
