<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.14.0-beta2/css/bootstrap-select.min.css" integrity="sha512-mR/b5Y7FRsKqrYZou7uysnOdCIJib/7r5QeJMFvLNHNhtye3xJp1TdJVPLtetkukFn227nKpXD9OjUc09lx97Q==" crossorigin="anonymous"
  referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
<link rel="stylesheet" href="{{ asset('auth_assets/project_assests/css/project_details.css ')}}">
<style>
    a{
      text-decoration: none;  
      color:black;
    }    
</style>
<div class="container mt-5">
        <div class="row">
            <div class="col-lg-8 ">
               

               
                <span><a href="{{route('projects.create')}}">اضافة مشروع</a></span>

                <div class="accordion mt-3 " id="accordionExample">
                    <div class="accordion-item">
                       
                        @if (!$data->isEmpty()) 
                                <h2 class="accordion-header d-flex justify-content-between align-items-center p-3 pt-1 pm-1" id="headingOne">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                المشاريع 
                            
                                </button>
                                <div class="select">
                                    <select id="standard-select">
                                        <option value="">الاحدث</option>
                                        <option value="">الاقدم</option>
                                    </select>
                                </div>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                             
                                @forelse ($data as $item)
                                  <div class="accordion-body">
                                    {{-- <a href="projects/{{$data->id}}/{{$offer->id}}"> <div class="personal_info_container myworks"> --}}
                               
                                  <a href="projects/{{$item->id}}"> <div class="personal_info_container myworks">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <div class="d-flex align-items-start">
                                                <div class="img_con">

                                                </div>
                                                 <div class="container_card">
                                                    <header class="">

                                                        <div>
                                                          
                                                            <h3> {{$item->title}}</h3>
                                                             العروض: <span> {{$item->sal_offers->count()}} </span>
                                                              <div class="desc"> {{$item->description}}</div>
                                                              {{-- <span>منذ دقيقة</span> --}}
                                                        </div>
                                                             حالة المشروع
                                                            @if ($item->status == 1)
                                                                <span>مفتوح</span>
                                                             @elseif($item->status == 0)
                                                            <span>: معلق </span>
                                                            @elseif($item->status == 2)
                                                            <span>قيد التنفيذ </span>
                                                            @elseif($item->status == 3)
                                                            <span>تم التسليم</span>
                                                            @elseif($item->status == 4)
                                                            <span>لا يتلقى عروض</span>
                                                            @elseif($item->status == 5)
                                                            <span>مغلق</span>
                                                            @endif
                                                            {{-- @if ($item->status == 0 && $item->sal_offers->count()==0) --}}
                                                            {{-- if the the project is un active or doesnot accept any offer --}}
                                                            @if ($item->status == 0|| $item->status == 1)

                                                            <span><a href="{{route('projects.edit',$item->id)}}">تعديل</a></span>
                                                                {{-- <form action=""method='post'>
                                                                    @csrf
                                                                    
                                                                    <input type="hidden" name='project_id'value="{{$item->id}}">
                                                                    <button style="color:black ;border:none" type='submit ' class="note"type='submitt'> تعديل </button>

                                                                </form> --}}
                                                            @endif
                                                           
                        

                                                    </header>




                                                </div> 
                                            </div>
                                    
                                        </div>
                                      
                                    </div>
                                </div></a> 
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