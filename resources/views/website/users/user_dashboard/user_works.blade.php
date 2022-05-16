@extends("website.users.user_dashboard.layout.master")
@section('content')
    <link rel="stylesheet" href="{{ asset('css/user_dashboard.css') }}">

    <link rel="stylesheet" href="{{ asset('css/user_work.css') }}">

    <section class="home">
          <div class="page_title">
            <div class='title shadow'>

                <span class='p_relative'>
                    اعمالي
                    <span class='myproject_count'>
                        {{ $data->count() }}

                    </span>

                </span>
                <div class='add edit'>
                    <a href='/works/create'>
                        <i class='bx bx-plus'></i>
                    </a>

                </div>

            </div>

        </div>

        <div class='porto_container'>

            @forelse ($data as $item)
        
      
          <div class=' porto shadow'>
                <div class='edit'>
                    <a href="/works/{{ $item->id }}/edit">
                        <i class='bx bxs-edit'></i>

                    </a>
                     <form class="card-body" action="/works/{{$item->id}}" method="POST">
                        @csrf
                        @method('DELETE')
                                     <button type="submit"  style="border: none;  background: none;"  class="show_more"> <a href=''><i class='bx bx-minus'></i>
                         </a>
                    </button></form>

                       
                  


                </div>


                <div class='img_project'>
                    <img src='{{ asset('images/'.$data->image) }}'>
                </div>


          





            <div class='personal_desc'>

                <div class='title_desc'>
                    <h5><i class='bx bxs-quote-right'></i></h5>

                  <a href='/work_details/{{ $item->id}}'>  <span>{{ $item->title}} </span></a>
                    <h5><i class='bx bxs-quote-left'></i></h5>

                </div>


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


    </section>
