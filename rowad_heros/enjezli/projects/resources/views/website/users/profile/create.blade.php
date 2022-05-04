<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
<link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.14.0-beta2/css/bootstrap-select.min.css"
    integrity="sha512-mR/b5Y7FRsKqrYZou7uysnOdCIJib/7r5QeJMFvLNHNhtye3xJp1TdJVPLtetkukFn227nKpXD9OjUc09lx97Q=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
<link rel="stylesheet" href="{{ asset('auth_assets/profile_assests/css/style.css ') }}">



<div class="loginContainer_2 sign-up-container">


    <div class="container overflow-hidden up mt-5  form_con">
        <div class="row gx-5 p-3 gap-5">
            <div class="col-lg row-md">
                <div class="p-3 shape">
                    <h2 class="text-center"> المعلومات الشخصية
                    </h2>
                    <div class="logo-container">
                        <form method="POST" action="/profiles" enctype="multipart/form-data">
                        <div class="login_icon_box">
                            <!-- <img src="assests/svg/logo.svg" alt=""> -->
                            <div class="profile-pic">
                                
                                    @csrf
                                    <label class="-label" for="file">

                                        <span class="glyphicon glyphicon-camera"></span>
                                        <span>
                                            <svg id="edit_1_" data-name="edit (1)" xmlns="http://www.w3.org/2000/svg"
                                                width="24" height="24" viewBox="0 0 24 24">
                                                <path id="Path_90" data-name="Path 90"
                                                    d="M18.656.93,6.464,13.122A4.966,4.966,0,0,0,5,16.657V18a1,1,0,0,0,1,1H7.343a4.966,4.966,0,0,0,3.535-1.464L23.07,5.344a3.125,3.125,0,0,0,0-4.414,3.194,3.194,0,0,0-4.414,0Zm3,3L9.464,16.122A3.02,3.02,0,0,1,7.343,17H7v-.343a3.02,3.02,0,0,1,.878-2.121L20.07,2.344a1.148,1.148,0,0,1,1.586,0,1.123,1.123,0,0,1,0,1.586Z"
                                                    fill="#fff" />
                                                <path id="Path_91" data-name="Path 91"
                                                    d="M23,8.979a1,1,0,0,0-1,1V15H18a3,3,0,0,0-3,3v4H5a3,3,0,0,1-3-3V5A3,3,0,0,1,5,2h9.042a1,1,0,1,0,0-2H5A5.006,5.006,0,0,0,0,5V19a5.006,5.006,0,0,0,5,5H16.343a4.968,4.968,0,0,0,3.536-1.464l2.656-2.658A4.968,4.968,0,0,0,24,16.343V9.979A1,1,0,0,0,23,8.979ZM18.465,21.122a2.975,2.975,0,0,1-1.465.8V18a1,1,0,0,1,1-1h3.925a3.016,3.016,0,0,1-.8,1.464Z"
                                                    fill="#fff" />
                                            </svg>

                                        </span>
                                    </label>
                                    <input id="file" type="file" name="image" onchange="loadFile(event)" />
                                    <img src="https://images.unsplash.com/photo-1438761681033-6461ffad8d80?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=2070&q=80"
                                        id="output" width="200" />
                            </div>
                        </div>
                    </div>


                    <div class="row gx-5 ">
                        <div class="col-lg row-md">
                            <div class="user-box mt-2">
                                <label> <b> رقم الهاتف</b></label>
                                <input id="phone" name="phone" type="text" class="form-control">

                                @if ($errors->has('phone'))
                                    <small class="text-danger">{{ $errors->first('phone') }}</small>
                                @endif


                            </div>
                        </div>

                        <div class="col-lg row-md">
                            <div class="user-box mt-2">
                                <label><b> تاريخ الميلاد </b></label>
                                <input id="date" name="birth_date" type="date" class="form-control">


                                @if ($errors->has('birth_date'))
                                    <small class="text-danger">{{ $errors->first('birth_date') }}</small>
                                @endif


                            </div>
                        </div>
                    </div>



                    <div class="row gx-5">
                        <div class="col-lg row-md">

                            <div class="user-box mt-2">
                                <small><b>
                                        الجنس
                                    </b>

                                </small>
                                <select name="gander" class="form-select form-control">
                                    <option selected VALUE="1">ذكر</option>
                                    <option value="2">انثى</option>
                                </select>
                                @if ($errors->has('gander'))
                                    <small class="text-danger">{{ $errors->first('gander') }}</small>
                                @endif

                            </div>
                        </div>

                        <div class="col-lg row-md">
                            <div class="user-box mt-2">
                                <small><b>
                                        الدولة
                                    </b>

                                </small>
                                <select name="country" class="form-select form-control">
                                    <option selected>اليمن</option>
                                    <option value="1">كوريا</option>
                                    <option value="1">كوريا</option>
                                    <option value="1">كوريا</option>
                                </select>
                                @if ($errors->has('country'))
                                    <small class="text-danger">{{ $errors->first('country') }}</small>
                                @endif

                            </div>
                        </div>
                    </div>




                    <div class="user-box mt-3">
                        <label><b> حساب Facebook </b> </label>
                        <input id="face" name="facebook" type="text" class="form-control">
                        @if ($errors->has('facebook'))
                            <small class="text-danger">{{ $errors->first('facebook') }}</small>
                        @endif




                    </div>
                    <div class="user-box mt-2">
                        <label><b> حساب Twitter </b> </label>
                        <input id="face" name="tweeter" type="text" class="form-control">

                        @if ($errors->has('tweeter'))
                            <small class="text-danger">{{ $errors->first('tweeter') }}</small>
                        @endif


                    </div>


                    <div class="user-box mt-2">
                        <label> <b>حساب Github</b> </label>
                        <input id="face" name="github" type="text" class="form-control">

                        @if ($errors->has('github'))
                            <small class="text-danger">{{ $errors->first('github') }}</small>
                        @endif

                    </div>
                </div>
            </div>
            <div class="col-lg row-md">
                <div class="p-3  shape">
                    <h2 class="text-center"> ملفي الشخصي
                    </h2>
                    <div class="row gx-5">
                        <div class="col-lg row-md">

                            <label class="container-checkbox"> <span class="check_text"> صاحب مشاريع</span>

                                <input type="checkbox" value="seeker" name="role[]" checked="checked">
                                @if ($errors->has('role'))
                                    <small class="text-danger">{{ $errors->first('role') }}</small>
                                @endif

                            </label>
                        </div>

                        <div class="col-lg row-md">
                            <label class="container-checkbox"> <span class="check_text"> منجز خدمة </span>

                                <input type="checkbox" value="provider" name="role[]" checked>

                                @if ($errors->has('role'))
                                    <small class="text-danger">{{ $errors->first('role') }}</small>
                                @endif
                            </label>

                        </div>
                    </div>
                    <div class="row gx-5">
                        <div class="col-lg row-md">


                            <div class="user-box mt-2">
                                <label> <b>

                                        التخصص</b> </label>
                                <input id="face" name="major" type="text" class="form-control">


                                @if ($errors->has('major'))
                                    <small class="text-danger">{{ $errors->first('major') }}</small>
                                @endif

                            </div>
                        </div>

                        <div class="col-lg row-md">


                            <div class="user-box mt-2">
                                <label> <b>

                                        المسمى الوظيفي</b> </label>
                                <input id="face" name="Job_title" type="text" class="form-control">

                                @if ($errors->has('Job_title'))
                                    <small class="text-danger">{{ $errors->first('Job_title') }}</small>
                                @endif


                            </div>
                        </div>
                    </div>
                    <div class="user-box">

                        <label> <b>المهارات</b> </label>
                        <div class="w-100">
                            <select class="selectpicker w-100" name="skills[]" multiple aria-label="المهارات "
                                data-live-search="true">
                                @foreach ($skills as $skill)
                                    <option value="{{ $skill->id }}">{{ $skill->title }}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('skills'))
                                <small class="text-danger">{{ $errors->first('skills') }}</small>
                            @endif

                        </div>


                    </div>
                    <div class="user-box mt-2">

                        <label> <b>نبذه تعريفية </b> </label>
                        <textarea id="face" name="describe" type="text" class="form-control" rows="8"></textarea>
                        @if ($errors->has('describe'))
                            <small class="text-danger">{{ $errors->first('describe') }}</small>
                        @endif


                    </div>





                    <div class='btn-cont'>
                        <button class="show_more" type='submit'> حفظ</button>
                        <button class="show_more"  type=''> الغاء</button>
                    </div>

                    </form>

                </div>
            </div>
        </div>
    </div>

</div>



<script src="https://code.jquery.com/jquery-3.6.0.min.js"
integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
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
