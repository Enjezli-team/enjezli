@extends('website.layouts.master_dash')

@section('content')
    <div class=" container-fluid pb-5 mt-5">
        <div class="col-12 mb-4">
            <div class="card bg-transparent shadow-xl">
                <div class="overflow-hidden position-relative border-radius-xl"
                    style="background-image: url('../assets/img/curved-images/curved14.jpg');">
                    <span class="mask bg-gradient-dark"></span>
                    <div class="card-body position-relative z-index-1 ">
                        <h3 class="text-white mt-4 mb-1 pb-2 text-center">الرصيد</h3>
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
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">رقم
                                        المحفظة
                                    </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">المستخدم
                                    </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        الرصيد</th>
                                    <th
                                        class="text-uppercase text-secondary text-xxs font-weight-bolder text-center opacity-7 ps-2">
                                        تأريخ انشاء المحفظة </th>


                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $item)
                                    <tr>
                                        <td>
                                            <div class="d-flex px-2">
                                                <div class="my-auto">
                                                    <h6 class="mb-0 text-sm">{{ $item->id }}</h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td class=" text-center">
                                            <p class="text-sm font-weight-bold mb-0"> {{ $result['type'] }}</p>
                                        </td>
                                        <td class=" text-center">
                                            <span class="text-xs font-weight-bold "> {{ $item->balance }}</span>
                                        </td>

                                        <td class="align-middle text-center">

                                            <span class="me-2 text-xs font-weight-bold">
                                                {{ $item->created_at }}</span>


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
