<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
@extends('website.users.user_dashboard.layout.master')
@section('content')
    <link rel="stylesheet" href="{{ asset('css/user_dashboard.css') }}">

    <link rel="stylesheet" href="{{ asset('css/user_project.css') }}">

    <section class="home">
        <div class="page_title">
            <div class='title shadow'>

                <span class='p_relative'>
                   vv مشاريعي
                    <span class='myproject_count'>
                        {{ $data->count() }}

                    </span>

                </span>
                <a href='{{ route('createProject') }}'>
                    <div class='add edit'>

                        <i class='bx bx-plus'></i>


                    </div>
                </a>
            </div>

        </div>
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
        @forelse ($data as $item)

            <div class='porto_container'>


                <div class=' porto shadow'>

                    <div class='edit'>
                        @if ($item->status == 0 || $item->status == 1)
                            <a href="{{ route('projects.edit', $item->id) }}">
                                <i class='bx bxs-edit'></i>
                            </a>
                        @else
                        @endif
                    </div>
                    <a href="projects/{{ $item->id }}">
                        <div class='img_container'>
                            <div class='img_project'>
                            </div>
                            <div class='personal_info_first'>
                                <div class='phone'>
                                    <i class='bx bx-time'></i> <span class='time'> 22/2/2 22:22pm
                                    </span>
                                </div>
                                <div class='offer'>
                                    العروض
                                    <span class='time'> {{ $item->sal_offers->count() }}
                                    </span>
                                </div>
                            </div>
                        </div>




                        <div class='personal_desc'>

                            <div class='title_desc'>
                                <h5><i class='bx bxs-quote-right'></i></h5>

                                <span>{{ $item->title }} </span>
                                <h5><i class='bx bxs-quote-left'></i></h5>

                            </div>
                            <div class='desc'>
                                {{ Str::substr($item->description, 0, 80) }}...





                            </div>
                            <div class='details'>
                                <div>
                                    السعر
                                    <span>
                                        {{ $item->price }}
                                    </span>
                                    $

                                </div>
                                <div>
                                    الحالة
                                    @if ($item->status == 1)
                                        <span>مفتوح</span>
                                    @elseif($item->status == 0)
                                        <span>: معلق </span>
                                    @elseif($item->status == 2)
                                        <span>قيد التنفيذ </span>
                                    @elseif($item->status == 3)
                                        <span>تم التسليم</span>
                                    @elseif($item->status == 4)
                                        <span>لا يتلقى عروض</span>
                                    @elseif($item->status == 5)
                                        <span>مغلق</span>
                                    @endif


                                </div>
                                <div>
                                    المدة
                                    <span>
                                        {{ $item->duration }}
                                    </span>
                                    ايام
                                </div>

                            </div>

                        </div>
                </div>

                </a>

                <div>

        @endforeach
        {{-- @endif --}}
        </div>


    </section>
