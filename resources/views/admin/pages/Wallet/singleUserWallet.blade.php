

@extends('admin.layouts.master')
@section('side')
<!-- Main content -->


<div class="flex flex-col mx-16  ">

    <!-- This is an example component -->
  <div class="mt-16  mb-8 flex flex-row  p-1 justify-between ">
 
   
 
      <div class="flex  flex-row-reverse hidden md:flex">
        {{-- <div class="ml-1">
            <form method="POST" action="/admin/projectSearch">   
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
        </div> --}}
      
      </div>

      <div class="text-lg bg-[#186D80] rounded w-full p-5 text-gray-700 justify-center hidden md:flex ">
     
        <div class="text-2xl text-white px-2">

            $   {{ $balance }}
        </div>

        <div class="text-2xl text-white">
            الرصيد
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
                            من</th>
                            <th
                                class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-right text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                العملية</th>
                                <th
                                class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-right text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                الى</th>
                            <th
                                class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-right text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                المبلغ</th>

                                <th
                                class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-right text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                مقابل</th>
                           
    
                                <th
                                class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-right text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                رقم المشروع</th>   
                                <th
                                class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-center text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                رقم الفاتورة</th>  
                              
                                <th
                                class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-center text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                رقم الطلب</th>  
                                <th
                                class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-center text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                 التاريخ</th>    
                                 

                            <th class="px-6 py-3 border-b border-gray-200 bg-gray-50"></th>
                        </tr>
                    </thead>
    </thead>
    <tbody class="bg-white " style="direction: rtl;">
        @foreach ($data as $item)
        @php
            $result = json_decode($item->meta, true);
            
        @endphp
        <tr class="odd">
       
        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
           
            <div class="flex items-center">
                <div class="flex-shrink-0 h-10 w-10">


                    {{ $result['sender'] }}
                </div>

            </div>
        </td>
       
        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
            {{-- <div class="text-sm leading-5 text-gray-900">{{$item->sal_skills->title}}</div> --}}
            <div class="text-sm leading-5 text-gray-500">
                <span class=""> {{ $result['type'] }}</span>
              
            </div>
        </td>

        
        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
            {{-- <div class="text-sm leading-5 text-gray-900">{{$item->sal_skills->title}}</div> --}}
            <div class="text-sm leading-5 text-gray-500">
                <span class="">
                    {{ $result['receiver'] }}
                </span>
              
            </div>
        </td>

        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
            {{-- <div class="text-sm leading-5 text-gray-900">{{$item->sal_skills->title}}</div> --}}
            <div class="text-sm leading-5 text-gray-500">
                <span class="">
                    @php
                    $amount = $result['amount'];
                    
                    if ($item->amount < 0) {
                        $amount = $result['amount'] * -1;
                    }
                @endphp
                <span class="text-xs font-weight-bold mb-0 ">
                    {{ $amount }}</span>
                </span>
              
            </div>
        </td>

        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
            {{-- <div class="text-sm leading-5 text-gray-900">{{$item->sal_skills->title}}</div> --}}
            <div class="text-sm leading-5 text-gray-500">
                <span class="">
                    {{ $result['project_title'] }}
                </span>
              
            </div>
        </td>

        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
            {{-- <div class="text-sm leading-5 text-gray-900">{{$item->sal_skills->title}}</div> --}}
            <div class="text-sm leading-5 text-gray-500">
                <span class="">
                    {{ $result['project_id'] }}
                </span>
              
            </div>
        </td>

        
        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
            {{-- <div class="text-sm leading-5 text-gray-900">{{$item->sal_skills->title}}</div> --}}
            <div class="text-sm leading-5 text-gray-500">
                <span class=""> {{ $result['invoice_id'] }}
                </span>
              
            </div>
        </td>


        
        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
            {{-- <div class="text-sm leading-5 text-gray-900">{{$item->sal_skills->title}}</div> --}}
            <div class="text-sm leading-5 text-gray-500">
                <span class=""> 

                    {{ $result['order_id'] }}

                </span>
              
            </div>
        </td>


        
        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
            {{-- <div class="text-sm leading-5 text-gray-900">{{$item->sal_skills->title}}</div> --}}
            <div class="text-sm leading-5 text-gray-500">
                <span class=""> 
                    {{ $item->created_at }}
                    
                </span>
              
            </div>
        </td>

    

    

         
             

                <td class="py-3 px-6 text-center border-b border-gray-200">


                  
                                    

                 


            </td>
        </tr>
        {{-- @empty
        <tr class="">
            <td class="">لا توجد بيانات
            </td>
        </tr> --}}
@endforeach
    </tbody>
</table>
        </div>
        </div>
    </div>



<!-- /.content -->
@endsection





















