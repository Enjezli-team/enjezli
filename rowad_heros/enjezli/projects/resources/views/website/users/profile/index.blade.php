<link rel="stylesheet" href="{{ asset('auth_assets/profile_assests/css/header.css') }}">
<link rel="stylesheet" href="{{ asset('auth_assets/profile_assests/css/profile_show.css') }}">

<div class="profile">
    <div class="personal_info_container">

        <div class="profile_img"> <img src="{{ asset('images/'.$data->image) }}" alt=""></div>
        <div class="padding info_container ">
            <div class="personal_basic_info">
                <div class="profile_name">{{ $data->name }}</div>
                <div class="personal_information">
                    <div class="profile_phone">{{ $data->sal_profile->phone }}</div>
                    <ul class="social">
                        <li>
                            <a href="{{ $data->sal_profile->facebook }}">
                                <ion-icon name="logo-facebook"></ion-icon>
                            </a>
                        </li>
                        <li>
                            <a href="{{ $data->sal_profile->tweeter }}">
                                <ion-icon name="logo-instagram"></ion-icon>
                            </a>
                        </li>
                        <li>
                            <a href="{{ $data->sal_profile->github }}">
                                <ion-icon name="mail-outline"></ion-icon>
                            </a>
                        </li>

                    </ul>
                </div>
            </div>


            <div>

                <div class="desc" style=" overflow-wrap: break-word;
                    word-wrap: break-word;
                     : auto;">{{ $data->sal_profile->description }}</div>

            </div>

        </div>

        <div class="edit_pro_container">
            <button class="show_more " type='submit'> <a href="/profiles/{{ $data->sal_profile->id }}/edit"
                    class="edit_pro button button-1">تعديل</a></button>

        </div>
    </div>



    <div class="d-grid">
        <div class="personal_info_container myworks">
            <header class="flex_between">
                <h3> احدث أعمالي </h3>

                <div>
                    <a href="/works" class="show_more show_more_1 ">
                        عرض كل الاعمال

                    </a>


                </div>

            </header>
            <div class='p-relative m_21'>

                <div class="hr">
                    <div class="count_project"> {{ $data->sal_works->count() }}
                    </div>
                </div>

                <div class="jobs">
                   
                    @forelse($data->sal_works as $w)
                   
                        <div class="flex_between">
                            <div>
                                <h5 class="project_name">{{ $w->title }}</h5>
                                <h6 class="project_date">{{ $w->created_at }}</h6>
                            </div>
                            <div class="operation">

                                <a href="/works/{{ $w->id }}/edit"> <span>
                                        <ion-icon class="edit" name="create-outline"></ion-icon>
                                    </span></a>
                                <a href="/works/{{ $w->id }}"> <span>
                                        <ion-icon class="delete" name="trash-outline"></ion-icon>
                                    </span></a>
                                <a href="/works/{{ $w->id }}"> <span>
                                        <ion-icon class="more" name="ellipsis-vertical-circle-outline">
                                        </ion-icon>
                                    </span></a>
                            </div>
                        </div>
                       
                    @empty
                        <div class="flex_between">
                            <div>
                                <h5 class="project_name"> لا يوجد عمل جديد</h5>
                            </div>
                        </div>
                    @endforelse
                  
                </div>

            </div>
        </div>
        <div class="personal_info_container myworks">
            <header class="flex_between">
                <h3>احدث مشاريعي</h3>

                <div>
                    <button class='show_more show_more_1 '><a href="/works">
                        عرض كل مشاريعي</a>


                    </button>


                </div>

            </header>
            <div class='p-relative m_21'>

                <div class="hr">
                    <div class="count_project"> {{ $data->sal_projects_provider->count() }}</div>
                </div>
            </div>
            <div class="jobs">
                @forelse($data->sal_projects_provider as $p)
                    <div class="flex_between">
                        <div>
                            <h5 class="project_name">{{ $p->title }}</h5>
                            <h6 class="project_date">{{ $p->created_at }}</h6>
                        </div>
                        <div class="operation">

                            <a href="/works/{{ $p->id }}/edit"> <span>
                                    <ion-icon class="edit" name="create-outline"></ion-icon>
                                </span></a>
                            <a href="/works/{{ $p->id }}"> <span>
                                    <ion-icon class="delete" name="trash-outline"></ion-icon>
                                </span></a>
                            <a href="/works/{{ $p->id }}"> <span>
                                    <ion-icon class="more" name="ellipsis-vertical-circle-outline"></ion-icon>
                                </span></a>
                        </div>
                    </div>
                @empty
                    <div class="flex_between">
                        <div>
                            <h5 class="project_name"> لا يوجد مشاريع جديدة</h5>
                        </div>
                    </div>
                @endforelse
            </div>

        </div>
        <div class="personal_info_container myworks">
            <header class="flex_between">
                <h3>العروض </h3>

                <div>
                    <button class='show_more show_more_1 '><a href="/offers">
                        عرض كل مشاريعي</a>


                    </button>


                </div>

            </header>
            <div class='p-relative m_21'>

                <div class=" hr">
                    <div class="count_project"> {{ $data->sal_offers->count() }}</div>
                </div>

                <div class="jobs">
                    @forelse($data->sal_offers as $o)
                        <div class="flex_between">
                            <div>
                                <h5 class="project_name">{{ $o->title }}</h5>
                                <h6 class="project_date">{{ $o->created_at }}</h6>
                            </div>
                            <div class="operation">

                                <a href="/offers/{{ $o->id }}/edit"> <span>
                                        <ion-icon class="edit" name="create-outline"></ion-icon>
                                    </span></a>
                                <a href="/works/{{ $o->id }}"> <span>
                                        <ion-icon class="delete" name="trash-outline"></ion-icon>
                                    </span></a>
                                <a href="/works/{{ $o->id }}"> <span>
                                        <ion-icon class="more" name="ellipsis-vertical-circle-outline">
                                        </ion-icon>
                                    </span></a>
                            </div>
                        </div>
                    @empty
                        <div class="flex_between">
                            <div>
                                <h5 class="project_name"> لا يوجد عروض جديدة</h5>
                            </div>
                        </div>
                    @endforelse
                </div>

            </div>



        </div>
        <div class="personal_info_container myworks">
            <header class="flex_between">
                <h3>مهارتي </h3>

                <div>
                    <button class="show_more show_more_1 ">
                        عرض مهارتي


                    </button>


                </div>

            </header>
            <div class='p-relative  m_21'>

                <div class="hr">
                    <div class="count_project"> {{ $data->sal_skills->count() }}</div>
                </div>

                <div class="jobs">
                    @forelse($data->sal_skills as $s)
                        <div class="flex_between">
                            <div>
                                <h5 class="project_name">{{ $s->title}}</h5>
                                <h6 class="project_date">{{ $s->created_at }}</h6>
                            </div>
                            <div class="operation">


                                <a href="/works/{{ $s->id }}"> <span>
                                        <ion-icon class="delete" name="trash-outline"></ion-icon>
                                    </span></a>

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
</div>
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>
