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
  <div class="row m-auto mb-4">
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
          <span class="mask bg-gradient-dark"></span><a href="offer_reports">
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
  <div class="row m-auto mb-4">
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
        <h6 class="row w-100 col-12 ">مشاريعي</h6>
      </div>
      <div class="mb-3">
        <form action="/reports" method="POST">
          @csrf
          <div class="container row">
            <div class="col-4">
              <select class="form-select form-select-lg  mb-3" name="project_status">
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
              <label for="sl" class="form-label">اختيار</label>
            </div>
            <div class="col-4">


              <input class="form-check-input" type="checkbox" id="check1" name="neer">
              <label class="form-check-label"> الاحدث</label>
              <input class="form-check-input" type="checkbox" id="check2" name="last">
              <label class="form-check-label"> الاقدم</label>



            </div>
            <div class="col-4">
              <button type="submit" class="btn btn-outline-primary ">بحث</button>
            </div>
          </div>
        </form>

      </div>


      <div class="card-body px-0 pt-0 pb-2">
        <div class="table-responsive p-0">
          @if (Auth::user()->hasRole(['seeker']))
          <table class="table align-items-center justify-content-center mb-0">





            <thead>
              <tr>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">اسم المشروع
                </th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">اسم المزود
                </th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                  تاريخ التسليم</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">الحاله
                </th>




                <th></th>
              </tr>
            </thead>

            <tbody>
              {{-- @php
                                        $result = json_decode($item->meta, true);
                                        
                                    @endphp --}}
              @forelse ($seeker_project_success as $item)
              <tr>
                <td>
                  <div class="d-flex px-2">
                    {{-- <div>
                                                    <img src="../assets/img/small-logos/logo-spotify.svg"
                                                        class="avatar avatar-sm rounded-circle me-2" alt="spotify">
                                                </div> --}}
                    <div class="my-auto">

                      <h6 class="mb-0 text-sm">
                        {{ $item->title }}</span>
                </td>
                </h6>
        </div>
      </div>
      </td>
      <td>

        <div class="d-flex px-2">
          {{-- <div>
                                                    <img src="../assets/img/small-logos/logo-spotify.svg"
                                                        class="avatar avatar-sm rounded-circle me-2" alt="spotify">
                                                </div> --}}

          <div class="my-auto">
            @if( $item->handled_by!=null)
            <h6 class="mb-0 text-sm">
              {{ $item->sal_handel_by->name}}
            </h6>
            @else
            <h6 class="mb-0 text-sm">
              لايوجد


            </h6>
            @endif
          </div>

        </div>

      </td>
      <td class=" text-right">
        <p class="text-sm font-weight-bold mb-0">
          {{ $item->delivery_date }}
        </p>
      </td>

      <td class=" text-right">
        @if($item->status==0 )
        <span class="text-xs font-weight-bold">
          معلق
        </span>
        @elseif($item->status==1 )
        <span class="text-xs font-weight-bold">
          مفتوح
        </span>
        @elseif($item->status==2 )
        <span class="text-xs font-weight-bold">
          قيد التنفيذ
        </span>
        @elseif($item->status==3 )
        <span class="text-xs font-weight-bold">
          قيد التسليم
        </span>
        @elseif($item->status==4 )
        <span class="text-xs font-weight-bold">
          لا يتلقى عروض
        </span>
        @elseif($item->status==5 )
        <span class="text-xs font-weight-bold">
          منتهى
        </span>
        @elseif($item->status==6 )
        <span class="text-xs font-weight-bold">
          مرفوض
        </span>
        @elseif($item->status==7 )
        <span class="text-xs font-weight-bold">
          علية شكوى
        </span>
        @elseif($item->status==8 )
        <span class="text-xs font-weight-bold">
          حل النزاع
        </span>
        @elseif($item->status==9 )
        <span class="text-xs font-weight-bold">
          مغلق
        </span>
        @endif
      </td>

      </td>

      </tr>

      @empty
      @endforelse

      </tbody>


      </table>





      @elseif (Auth::user()->hasRole(['provider']))
      <table class="table align-items-center justify-content-center mb-0">
        <thead>
          <tr>
            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">اسم المشروع
            </th>

            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
              تاريخ التسليم</th>
            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">الحاله
            </th>




            <th></th>
          </tr>
        </thead>

        <tbody>
          {{-- @php
                                        $result = json_decode($item->meta, true);
                                        
                                    @endphp --}}
          @forelse ($provider_project_success as $item)
          <tr>
            <td>
              <div class="d-flex px-2">
                {{-- <div>
                                                    <img src="../assets/img/small-logos/logo-spotify.svg"
                                                        class="avatar avatar-sm rounded-circle me-2" alt="spotify">
                                                </div> --}}
                <div class="my-auto">

                  <h6 class="mb-0 text-sm">
                    {{ $item->title }}</span>
            </td>
            </h6>
    </div>
  </div>
  </td>

  <td class=" text-right">
    <p class="text-sm font-weight-bold mb-0">
      {{ $item->delivery_date }}
    </p>
  </td>

  <td class=" text-right">
    @if($item->status==0 )
    <span class="text-xs font-weight-bold">
      معلق
    </span>
    @elseif($item->status==1 )
    <span class="text-xs font-weight-bold">
      مفتوح
    </span>
    @elseif($item->status==2 )
    <span class="text-xs font-weight-bold">
      قيد التنفيذ
    </span>
    @elseif($item->status==3 )
    <span class="text-xs font-weight-bold">
      قيد التسليم
    </span>
    @elseif($item->status==4 )
    <span class="text-xs font-weight-bold">
      لا يتلقى عروض
    </span>
    @elseif($item->status==5 )
    <span class="text-xs font-weight-bold">
      منتهى
    </span>
    @elseif($item->status==6 )
    <span class="text-xs font-weight-bold">
      مرفوض
    </span>
    @elseif($item->status==7 )
    <span class="text-xs font-weight-bold">
      علية شكوى
    </span>
    @elseif($item->status==8 )
    <span class="text-xs font-weight-bold">
      حل النزاع
    </span>
    @elseif($item->status==9 )
    <span class="text-xs font-weight-bold">
      مغلق
    </span>
    @endif
  </td>



  </tr>
  @empty
  @endforelse


  </tbody>
  </table>

  @endif




</div>
</div>
</div>
</div>

</div>
@endsection