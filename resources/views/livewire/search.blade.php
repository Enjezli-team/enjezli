<div class="project_containe">
    {{-- Because she competes with no one, no one can compete with her. --}}
    <input wire:model='search' type="text"> {{ $search }}

    <div class='d-flex project_containe'>
        @forelse ($projects as $item)
            <div class="personal_info_container myworks">
                <a class='title card' href="{{ route('projects.show', $item['id']) }}">
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
                                {{ Str::substr($item->description, 0, 80) }}...


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
                                            <span> {{ $item->sal_offers->count() }}</span>
                                        </a>
                                    </li>
                                    {{-- {{ $item->sal_skill}} --}}
                                    <div class='skills ' style=''>
                                        @foreach ($item->sal_skills_by as $skill)
                                            {{ $skill->sal_skill->title }}<br>
                                        @endforeach
                                    </div>

                                    {{-- <a href="" class="">

                                    <span>الحالة </span>
                                    @if ($item['status'] == 0)
                                        <span class="text-success text-sm mr-2"> مفتوح </span>
                                        <span class="text-error text-sm mr-2">  بإنتظار الموافقة </span> 
                                    @elseif($item['status'] == 2)
                                        <span class="text-success text-sm mr-2"> مغلق </span>
                                    @endif


                                </a> --}}
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
                </a>
            </div>
        @empty
        @endforelse
    </div>


</div>
