{{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> --}}
<link rel="stylesheet" href="{{ asset('auth_assets/project_assests/css/project_card.css ') }}">
@extends("website.layouts.master")

@section('content')
<script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>

<link id="pagestyle" href="{{asset('user_dash_assets/css/soft-ui-dashboard.css')}}?v=1.0.3" rel="stylesheet" />


<div class="container-fluid py-3 mt-5">
<div class="page-header min-height-300 border-radius-xl  mt-4" style="min-height: 70px !important;
border-right: 4px solid #5ab1c5;
border-radius: 4px;background-color: white;
padding: 10px 10px;">
   <h6>تصفح المشاريع </h6>
    </div>
<div class="profile mt-2">
    {{-- <livewire:search /> --}}
    <div class=" row">
        @forelse ($data as $item)
<div class="col-md-4 col-sm-12">
        <a class='title ' href="{{ route('projects.show', $item['id']) }}">
            <div class="personal_info_container myworks" style="width: auto;height:380px">
                <div class="container_card">
                    <div class="">
                        <h2 class="h4">{{ $item['title'] }}</h2>
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
                                <span class="aut_pub">{{ $item['created_at']}}</span>

                            </div>
                        </div>

                        <div>
                            {{ Str::substr($item->description, 0, 80) }}...


                        </div>
                        <div class="liks_shows">
                            <ul class="d-flex">
                                <li>
                                    <a href="" class="w-50">
                                        <span> الفترة</span>
                                        <span>{{ $item['duration'] }}يوم</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="" class="">
                                        <span> السعر </span>
                                        <span>{{ $item['price'] }}$</span>
                                    </a>
                                </li>
                                <li>

                                <li>
                                    <a href="" class="">
                                        <span>:العروض</span>
                                        <span> {{ $item->sal_offers->count() }}</span>
                                    </a>
                                </li>
                                {{-- {{ $item->sal_skill}}
                                <div class='skills ' style=''>
                                    @foreach ($item->sal_skills_by as $skill)
                                    {{ $skill->sal_skill->title }}<br>
                                    @endforeach
                                </div>
                                --}}
                                <a href="" class="">

                                    <span>الحالة </span>
                                    @if ($item['status'] == 0)
                                    <span class="text-success text-sm mr-2"> مفتوح </span>
                                    <span class="text-error text-sm mr-2"> بإنتظار الموافقة </span>
                                    @elseif($item['status'] == 2)
                                    <span class="text-success text-sm mr-2"> مغلق </span>
                                    @endif


                                </a>
                                </li>
                            </ul>
                        </div>

                    </div>

                    <div class="hr">
                    </div>
                    <div class="liks_shows">
                        <a href="{{ route('projects.show', $item['id']) }}"><button class="show_more">
                                التقديم</button></a>
                    </div>
                </div>
            </div>
        </a>
</div>
        @empty
        @endforelse




    </div>

</div>
<nav aria-label="Page navigation example">
    <ul class="pagination justify-cont-center">
        <li class="page-item">
            <a class="page-link" href="#" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
            </a>
        </li>
        <li class="page-item"><a class="page-link" href="#">1</a></li>
        <li class="page-item"><a class="page-link" href="#">2</a></li>
        <li class="page-item"><a class="page-link" href="#">3</a></li>
        <li class="page-item">
            <a class="page-link" href="#" aria-label="Next">
                <span aria-hidden="true">&raquo;</span>
            </a>
        </li>
    </ul>
</nav>
</div>
</div>

@endsection
