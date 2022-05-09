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
                   
                    @if($offer->sal_project_id->status==1 && $offer->status==0)
                  
                    @elseif($offer->sal_project_id->status==1 && $offer->status==1)
                  
                    <form action="{{route('cancelOffer')}}" method="post">
                       @csrf
                       <input style="display:none" type="text" name="offer_id" value='{{$offer->id}}'>
                       <button  style="color:black ;border:none;background:transparent" type='submit '>   إلغاء العرض    </button>
                   </form> 
                   {{-- @elseif($offer->sal_project_id->status==1 && $offer->status==1) --}}
                   @elseif($offer->sal_project_id->status==4 && $offer->status==1)

                      
                       <form action="{{route('cancelOffer')}}" method="post">
                           @csrf
                           <input style="display:none" type="text" name="offer_id" value='{{$offer->id}}'>
                           <button  style="color:black ;border:none;background:transparent" type='submit '>   إلغاء العرض    </button>
                       </form>
                   
                   @elseif($offer->sal_project_id->status==4 && $offer->status==2)
                 
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
                      
                        <form action="{{route('finishWork')}}" method="post"> 
                        
                            @csrf
                           <input style="display:none" type="text" name="project_id" value='{{$offer->sal_project_id->id}}'>
                           <input style="display:none" type="text" name="offer_id" value='{{$offer->id}}'>

                           <button  style="color:black ;border:none;background:transparent" type='submit '>   تسليم المشروع  </button>
                       </form> 

                      
                 @endif

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
                        {{ Str::substr($offer->description,0, 80)}}...  
                    </div>
                    <div class='details'>
                        <div>
                            السعر
                            <span>
                                {{ $offer->price}}
                            </span>
                            $

                        </div>
                        
                        <div>
                            الحالة
                            @if($offer->sal_project_id->status==1 && $offer->status==0)
                            <a style="color:black" class="status">ملغي</a>
                            @elseif($offer->sal_project_id->status==1 && $offer->status==1)
                            <a style="color:black" class="status">بانتظار الموافقة </a>
                           
                          
                           @elseif($offer->sal_project_id->status==4 && $offer->status==1)
        
                               <a style="color:black" class="status">   مقبول</a> 
                              
                           
                           @elseif($offer->sal_project_id->status==4 && $offer->status==2)
                           <a style="color:black" class="status">تمت موافقتك </a> 
                              
                               @elseif($offer->sal_project_id->status==2 && $offer->status==3)
                               <a style="color:black" class="status">قيد التنفيذ </a> 
                               
                                
                               @elseif($offer->sal_project_id->status==3 && $offer->status==3)
                         
                               {{-- <a style="color:black" class="status">تم التسليم  </a>  --}}
                               <a style="color:black" class="status"> قيد التسليم   </a>
                               @elseif($offer->sal_project_id->status==5 && $offer->status==3)
                               <a style="color:black" class="status"> تم  الاستلام   </a>
                               @elseif($offer->sal_project_id->status==1 && $offer->status==4)
                               <a style="color:black" class="status">مرفوض</a>
                         @endif
        


                        </div>
                        <div>
                            المدة
                            <span>
                                {{ $offer->duration}}
                            </span>
                            ايام
                        </div>

                    </div>

                </div>
            
            </div>

        </a>

        <div>

    @endforeach
    @endif

        </div>

    
    </section>
