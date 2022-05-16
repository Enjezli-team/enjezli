@extends('admin.layouts.master')
@section('side')

      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">التقارير</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
          
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{$openpro->count()}} </h3>

                <p>المشاريع الجديدة</p>
              </div>
              <div class="icon">
                <i class="ion bi bi-folder2-open"></i>
              </div>
              <a href="/admin/project_status/{{$status=1}}" class="small-box-footer">مزيد من التفاصيل <i class="fas fa-arrow-circle-left"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                  
                <h3>{{$executepro->count()}} </h3>
              

                <p>المشاريع قيد التنفيذ</p>
              </div>
              <div class="icon">
                <i class="ion bi bi-folder-symlink"></i>
              </div>
              <a href="/admin/project_status/{{$status=2}}" class="small-box-footer">مزيد من التفاصيل  <i class="fas fa-arrow-circle-left"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>{{$seeker->count()}}</h3>

                <p>طالبي الخدمات</p>
              </div>
              <div class="icon">
                
                <i class="ion bi bi-person-lines-fill"></i>
              </div>
              <a href="/admin/user_status/{{$type=3}}" class="small-box-footer">مزيد من التفاصيل   <i class="fas fa-arrow-circle-left"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>{{$provider->count()}}</h3>

                <p>منجزي الخدمات</p>
              </div>
              <div class="icon">
                <i class="ion bi bi-person-check-fill"></i>
              </div>
              <a href="/admin/user_status/{{$type=3}}" class="small-box-footer">مزيد من التفاصيل   <i class="fas fa-arrow-circle-left"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <section class="col-lg-7 connectedSortable">
            <!-- Custom tabs (Charts with tabs)-->

            <!-- TABLE: LATEST ORDERS -->
            <div class="card">
              <div class="card-header border-transparent">
                <h3 class="card-title">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </h3>

                <div class="card-tools">
                  اخر العروض المقبولة
                 
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <div class="table-responsive">
                  <table class="table m-0">
                    <thead>
                    <tr>
                      <th>الرقم </th>
                      <th>اسم المشروع</th>
                      <th>الحالة</th>
                      <th>اسم المنجز</th>
                      <th>السعر </th>
                    </tr>
                    </thead>
                    <tbody>

                      @foreach ($lastoffer as $offer )
                        
                    <tr>
                      <td><a href="pages/examples/invoice.html">{{$offer->id}}</a></td>
                      <td>{{$offer->sal_project_id->title}}</td>
                      <td><span class="badge badge-success">تم اختيارها</span></td>
                      <td>
                        <div class="sparkbar" data-color="#00a65a" data-height="20">{{$offer->sal_provider_by->name}}</div>
                      </td>
                      <td>
                        <div class="sparkbar" data-color="#00a65a" data-height="20">{{$offer->price}}</div>
                      </td>
                    </tr>
                    
                    @endforeach
              
                
                    </tbody>
                  </table>
                </div>
                <!-- /.table-responsive -->
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">
                <a href="/admin/offer_status/{{$status=1}}" class="btn btn-sm btn-info float-right">جميع العروض</a>
              </div>
              <!-- /.card-footer -->
            </div>
            <!-- /.card -->
            <!-- /.card -->
          </section>
          <!-- /.Left col -->
          <!-- right col (We are only adding the ID to make the widgets sortable)-->
          <section class="col-lg-5 connectedSortable">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title"> 
                  
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button> </h3>


                <div class="card-tools">
                  اخر المشاريع
                  
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <ul class="products-list product-list-in-card pl-2 pr-2">
                  @foreach ($lastPro as $pro)
                  <li class="item">
                    <div class="product-img">
                      @foreach ($pro->sal_project_attach as $s )

                      @if ($loop->first)
                      <img src="{{$s->file_name}}" alt="Product Image" class="img-size-50">
                        @endif
                      @endforeach
                    </div>
                    <div class="product-info">
                      <a href="javascript:void(0)" class="product-title">{{$pro->title}}
                        <span class="badge badge-warning float-right">{{$pro->price}}</span></a>
                      <span class="product-description">
                        {{$pro->description}}
                      </span>
                    </div>
                  </li>
                  @endforeach
                 
                </ul>
              </div>
              <!-- /.card-body -->
              <div class="card-footer text-center">
                <a href="/admin/project_status/{{$status=1}}" class="uppercase">جميع المشاريع</a>
              </div>
              <!-- /.card-footer -->
            </div>
            <!-- /.card -->
          </section>
          <!-- right col -->
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

@endsection
