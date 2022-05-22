




@extends('admin.layouts.master')
@section('side')
<!-- Main content -->


<div class="flex flex-col mx-16  ">

    <!-- This is an example component -->
  <div class="mt-16  mb-8 flex flex-row  p-1 justify-between ">
 
   
 
      <div class="flex  flex-row-reverse mr-8 hidden md:flex">
        <div class="ml-1">
            <form method="POST" action="/admin/unsolveSearch">   
                @csrf
                <div class="relative text-gray-600">
                    <input type="search" name="value" placeholder="بحث" class="bg-white text-right w-full h-10 px-5 pl-10 rounded-md text-sm focus:outline-none">
                    <button type="submit" class="absolute left-0 top-0 mt-3 ml-4">
                      <svg class="h-4 w-4 fill-current" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 56.966 56.966" style="enable-background:new 0 0 56.966 56.966;" xml:space="preserve" width="512px" height="512px">
                        <path d="M55.146,51.887L41.588,37.786c3.486-4.144,5.396-9.358,5.396-14.786c0-12.682-10.318-23-23-23s-23,10.318-23,23  s10.318,23,23,23c4.761,0,9.298-1.436,13.177-4.162l13.661,14.208c0.571,0.593,1.339,0.92,2.162,0.92  c0.779,0,1.518-0.297,2.079-0.837C56.255,54.982,56.293,53.08,55.146,51.887z M23.984,6c9.374,0,17,7.626,17,17s-7.626,17-17,17  s-17-7.626-17-17S14.61,6,23.984,6z"/>
                      </svg>
                    </button>
                  </div>
            </form>
        </div>
      
      </div>

      <div class="ml-8 text-lg text-gray-700 hidden md:flex">
        <div class="text-2xl text-[#186D80]">
            الشكوى
        </div>
    </div>

  </div>

  
  

    <div class="-my-2 py-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">
        <div
            class="mostly-customized-scrollbar overflow-y-auto h-[67vh] align-middle inline-block min-w-full  overflow-hidden sm:rounded-lg border-b border-gray-200">
            <table class="min-w-full text-right" style="direction: rtl;" >
                  
             

                    <thead>
                        <tr>
                            <th
                            class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-right text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                            المشروع</th>
                            <th
                                class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-right text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                طالب الخدمة</th>
                                <th
                                class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-right text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                مقدم الخدمة </th>
                            <th
                                class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-right text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                نص الشكوى </th>

                             
                           
    
                                <th
                                class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-right text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                التاريخ</th>   
                                <th
                                class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-center text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                العمليات</th>     
                            {{-- <th class="px-6 py-3 border-b border-gray-200 bg-gray-50"></th> --}}
                        </tr>
                    </thead>
    </thead>
    <tbody class="bg-white " style="direction: rtl;">
        @forelse($data as $item)
        <tr class="odd">
       
       
       
        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
            <div class="text-sm leading-5 text-gray-500">
                <span class="">
                    {{ $item->sal_offer->sal_project_id->title }}
                </span>
              
            </div>
        </td>

             
       
        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
            <div class="text-sm leading-5 text-gray-500">
                <span class="">
                    {{ $item->sal_offer->sal_project_id->sal_created_by->name }}
                </span>
              
            </div>
        </td>

        
        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
            <div class="text-sm leading-5 text-gray-500">
                <span class="">
                    {{ $item->sal_offer->sal_provider_by->name }}
                </span>
              
            </div>
        </td>

        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
            <div class="text-sm leading-5 text-gray-500">
                <span class="">
                    {{ $item->provider_complain }}
                </span>
              
            </div>
        </td>

      

        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
            
            <div class="text-sm leading-5 text-gray-500">
                <span class="">
                    {{ $item->created_at }}
                </span>
              
            </div>
        </td>


    

         
             

                <td class="py-3 px-6 text-center border-b border-gray-200">


                 

            
                                    

                    <div class="flex item-center justify-center">

                     
                        <div class="w-4 mr-2 transform hover:text-[#8ECAE6] hover:bg-sky-50 hover:scale-110">
                       

                            <a href="{{ route('chats_problem', $item->sal_offer->sal_project_id->id) }}" class="btn btn-sm btn-info"> 
                                              
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"></path></svg>
                           
                            </a>
                        </div>   


                    <div class="w-4 mr-2 transform hover:text-[#8ECAE6] hover:bg-sky-50 hover:scale-110">
                       

                    <a href="{{ route('loadsolutionForm', $item->id) }}" class="btn btn-sm btn-info"> 
                                      
                  <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 10h4.764a2 2 0 011.789 2.894l-3.5 7A2 2 0 0115.263 21h-4.017c-.163 0-.326-.02-.485-.06L7 20m7-10V5a2 2 0 00-2-2h-.095c-.5 0-.905.405-.905.905 0 .714-.211 1.412-.608 2.006L7 11v9m7-10h-2M7 20H5a2 2 0 01-2-2v-6a2 2 0 012-2h2.5"></path></svg>
                    </a>
                </div>

                        <div class="w-4 mr-2 transform hover:text-teal-600 hover:bg-teal-50 hover:scale-110">
                       


                                <a href="/projects/{{ $item->sal_offer->sal_project_id->id }}#offer{{ $item->offer_id }}" class="btn btn-sm btn-info"> 
                                              
                                
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg> 
                                 </a>
                              
                              
                           
                   
                        </div>

                        <div class="w-4 mr-2 transform hover:text-teal-500 hover:bg-teal-50 hover:scale-110">
                       


                            <a href="/admin/complain_details/{{ $item->id}}" class="btn btn-sm btn-info"> 
                                          
                            
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg> 
                              </a>
                          
                          
                       
               
                        </div>

                      
                     
                    </div>




            </td>
        </tr>
        @empty
        <tr class="">
            <td class="">لا توجد بيانات
            </td>
        </tr>
@endforelse
    </tbody>
</table>
        </div>
        </div>
    </div>



<!-- /.content -->
@endsection




