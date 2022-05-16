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
    
    @media(min-width:768px) {
        .input-search:focus {
            width: 170px;
        }
    }
    .show_more{   background-color: #186d80;
    color: white;
    border-radius: 0.25rem;}
     .show_more:hover{   background-color: white;
    color:#186d80;
    }
</style>
@extends("website.layouts.master")

@section('content')
    <div class="profile">

        <div class="d-flex project_container">

            @forelse ($data as $item)
                <a class='title' href="{{ route('projects.show', $item['id']) }}">
                    <div class="personal_info_container myworks">
                        <div class="container_card">
                            <header class="">
                                <h2>{{ $item['title'] }}</h2>
                                <div>
                                    <div class="flex">
                                        <span>
                                            <ion-icon name="person-outline"></ion-icon>
                                        </span>
                                        <h5>{{ $item->sal_created_by->name }} </h5>
                                    </div>
                                    <div class="flex">
                                        <span>
                                            <ion-icon name="time-outline"></ion-icon>
                                        </span>
                                        {{-- <span class="aut_pub">{{ $item['created_at']}}</span> --}}

                                    </div>
                                </div>

                                <div>
                                    {{ Str::substr($item->description,0, 80)}}...  


                                </div>
                                <div class="liks_shows">
                                    <ul>
                                        <li>
                                            <a href="" class="">
                                                <span> الفترة</span>
                                                <span>{{ $item['duration'] }}يوم</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="" class="">
                                                <span> السعر :</span>
                                                <span>{{ $item['price'] }}$</span>
                                            </a>
                                        </li>
                                        <li>

                                            <li>
                                                <a href="" class="">
                                                    <span>:العروض</span>
                                                    <span> {{$item->sal_offers->count()}}</span>
                                                </a>
                                            </li>
                                            {{-- <a href="" class="">

                                                <span>الحالة </span>
                                                @if ($item['status'] == 0)
                                                    <span class="text-success text-sm mr-2"> مفتوح </span>
                                                    <span class="text-error text-sm mr-2">  بإنتظار الموافقة </span> 
                                                @elseif($item['status'] == 2)
                                                    <span class="text-success text-sm mr-2"> مغلق </span>
                                                @endif


                                            </a>  --}}
                                        </li>
                                    </ul>
                                </div>
                            
                            </header>

                            <div class="hr">
                            </div>
                            <div class="liks_shows">
                                <a href="{{ route('projects.show', $item['id']) }}"><button class="show_more">
                                        التقديم</button></a>
                            </div>
                        </div>
                    </div>
                </a>
            @empty
            @endforelse




        </div>

    </div>
    </div>
@endsection
