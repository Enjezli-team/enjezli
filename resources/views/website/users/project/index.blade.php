<link rel="stylesheet" href="{{ asset('auth_assets/project_assests/css/project_card.css ') }}">
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
