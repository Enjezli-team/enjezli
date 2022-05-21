@extends('website.layouts.master_dash')

@section('content')
    <div class=" container-fluid pb-5 mt-5">
        <div class="col-12 mb-4">
            <div class="card bg-transparent shadow-xl">
                <div class="overflow-hidden position-relative border-radius-xl"
                    style="background-image: url('../assets/img/curved-images/curved14.jpg');">
                    <span class="mask bg-gradient-dark"></span>
                    <div class="card-body position-relative z-index-1 ">
                        <h3 class="text-white mt-4 mb-1 pb-2 text-center">التقارير</h3>
                        <h5 class="text-white  text-center">

                        </h5>


                    </div>
                </div>
            </div>
        </div>
        @if (Auth::user()->hasRole(['provider']))
        <div  class="row m-auto mb-4">
            <div class="col-4 mb-4">
                <div class="card bg-transparent shadow-xl">
                    <div class="overflow-hidden position-relative border-radius-xl"
                        style="background-image: url('../assets/img/curved-images/curved14.jpg');">
                        <span class="mask bg-gradient-dark"></span><a href="{{ route('transactions') }}">
                        <div class="card-body position-relative z-index-1 ">
                            <h5 class="text-white mt-4 mb-1 pb-2 text-center">محفظتي</h5>
                            <h5 class="text-white  text-center">
    
                            </h5>
    
    
                        </div></a>
                    </div>
                </div>
            </div>
            <div class="col-4 mb-4">
                <div class="card bg-transparent shadow-xl">
                    <div class="overflow-hidden position-relative border-radius-xl"
                        style="background-image: url('../assets/img/curved-images/curved14.jpg');">
                        <span class="mask bg-gradient-dark"></span><a href="/reports">
                        <div class="card-body position-relative z-index-1 ">
                            <h5 class="text-white mt-4 mb-1 pb-2 text-center">مشاريعي</h5>
                            <h5 class="text-white  text-center">
    
                            </h5>
    
    
                        </div></a>
                    </div>
                </div>
            </div>
            <div class="col-4 mb-4">
                <div class="card bg-transparent shadow-xl">
                    <div class="overflow-hidden position-relative border-radius-xl"
                        style="background-image: url('../assets/img/curved-images/curved14.jpg');">
                        <span class="mask bg-gradient-dark"></span><a href="item_reports">
                        <div class="card-body position-relative z-index-1 ">
                            <h5 class="text-white mt-4 mb-1 pb-2 text-center">عروضي</h5>
                            <h5 class="text-white  text-center">
    
                            </h5>
    
    
                        </div></a>
                    </div>
                </div>
        </div>
        </div>
        @elseif(Auth::user()->hasRole(['seeker']))
        <div  class="row m-auto mb-4">
            <div class="col-6 mb-4">
                <div class="card bg-transparent shadow-xl">
                    <div class="overflow-hidden position-relative border-radius-xl"
                        style="background-image: url('../assets/img/curved-images/curved14.jpg');">
                        <span class="mask bg-gradient-dark"></span>
                        <a href="{{ route('transactions') }}">
                            <div class="card-body position-relative z-index-1 ">
                                <h5 class="text-white mt-4 mb-1 pb-2 text-center">محفظتي</h5>
                                <h5 class="text-white  text-center">
        
                                </h5>
        
        
                            </div></a>
                    </div>
                </div>
            </div>
            <div class="col-6 mb-4">
                <div class="card bg-transparent shadow-xl">
                    <div class="overflow-hidden position-relative border-radius-xl"
                        style="background-image: url('../assets/img/curved-images/curved14.jpg');">
                        <span class="mask bg-gradient-dark"></span>
                        <a href="/reports">
                            <div class="card-body position-relative z-index-1 ">
                                <h5 class="text-white mt-4 mb-1 pb-2 text-center">مشاريعي</h5>
                                <h5 class="text-white  text-center">
        
                                </h5>
        
        
                            </div></a>
                    </div>
                </div>
            </div>
           
        </div>
        @endif
        <div class="col-10 m-auto">
            <div class="card mb-4">
                <div class="card-header pb-0">
                  <h6 class="row w-100 col-12 ">عروضي</h6>
                </div>
                <div class="mb-3">
                    <form action="/offer_reports" method="POST">
                          @csrf
                    <select class="form-select form-select-lg  mb-3" name="offer_status">
                       
                     
                        <option value="0">معلق</option>
                        <option value="1">مفتوح </option>
                        <option value="2">قيد التنفيذ</option>
                        <option value="3">قيد التسليم</option>
                        <option value="4">لا يتلقى عروض</option>
                        <option value="5">منتهي</option>
                        <option value="6">مرفوض</option>
                        <option value="7">علية شكوى</option>
                        <option value="8">حل النزاع </option>
                        <option value="9">مغلق</option>
                       

                    </select>
                    <button type="submit" class="btn btn-outline-primary ">بحث</button>

                    </form>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                      
                     
                        <table class="table align-items-center justify-content-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">اسم المشروع                                    </th>
                                    
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                         الوصف</th>
                                         <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                             السعر</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            تاريخ التسليم</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">الحاله
                                    </th>
                                  
                                  


                                   
                                </tr>
                            </thead>
                          
                            <tbody>
                                @forelse ($offers as $item)
                                    {{-- @php
                                        $result = json_decode($item->meta, true);
                                        
                                    @endphp --}}
                                    <tr>
                                        <td>
                                            <div class="d-flex px-2">
                                                {{-- <div>
                                                    <img src="../assets/img/small-logos/logo-spotify.svg"
                                                        class="avatar avatar-sm rounded-circle me-2" alt="spotify">
                                                </div> --}}
                                                <div class="my-auto">

                                                    <h6 class="mb-0 text-sm">{{  $item->sal_project_id->title }}</span>
                                                    </td></h6>
                                                </div>
                                            </div>
                                        </td>
                                       
                                        <td class=" text-right">
                                            <p class="text-sm font-weight-bold mb-0">{{  $item->description }}</p>
                                        </td>
                                        <td class=" text-right">
                                            <p class="text-sm font-weight-bold mb-0">{{  $item->net_price }}</p>
                                        </td>
                                        <td class=" text-right">
                                            <p class="text-sm font-weight-bold mb-0">{{  $item->duration }}</p>
                                        </td>
                                      
                                        <td class=" text-right">
                                            @if ($item->sal_project_id->status == 1 && $item->status == 0)
                                            <a style="color:rgb(224, 41, 41)" class="text-sm font-weight-bold mb-0">ملغي</a>
                                        @elseif($item->sal_project_id->status == 1 && $item->status == 1)
                                            <a style="color:black" class="text-sm font-weight-bold mb-0">بانتظار الموافقة </a>
                                        @elseif($item->sal_project_id->status == 4 && $item->status == 1)
                                            <a style="color:rgb(16, 190, 40)" class="text-sm font-weight-bold mb-0"> مقبول</a>
                                        @elseif($item->sal_project_id->status == 4 && $item->status == 2)
                                            <a style="color:black" class="text-sm font-weight-bold mb-0">تمت موافقتك </a>
                                        @elseif($item->sal_project_id->status == 2 && $item->status == 3)
                                            <a style="color:black" class="text-sm font-weight-bold mb-0">قيد التنفيذ </a>
                                        @elseif($item->sal_project_id->status == 3 && $item->status == 3)
                                            {{-- <a style="color:black" class="text-sm font-weight-bold mb-0">تم التسليم  </a> --}}
                                            <a style="color:black" class="text-sm font-weight-bold mb-0"> قيد التسليم </a>
                                        @elseif($item->sal_project_id->status == 5 && $item->status == 3)
                                            <a style="color:black" class="text-sm font-weight-bold mb-0"> تم الاستلام </a>
                                        @elseif($item->sal_project_id->status == 1 && $item->status == 4)
                                            <a style="color:black" class="text-sm font-weight-bold mb-0">مرفوض</a>
                                        @endif
                                        </td>

                                        
                                      
                                    </tr>
                                    @empty
                                @endforelse
                               
                              
                            </tbody>
                        </table>
                       
                       
                     
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
