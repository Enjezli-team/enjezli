@extends('admin.layouts.master')
@section('side')





<section class="text-gray-600 body-font">
  <div class="container px-5 py-24 mx-auto flex flex-col">
    <div class="">
     
      <div class="flex flex-col sm:flex-row ">
   
        <div class="sm:w-full sm:pl-8 sm:py-1 sm:border-l border-gray-200 sm:border-t-0 border-t mt-4 pt-4 sm:mt-0 text-center sm:text-left">
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
