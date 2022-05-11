@extends('Admin.layout.side')
@section('side')




<!-- component -->
<div class="overflow-x-auto ">
    <div class="min-w-screen h-screen  bg-gray-100 flex items-start justify-center bg-gray-100 font-sans overflow-y-scroll">
        <div class="w-full lg:w-5/6">
            <div class="bg-white shadow-md rounded my-6">
                <table class="min-w-max w-full table-fixed ">
                    <thead>
                        <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                         
                           
                            <th class="py-3 px-6 text-center">العمليات </th>
                            <th class="py-3 px-6 text-center"> تاريخ الانتهاء </th>
                            <th class="py-3 px-6 text-center"> تاريخ البدء </th>
                            <th class="py-3 px-6 text-center"> السعر </th>
                            <th class="py-3 px-6 text-right">وصف المشروع </th>
                            <th class="py-3 px-6 text-right">المشروع</th>
                            
                        </tr>
                    </thead>
                    <tbody class="text-gray-600 text-sm font-light">
                        <tr class="border-b border-gray-200 hover:bg-gray-100">
                            <td class="py-3 px-6 text-center">
                                <div class="flex item-center justify-center">
                                    <div class="w-4 mr-2 transform hover:text-yellow-500 hover:scale-110">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                        </svg>
                                    </div>
                                 
                                </div>
                            </td>
                          
                         
                        
                      
                            <td class="py-3 px-6 text-center">
                                <div class="flex items-center justify-center">
                                    
                                    <span class="font-medium"> 
                              12-12-2022
                                  </span>
                                  
                                  </div>
                            </td>
                            <td class="py-3 px-6 text-center">
                              <div class="flex items-center justify-center">
                                  
                                  <span class="font-medium"> 
                            12-12-2022
                                </span>
                                
                                </div>
                          </td>
                          <td class="py-3 px-6 text-center">
                            <div class="flex items-center justify-center">
                                
                                <span class="font-medium"> 
                          50$
                              </span>
                              
                              </div>
                        </td>
                            <td class="py-3 px-6 text-right">
                                <div class="flex items-end justify-end">
                                   
                                    <span class="font-medium">تعليق تعليق تعليق تعليق تعليق تعليق تعليق تعليق تعليق تعليق تعليق تعليق تعليق تعليق تعليق تعليق تعليق تعليق تعليق تعليق تعليق تعليق تعليق تعليق تعليق تعليق تعليق تعليق </span>
                                
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
                                    <div class="w-4 mr-2 transform hover:text-yellow-500 hover:scale-110">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                        </svg>
                                    </div>
                                 
                                </div>
                            </td>
                          
                         
                        
                         
                            <td class="py-3 px-6 text-center">
                              <div class="flex items-center justify-center">
                                  
                                  <span class="font-medium"> 
                            12-12-2022
                                </span>
                                
                                </div>
                          </td>
                          <td class="py-3 px-6 text-center">
                            <div class="flex items-center justify-center">
                                
                                <span class="font-medium"> 
                          12-12-2022
                              </span>
                              
                              </div>
                        </td>
                        <td class="py-3 px-6 text-center">
                          <div class="flex items-center justify-center">
                              
                              <span class="font-medium"> 
                       50$
                            </span>
                            
                            </div>
                      </td>

                            <td class="py-3 px-6 text-right">
                                <div class="flex items-end justify-end">
                                   
                                    <span class="font-medium">تعليق تعليق تعليق تعليق تعليق تعليق تعليق تعليق تعليق تعليق تعليق تعليق تعليق تعليق تعليق تعليق تعليق تعليق تعليق تعليق تعليق تعليق تعليق تعليق تعليق تعليق تعليق تعليق </span>
                                
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
                                    <div class="w-4 mr-2 transform hover:text-yellow-500 hover:scale-110">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                        </svg>
                                    </div>
                                 
                                </div>
                            </td>
                          
                         
                            <td class="py-3 px-6 text-center">
                              <div class="flex items-center justify-center">
                                  
                                  <span class="font-medium"> 
                            12-12-2022
                                </span>
                                
                                </div>
                          </td>
                          <td class="py-3 px-6 text-center">
                            <div class="flex items-center justify-center">
                                
                                <span class="font-medium"> 
                          12-12-2022
                              </span>
                              
                              </div>
                        </td>
                        <td class="py-3 px-6 text-center">
                          <div class="flex items-center justify-center">
                              
                              <span class="font-medium"> 
                        50$
                            </span>
                            
                            </div>
                      </td>
                            <td class="py-3 px-6 text-right">
                                <div class="flex items-end justify-end">
                                   
                                    <span class="font-medium">تعليق تعليق تعليق تعليق تعليق تعليق تعليق تعليق تعليق تعليق تعليق تعليق تعليق تعليق تعليق تعليق تعليق تعليق تعليق تعليق تعليق تعليق تعليق تعليق تعليق تعليق تعليق تعليق </span>
                                 
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