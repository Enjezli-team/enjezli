@extends("website.users.user_dashboard.layout.master")
@section('content')
    <link rel="stylesheet" href="{{ asset('css/user_dashboard.css') }}">

    <link rel="stylesheet" href="{{ asset('css/user_offer.css') }}">

    <section class="home">
        <div class="page_title">
            <div class='title shadow'>

                <span class='p_relative'>
                    العروض
                    <span class='myproject_count'>
                      {{  $offers->count()}}

                    </span>

                </span>
         

            </div>

        </div>
        @if (!$offers->isEmpty()) 
        @foreach ($offers as $offer)
      
        <div class='porto_container'>

      

            <div class=' porto shadow'>

                <div class='edit'>
                    <a>
                        <i class='bx bxs-edit'></i>

                    </a>
                        <a href=''>
                       تسليم المشروع
                    </a>
                      <a href=''>
                       الغاء المشروع
                    </a>
                    

                </div>
                <a href="projects/{{$offer->sal_project_id->id}}#offer{{$offer->id}}">
              
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

                        <span> {{$offer->sal_project_id->title}}</span>
                        <h5><i class='bx bxs-quote-left'></i></h5>

                    </div>
                    <div class='desc'>
                        {{$offer->description}}
                    </div>
                    <div class='details'>
                        <div>
                            السعر
                            <span>
                                {{ $offer->price}}
                            </span>
                            $

                        </div>
                        {{-- <div>
                            الحالة
                            <span>
                                مغلق
                            </span>


                        </div> --}}
                        <div>
                            المدة
                            <span>
                                {{ $offer->duration}}
                            </span>
                            ايام
                        </div>

                    </div>

                </div>
            </a>
            </div>



        <div>

    @endforeach
    @endif

        </div>

    
    </section>
