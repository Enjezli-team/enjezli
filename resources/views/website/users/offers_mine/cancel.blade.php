@extends("website.users.user_dashboard.layout.master")
@section('content')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="{{ asset('css/user_dashboard.css') }}">

    <link rel="stylesheet" href="{{ asset('css/user_offer.css') }}">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>
                    <div class="card-body">
                        <div class="alert alert-error" role="alert">
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                تم الغاء عملية الدفع

                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
