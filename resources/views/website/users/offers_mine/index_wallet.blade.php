<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.14.0-beta2/css/bootstrap-select.min.css" integrity="sha512-mR/b5Y7FRsKqrYZou7uysnOdCIJib/7r5QeJMFvLNHNhtye3xJp1TdJVPLtetkukFn227nKpXD9OjUc09lx97Q==" crossorigin="anonymous"
  referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
<link rel="stylesheet" href="{{ asset('auth_assets/project_assests/css/project_details.css ')}}">
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-8 ">
               

               


                <div class="accordion mt-3 " id="accordionExample">
                    <div class="accordion-item">
                       
                        @if (!$offers->isEmpty()) 
                                <h2 class="accordion-header d-flex justify-content-between align-items-center p-3 pt-1 pm-1" id="headingOne">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                العروض 
                            
                                </button>
                                <div class="select">
                                    <select id="standard-select">
                                        <option value="">الحدث</option>
                                        <option value="">الاقدم</option>
                                    </select>
                                </div>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                             
                                @foreach ($offers as $offer)
                                  <div class="accordion-body">
                               
                                  {{-- <a href="projects/{{$offer->sal_project_id->id}}/{{$offer->id}}">  --}}
                                    <a href="projects/{{$offer->sal_project_id->id}}#offer{{$offer->id}}"> 
                                    <div class="personal_info_container myworks">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <div class="d-flex align-items-start">
                                                <div class="img_con">

                                                </div>
                                                 <div class="container_card">
                                                    <header class="">

                                                        <div>
                                                            <h3> {{$offer->sal_project_id->title}}</h3>
                                                            <span> {{ $offer->sal_project_id->sal_created_by->name}} </span>
                                                            السعر : <span> {{ $offer->price}} </span>$
                                                            المدة :  <span> {{ $offer->duration}} </span>أيام

                                                        </div>
                                                           {{--   <div>
                                                      <div class="evaluated">

                                                                <ion-icon name="star" class='gold'></ion-icon>
                                                                <ion-icon name="star" class='gold'></ion-icon>
                                                                <ion-icon name="star" class='gold'></ion-icon>
                                                                <ion-icon name="star" class='gold'></ion-icon>
                                                                <ion-icon name="star-half-outline"></ion-icon>
                                                            </div>
                                                            <span>منذ دقيقة</span>
                                                        </div>--}}

                                                    </header>




                                                </div> 
                                            </div>
                                            @if($offer->sal_project_id->status==1 && $offer->status==0)
                                             <a style="color:black" class="status">ملغي</a>
                                             @elseif($offer->sal_project_id->status==1 && $offer->status==1)
                                             <a style="color:black" class="status">معلق </a>
                                             <form action="{{route('cancelOffer')}}" method="post">
                                                @csrf
                                                <input style="display:none" type="text" name="offer_id" value='{{$offer->id}}'>
                                                <button  style="color:black ;border:none;background:transparent" type='submit '>   إلغاء العرض    </button>
                                            </form> 
                                            {{-- @elseif($offer->sal_project_id->status==1 && $offer->status==1) --}}
                                            @elseif($offer->sal_project_id->status==4 && $offer->status==1)

                                                <a style="color:black" class="status">   مقبول</a> 
                                                <form action="{{route('cancelOffer')}}" method="post">
                                                    @csrf
                                                    <input style="display:none" type="text" name="offer_id" value='{{$offer->id}}'>
                                                    <button  style="color:black ;border:none;background:transparent" type='submit '>   إلغاء العرض    </button>
                                                </form>
                                            
                                            @elseif($offer->sal_project_id->status==4 && $offer->status==2)
                                            <a style="color:black" class="status">تمت موافقتك </a> 
                                                <form action="{{route('confirmOffer')}}" method="post">
                                                    @csrf
                                                    <input style="display:none" type="text" name="project_id" value='{{$offer->sal_project_id->id}}'>
                                                    <input style="display:none" type="text" name="offer_id" value='{{$offer->id}}'>

                                                    <button  style="color:black ;border:none;background:transparent" type='submit '>   قبول المشروع  </button>
                                                </form>
                                                <form action="{{route('cancelOffer')}}" method="post">
                                                    @csrf
                                                    <input style="display:none" type="text" name="offer_id" value='{{$offer->id}}'>
                                                    <button  style="color:black ;border:none;background:transparent" type='submit '>    رفض المشروع    </button>
                                                </form>
                                                @elseif($offer->sal_project_id->status==2 && $offer->status==3)
                                                <a style="color:black" class="status">قيد التنفيذ </a> 
                                                
                                                 <form action="{{route('finishWork')}}" method="post"> 
                                                 
                                                     @csrf
                                                    <input style="display:none" type="text" name="project_id" value='{{$offer->sal_project_id->id}}'>
                                                    <input style="display:none" type="text" name="offer_id" value='{{$offer->id}}'>

                                                    <button  style="color:black ;border:none;background:transparent" type='submit '>   تسليم المشروع  </button>
                                                </form> 

                                                @elseif($offer->sal_project_id->status==3 && $offer->status==3)
                                          
                                                {{-- <a style="color:black" class="status">تم التسليم  </a>  --}}
                                                <a style="color:black" class="status"> قيد التسليم   </a>
                                                @elseif($offer->sal_project_id->status==5 && $offer->status==3)
                                                <a style="color:black" class="status"> تم  الاستلام   </a>
                                                @elseif($offer->sal_project_id->status==1 && $offer->status==4)
                                                <a style="color:black" class="status">مرفوض</a>
                                          @endif
                                        </div>
                                       <div class="desc"> {{$offer->description}}</div>
                                       {{--   @if(Auth::user()->id==$data['user_id'])
                                        السعر  <span class="desc"> {{$offer->price}}</span> 
                                        المدة <span class="desc"> {{$offer->duration}}</span>

                
                                        @endif --}}
                                    </div>
                                </div>
                            </a> 
                                @endforeach
                                   
                            
                                 
                                </div> 
                            
                                {{-- @else
                                   <div> لا توجد عروض</div>  --}}
                                @endif
                            
                               
                                

                           

                               
                          
                    </div>

                </div>








            </div>
            <!-- Side -->
     

        </div>


        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>