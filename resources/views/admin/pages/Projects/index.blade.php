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
                                <h4 class="  ">المشاريع</h4>
                            </div>
                            <div class="col-md-7">
                            <form method="POST" action="/admin/projectSearch">
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
                                                <th> صاحب المشروع</th>
                                                <th> الوصف</th>
                                                <th> مدة التنفيذ</th>
                                                <th>  السعر</th>
                                                <th> action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse($data as $item)
                                            <tr class="odd">
                                            <td>{{$item->id}}</td>
                                            <td>
                                                @foreach ($item->sal_project_attach as $s )

                                                @if ($loop->first)
                                                <img src="{{$s->file_name}}" alt="Product Image" class="img-size-50">
                                                  @endif
                                                @endforeach
                                            </td>
                                            <td>{{$item->title}}</td>
                                            <td>{{$item->sal_created_by->name}}</td>
                                            <td>{{$item->description}}</td>
                                            <td>{{$item->duration}}</td>
                                            <td>{{$item->price}}</td>
                                            {{-- <td>

                                                @forelse($item->user_roles_user as $role)
                                                <span class="float-right badge bg-danger">{{$role->role->name}}</span>
                                                @empty
                                                not found
                                                @endforelse

                                            </td> --}}
                                                <td>
                                                <form method="POST" action="/admin/projects/{{$item->id}}">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                                    <div class="btn-group ">
                                                        <a href="/admin/project_activate/{{$item->id}}/{{($item->status==0) ? 1:0}}" class="btn btn-sm btn-info"> {{($item->status==0) ? 'غير مفعل  ' :'مفعل'}} </a>
                                                        <a href="/admin/project_block/{{$item->id}}/{{($item->blockByAdmin==1) ? 0 :1}}" class="btn btn-sm btn-info"> {{($item->blockByAdmin==1) ? 'ازاله الحظر' :'حظر'}} </a>
                                                        <a href="/admin/project_details/{{$item->id}}" class="btn btn-sm btn-info">عرض التفاصيل</a>
                                                    
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
