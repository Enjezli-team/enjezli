@extends('Admin.layout.side')
@section('side')


@if ($message = Session::get('success'))
<div class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg dark:bg-green-200 dark:text-green-800" role="alert">
    <span class="font-medium">{{ $message }}</span>
  </div>
@endif


<main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-200">
    <div class="container mx-auto px-6 py-8">
    
        <div class="mt-4 ">
            <div class="flex flex-wrap justify-end -mx-6">
               

                <div class="w-full  mt-6 px-6 sm:w-1/2 xl:w-1/5 sm:mt-0">
                    <div class="flex justify-center py-1 shadow-sm rounded-md bg-[#219EBC]">
                      

                        <div class="mx-5 text-left">
                            <a class="text-white" href="{{ route('create_section') }}">اضافة قسم  </a>
                        </div>

                     

                    </div>
                </div>

           
            </div>
        </div>

        <div class="mt-8">

        </div>

        <div class="flex flex-col mt-8 items-end">
            <div class="-my-2 py-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8 lg:w-full md:w-full sm:w-full">
                <div
                    class="align-middle inline-block min-w-full shadow overflow-hidden sm:rounded-lg border-b border-gray-200">
                    <table class="min-w-full text-right" style="direction: rtl" >
                        <thead>
                            <tr>
                                <th
                                    class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-right text-base font-bold leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                    الاسم</th>

                                    <th
                                    class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-right text-base font-bold leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                    النوع</th>

                                    <th
                                    class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-right text-base font-bold leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                    عدد التفرعات</th>

                                      <th
                                    class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-right text-base font-bold leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                    العمليات   
                                </th>
                             
  
                                {{-- <th class="px-6 py-3 border-b border-gray-200 bg-gray-50"></th> --}}
                            </tr>
                        </thead>

                        <tbody class="bg-white">
                            @php
                            $i = 0;
                        @endphp
                        @foreach ($section as $section)
                            <tr>
                               

                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 ">
                                    <div class="text-base leading-5 text-gray-900">{{$section->title}}</div>
                                </td>

                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 ">
                                            @if($section->parent_id==0)
                                    <div class="text-base leading-5 text-gray-900">رئيسي</div>
                                    @else
                                    <div class="text-base leading-5 text-gray-900">فرعي</div>
                                    @endif
                                </td>

                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 ">
                              
                                    <div class="text-base leading-5 text-gray-900">{{$section->id}}</div>
                                 
                        </td>

                         

                                <td
                                    class="px-6 py-4 whitespace-no-wrap text-right border-b border-gray-200 text-sm leading-5 font-medium">
                                    <form action="{{ route('delete_section',$section->id) }}" method="POST">
                                      <div class="flex  ">
                                        <a class="mx-2" href="{{route('edit_section',$section->id)}}">
                                            <svg id="edit" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                                <path id="Path_73" data-name="Path 73" d="M18.656.93,6.464,13.122A4.966,4.966,0,0,0,5,16.657V18a1,1,0,0,0,1,1H7.343a4.966,4.966,0,0,0,3.535-1.464L23.07,5.344a3.125,3.125,0,0,0,0-4.414,3.194,3.194,0,0,0-4.414,0Zm3,3L9.464,16.122A3.02,3.02,0,0,1,7.343,17H7v-.343a3.02,3.02,0,0,1,.878-2.121L20.07,2.344a1.148,1.148,0,0,1,1.586,0,1.123,1.123,0,0,1,0,1.586Z" fill="#facc15"/>
                                                <path id="Path_74" data-name="Path 74" d="M23,8.979a1,1,0,0,0-1,1V15H18a3,3,0,0,0-3,3v4H5a3,3,0,0,1-3-3V5A3,3,0,0,1,5,2h9.042a1,1,0,1,0,0-2H5A5.006,5.006,0,0,0,0,5V19a5.006,5.006,0,0,0,5,5H16.343a4.968,4.968,0,0,0,3.536-1.464l2.656-2.658A4.968,4.968,0,0,0,24,16.343V9.979A1,1,0,0,0,23,8.979ZM18.465,21.122a2.975,2.975,0,0,1-1.465.8V18a1,1,0,0,1,1-1h3.925a3.016,3.016,0,0,1-.8,1.464Z" fill="#facc15"/>
                                              </svg>
                                              
                                        </a>
                                        @csrf
                                        {{-- <button type="submit" class="py-1 px-3  text-sm text-red-700 bg-red-100 rounded-full dark:bg-red-200 dark:text-red-800">حذف</button> --}}
                                        <?php if($section->status == '1'){ ?> 

                                            <a href="{{url('/admin/status-update_section',$section->id)}}" class="mx-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24.009" height="18.69" viewBox="0 0 24.009 18.69">
                                                    <g id="eye" transform="translate(0.004 -2.655)">
                                                      <path id="Path_75" data-name="Path 75" d="M23.271,9.419C21.72,6.893,18.192,2.655,12,2.655S2.28,6.893.729,9.419a4.908,4.908,0,0,0,0,5.162C2.28,17.107,5.808,21.345,12,21.345s9.72-4.238,11.271-6.764A4.908,4.908,0,0,0,23.271,9.419Zm-1.7,4.115C20.234,15.7,17.219,19.345,12,19.345S3.766,15.7,2.434,13.534a2.918,2.918,0,0,1,0-3.068C3.766,8.3,6.781,4.655,12,4.655s8.234,3.641,9.566,5.811A2.918,2.918,0,0,1,21.566,13.534Z" fill="#219ebc"/>
                                                      <path id="Path_76" data-name="Path 76" d="M12,7a5,5,0,1,0,5,5,5,5,0,0,0-5-5Zm0,8a3,3,0,1,1,3-3A3,3,0,0,1,12,15Z" fill="#219ebc"/>
                                                    </g>
                                                  </svg>
                                                  </a>
                                          
                                          <?php }else{ ?> 
                                            <a href="{{url('/admin/status-update_section',$section->id)}}" class="mx-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24.009" height="21.994" viewBox="0 0 24.009 21.994">
                                                    <path id="eye-crossed" d="M23.271,9.419A15.866,15.866,0,0,0,19.9,5.51l2.8-2.8A1,1,0,1,0,21.286,1.3L18.241,4.345A12.054,12.054,0,0,0,12,2.655C5.809,2.655,2.281,6.893.729,9.419a4.908,4.908,0,0,0,0,5.162A15.866,15.866,0,0,0,4.1,18.49l-2.8,2.8A1,1,0,1,0,2.714,22.7l3.052-3.052A12.054,12.054,0,0,0,12,21.345c6.191,0,9.719-4.238,11.271-6.764A4.908,4.908,0,0,0,23.271,9.419ZM2.433,13.534a2.918,2.918,0,0,1,0-3.068C3.767,8.3,6.782,4.655,12,4.655A10.1,10.1,0,0,1,16.766,5.82L14.753,7.833a4.992,4.992,0,0,0-6.92,6.92l-2.31,2.31a13.723,13.723,0,0,1-3.09-3.529ZM15,12a3,3,0,0,1-3,3,2.951,2.951,0,0,1-1.285-.3L14.7,10.715A2.951,2.951,0,0,1,15,12ZM9,12a3,3,0,0,1,3-3,2.951,2.951,0,0,1,1.285.3L9.3,13.285A2.951,2.951,0,0,1,9,12Zm12.567,1.534C20.233,15.7,17.218,19.345,12,19.345A10.1,10.1,0,0,1,7.234,18.18l2.013-2.013a4.992,4.992,0,0,0,6.92-6.92l2.31-2.31a13.723,13.723,0,0,1,3.09,3.529,2.918,2.918,0,0,1,0,3.068Z" transform="translate(0.004 -1.003)" fill="#219ebc"/>
                                                  </svg>
                                                  </a>
                                          
                                          <?php } ?>
                                          </div>
                                    </form>

                                 

                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>



@endsection