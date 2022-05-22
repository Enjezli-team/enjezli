<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
<link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.14.0-beta2/css/bootstrap-select.min.css"
    integrity="sha512-mR/b5Y7FRsKqrYZou7uysnOdCIJib/7r5QeJMFvLNHNhtye3xJp1TdJVPLtetkukFn227nKpXD9OjUc09lx97Q=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
<link rel="stylesheet" href="{{ asset('auth_assets/project_assests/css/style.css ') }}">
@extends('website.layouts.master_dash')
@section('content')
<style>
    /* complete content  */

    .profile-pic {
        color: transparent;
        transition: all 0.3s ease;
        display: flex;
        justify-content: center;
        align-items: center;
        position: relative;
        transition: all 0.3s ease;
    }

    .profile-pic input {
        display: none;
    }

    .profile-pic img {
        position: absolute;
        object-fit: cover;
        width: 77px;
        height: 77px;
        box-shadow: 0 0 10px 0 rgba(255, 255, 255, 0.35);
        border-radius: 100px;
        z-index: 0;
    }

    .profile-pic .-label {
        cursor: pointer;
        height: 77px;
        width: 77px;
    }

    .profile-pic:hover .-label {
        display: flex;
        justify-content: center;
        align-items: center;
        background-color: rgba(0, 0, 0, 0.8);
        z-index: 10000;
        color: #fafafa;
        transition: background-color 0.2s ease-in-out;
        border-radius: 100px;
        margin-bottom: 0;
    }

    .profile-pic span {
        display: inline-flex;
        padding: 0.2em;
        height: 2em;
    }
</style>
<!-- End Navbar -->
<div class="container-fluid ">

    <div class="row">
        <div class="col-md-12 mt-4">
            <div class="card">

                <div class="card-body pt-4 p-3">
                    <form method="POST" action="{{ route('profiles.update', $data['id']) }}" enctype="multipart/form-data">

                        @csrf
                        @method('PATCH')
                        <div class="login_icon_box">
                            <div class="profile-pic">
                                <label class="-label" for="file">
                                    <span class="glyphicon glyphicon-camera"></span>
                                    <span>
                                        <svg id="edit_1_" data-name="edit (1)" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                            <path id="Path_90" data-name="Path 90" d="M18.656.93,6.464,13.122A4.966,4.966,0,0,0,5,16.657V18a1,1,0,0,0,1,1H7.343a4.966,4.966,0,0,0,3.535-1.464L23.07,5.344a3.125,3.125,0,0,0,0-4.414,3.194,3.194,0,0,0-4.414,0Zm3,3L9.464,16.122A3.02,3.02,0,0,1,7.343,17H7v-.343a3.02,3.02,0,0,1,.878-2.121L20.07,2.344a1.148,1.148,0,0,1,1.586,0,1.123,1.123,0,0,1,0,1.586Z" fill="#fff"></path>
                                            <path id="Path_91" data-name="Path 91" d="M23,8.979a1,1,0,0,0-1,1V15H18a3,3,0,0,0-3,3v4H5a3,3,0,0,1-3-3V5A3,3,0,0,1,5,2h9.042a1,1,0,1,0,0-2H5A5.006,5.006,0,0,0,0,5V19a5.006,5.006,0,0,0,5,5H16.343a4.968,4.968,0,0,0,3.536-1.464l2.656-2.658A4.968,4.968,0,0,0,24,16.343V9.979A1,1,0,0,0,23,8.979ZM18.465,21.122a2.975,2.975,0,0,1-1.465.8V18a1,1,0,0,1,1-1h3.925a3.016,3.016,0,0,1-.8,1.464Z" fill="#fff"></path>
                                        </svg>
                                    </span>
                                </label>
                                <input id="file" name="image" value="" type="file" onchange="loadFile(event)">
                                <input id="text" name="imageold" value="{{$data->sal_user->image}}" type="text" hidden>
                                <img src="{{asset($data->sal_user->image)}}" id="output" width="200">
                            </div>
                        </div>
                        <div class="card-header pb-0 px-3">
                            <h6 class="mb-0 text-primary">بيانات شخصيه</h6>
                        </div>
                        <div class="row">
                            <div class="mb-3 col-sm-12 col-md-6 col-lg-4">
                                <label for="exampleInputEmail1" class="form-label">الاسم </label>
                                <input value="{{ $data->sal_user->name }}" name="name" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">

                                @if ($errors->has('name'))
                                <small id="emailHelp" class="form-text">{{ $errors->first('name') }}</small>
                                @endif
                            </div>
                            <div class="mb-3 col-sm-12 col-md-6 col-lg-4">
                                <label for="exampleInputEmail1" class="form-label">الايميل </label>
                                <input value="{{ $data->sal_user->email }}" name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">

                                @if ($errors->has('email'))
                                <small id="emailHelp" class="form-text">{{ $errors->first('email') }}</small>
                                @endif
                            </div>
                            <div class="mb-3 col-sm-12 col-md-6 col-lg-4">
                                <label for="exampleInputEmail1" class="form-label">التلفون </label>
                                <input value="{{ $data->phone }}" name="phone" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">

                                @if ($errors->has('phone'))
                                <small id="emailHelp" class="form-text">{{ $errors->first('phone') }}</small>
                                @endif
                            </div>
                            <div class="mb-3 col-sm-12 col-md-6 col-lg-4">
                                <label for="exampleInputEmail1" class="form-label">تاريخ الميلاد </label>
                                <input value="{{ $data->birth_date }}" name="birth_date" type="date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">

                                @if ($errors->has('birth_date'))
                                <small id="emailHelp" class="form-text">{{ $errors->first('birth_date') }}</small>
                                @endif
                            </div>
                            <div class="mb-3 col-sm-12 col-md-6 col-lg-4">
                                <label for="exampleInputEmail1" class="form-label"> الجنس </label>
                                <select name="gander" class="form-select form-control">
                                    <option {{($data->gander==1) ? 'selected' : ''}} value="1">ذكر</option>
                                    <option {{($data->gander==2) ? 'selected' : ''}} value="2">انثى</option>
                                </select>
                                @if ($errors->has('gander'))
                                <small id="emailHelp" class="form-text">{{ $errors->first('gander') }}</small>
                                @endif
                            </div>
                            <div class="mb-3 col-sm-12 col-md-6 col-lg-4">
                                <label for="exampleInputEmail1" class="form-label"> الدولة </label>
                                <select name="country" class="form-select form-control">
                                    <option {{($data->country=='اليمن') ? 'selected' : ''}} value="اليمن">اليمن</option>
                                    <option {{($data->country=='السعوديه') ? 'selected' : ''}} value="السعوديه">السعوديه</option>
                                </select>
                                @if ($errors->has('country'))
                                <small id="emailHelp" class="form-text">{{ $errors->first('country') }}</small>
                                @endif
                            </div>
                            <div class="card-header pb-0 px-3">
                                <h6 class="mb-0 text-primary">بيانات سوشيال ميديا</h6>
                            </div>
                            <div class="mb-3 col-sm-12 col-md-6 col-lg-4">
                                <label for="exampleInputEmail1" class="form-label"> حساب Facebook </label>
                                <input value="{{$data->facebook}}" name="facebook" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">

                                @if ($errors->has('facebook'))
                                <small id="emailHelp" class="form-text">{{ $errors->first('facebook') }}</small>
                                @endif
                            </div>
                            <div class="mb-3 col-sm-12 col-md-6 col-lg-4">
                                <label for="exampleInputEmail1" class="form-label"> حساب Twitter </label>
                                <input value="{{ $data->tweeter }}" name="tweeter" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">

                                @if ($errors->has('tweeter'))
                                <small id="emailHelp" class="form-text">{{ $errors->first('tweeter') }}</small>
                                @endif
                            </div>
                            <div class="mb-3 col-sm-12 col-md-6 col-lg-4">
                                <label for="exampleInputEmail1" class="form-label"> حساب Github </label>
                                <input value="{{ $data->github }}" name="github" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">

                                @if ($errors->has('github'))
                                <small id="emailHelp" class="form-text">{{ $errors->first('github') }}</small>
                                @endif
                            </div>

                            <div class="card-header pb-0 px-3">
                                <h6 class="mb-0 text-primary"> الملف الشخصي</h6>
                            </div>
                            <div class="mb-3 col-sm-12 col-md-12 col-lg-12">
                                <div class="card-header pb-0 px-3">
                                    <label for="exampleInputEmail1" class="form-label"> نوع الاستخدام </label>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12 col-md-3">
                                        <input type="checkbox" value="seeker" name="role[]" checked="checked">
                                        <label class="container-checkbox"> <span class="check_text"> صاحب مشاريع</span>
                                            @if ($errors->has('role'))
                                            <small class="text-danger">{{ $errors->first('role') }}</small>
                                            @endif
                                        </label>
                                    </div>
                                    <div class="col-sm-12 col-md-3">
                                        <input type="checkbox" value="provider" name="role[]" checked>
                                        <label class="container-checkbox"> <span class="check_text"> منجز خدمة </span>

                                            @if ($errors->has('role'))
                                            <small class="text-danger">{{ $errors->first('role') }}</small>
                                            @endif
                                        </label>

                                    </div>
                                </div>
                            </div>
                            <div class="mb-3 col-sm-12 col-md-6 col-lg-4">
                                <label for="exampleInputEmail1" class="form-label"> التخصص </label>
                                <input value="{{ $data->major }}" name="major" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">

                                @if ($errors->has('major'))
                                <small id="emailHelp" class="form-text">{{ $errors->first('major') }}</small>
                                @endif
                            </div>
                            <div class="mb-3 col-sm-12 col-md-6 col-lg-4">
                                <label for="exampleInputEmail1" class="form-label"> المسمى الوظيفي </label>
                                <input value="{{ $data->Job_title }}" name="Job_title" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">

                                @if ($errors->has('Job_title'))
                                <small id="emailHelp" class="form-text">{{ $errors->first('Job_title') }}</small>
                                @endif
                            </div>
                           
                                <div class="user-box mb-3 col-sm-12 col-md-6 col-lg-4">

                                    <label> <b>المهارات</b> </label>
                        <div class="w-100">
                            <select class="selectpicker w-100 " name="skills[]" multiple aria-label="المهارات "
                               data-live-search="true">
                                @foreach ($skills as $skill)
                                         <option value="{{ $skill['id'] }}">{{ $skill['title'] }}</option>
                           @endforeach
                            </select>
                        </div>

                          </div>
              
                            <div class="mb-3 col-sm-12 ">
                                <label for="exampleInputEmail1" class="form-label"> نبذه عنك </label>
                                <textarea id="face" name="describe" type="text" class="form-control" rows="5">{{ $data->description }}</textarea>
                                @if ($errors->has('describe'))
                                <small class="text-danger">{{ $errors->first('describe') }}</small>
                                @endif
                            </div>
                        </div>
                        <div class="col-12  d-flex justify-content-evenly gap-5 "  aria-label="Basic outlined example">
                            <button type="submit" class="btn btn-outline-primary ">حفظ</button>
                            <a href="/profiles/{{Auth::user()->id}}"  class="btn btn-outline-dark ">الغاء</a>
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
    $(document).ready(function() {
        $('#select').selectpicker();
    });
</script>


@endsection
