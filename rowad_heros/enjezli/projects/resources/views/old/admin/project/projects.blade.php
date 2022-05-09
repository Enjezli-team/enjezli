@extends('Admin.layout.side')
@section('side')




<!-- component -->
<div class="overflow-x-auto ">
    <div class=" container mx-auto px-6 py-8 justify-end min-w-screen min-h-screen bg-gray-100 flex items-start  bg-gray-100 font-sans overflow-hidden">
        <div class="w-full ">
            <div class="bg-white shadow-md rounded my-6 mt-6 ">
                <table class="min-w-max w-full table-auto ">
                    <thead>
                        <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                         
                           
                            <th class="py-3 px-6 text-center">العمليات </th>
                            <th class="py-3 px-6 text-center">الحالة </th>
                            <th class="py-3 px-6 text-center">مقدم الخدمة </th>
                            <th class="py-3 px-6 text-right">طالب الخدمة</th>
                            <th class="py-3 px-6 text-right">المشروع</th>
                            
                        </tr>
                    </thead>
                    <tbody class="text-gray-600 text-sm font-light">
                        <tr class="border-b border-gray-200 hover:bg-gray-100">
                            <td class="py-3 px-6 text-center">
                                <div class="flex item-center justify-center">
                                    <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                        </svg>
                                    </div>
                                 
                                </div>
                            </td>
                          
                         
                        
                            <td class="py-3 px-6 text-center">
                                <span class="bg-purple-200 text-purple-600 py-1 px-3 rounded-full text-xs">قيد العرض</span>
                            </td>
                            <td class="py-3 px-6 text-center">
                                <div class="flex items-center justify-center">
                                    
                                    <span class="font-medium">ساره الشميري</span>
                                    <img class="w-6 h-6 ml-2 rounded-full border-gray-200 border transform hover:scale-125"     src="https://images.unsplash.com/photo-1529626455594-4ff0802cfb7e?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=987&q=80"
                                    />
                                  </div>
                            </td>
                            <td class="py-3 px-6 text-right">
                                <div class="flex items-end justify-end">
                                   
                                    <span class="font-medium">سباء الشميري</span>
                                    <div class="ml-2">
                                        <img class="w-6 h-6 rounded-full"     src="https://images.unsplash.com/photo-1529626455594-4ff0802cfb7e?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=987&q=80"
                                        />
                                    </div>
                                </div>
                            </td>
                            <td class="py-3 px-6 text-left whitespace-nowrap">
                                <div class="flex items-center justify-end">
                                  <a href="{{route('project_report')}}">
                                    <span class="font-bold">اسم المشروع</span>
                                  </a>  
                                </div>
                            </td>
                           
                        </tr>

                        <tr class="border-b border-gray-200 hover:bg-gray-100">
                            <td class="py-3 px-6 text-center">
                                <div class="flex item-center justify-center">
                                    <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                        </svg>
                                    </div>
                                 
                                </div>
                            </td>
                          
                         
                        
                            <td class="py-3 px-6 text-center">
                                
                                <span class="bg-green-200 text-green-600 py-1 px-3 rounded-full text-xs">مكتمل</span>
                            </td>
                            <td class="py-3 px-6 text-center">
                                <div class="flex items-center justify-center">
                                    
                                    <span class="font-medium">ساره الشميري</span>
                                    <img class="w-6 h-6 ml-2 rounded-full border-gray-200 border transform hover:scale-125" src="https://randomuser.me/api/portraits/men/1.jpg"/>
                                  </div>
                            </td>
                            <td class="py-3 px-6 text-right">
                                <div class="flex items-end justify-end">
                                   
                                    <span class="font-medium">سباء الشميري</span>
                                    <div class="ml-2">
                                        <img class="w-6 h-6 rounded-full" src="https://randomuser.me/api/portraits/men/1.jpg"/>
                                    </div>
                                </div>
                            </td>
                            <td class="py-3 px-6 text-left whitespace-nowrap">
                                <div class="flex items-center justify-end">
                                    <a href="{{route('project_report')}}">
                                        <span class="font-bold">اسم المشروع</span>
                                      </a>  
                                </div>
                            </td>
                           
                        </tr>

                        <tr class="border-b border-gray-200 hover:bg-gray-100">
                            <td class="py-3 px-6 text-center">
                                <div class="flex item-center justify-center">
                                    <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                        </svg>
                                    </div>
                                 
                                </div>
                            </td>
                          
                         
                        
                            <td class="py-3 px-6 text-center">
                           
                                <span class="bg-yellow-200 text-yellow-600 py-1 px-3 rounded-full text-xs">قيد التنفيذ</span>  </td>
                            <td class="py-3 px-6 text-center">
                                <div class="flex items-center justify-center">
                                    
                                    <span class="font-medium">ساره الشميري</span>
                                    <img class="w-6 h-6 ml-2 rounded-full border-gray-200 border transform hover:scale-125"     src="https://images.unsplash.com/photo-1529626455594-4ff0802cfb7e?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=987&q=80"
                                    />
                                  </div>
                            </td>
                            <td class="py-3 px-6 text-right">
                                <div class="flex items-end justify-end">
                                   
                                    <span class="font-medium">سباء الشميري</span>
                                    <div class="ml-2">
                                        <img class="w-6 h-6 rounded-full"     src="https://images.unsplash.com/photo-1529626455594-4ff0802cfb7e?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=987&q=80"
                                        />
                                    </div>
                                </div>
                            </td>
                            <td class="py-3 px-6 text-left whitespace-nowrap">
                                <div class="flex items-center justify-end">
                                    <a href="{{route('project_report')}}">
                                        <span class="font-bold">اسم المشروع</span>
                                      </a>  
                                </div>
                            </td>
                           
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>



@endsection