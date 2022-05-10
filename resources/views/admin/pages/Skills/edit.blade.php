@extends('admin.layouts.master')
@section('side')
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card card-light">
                    <div class="card-header d-flex justify-content-start">
                        <h6 class="text-right">تعديل مهاره</h6>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="/admin/skills/{{$data->id}}" enctype="multipart/form-data">

                        @csrf
                        @method('PATCH')
                            <div class="row">

                                <div class="col-12">
                                    <label for="exampleInputEmail1">الاسم </label>
                                    <input type="text" name="name" value="{{$data->title}}" class="form-control" placeholder=".col-3">
                                    @if ($errors->has('name'))
                                    <small class="text-danger">{{ $errors->first('name') }}</small>
                                    @endif
                                </div>
                                <div class="col-12 col-sm-6">
                                    <label for="exampleInputEmail1">الاب </label>
                                        <select name="parent" class="form-control">
                                            <option value=0>لا يوجد</option>
                                            @foreach($parent as $p)
                                            <option {{($data->parent_id==$p->id) ? 'selected' : ''}} value="{{$p->id}}">{{$p->title}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @if ($errors->has('parent'))
                                    <small class="text-danger">{{ $errors->first('parent') }}</small>
                                    @endif
                            </div>
                    </div>
                    <div class="card-footer d-flex justify-content-end">
                        <button type="submit" class="btn btn-info">حفظ</button>
                        <a type="" class="btn btn-dark ml-1  " href="/admin/skills">تراجع</a>
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
