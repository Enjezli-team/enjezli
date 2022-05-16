@extends("website.users.user_dashboard.layout.master")
@section('content')
<link rel="stylesheet" href="{{ asset('css/user_dashboard.css') }}">
<link rel="stylesheet" href="{{ asset('css/user_porto.css') }}">

    <section class="home">
        <div class="page_title">
            <div class='title shadow'>
                معلومات الملف الشخصي



            </div>
        </div>
        <div class='porto_container'>

            <div class=' porto shadow'>
                <div class='edit'>
                    <a href="/profiles/{{ $data->sal_profile->id }}/edit">
                        <i class='bx bxs-edit'></i>
                    </a>

                </div>

                <div class='img_container'>
                    <div class='img_prrofile'>
                        <img src='{{ asset('images/'.$data->image) }}'>
                    </div>
                    <div class='personal_info_first'>
                        <div class='name'>
                            {{$data->name}}                        </div>
                        <div class='phone'>
                            <i class='bx bx-mobile'></i> <span>  {{$data->sal_profile->phone }}
                            </span>
                        </div>
                    </div>
                </div>
                <div class="evaluted">
                    <div class="rating__number">
                        {{-- <span class="rating__score">4.5</span> --}}
                        <div class="rating__reviews"></div>
                    </div>

                    <span class="rating__stars" style="--rating: 4.;"></span>
                </div>

                <div class='social'>
                    <ul>
                        <li><a href=" {{$data->sal_profile->facebook}}"><i class='bx bxl-facebook icon'></i></a></li>
                        <li><a href=" {{$data->sal_profile->tweeter }}"><i class='bx bxl-twitter'></i></a></li>
                        <li><a href=" {{$data->sal_profile->github }}"><i class='bx bxl-github'></i></a></li>
                    </ul>
                </div>

                <div class='personal_desc'>

                    <div class='title_desc'>
                        <h5><i class='bx bxs-quote-right'></i></h5>

                        <span>{{  $data->sal_profile->Job_title}} </span>
                        <h5><i class='bx bxs-quote-left'></i></h5>

                    </div>
                    <div class='desc'>
                        {{$data->sal_profile->description }}
                    </div>

                </div>
            </div>


            <div class=''>

                <div class='review shadow second_section'>
                    <header>
                        <span>المراجعات</span>
                        <span><a href='{{ route('user_review') }}'>عرض الكل</a></span>
                    </header>
                    <div class='review_body'>
                 
                        <div class='row'>
                            <div>
                                <i class='bx bxs-user'></i> <span>
                                    احمد
                                </span>
                                <div>
                                    <i class='bx bx-stopwatch'></i>
                                    <span class='phone'>
                                        2022/2/2 22:2pm
                                    </span>

                                </div>
                                <div>

                                </div>

                            </div>
                            <div>
                                <a href=''>عرض</a>
                            </div>
                        </div>
                        <div class='row'>
                            <div>
                                <i class='bx bxs-user'></i> <span>
                                    احمد
                                </span>
                                <div>
                                    <i class='bx bx-stopwatch'></i>
                                    <span class='phone'>
                                        2022/2/2 22:2pm
                                    </span>

                                </div>
                                <div>

                                </div>

                            </div>
                            <div>
                                <a href=''>عرض</a>
                            </div>
                        </div>
                        <div class='row'>
                            <div>
                                <i class='bx bxs-user'></i> <span>
                                    احمد
                                </span>
                                <div>
                                    <i class='bx bx-stopwatch'></i>
                                    <span class='phone'>
                                        2022/2/2 22:2pm
                                    </span>

                                </div>
                                <div>

                                </div>

                            </div>
                            <div>
                                <a href=''>عرض</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class='review shadow second_section '>
                    <header>
                        <span>المهارات</span>
                        <span><a href='#'>عرض الكل</a></span>
                    </header>
                    <div class='review_body'>
                        @forelse($data->sal_skills as $s)
                        <div class='row'>
                           
                            <div>
                                <i class='bx bxs-graduation'></i>
                                <span>{{ $s->sal_skill_u->title}}
                                </span>


                            </div>



                            <div class='operation_icons'>
                                <form class="card-body" action="/profiles/{{$s->id}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                {{-- <a href=''> <i class='bx bx-plus'></i></a>
                                <a href=''> <i class='bx bx-edit'></i></a> --}}
                                 <button style="border: none;  background: none;" type="submit">
                                <a href=''> <i class='bx bx-minus'></i></a>
                            </button></form>

                            </div>
                        </div>
                       
                        @empty
                        <div class="flex_between">
                            <div>
                                <h5 class="project_name"> لا يوجد مهارات جديدة</h5>
                            </div>
                        </div>
                    @endforelse
                    </div>
                </div>
            </div>

        </div>

        
    </section>
