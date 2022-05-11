@extends('admin.layouts.master')
@section('side')
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-3">
                                <h4 class="  ">المستخدمين</h4>
                            </div>
                            <div class="col-md-7">
                            <form method="POST" action="/admin/userSearch">
                        @csrf
                                <div class="form-inline ">
                                    <div class="input-group w-100">
                                        <input class="form-control " name="value" >

                                        <div class="input-group-append">
                                            <button class="btn btn-info" type="submit">
                                                <i class="fas fa-search fa-fw text-light"></i>
                                            </button>
                                        </div>
                                    </div>

                                </div>
                                @if ($errors->has('value'))
                                    <small class="text-danger">{{ $errors->first('value') }}</small>
                                    @endif
                            </form>
                            </div>
                            <div class="col-md-2">
                                <div class="btn-group">
                                    <a type="button" href="/admin/users/create"class="btn btn-info">اضافة جديد </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4">
                            <div class="row">
                                <div class="col-sm-12 col-md-6"></div>
                                <div class="col-sm-12 col-md-6"></div>
                            </div>
                            @include('admin.layouts.flash_msg')

                            <div class="row">

                                <div class="col-sm-12">
                                    <table id="example2" class="table table-bordered table-hover dataTable dtr-inline" role="grid" aria-describedby="example2_info">
                                        <thead>
                                            <tr role="row">
                                                <th>#</th>
                                                <th> الصوره</th>
                                                <th> الاسم</th>
                                                <th> الايميل</th>
                                                <th> الدور</th>
                                                <th> action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse($data as $item)
                                            <tr class="odd">
                                            <td>{{$item->id}}</td>
                                            <td>{{$item->image}}</td>
                                            <td>{{$item->name}}</td>
                                            <td>{{$item->email}}</td>
                                            <td>

                                                @forelse($item->user_roles_user as $role)
                                                <span class="float-right badge bg-danger">{{$role->role->name}}</span>
                                                @empty
                                                not found
                                                @endforelse

                                            </td>
                                                <td>
                                                <form method="POST" action="/admin/users/{{$item->id}}">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                                    <div class="btn-group ">
                                                        <a href="/admin/users/{{$item->id}}/edit" class="btn btn-sm btn-primary"> <i class="fas fa-pen fa-fw text-light"></i></a>
                                                        <a href="/admin/user_block/{{$item->id}}/{{($item->is_blocked==1) ? 0 :1}}" class="btn btn-sm btn-info"> {{($item->is_blocked==1) ? 'ازاله الحظر' :'حظر'}} </a>
                                                        <button type="submit" class="btn btn-sm btn-danger"> <i class="fas fa-trash fa-fw text-light"></i></button>
                                                    </div>
                                                </form>
                                                </td>
                                            </tr>
                                            @empty
                                            <tr class="odd">
                                                <td>لا توجد بيانات
                                                </td>
                                            </tr>
@endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
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
