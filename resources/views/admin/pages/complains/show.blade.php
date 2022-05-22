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
      <p class="mr-1">نظره حول الشكوى</p>
      <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 rotate-90 -ml-2"  viewBox="0 0 24 24" stroke="#219EBC">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4" />
        </svg>
    </header>

    
    @forelse($data as $item)

    <h2 class="font-bold text-3xl my-2 text-right">
      
      {{ $item->sal_offer->sal_project_id->title }}

    </h2>
    

   
  
    <p class="text-right"> 
      طالب الخدمة:
       <a href="#" class="text-[#219EBC]">
         
    {{ $item->sal_offer->sal_project_id->sal_created_by->name }}
        </a>
     </p>


    <p class="text-right"> 
     منجز الخدمة:
      <a href="#" class="text-[#219EBC]">  
      
        {{ $item->sal_offer->sal_provider_by->name }}

      </a>
    </p>


    


    <p class="text-right"> 
      مدة التسليم:
       <a href="#" class="text-[#219EBC]">  
         
        
        {{ $item->created_at->format('m/d/Y') }}

      </a>
     </p>
    <h3 class="font-bold text-xl text-right mt-8"> نص الشكوى   </h3>
    <p class="text-right"> 
      
      {{ $item->provider_complain }}
    </p>




        


       @empty
            <div class="">لا توجد بيانات
            </div>
         
@endforelse


  </div>

</div>
        </div>
      </div>
    </div>
  </div>
</section> 




@endsection
