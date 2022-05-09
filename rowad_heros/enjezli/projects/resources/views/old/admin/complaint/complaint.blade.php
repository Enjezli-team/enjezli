@extends('Admin.layout.side')
@section('side')




<!-- component -->
<div class="overflow-x-auto">
    <div class="container mx-auto px-6 py-8 justify-end min-w-screen min-h-screen bg-gray-100 flex items-start  bg-gray-100 font-sans overflow-hidden">
        <div class="w-full">
            <div class="bg-white shadow-md rounded my-6">
                <table class="min-w-max w-full table-auto">
                    <thead>
                        <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                         
                           
                            <th class="py-3 px-6 text-center">الرسائل </th>
                            <th class="py-3 px-6 text-center">الحالة </th>
                            <th class="py-3 px-6 text-center">مقدم الخدمة </th>
                            <th class="py-3 px-6 text-right">طالب الخدمة</th>
                            <th class="py-3 px-6 text-right">الشكوى</th>
                            <th class="py-3 px-6 text-right">المشروع</th>
                            
                        </tr>
                    </thead>
                    <tbody class="text-gray-600 text-sm font-light">
                        <tr class="border-b border-gray-200 hover:bg-gray-100" >
                            <td class="py-3 px-6 text-center">
                                <div class="flex item-center justify-center">
                                    <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                        <a href="{{route('complaint_msg')}}">
                                            <?xml version="1.0" encoding="UTF-8"?>
                                            <svg xmlns="http://www.w3.org/2000/svg" id="Outline" viewBox="0 0 24 24" width="16" height="16"><path d="M20,0H4A4,4,0,0,0,0,4V16a4,4,0,0,0,4,4H6.9l4.451,3.763a1,1,0,0,0,1.292,0L17.1,20H20a4,4,0,0,0,4-4V4A4,4,0,0,0,20,0Zm2,16a2,2,0,0,1-2,2H17.1a2,2,0,0,0-1.291.473L12,21.69,8.193,18.473h0A2,2,0,0,0,6.9,18H4a2,2,0,0,1-2-2V4A2,2,0,0,1,4,2H20a2,2,0,0,1,2,2Z"/><path d="M7,7h5a1,1,0,0,0,0-2H7A1,1,0,0,0,7,7Z"/><path d="M17,9H7a1,1,0,0,0,0,2H17a1,1,0,0,0,0-2Z"/><path d="M17,13H7a1,1,0,0,0,0,2H17a1,1,0,0,0,0-2Z"/></svg>
                                            
                                    </a>
                                    </div>
                                 
                                </div>
                            </td>
                          
                         
                        
                            <td class="py-3 px-6 text-center">
                                <div class="flex item-center justify-center">
                                    <div class="w-4 mr-2 transform hover:text-green-500 hover:scale-110">
                                        <?xml version="1.0" encoding="UTF-8"?>
                                        <svg xmlns="http://www.w3.org/2000/svg" id="Layer_1" data-name="Layer 1" viewBox="0 0 24 24" width="18" height="18"><path d="M12,24A12,12,0,1,1,24,12,12.013,12.013,0,0,1,12,24ZM12,2A10,10,0,1,0,22,12,10.011,10.011,0,0,0,12,2Zm5.666,13.746a1,1,0,0,0-1.33-1.494A7.508,7.508,0,0,1,12,16a7.509,7.509,0,0,1-4.334-1.746,1,1,0,0,0-1.332,1.492A9.454,9.454,0,0,0,12,18,9.454,9.454,0,0,0,17.666,15.746ZM6,10c0,1,.895,1,2,1s2,0,2-1a2,2,0,0,0-4,0Zm8,0c0,1,.895,1,2,1s2,0,2-1a2,2,0,0,0-4,0Z"/></svg>
                                        
                                    </div>
                                 
                                </div>
                            
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
                                  
                                    <span class="font-bold">لم يخبرني ماذا يريد بالتفصيل  </span>
                                </div>
                            </td>
                            <td class="py-3 px-6 text-left whitespace-nowrap">
                                <div class="flex items-center justify-end">
                                  
                                    <span class="font-bold">اسم المشروع</span>
                                </div>
                            </td>
                           
                        </tr>

                        <tr class="border-b border-gray-200 hover:bg-gray-100">
                            <td class="py-3 px-6 text-center">
                                <div class="flex item-center justify-center">
                                    <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                        <a href="{{route('complaint_msg')}}">
                                            <?xml version="1.0" encoding="UTF-8"?>
                                            <svg xmlns="http://www.w3.org/2000/svg" id="Outline" viewBox="0 0 24 24" width="16" height="16"><path d="M20,0H4A4,4,0,0,0,0,4V16a4,4,0,0,0,4,4H6.9l4.451,3.763a1,1,0,0,0,1.292,0L17.1,20H20a4,4,0,0,0,4-4V4A4,4,0,0,0,20,0Zm2,16a2,2,0,0,1-2,2H17.1a2,2,0,0,0-1.291.473L12,21.69,8.193,18.473h0A2,2,0,0,0,6.9,18H4a2,2,0,0,1-2-2V4A2,2,0,0,1,4,2H20a2,2,0,0,1,2,2Z"/><path d="M7,7h5a1,1,0,0,0,0-2H7A1,1,0,0,0,7,7Z"/><path d="M17,9H7a1,1,0,0,0,0,2H17a1,1,0,0,0,0-2Z"/><path d="M17,13H7a1,1,0,0,0,0,2H17a1,1,0,0,0,0-2Z"/></svg>
                                            
                                    </a>
                                    </div>
                                 
                                </div>
                            </td>
                          
                         
                        
                            <td class="py-3 px-6 text-center">
                                <div class="flex item-center justify-center">
                                    <div class="w-4 mr-2 transform hover:text-green-500 hover:scale-110">
                                        <?xml version="1.0" encoding="UTF-8"?>
                                        <svg xmlns="http://www.w3.org/2000/svg" id="Layer_1" data-name="Layer 1" viewBox="0 0 24 24" width="18" height="18"><path d="M12,24A12,12,0,1,1,24,12,12.013,12.013,0,0,1,12,24ZM12,2A10,10,0,1,0,22,12,10.011,10.011,0,0,0,12,2Zm5.746,15.667a1,1,0,0,0-.08-1.413A9.454,9.454,0,0,0,12,14a9.454,9.454,0,0,0-5.666,2.254,1,1,0,0,0,1.33,1.494A7.508,7.508,0,0,1,12,16a7.51,7.51,0,0,1,4.336,1.748,1,1,0,0,0,1.41-.081ZM6,10c0,1,.895,1,2,1s2,0,2-1a2,2,0,0,0-4,0Zm8,0c0,1,.895,1,2,1s2,0,2-1a2,2,0,0,0-4,0Z"/></svg>
                                        
                                    </div>
                                 
                                </div>
                            
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
                                  
                                    <span class="font-bold">لم يحاسبني </span>
                                </div>
                            </td>
                            <td class="py-3 px-6 text-left whitespace-nowrap">
                                <div class="flex items-center justify-end">
                                  
                                    <span class="font-bold">اسم المشروع</span>
                                </div>
                            </td>
                           
                        </tr>

                        <tr class="border-b border-gray-200 hover:bg-gray-100">
                            <td class="py-3 px-6 text-center">
                                <div class="flex item-center justify-center">
                                    <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                        <a href="{{route('complaint_msg')}}">
                                            <?xml version="1.0" encoding="UTF-8"?>
                                            <svg xmlns="http://www.w3.org/2000/svg" id="Outline" viewBox="0 0 24 24" width="16" height="16"><path d="M20,0H4A4,4,0,0,0,0,4V16a4,4,0,0,0,4,4H6.9l4.451,3.763a1,1,0,0,0,1.292,0L17.1,20H20a4,4,0,0,0,4-4V4A4,4,0,0,0,20,0Zm2,16a2,2,0,0,1-2,2H17.1a2,2,0,0,0-1.291.473L12,21.69,8.193,18.473h0A2,2,0,0,0,6.9,18H4a2,2,0,0,1-2-2V4A2,2,0,0,1,4,2H20a2,2,0,0,1,2,2Z"/><path d="M7,7h5a1,1,0,0,0,0-2H7A1,1,0,0,0,7,7Z"/><path d="M17,9H7a1,1,0,0,0,0,2H17a1,1,0,0,0,0-2Z"/><path d="M17,13H7a1,1,0,0,0,0,2H17a1,1,0,0,0,0-2Z"/></svg>
                                            
                                    </a>
                                    </div>
                                 
                                </div>
                            </td>
                          
                         
                        
                            <td class="py-3 px-6 text-center">
                                <div class="flex item-center justify-center">
                                    <div class="w-4 mr-2 transform hover:text-green-500 hover:scale-110">
                                        <?xml version="1.0" encoding="UTF-8"?>
                                        <svg xmlns="http://www.w3.org/2000/svg" id="Layer_1" data-name="Layer 1" viewBox="0 0 24 24" width="18" height="18"><path d="M12,24A12,12,0,1,1,24,12,12.013,12.013,0,0,1,12,24ZM12,2A10,10,0,1,0,22,12,10.011,10.011,0,0,0,12,2Zm5.746,15.667a1,1,0,0,0-.08-1.413A9.454,9.454,0,0,0,12,14a9.454,9.454,0,0,0-5.666,2.254,1,1,0,0,0,1.33,1.494A7.508,7.508,0,0,1,12,16a7.51,7.51,0,0,1,4.336,1.748,1,1,0,0,0,1.41-.081ZM6,10c0,1,.895,1,2,1s2,0,2-1a2,2,0,0,0-4,0Zm8,0c0,1,.895,1,2,1s2,0,2-1a2,2,0,0,0-4,0Z"/></svg>
                                        
                                    </div>
                                 
                                </div>
                            
                            </td>  <td class="py-3 px-6 text-center">
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
                                  
                                    <span class="font-bold">لم يتقن الرسبونسف </span>
                                </div>
                            </td>
                            <td class="py-3 px-6 text-left whitespace-nowrap">
                                <div class="flex items-center justify-end">
                                  
                                    <span class="font-bold">اسم المشروع</span>
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