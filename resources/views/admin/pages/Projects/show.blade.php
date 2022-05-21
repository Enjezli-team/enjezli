@extends('admin.layouts.master')
@section('side')





<section class="text-gray-600 body-font">
  <div class="container px-5 py-24 mx-auto flex flex-col">
    <div class="">
     
      <div class="flex flex-col sm:flex-row ">
        <div class="sm:w-1/3 text-center">
        

        
            <div class="m-2">
              <div class="component flex max-w-lg ">
                <div class="w-full rounded bg-white relative p-8">
                  <div class="flex justify-between">
                    <div class="flex">
                      <div class="text-yellow-400 flex items-center"><svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="currentColor" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24">
                        <path d="M12 2L15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2z"></path>
                      </svg><span class="text-xl font-bold ml-2">4.7</span></div>
                  </div>
                      <div class="ml-4">
                        <div class="font-bold">  {{$data->sal_handel_by->name}}</div>
                        <div class="mt-1 text-xs text-gray-500">  {{$data->sal_handel_by->email}}</div>
                      </div>
                      <div>
                        <img class="h-12 w-12 rounded-full bg-cover" src="images/{{$data->sal_handel_by->image}}" />
                         </div>
                    
                    </div>
                  
                  <div class="my-6 border-b"></div>
                  <div class="text-sm">  
                    @forelse($data->sal_offers as $s)
                    {{$s->description}}
                        @empty
                        <div class="flex_between">
                            <div>
                                <h6 class="project_name"> لا يوجد  وصف </h6>
                            </div>
                        </div>
                        @endforelse  
                  </div>

                        
                  @forelse($data->sal_offers as $s)
                  <div type="button" class="btn btn-default btn-sm"><i class="fas fa-clock"></i> (أيام)  {{$s->duration}}</div>
                      @empty
                      <div class="flex_between">
                          <div>
                              <h5 class="project_name"> لا يوجد  وقت </h5>
                          </div>
                      </div>
                      @endforelse

                      @forelse($data->sal_offers as $s)
                      <div type="button" class="btn btn-default btn-sm"><i class="fas fa-dollar-sign"></i> (دولار) {{$s->price}} </div>
                          @empty
                          <div class="flex_between">
                              <div>
                                  <h5 class="project_name"> لا يوجد  سعر </h5>
                              </div>
                          </div>
                          @endforelse

                </div>
              </div>
            </div>


        </div>
        <div class="sm:w-2/3 sm:pl-8 sm:py-1 sm:border-l border-gray-200 sm:border-t-0 border-t mt-4 pt-4 sm:mt-0 text-center sm:text-left">
         <div class=" flex items-start mt-1 justify-center bg-gray-200">

  <div class="bg-white w-full p-8 rounded"> 


      <div class="flex flex-col items-center">
               
        
       </div>
    <header class="flex  text-sm text-right justify-end mt-2">
      <p class="mr-1">نظره حول المشروع</p>
      <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 rotate-90 -ml-2"  viewBox="0 0 24 24" stroke="#219EBC">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4" />
        </svg>
    </header>

    <h2 class="font-bold text-3xl mt-2 text-right">
      {{$data->title}}
    </h2>
    

    <p class="mt-5 text-right"> 
    تاريخ الاصدار:
      <a href="#" class="text-[#219EBC]"> {{$data->created_at->format('m/d/Y')}}   </a>
    </p>

   
  
    <p class="text-right"> 
     منجز الخدمة:
      <a href="#" class="text-[#219EBC]">  
        {{$data->sal_created_by->name}} </a>
    </p>

    <p class="text-right"> 
      السعر:
       <a href="#" class="text-[#219EBC]">   {{$data->price}}
      </a>
     </p>
    <h3 class="font-bold text-xl text-right mt-8"> وصف المشروع </h3>
    <p class="text-right"> 
      {{$data->description}}
    </p>


        <h3 class="font-bold text-xl text-right mt-8"> المهارات المطلوبة  </h3>
        <p class="text-right"> 
                
            @forelse($data->sal_skills_by as $skill)
            
            <p class="text-right">{{$skill->sal_skill->title}}
            </p>
            @empty
            <div class="flex_between">
                <div>
                    <h5 class="project_name"> لا يوجد مهارات </h5>
                </div>
            </div>
            @endforelse
        
        </p>


          <p class="mt-5 text-right"> 
              مدة التسليم 
            <a href="#" class="text-[#219EBC]"> {{$data->duration}} (أيام) </a>
          </p>

          
          <p class="mt-5 text-right"> 
            عدد العروض :
          <a href="#" class="text-[#219EBC]"> 
            {{$data->sal_offers->count()}} </a>
        </p>


        <p class="text-right"> 
            تاريخ التسليم :
          <a href="#" class="text-[#219EBC]"> 17 / 5 / 2022  </a>
        </p>


        <div class="">
          @foreach ($data->sal_project_attach as $file )
            
            <img src="{{$file->file_name}} " />

          @endforeach
        </div>

   

  </div>

</div>
        </div>
      </div>
    </div>
  </div>
</section>





@endsection
