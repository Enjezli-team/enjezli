@extends("website.users.user_dashboard.layout.master")
@section('content')
    <link rel="stylesheet" href="{{ asset('css/user_dashboard.css') }}">
    <link rel="stylesheet" href="{{ asset('css/work_details.css') }}">

    <section class="home">
        <div class="page_title">
            <div class='title shadow'>
                {{ $data->title}} 

            </div>
        </div>
        <div class='porto_container'>

            <div class=' porto shadow'>
                <div class='edit'>
                    <a href="/works/{{ $data->id}}/edit">
                        <i class='bx bxs-edit'></i>
                    </a>

                </div>
              
                <div class='img_container'>
                    @forelse($data->sal_work_attach as $o)
                    <div class='img_prrofile2'>
                        <img src='images/{{$o->file_name}}'>
                    </div>
                    @empty
                    <div class="flex_between">
                        <div>
                            <h5 class="project_name"> لا يوجد  ملفات</h5>
                        </div>
                    </div>
                @endforelse
                </div>
            </div>
           
                
               

            
            


            <div class=''>

                <div class='review shadow second_section'>
                    <header>
                        <span>التفاصيل</span>

                    </header>
                    <div class='review_body'>

                        <div class='row'>
                            <div>
                                <span>
                                    <i class='bx bxs-user'></i>
                                    الناشر </span>

                                <div>

                                </div>

                            </div>
                            <div>
                                {{ $data->sal_user->name}}                             </div>
                        </div>
                        <div class='row'>
                            <div>
                                <i class='bx bxs-time'></i> <span>
                                    تاريخ الاضافة
                                </span>


                            </div>
                            <div>
                                <span href=''> {{ $data->created_at}} </span>
                            </div>
                        </div>
                        <div class='row'>
                            <div>
                                <i class='bx bxs-time'></i> <span>
                                    تاريخ الانجاز
                                </span>


                            </div>
                            <div>
                                <span href=''> {{ $data->created_at}} </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class='review shadow second_section'>
                    <header>
                        <span>عن العمل </span>

                    </header>
                    <div class='review_body'>

                        <div class='row'>
                            {{$data->description}}
                    </div>
                </div>
                </div>
                 <div class='review shadow second_section'>
                <div>
                 <span>
                 <i class='bx bx-link'></i>
                 الرابط
                 </span>
                 <span>
                   
                 </span>

                </div>
                    <header>
                        <span></span>

                    </header>
                    <div class='review_body'>

                        <div class='row'>
                            {{$data->link}}
                        </div>
                   
                    </div>
                </div>
            </div>

        </div>


    </section>
