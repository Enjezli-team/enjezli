@extends('website.layouts.master_dash')

@section('content')
    <div class=" container-fluid pb-5 mt-5">
        <div class="col-12 mb-4">
            <div class="card bg-transparent shadow-xl">
                <div class="overflow-hidden position-relative border-radius-xl"
                    style="background-image: url('../assets/img/curved-images/curved14.jpg');">
                    <span class="mask bg-gradient-dark"></span>
                    <div class="card-body position-relative z-index-1 ">
                        <h3 class="text-white mt-4 mb-1 pb-2 text-center">المجموع</h3>
                        <h5 class="text-white  text-center">

                            {{ $balance }} $
                        </h5>


                    </div>
                </div>
            </div>
        </div>

        <div class="col-10 m-auto">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    {{-- <h6>استلام</h6> --}}
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center justify-content-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">من
                                    </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        العملية</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">الى
                                    </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        المبلغ</th>
                                    <th
                                        class="text-uppercase text-secondary text-xxs font-weight-bolder text-center opacity-7 ps-2">
                                        مقابل</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        رقم المشروع</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        رقم الفاتورة</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        رقم الطلب</th>
                                    <th
                                        class="text-uppercase text-secondary text-xxs font-weight-bolder text-center opacity-7 ps-2">
                                        التاريخ </th>


                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $item)
                                    @php
                                        $result = json_decode($item->meta, true);
                                        
                                    @endphp
                                    <tr>
                                        <td>
                                            <div class="d-flex px-2">
                                                {{-- <div>
                                                    <img src="../assets/img/small-logos/logo-spotify.svg"
                                                        class="avatar avatar-sm rounded-circle me-2" alt="spotify">
                                                </div> --}}
                                                <div class="my-auto">
                                                    <h6 class="mb-0 text-sm">{{ $result['sender'] }}</h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <p class="text-sm font-weight-bold mb-0"> {{ $result['type'] }}</p>
                                        </td>
                                        <td>
                                            <span class="text-xs font-weight-bold"> {{ $result['receiver'] }}</span>
                                        </td>
                                        <td>
                                            <span class="text-xs font-weight-bold">
                                                @php$amount = $item->amount;
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                if ($item->amount < 0) {
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    $amount = $item->amount * -1;
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                }
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        @endphp ?> ?> ?> ?> ?> ?> ?> ?> ?>
                                                $ {{ $amount }}</span>
                                        </td>
                                        <td>
                                        <td class="align-middle text-center">
                                            <div class="d-flex align-items-center justify-content-center">
                                                <span class="text-xs font-weight-bold">
                                                    {{ $result['project_title'] }}</span>

                                            </div>
                                        </td>

                                        </td>
                                        <td>
                                            <span class="text-xs font-weight-bold"> {{ $result['project_id'] }}</span>
                                        </td>
                                        <td>
                                            <span class="text-xs font-weight-bold"> {{ $result['invoice_id'] }}</span>
                                        </td>
                                        <td>
                                            <span class="text-xs font-weight-bold"> {{ $result['order_id'] }}</span>
                                        </td>



                                        <td class="align-middle text-center">
                                            <div class="d-flex align-items-center justify-content-center">
                                                <span class="me-2 text-xs font-weight-bold">
                                                    {{ $item['created_at'] }}</span>

                                            </div>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
