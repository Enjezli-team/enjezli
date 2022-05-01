<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.14.0-beta2/css/bootstrap-select.min.css" integrity="sha512-mR/b5Y7FRsKqrYZou7uysnOdCIJib/7r5QeJMFvLNHNhtye3xJp1TdJVPLtetkukFn227nKpXD9OjUc09lx97Q==" crossorigin="anonymous"
  referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
<link rel="stylesheet" href="{{ asset('auth_assets/project_assests/css/style.css ')}}">
<link rel="stylesheet" href="{{ asset('auth_assets/project_assests/css/project_card.css ')}}">


    
    <div class="profile">




        <div class="d-flex project_container">

            @forelse ($data as $item)
                
            <a href="{{route('projects.show',$item['id'])}}"> <div class="personal_info_container myworks">
                <div class="container_card">
                    <header class="">
                        <h2>{{ $item['title']}}</h2>
                        <div>
                            <div class="flex">
                                <span><ion-icon name="person-outline"></ion-icon></span>
                                <h5>{{$item->sal_created_by->name}} </h5>
                            </div>
                            <div class="flex">
                                <span><ion-icon name="time-outline"></ion-icon></span>
                                {{-- <span class="aut_pub">{{ $item['created_at']}}</span> --}}

                            </div>
                        </div>

                        <div>
                           {{ $item['description']}}


                        </div>
                        <div class="liks_shows">
                            <ul>
                                <li>
                                    <a href="" class="">
                                        <span> الفترة</span>
                                        <span>{{ $item['duration']}}يوم</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="" class="">
                                        <span> السعر  :</span>
                                        <span>{{ $item['price']}}$</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="" class="">

                                        <span>الحالة </span>
                                        @if ($item['status']==0)
                                        <span class="text-success text-sm mr-2"> مفتوح   </span>
                                        {{-- <span class="text-error text-sm mr-2">  بإنتظار الموافقة </span>  --}}
                                       
                                      @elseif($item['status']==2)
                                        <span class="text-success text-sm mr-2"> مغلق  </span> 
                                     
              
                                      @endif
                                        

                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="liks_shows">


                            <ul>
                              
                                {{-- <li>
                                    <a href="" class="">
                                        <span>:المقدمين</span>
                                        <span>10</span>
                                    </a>
                                </li> --}}
                            </ul>
                        </div>
                    </header>

                    <div class="hr">
                    </div>
                    <div class="liks_shows">
                        <a href="{{route('projects.show',$item['id'])}}"><button class="show_more"> التقديم</button></a>
                    </div>
                </div>
                </div>
            </a>
            @empty
    
            @endforelse


           

        </div>
        
    </div>
    </div>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>