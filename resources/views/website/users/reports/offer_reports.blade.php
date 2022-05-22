@extends('website.layouts.master_dash')

@section('content')
<div class=" container-fluid pb-5 mt-5">
  <div class="col-12 mb-4">
    <div class="card bg-transparent shadow-xl">
      <div class="overflow-hidden position-relative border-radius-xl" style="background-image: url('../assets/img/curved-images/curved14.jpg');">
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
  <div class="row container m-auto mb-4">
    <div class="col-4 mb-4">
      <div class="card bg-transparent shadow-xl">
        <div class="overflow-hidden position-relative border-radius-xl" style="background-image: url('../assets/img/curved-images/curved14.jpg');">
          <span class="mask bg-gradient-dark"></span><a href="{{ route('transactions') }}">
            <div class="card-body position-relative z-index-1 ">
              <h5 class="text-white mt-4 mb-1 pb-2 text-center">محفظتي</h5>
              <h5 class="text-white  text-center">

              </h5>


            </div>
          </a>
        </div>
      </div>
    </div>
    <div class="col-4 mb-4">
      <div class="card bg-transparent shadow-xl">
        <div class="overflow-hidden position-relative border-radius-xl" style="background-image: url('../assets/img/curved-images/curved14.jpg');">
          <span class="mask bg-gradient-dark"></span><a href="/reports">
            <div class="card-body position-relative z-index-1 ">
              <h5 class="text-white mt-4 mb-1 pb-2 text-center">مشاريعي</h5>
              <h5 class="text-white  text-center">

              </h5>


            </div>
          </a>
        </div>
      </div>
    </div>
    <div class="col-4 mb-4">
      <div class="card bg-transparent shadow-xl">
        <div class="overflow-hidden position-relative border-radius-xl" style="background-image: url('../assets/img/curved-images/curved14.jpg');">
          <span class="mask bg-gradient-dark"></span><a href="/offer_reports">
            <div class="card-body position-relative z-index-1 ">
              <h5 class="text-white mt-4 mb-1 pb-2 text-center">عروضي</h5>
              <h5 class="text-white  text-center">

              </h5>


            </div>
          </a>
        </div>
      </div>
    </div>
  </div>
  @elseif(Auth::user()->hasRole(['seeker']))
  <div class="row container m-auto mb-4">
    <div class="col-6 mb-4">
      <div class="card bg-transparent shadow-xl">
        <div class="overflow-hidden position-relative border-radius-xl" style="background-image: url('../assets/img/curved-images/curved14.jpg');">
          <span class="mask bg-gradient-dark"></span>
          <a href="{{ route('transactions') }}">
            <div class="card-body position-relative z-index-1 ">
              <h5 class="text-white mt-4 mb-1 pb-2 text-center">محفظتي</h5>
              <h5 class="text-white  text-center">

              </h5>


            </div>
          </a>
        </div>
      </div>
    </div>
    <div class="col-6 mb-4">
      <div class="card bg-transparent shadow-xl">
        <div class="overflow-hidden position-relative border-radius-xl" style="background-image: url('../assets/img/curved-images/curved14.jpg');">
          <span class="mask bg-gradient-dark"></span>
          <a href="/reports">
            <div class="card-body position-relative z-index-1 ">
              <h5 class="text-white mt-4 mb-1 pb-2 text-center">مشاريعي</h5>
              <h5 class="text-white  text-center">

              </h5>


            </div>
          </a>
        </div>
      </div>
    </div>

  </div>
  @endif
  <div class="col-10 m-auto">
    <div class="card mb-4">
      <div class="card-header pb-0">
        <h3 class="row w-100 col-12 ">عروضي</h3>
      </div>
      <div class="mb-3 row">
        <form action="/offer_reports" method="POST">
          @csrf
          <div class="container row">
            <div class="col-xl-4 col-lg-4  col-md-6 col-sm-3">
                              <select class="form-select form-select-lg  mb-3" id="sl" name="offer_status">

                                <option >عرض حسب...</option>

                <option value="1">مقبول </option>
                <option value="1">بانتظار الموافقه </option>
                <option value="2">قيد التسليم</option>
                <option value="3">تم الاستلام</option>
                <option value="4">مرفوض</option>
                <option value="0">ملغي</option>



              </select>
            </div>

            <div class="col-xl-4 col-lg-4  col-md-4 col-sm-3">
              <button type="submit" class="btn btn-outline-primary ">بحث</button>
            </div>
          </div>
        </form>
        <form action="/offer_reports" method="POST">
          @csrf
          <div class="container row">

            <div class="col-xl-4 col-lg-4  col-md-6 col-sm-3" style="    display: flex;
            flex-direction: row;
            align-items: center;
            flex-wrap: nowrap;
            justify-content: space-evenly;">
<div class="form-check">
 
    <input class="form-check-input" name="neer" type="checkbox" value="" id="defaultCheck1">
    <label class="form-check-label" for="defaultCheck1">
      الاحدث 
    </label>
  </div>
  <div class="form-check">
    <label class="form-check-label" for="defaultCheck1">
      الاقدم 
    </label>
    <input class="form-check-input" name="last" type="checkbox" value="" id="defaultCheck1">
   
  </div>
  




            </div>
            <div class="col-xl-4 col-lg-4  col-md-4 col-sm-3">
                <button type="submit" class="btn btn-outline-primary ">بحث</button>
            </div>
          </div>
        </form>

      </div>
      <div class="card-body px-0 pt-0 pb-2">
        <div class="table-responsive p-0">


          <table class="table align-items-center justify-content-center mb-0">
            <thead>
              <tr>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">اسم المشروع </th>

                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                  الوصف</th>
                <th style="padding: 7px;" class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                  السعر</th>
                <th style="padding: 7px;"  class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                  تاريخ التسليم</th>
                  <th style="padding: 7px;"  class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                    تاريخ التقديم</th>
                <th style="padding: 7px;"  class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">الحاله
                </th>





              </tr>
            </thead>

            <tbody>
              @forelse ($offers as $item)

              <tr>
                <td>
                  <div class="d-flex px-2">

                    <div class="my-auto">

                      <h6 class="mb-0 text-sm">
                        {{ $item->sal_project_id->title }}</span>
                
                </h6>
        </div>
      </div>
      </td>
      
      <td class=" text-right">
        <p class="text-sm font-weight-bold mb-0">
          {{ $item->description }}
        </p>
      </td>
      <td class=" text-right">
        <p class="text-sm font-weight-bold mb-0">
          {{ $item->net_price }}
        </p>
      </td>
      <td class=" text-right">
        <p class="text-sm font-weight-bold mb-0">
          {{ $item->duration }}
        </p>
      </td>
      <td class=" text-right">
        <p class="text-sm font-weight-bold mb-0">
          {{ $item->created_at }}
        </p>
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