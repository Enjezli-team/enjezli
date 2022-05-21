
@extends('admin.layouts.master')
@section('side')
<!-- Main content -->


<div class="flex flex-col mx-16  ">

    <!-- This is an example component -->
  <div class="mt-16  mb-8 flex flex-row  p-1 justify-between ">
 
   
 
      <div class="flex  flex-row-reverse mr-8 hidden md:flex">
        <div class="ml-1">
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
        </div>
      
      </div>

      <div class="ml-8 text-lg text-gray-700 hidden md:flex">
        <div class="text-2xl text-[#186D80]">
            المشاريع
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
                            الصوره</th>
                            <th
                                class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-right text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                الاسم</th>
                                <th
                                class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-right text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                صاحب المشروع</th>
                            <th
                                class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-right text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                الوصف</th>

                                <th
                                class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-right text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                مدة التنفيذ</th>
                           
    
                                <th
                                class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-right text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                السعر</th>   
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
           
            <div class="flex items-center">
                <div class="flex-shrink-0 h-10 w-10">


                    @if($item->image == NULL)
                  
                        <div class="h-10 w-10 rounded-full shadow flex items-center bg-[#8ECAE6] text-white  justify-center">
                           <p class="hidden">  {{mb_internal_encoding("UTF-8");}} </p>
                            <p>{{mb_substr($item->name, 0, 1)}}</p>
                        </div>
                        @else
                        
                    @foreach ($item->sal_project_attach as $s )
                    @if ($loop->first)
                        <img src="{{ $s->file_name }}" alt="" class="h-10 w-10 rounded-full shadow" >
                        @endif
                        
                    @endforeach
                    @endif
                </div>

                <div class="mr-4">
                    <div class="text-sm leading-5 font-medium text-gray-900">{{$item->name}}
                    </div>
                    <div class="text-sm leading-5 text-gray-500">{{$item->email}}</div>
                </div>
            </div>
        </td>
       
        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
            {{-- <div class="text-sm leading-5 text-gray-900">{{$item->sal_skills->title}}</div> --}}
            <div class="text-sm leading-5 text-gray-500">
                <span class="">{{$item->title}}</span>
              
            </div>
        </td>

        
        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
            {{-- <div class="text-sm leading-5 text-gray-900">{{$item->sal_skills->title}}</div> --}}
            <div class="text-sm leading-5 text-gray-500">
                <span class="">
                    {{$item->sal_created_by->name}}
                </span>
              
            </div>
        </td>

        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
            {{-- <div class="text-sm leading-5 text-gray-900">{{$item->sal_skills->title}}</div> --}}
            <div class="text-sm leading-5 text-gray-500">
                <span class="">
                    
        {{$item->description}}
                </span>
              
            </div>
        </td>

        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
            {{-- <div class="text-sm leading-5 text-gray-900">{{$item->sal_skills->title}}</div> --}}
            <div class="text-sm leading-5 text-gray-500">
                <span class="">
                    
        {{$item->duration}}
                </span>
              
            </div>
        </td>

        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
            {{-- <div class="text-sm leading-5 text-gray-900">{{$item->sal_skills->title}}</div> --}}
            <div class="text-sm leading-5 text-gray-500">
                <span class="">
                    
        {{$item->price}}
                </span>
              
            </div>
        </td>


    

         
             

                <td class="py-3 px-6 text-center border-b border-gray-200">


                  
                                    

                    
                    <form method="POST" action="/admin/projects/{{$item->id}}">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                    <div class="flex item-center justify-center">
                        <div class="w-4 mr-2 transform hover:text-teal-500 hover:bg-teal-50 hover:scale-110">
                       

                            <?php if($item->status==0){ ?> 

                                <a href="/admin/project_activate/{{$item->id}}/{{($item->status==0) ? 1:0}}" class="btn btn-sm btn-info"> 
                                              
                                
                                      <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21"></path></svg>   </a>
                              
                              
                              <?php }else{ ?> 
                                <a href="/admin/project_activate/{{$item->id}}/{{($item->status==1) ? 0 :1}}" class="mx-2">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                                  
                                      
                                </a>
                              <?php } ?>
                   
                        </div>

                        <div class="w-4 mr-2 transform hover:text-red-500 hover:bg-red-50 hover:scale-110">
                       

                            <?php if($item->status==0){ ?> 

                                <a href="/admin/project_activate/{{$item->id}}/{{($item->blockByAdmin==0) ? 1:0}}" class="btn btn-sm btn-info"> 
                                              
                                
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                  </a>
                              
                              
                              <?php }else{ ?> 
                                <a href="/admin/project_activate/{{$item->id}}/{{($item->blockByAdmin==1) ? 0 :1}}" class="mx-2">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636"></path></svg>
                                      
                                </a>
                              <?php } ?>
                   
                        </div>

                        <div class="w-4 mr-2 transform hover:text-[#8ECAE6] hover:scale-110">
                            <a href="/admin/project_details/{{$item->id}}" class="btn btn-sm btn-info"> 
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            </a>
                        
                        </div>
                     
                    </div>
                 </form>




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



















@extends('admin.layouts.master')
@section('side')
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-3">
                                <h4 class="  ">العروض</h4>
                            </div>
                            <div class="col-md-7">
                            <form method="POST" action="/admin/offerSearch">
                        @csrf
                                <div class="form-inline ">
                                    <div class="input-group w-100">
                                        <input class="form-control " name="value" >

                                        <div class="input-group-append">
                                            <button class="btn btn-info" type="submit">
                                                <i class="fas fa-search fa-fw text-light"></i>
                                            </button>
                                        </div>
                                    </div>

                                </div>
                                @if ($errors->has('value'))
                                    <small class="text-danger">{{ $errors->first('value') }}</small>
                                    @endif
                            </form>
                            </div>
                         
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4">
                            <div class="row">
                                <div class="col-sm-12 col-md-6"></div>
                                <div class="col-sm-12 col-md-6"></div>
                            </div>
                            @include('admin.layouts.flash_msg')

                            <div class="row">

                                <div class="col-sm-12">
                                    <table id="example2" class="table table-bordered table-hover dataTable dtr-inline" role="grid" aria-describedby="example2_info">
                                        <thead>
                                            <tr role="row">
                                                <th>#</th>
                                                <th> السعر</th>
                                                <th> اقل سعر </th>
                                                <th> مدة التنفيذ</th>
                                                
                                                <th> الوصف</th>
                                                <th>  منجز المشروع</th>
                                                <th>  اسم المشروع</th>
                                                <th> action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse($data as $item)
                                            <tr class="odd">
                                            <td>{{$item->id}}</td>
                                            <td>{{$item->price}}</td>
                                            <td>{{$item->net_price}}</td>
                                            <td>{{$item->duration}}</td>
                                            <td>{{$item->description}}</td>
                                            <td>{{$item->sal_provider_by->name}}</td>
                                            <td>{{$item->sal_project_id->title}}</td>
                                           
                                            {{-- <td>

                                                @forelse($item->user_roles_user as $role)
                                                <span class="float-right badge bg-danger">{{$role->role->name}}</span>
                                                @empty
                                                not found
                                                @endforelse

                                            </td> --}}
                                                <td>
                                                <form method="POST" action="/admin/offers/{{$item->id}}">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                                    <div class="btn-group ">
                                                        <a href="/admin/offer_block/{{$item->id}}/{{($item->status==1) ? 0 :1}}" class="btn btn-sm btn-info"> {{($item->status==0) ? 'ازاله الحظر' :'حظر'}} </a>
                                                    
                                                    </div>
                                                </form>
                                                </td>
                                            </tr>
                                            @empty
                                            <tr class="odd">
                                                <td>لا توجد بيانات
                                                </td>
                                            </tr>
@endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->

            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
</section>
<!-- /.content -->
@endsection
