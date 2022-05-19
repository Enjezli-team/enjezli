<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
<link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.14.0-beta2/css/bootstrap-select.min.css"
    integrity="sha512-mR/b5Y7FRsKqrYZou7uysnOdCIJib/7r5QeJMFvLNHNhtye3xJp1TdJVPLtetkukFn227nKpXD9OjUc09lx97Q=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
<link rel="stylesheet" href="{{ asset('auth_assets/offer_assests/css/style.css ') }}">
@extends('website.layouts.master')

@section('content')
    <div class="loginContainer_2 sign-up-container up">

        <div class="container overflow-hidden  mt-5 form_con">
            <div class="row">
                <div class="col">
                    <div class="mx-auto p-3">
                        <div class="">
                            <div class="">
                                <div class="p-3  shadow-lg rounded-3">
                                    <h2 class="text-center">حل النزاع
                                    </h2>
                                    <div class="logo-container">

                                    </div>

                                    <form method="POST" action="{{ route('solveConflict') }}"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="user-box mt-2 d-grid gap-3">
                                            <input type="text" style='display:none' name='conflict_id'
                                                value="{{ $conflict_id }}">
                                            <label> الخصم مقابل المشروع </label>
                                            <input id="face" name="percentage" type="text" class="form-control" min='0'
                                                max='100'>
                                            @error('percentage')
                                                <small class="text-danger">{{ $message }}*</small>
                                            @enderror
                                            <label> توصيف الحل </label>
                                            <input id="face" name="solution" type="text" class="form-control" rows="6">
                                            @error('solution')
                                                <small class="text-danger">{{ $message }}*</small>
                                            @enderror
                                            </span>سيتم اشعار طالب الخدمة و مقدم الخدمة بالحل</span>
                                            <span class="invalid-feedback" role="alert">
                                                <div class='dan_mesg_po'> </div>
                                            </span>
                                            <span id='name-error' class="invalid-feedback dan_mesg_po" role="alert">
                                                @error('seeker_reason')
                                                    <small class="text-danger">{{ $message }}*</small>
                                                @enderror
                                            </span>

                                        </div>

                                        <div class='btn-cont'>
                                            <button class="show_more" type='submit'> حفظ</button>
                                            <button class="show_more" type=''> الغاء</button>
                                        </div>



                                </div>
                            </div>





                            </form>


                        </div>

                    </div>
                </div>
            </div>



            <script src="https://code.jquery.com/jquery-3.6.0.min.js"
                        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
                        integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous">
            </script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.14.0-beta2/js/bootstrap-select.min.js"
                        integrity="sha512-FHZVRMUW9FsXobt+ONiix6Z0tIkxvQfxtCSirkKc5Sb4TKHmqq1dZa8DphF0XqKb3ldLu/wgMa8mT6uXiLlRlw=="
                        crossorigin="anonymous" referrerpolicy="no-referrer"></script>




            <script>
                var loadFile = function(event) {
                    var image = document.getElementById("output");
                    image.src = URL.createObjectURL(event.target.files[0]);
                };

                $(function() {
                    $('#datepicker').datepicker();
                });
            </script>
        @endsection
