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
<div class="container-fluid pb-3 ">

    <div class="row">
        <div class="col-md-12 mt-4">
            <div class="card">

                <div class="card-body pt-4 p-3">
                    <form method="POST" action="/profiles" enctype="multipart/form-data">

                        @csrf
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
                                <img src={{asset('images/user_avater.png')}} id="output" width="200">
                            </div>
                        </div>
                        <div class="card-header pb-0 px-3">
                        <h6 class="mb-0 text-primary">بيانات شخصيه</h6>
                        <P class="mb-0 text-dark">اكمل بيانات الملف الشخصي: </P>
                        </div>
                        <div class="row">
                            <div class="mb-3 col-sm-12 col-md-6 col-lg-3">
                                <label for="exampleInputEmail1" class="form-label">التلفون </label>
                                <input value="" name="phone" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">

                                @if ($errors->has('phone'))
                                <small id="emailHelp" class="form-text">{{ $errors->first('phone') }}</small>
                                @endif
                            </div>
                            <div class="mb-3 col-sm-12 col-md-6 col-lg-3">
                                <label for="exampleInputEmail1" class="form-label">تاريخ الميلاد </label>
                                <input value="" name="birth_date" type="date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">

                                @if ($errors->has('birth_date'))
                                <small id="emailHelp" class="form-text">{{ $errors->first('birth_date') }}</small>
                                @endif
                            </div>
                            <div class="mb-3 col-sm-12 col-md-6 col-lg-3">
                                <label for="exampleInputEmail1" class="form-label"> الجنس </label>
                                <select name="gander" class="form-select form-control">
                                    <option  value="1">ذكر</option>
                                    <option value="2">انثى</option>
                                </select>
                                @if ($errors->has('gander'))
                                <small id="emailHelp" class="form-text">{{ $errors->first('gander') }}</small>
                                @endif
                            </div>
                            <div class="mb-3 col-sm-12 col-md-6 col-lg-3">
                                <label for="exampleInputEmail1" class="form-label"> الدولة </label>
                                <select name="country" class="form-select form-control">
                                    <option value="اليمن">اليمن</option>
                                    <option  value="السعوديه">السعوديه</option>
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
                                <input value="" name="Facebook" type="فثءف" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">

                                @if ($errors->has('Facebook'))
                                <small id="emailHelp" class="form-text">{{ $errors->first('Facebook') }}</small>
                                @endif
                            </div>
                            <div class="mb-3 col-sm-12 col-md-6 col-lg-4">
                                <label for="exampleInputEmail1" class="form-label"> حساب Twitter </label>
                                <input value="" name="tweeter" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">

                                @if ($errors->has('tweeter'))
                                <small id="emailHelp" class="form-text">{{ $errors->first('tweeter') }}</small>
                                @endif
                            </div>
                            <div class="mb-3 col-sm-12 col-md-6 col-lg-4">
                                <label for="exampleInputEmail1" class="form-label"> حساب Github </label>
                                <input value="" name="github" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">

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
                                <input value="" name="major" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">

                                @if ($errors->has('major'))
                                <small id="emailHelp" class="form-text">{{ $errors->first('major') }}</small>
                                @endif
                            </div>
                            <div class="mb-3 col-sm-12 col-md-6 col-lg-4">
                                <label for="exampleInputEmail1" class="form-label"> المسمى الوظيفي </label>
                                <input value="" name="Job_title" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">

                                @if ($errors->has('Job_title'))
                                <small id="emailHelp" class="form-text">{{ $errors->first('Job_title') }}</small>
                                @endif
                            </div>
                            <div class="mb-3 col-sm-12 col-md-6 col-lg-4">
                                <label for="exampleInputEmail1" class="form-label"> المهارات </label>
                                <select name="skills[]" class="form-control">
                                    @foreach ($skills as $skill)
                                    <option value="{{ $skill['id'] }}">{{ $skill['title'] }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('skills'))
                                <small id="emailHelp" class="form-text">{{ $errors->first('skills') }}</small>
                                @endif
                            </div>
                            <div class="mb-3 col-sm-12 ">
                                <label for="exampleInputEmail1" class="form-label"> نبذه عنك </label>
                                <textarea id="face" name="describe" type="text" class="form-control" rows="5"></textarea>
                                @if ($errors->has('describe'))
                                <small class="text-danger">{{ $errors->first('describe') }}</small>
                                @endif
                            </div>
                        </div>
                        <div class="col-12  d-flex justify-content-evenly gap-5" role="group" aria-label="Basic outlined example">
                            <button type="submit" class="btn btn-outline-primary ">حفظ</button>
                            <a href="/profiles/{{Auth::user()->id}}"  class="btn btn-outline-dark ">الغاء</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>


<script>
    var loadFile = function(event) {
        var image = document.getElementById("output");
        image.src = URL.createObjectURL(event.target.files[0]);
    };


</script>


@endsection
