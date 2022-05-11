@extends('admin.layouts.master')
@section('side')
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card card-light">
                    <div class="card-header d-flex justify-content-start">
                        <h6 class="text-right">تعديل مستخدم</h6>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="/admin/users/{{$data->id}}" enctype="multipart/form-data">

                        @csrf
                        @method('PATCH')
                            <div class="row">
                                <div class="col-12">
                                    <label for="exampleInputEmail1">الصوره </label>
                                    <input type="file" name="image" class="form-control" placeholder=".col-3">
                                    <input type="text" name="imageold" hidden="hidden" value="{{$data->image}}" class="form-control" placeholder=".col-3">
                                    @if ($errors->has('image'))
                                    <small class="text-danger">{{ $errors->first('image') }}</small>
                                    @endif
                                </div>
                                <div class="col-12">
                                    <label for="exampleInputEmail1">الاسم </label>
                                    <input type="text" name="name" value="{{$data->name}}" class="form-control" placeholder=".col-3">
                                    @if ($errors->has('name'))
                                    <small class="text-danger">{{ $errors->first('name') }}</small>
                                    @endif
                                </div>
                                <div class="col-12">
                                    <label for="exampleInputEmail1">الايميل</label>
                                    <input type="email" name="email" value="{{$data->email}}" class="form-control" placeholder=".col-3">
                                    @if ($errors->has('email'))
                                    <small class="text-danger">{{ $errors->first('email') }}</small>
                                    @endif
                                </div>
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
