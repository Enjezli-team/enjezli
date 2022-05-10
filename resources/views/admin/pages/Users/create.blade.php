@extends('admin.layouts.master')
@section('side')
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card card-light">
                    <div class="card-header d-flex justify-content-start">
                        <h6 class="text-right">أضافه مستخدم</h6>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="/admin/users" enctype="multipart/form-data">
                        @csrf

                            <div class="row">
                                <div class="col-12">
                                    <label for="exampleInputEmail1">الصوره </label>
                                    <input type="file" name="image" class="form-control" placeholder=".col-3">
                                    @if ($errors->has('image'))
                                    <small class="text-danger">{{ $errors->first('image') }}</small>
                                @endif
                                </div>
                                <div class="col-12">
                                    <label for="exampleInputEmail1">الاسم </label>
                                    <input type="text" name="name" class="form-control" placeholder=".col-3">
                                    @if ($errors->has('name'))
                                    <small class="text-danger">{{ $errors->first('name') }}</small>
                                @endif                                </div>
                                <div class="col-12">
                                    <label for="exampleInputEmail1">الايميل</label>
                                    <input type="email" name="email" class="form-control" placeholder=".col-3">
                                    @if ($errors->has('email'))
                                    <small class="text-danger">{{ $errors->first('email') }}</small>
                                @endif                                </div>
                                <!--div class="col-12 col-sm-6">
                      <label for="exampleInputEmail1">Name </label>
                      <div class="select2-purple">
                        <select class="select2 select2-hidden-accessible" multiple="" data-placeholder="Select a State"
                          data-dropdown-css-class="select2-purple" style="width: 100%;" data-select2-id="15"
                          tabindex="-1" aria-hidden="true">
                          <option data-select2-id="35">Alabama</option>
                          <option data-select2-id="36">Alaska</option>
                          <option data-select2-id="37">California</option>
                          <option data-select2-id="38">Delaware</option>
                          <option data-select2-id="39">Tennessee</option>
                          <option data-select2-id="40">Texas</option>
                          <option data-select2-id="41">Washington</option>
                        </select>
                      </div>
                      <small class="text-danger">Email address</small>

                    </div-->

                            </div>
                    </div>
                    <div class="card-footer d-flex justify-content-end">
                        <button type="submit" class="btn btn-info">حفظ</button>
                        <a type="" class="btn btn-dark ml-1  " href="/admin/users">تراجع</a>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->

            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
</section>
<!-- /.content -->
@endsection
