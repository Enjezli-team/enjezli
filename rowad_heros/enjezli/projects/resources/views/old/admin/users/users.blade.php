@extends('Admin.layout.side')
@section('side')

<main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-200">
    <div class="container mx-auto px-6 py-8">
     
    

        <div class="my-2 flex sm:flex-row flex-col justify-end">
            <div class="flex flex-row mb-1 sm:mb-0">
                <div class="relative">
                    <div
                    class="pointer-events-none absolute inset-y-0 left-0 flex items-center px-2 text-gray-700">
                    {{-- <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                    </svg> --}}
                </div>
              

                <form action="">
                    <div class="relative w-32 border-none mx-2">
                       {{-- correct one --}}
                        {{-- <select 
                         name="selecting_role" class="px-4 py-3 w-full rounded-md bg-gray-50 border-transparent focus:border-gray-500 focus:bg-white focus:ring-0 text-sm">
                          
                          @foreach ($users as $selecting) 
                          <option class="pt-6" value={{$selecting->id}}>{{$selecting->role->name}}</option>
                      
                            @endforeach
                        </select> --}}
                     
                 
                </div>
                    {{-- <select
                    name="user"
                    class="appearance-none  rounded-l text-right text-sm border block appearance-none w-full bg-white border-gray-200 text-gray-700  py-2.5 px-4 pl-8 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                    
                    @foreach ($users as $select_users)
                        <option class="">{{$select_users->role->name}}</option>
                    
                          @endforeach
                   
                        </select>  --}}
                        
                </form>   
                  
                </div>
            </div>
            <div class="block relative ">

                <form action="">
                <button type="submit" value="search">
                    <div class="absolute flex items-center ml-2 h-10">
                        <svg class="w-4 h-4 fill-current text-primary-gray-dark" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <path d="M15.8898 15.0493L11.8588 11.0182C11.7869 10.9463 11.6932 10.9088 11.5932 10.9088H11.2713C12.3431 9.74952 12.9994 8.20272 12.9994 6.49968C12.9994 2.90923 10.0901 0 6.49968 0C2.90923 0 0 2.90923 0 6.49968C0 10.0901 2.90923 12.9994 6.49968 12.9994C8.20272 12.9994 9.74952 12.3431 10.9088 11.2744V11.5932C10.9088 11.6932 10.9495 11.7869 11.0182 11.8588L15.0493 15.8898C15.1961 16.0367 15.4336 16.0367 15.5805 15.8898L15.8898 15.5805C16.0367 15.4336 16.0367 15.1961 15.8898 15.0493ZM6.49968 11.9994C3.45921 11.9994 0.999951 9.54016 0.999951 6.49968C0.999951 3.45921 3.45921 0.999951 6.49968 0.999951C9.54016 0.999951 11.9994 3.45921 11.9994 6.49968C11.9994 9.54016 9.54016 11.9994 6.49968 11.9994Z"></path>
                        </svg>
                      </div>
                </button>
                <input placeholder="بحث"
                name="q"    class="px-4 text-right py-3 w-full rounded-md bg-gray-50 border-transparent focus:border-gray-500 focus:bg-white focus:ring-0 text-sm" />
                </form>
            </div>
        </div>


        <div class="flex flex-col mt-8">
            <div class="-my-2 py-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">
                <div
                    class="align-middle inline-block min-w-full shadow overflow-hidden sm:rounded-lg border-b border-gray-200">
                    <table class="min-w-full text-right" style="direction: rtl" >
                        <thead>
                            <tr>
                                <th
                                    class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-right text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                    الاسم</th>
                                <th
                                    class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-right text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                    الوظيفة</th>
                               
                                <th
                                    class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-right text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                    نوع المستخدم</th>

                                    <th
                                    class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-right text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                    الحالة</th>   
                                    <th
                                    class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-center text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                    العمليات</th>     
                                {{-- <th class="px-6 py-3 border-b border-gray-200 bg-gray-50"></th> --}}
                            </tr>
                        </thead>

                        <tbody class="bg-white">
                            @if(!empty($users) && $users->count())
                        @foreach ($users as $users)
                            <tr>
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0 h-10 w-10">
                                            @if(!empty($users->image))
                                            <img src="{{ asset('images/'.$users->image) }}" alt="" class="h-10 w-10 rounded-full shadow" >
                                            @else
                                            {{-- <img class="h-10 w-10 rounded-full shadow"
                                                src="https://images.unsplash.com/photo-1529626455594-4ff0802cfb7e?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=987&q=80"
                                                alt=""> --}}

                                                <div class="h-10 w-10 rounded-full shadow flex items-center bg-[#8ECAE6] text-white  justify-center">
                                                   <p class="hidden">  {{mb_internal_encoding("UTF-8");}} </p>
                                                    <p>{{mb_substr($users->name, 0, 1)}}</p>
                                                </div>
                                                @endif
                                        </div>

                                        <div class="mr-4">
                                            <div class="text-sm leading-5 font-medium text-gray-900">{{$users->name}}
                                            </div>
                                            <div class="text-sm leading-5 text-gray-500">{{$users->email}}</div>
                                        </div>
                                    </div>
                                </td>

                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                    {{-- <div class="text-sm leading-5 text-gray-900">{{$users->sal_skills->title}}</div> --}}
                                    <div class="text-sm leading-5 text-gray-500">Front End</div>
                                </td>

                              

                                {{-- <td
                                    class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 text-gray-500">
                                {{$users->role->name}}</td> --}}

                                 <td
                                class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 text-gray-500">
                                طالب خدمة</td>

                                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                        @if($users->status==1)
                                        <span
                                            class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">مفعل</span>
                                            @else
                                            
                                        <span
                                        class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">غير مفعل</span>
                                        @endif
                                    </td>

                                    <td class="py-3 px-6  border-b border-gray-200">
                                        <div class="flex item-center justify-center">
                                            <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                                </svg>
                                            </div>
                                         
                                        </div>
                                    </td>
                            </tr>
                        @endforeach 


                        @else
                 
                        <tr>
                                             
                        <td colspan="10">لايوجد مستخدمين </td>
                         
                                        </tr>

                         @endif               
                         
                        </tbody>
                    </table>

               

                
                </div>
            </div>
        </div>
    </div>
</main>



@endsection