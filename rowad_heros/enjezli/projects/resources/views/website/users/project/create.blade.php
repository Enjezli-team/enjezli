<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
<link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.14.0-beta2/css/bootstrap-select.min.css"
    integrity="sha512-mR/b5Y7FRsKqrYZou7uysnOdCIJib/7r5QeJMFvLNHNhtye3xJp1TdJVPLtetkukFn227nKpXD9OjUc09lx97Q=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
<link rel="stylesheet" href="{{ asset('auth_assets/project_assests/css/style.css ') }}">

@extends("website.layouts.master")

@section('content')
    <div class="loginContainer_2 sign-up-container up">

        <div class="container overflow-hidden  mt-5  form_con">
            <div class="row">
                <div class="col">
                    <div class="mx-auto  p-3">
                        <div class="">
                            <div class="">
                                <div class="p-3  shadow-lg rounded-3">
                                    <h2 class="text-center"> إضافة مشروع
                                    </h2>
                                    <div class="logo-container">

                                    </div>
                                    {{-- /save_project --}}
                                    <form method="POST" class='d-grid gap-4' action="{{ route('projects.store') }}"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="user-box mt-3 d-grid gap-4">
                                            <label> عنوان المشروع </label>
                                            <input id="face" name="title" type="text" class="form-control">
                                            @error('title')
                                                <small class="text-danger">{{ $message }}*</small>
                                            @enderror
                                            {{-- <span class="invalid-feedback" role="alert">
                                            <div class='dan_mesg_po'> </div>
                                        </span>
                                        <span id='name-error' class="invalid-feedback dan_mesg_po" role="alert">

                                        </span> --}}

                                        </div>

                                        <div class="user-box d-grid gap-4">

                                            <label> المهارات </label>
                                            <div class="w-100">
                                                <select class="selectpicker w-100" name="skills[]" multiple
                                                    aria-label="المهارات " data-live-search="true">
                                                    @foreach ($data as $item)
                                                        <option value="{{ $item['id'] }}">{{ $item['title'] }}</option>
                                                    @endforeach
                                                    {{-- <option value="1">CSS</option>
                                                <option value="2">HTML</option>
                                                <option value="3">VUE</option> --}}
                                                </select>
                                            </div>
                                            @error('skills')
                                                <small class="text-danger">{{ $message }}*</small>
                                            @enderror

                                        </div>

                                        <div class="user-box mt-2 d-grid gap-4">

                                            <label> تفاصيل المشروع </label>
                                            <textarea id="face" name="description" type="text" class="form-control" rows="6">
                                            </textarea>
                                            @error('description')
                                                <small class="text-danger">{{ $message }}*</small>
                                            @enderror
                                            {{-- <span class="invalid-feedback" role="alert">
                                            <div class='dan_mesg_po'> </div>
                                        </span>
                                        <span id='name-error' class="invalid-feedback dan_mesg_po" role="alert">

                                        </span>

                                    </div> --}}


                                            <div class="row gx-5">
                                                <div class="col-lg row-md">

                                                    <div class="user-box mt-2 d-grid gap-4">
                                                        <small>
                                                            الميزانية المتوقعة


                                                        </small>
                                                        <input id="face" name="price" type="text" class="form-control">

                                                    </div>
                                                    @error('price')
                                                        <small class="text-danger">{{ $message }}*</small>
                                                    @enderror
                                                </div>

                                                <div class="col-lg row-md">
                                                    <div class="user-box mt-2 d-grid gap-4">
                                                        <small>
                                                            المدة المتوقعة للتسليم

                                                            (أيام)
                                                        </small>
                                                        <input id="face" name="duration" type="number"
                                                            class="form-control">
                                                        @error('duration')
                                                            <small class="text-danger">{{ $message }}*</small>
                                                        @enderror
                                                        {{-- <span class="invalid-feedback" role="alert">
                                                    <div class='dan_mesg_po'> </div>
                                                </span>
                                                <span id='name-error' class="invalid-feedback dan_mesg_po" role="alert">

                                                </span> --}}
                                                    </div>
                                                </div>
                                            </div>






                                            <div class="user-box mt-2">

                                                <div class="input-group custom-file-button">
                                                    <label class="input-group-text" for="inputGroupFile">ملفات
                                                        توضيحية</label>
                                                    <input type="file" name="files[]" class="form-control"
                                                        id="inputGroupFile" multiple>
                                                </div>

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
                                integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4"
                                crossorigin="anonymous"></script>
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
