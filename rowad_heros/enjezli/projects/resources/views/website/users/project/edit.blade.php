<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.14.0-beta2/css/bootstrap-select.min.css" integrity="sha512-mR/b5Y7FRsKqrYZou7uysnOdCIJib/7r5QeJMFvLNHNhtye3xJp1TdJVPLtetkukFn227nKpXD9OjUc09lx97Q==" crossorigin="anonymous"
  referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
<link rel="stylesheet" href="{{ asset('auth_assets/project_assests/css/style.css ')}}">



<div class="loginContainer_2 sign-up-container">
    <div class=" img-squares_2"><img src="{{ asset('auth_assets/project_assests/svg/enLogo.svg')}}" alt=""></div>
    <div class=" img-squares_3"><img src="{{ asset('auth_assets/project_assests/svg/enLogo.svg')}}" alt=""></div>

    <div class="container overflow-hidden up mt-5 vh-100">
        <div class="row">
            <div class="col">
                <div class="mx-auto w-50 p-3">
                    <div class="">
                        <div class="">
                            <div class="p-3 bg-white shadow-lg rounded-3">
                                <h2 class="text-center"> تعديل مشروع
                                </h2>
                                <div class="logo-container">

                                </div>
                                {{-- /update_project/{{$data['id']}} --}}
                                <form method="POST" action="{{ route('projects.update',$data['id']) }}" enctype="multipart/form-data">
                                    @csrf
                                    @method('PATCH')
                                    <div class="user-box mt-3">
                                        <label><b> عنوان المشروع </b> </label>
                                        <input id="face" name="title" type="text" class="form-control" value="{{$data['title']}}">
                                        @error('title')
                                        <small class="text-danger">{{$message}}*</small> 

                                        @enderror
                                        {{-- <span class="invalid-feedback" role="alert">
                                            <div class='dan_mesg_po'> </div>
                                        </span>
                                        <span id='name-error' class="invalid-feedback dan_mesg_po" role="alert">

                                        </span> --}}

                                    </div>

                                    <div class="user-box">

                                        <label> <b>المهارات</b> </label>
                                        <div class="w-100">
                                            <select class="selectpicker w-100" name="skills[]" multiple
                                                aria-label="المهارات " data-live-search="true">
                                                @foreach ($skills as $skill )
                                                <option value="{{$skill['id']}}">{{$skill['title']}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        @error('skills')
                                        <small class="text-danger">{{$message}}*</small> 

                                        @enderror

                                    </div>

                                    <div class="user-box mt-2">

                                        <label> <b>تفاصيل المشروع </b> </label>
                                        <textarea id="face" name="description" type="text" class="form-control"
                                            rows="6">
                                           {{$data['description']}}
                                            </textarea>
                                            @error('description')
                                            <small class="text-danger">{{$message}}*</small> 

                                            @enderror
                                        {{-- <span class="invalid-feedback" role="alert">
                                            <div class='dan_mesg_po'> </div>
                                        </span>
                                        <span id='name-error' class="invalid-feedback dan_mesg_po" role="alert">

                                        </span>

                                    </div> --}}


                                    <div class="row gx-5">
                                        <div class="col-lg row-md">

                                            <div class="user-box mt-2">
                                                <small><b>
                                                        الميزانية المتوقعة
                                                    </b>

                                                </small>
                                                <input id="face" name="price" type="text" class="form-control" value='{{$data['price']}}'>
                                                {{-- <select name="price" class="form-select form-control">

                                                    <option value="100">100$-200$</option>
                                                    <option value="200">300$-400$</option>
                                                    <option value="3">500$-600$</option>
                                                </select> --}}
                                            </div>
                                            @error('price')
                                            <small class="text-danger">{{$message}}*</small> 

                                            @enderror
                                        </div>

                                        <div class="col-lg row-md">
                                            <div class="user-box mt-2">
                                                <small><b>
                                                        المدة المتوقعة للتسليم
                                                    </b>
                                                 (أيام)  
                                                </small>
                                                <input id="face" name="duration" type="number" class="form-control" value='{{$data['duration']}}'>
                                                @error('duration')
                                                <small class="text-danger">{{$message}}*</small> 
    
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
                                            <label class="input-group-text" for="inputGroupFile">ملفات توضيحية</label>
                                            <input type="file" name="files[]" class="form-control" id="inputGroupFile" multiple>
                                        </div>

                                    </div>



                                    <div class='btn-cont'>
                                        <button class='btn' type="submit">
                                            حفظ
                                            <span class='line-1'></span>
                                            <span class='line-2'></span>
                                            <span class='line-3'></span>
                                            <span class='line-4'></span>
                                        </button>
                                    </div>



                            </div>
                        </div>





                        </form>


                    </div>

                </div>
            </div>
        </div>



        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.14.0-beta2/js/bootstrap-select.min.js" integrity="sha512-FHZVRMUW9FsXobt+ONiix6Z0tIkxvQfxtCSirkKc5Sb4TKHmqq1dZa8DphF0XqKb3ldLu/wgMa8mT6uXiLlRlw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


     

        <script>
            var loadFile = function (event) {
                var image = document.getElementById("output");
                image.src = URL.createObjectURL(event.target.files[0]);
            };

            $(function () {
                $('#datepicker').datepicker();
            });
        </script>