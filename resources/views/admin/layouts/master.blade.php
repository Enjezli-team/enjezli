
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Enjezli | Dashboard</title>
  <link href="{{ asset('user_dash_assets/css/nucleo-icons.css') }}" rel="stylesheet" />
  <link href="{{ asset('user_dash_assets/css/nucleo-svg.css') }}" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="{{ asset('user_dash_assets/css/nucleo-svg.css') }}" rel="stylesheet" />
  <!-- CSS Files -->
  <link id="pagestyle" href="{{ asset('user_dash_assets/css/soft-ui-dashboard.css') }}?v=1.0.3" rel="stylesheet" />
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('admin/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="{{asset('admin/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{asset('admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{asset('admin/plugins/jqvmap/jqvmap.min.css')}}">
  <!-- Theme style -->

  <link rel="stylesheet" href="{{asset('admin/dist/css/adminlte.min.css')}}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{asset('admin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{asset('admin/plugins/daterangepicker/daterangepicker.css')}}">

  <link rel="stylesheet" href="{{asset('admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('admin/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">

  <!-- Select2 -->
  <link rel="stylesheet" href="{{asset('admin/plugins/select2/css/select2.min.css')}}">
  <link rel="stylesheet" href="{{asset('admin/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{asset('admin/plugins/summernote/summernote-bs4.min.css')}}">
  <link rel="stylesheet" href="https://cdn.rtlcss.com/bootstrap/v4.2.1/css/bootstrap.min.css">
   <!-- rtl css -->
   <link rel="stylesheet" href="{{asset('admin/rtlCSS/custom.css')}}">
    <!-- rtl style -->
    <link rel="stylesheet" href="{{asset('admin/rtlCSS/style.css')}}">

</head>
<body class="hold-transition sidebar-mini layout-fixed " dir="rtl">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="{{asset('admin/images/logo.png')}}" alt="انجز لي " height="70" width="60">
  </div>

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light" style="margin-left: 0px;">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="index3.html" class="nav-link">تقارير</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav  d-flex justify-content-end"  style="margin-right: 80%;">
      <!-- Navbar Search -->


      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown ">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-comments"></i>
          <span class="badge badge-danger navbar-badge" style="font-size: 58%;">3</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Brad Diesel
                  <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">Call me whenever you can...</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  John Pierce
                  <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">I got your message bro</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Nora Silvester
                  <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">The subject goes here</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
        </div>
      </li>
      <!-- Notifications Dropdown Menu -->
      {{-- <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge" style="font-size: 58%;">15</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">15 Notifications</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> 4 new messages
            <span class="float-right text-muted text-sm">3 mins</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-users mr-2"></i> 8 friend requests
            <span class="float-right text-muted text-sm">12 hours</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-file mr-2"></i> 3 new reports
            <span class="float-right text-muted text-sm">2 days</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
      </li> --}}
       <li class="nav-item dropdown ps-2 d-flex align-items-center">
        <a href="javascript:;" class="nav-link text-body p-0" id="dropdownMenuButton"
            data-bs-toggle="dropdown" aria-expanded="false">
            <i class="fa fa-bell cursor-pointer" aria-hidden="true"></i>
            <span class="badge badge-pill badge-default badge-danger text-dark badge-default badge-up badge-glow   notif-count" data-count=" {{ $notifications->count()}}">
                {{ $notifications->count()}}
              </span>
        </a>
        <ul class="dropdown-menu  px-2 py-3 me-sm-n4" id="notify_body" aria-labelledby="dropdownMenuButton">
            @forelse ($notifications as $item)
            <li class="mb-2">
                <a class="dropdown-item border-radius-md" href="{{$item->body}}">
                    <div class="d-flex py-1">
                        <div class="my-auto">
                            <img src="{{asset('images/'.Auth::user()->image )}}" class="avatar avatar-sm  ms-3 ">
                        </div>
                        <div class="d-flex flex-column justify-content-center">
                            <h6 class="text-sm font-weight-normal mb-1">
                                <span class="font-weight-bold"> {{ $item->message }} </span> {{Auth::user()->name }}
                            </h6>
                            <p class="text-xs text-secondary mb-0 ms-auto">
                                <i class="fa fa-clock me-1" aria-hidden="true"></i>
                                {{ $item->created_at }}                                            </p>
                        </div>
                    </div>
                </a>
            </li>
            @empty
            @endforelse
        </ul>
    </li>

    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4" >
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{asset('images/logo.png')}}" alt="" class="brand-image  elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">انجزلي</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{Auth::user()->image}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{Auth::user()->name}}</a>
        </div>
      </div>


      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                المستخدمين
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/admin/users" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>عرض الكل</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/admin/users/create" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>اضافة جديد</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                 المهارات
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/admin/skills" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>عرض الكل</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/admin/skills/create" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p> اضافة جديد</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="/admin/providers" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                المزودين
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="/admin/seekers" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                طالبي الخدمات
              </p>
            </a>

          </li>

          <li class="nav-item">
            <a href="/admin/projects" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                 المشاريع
                <i class="right fas fa-angle-left"></i>

              </p>
            </a>
            {{-- حالة المشروع
            @if ($item->status == 1)
                <span>مفتوح</span>
             @elseif($item->status == 0)
            <span>: معلق </span>
            @elseif($item->status == 2)
            <span>قيد التنفيذ </span>
            @elseif($item->status == 3)
            <span>تم التسليم</span>
            @elseif($item->status == 4)
            <span>لا يتلقى عروض</span>
            @elseif($item->status == 5)
            <span>مغلق</span>
            @endif --}}
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/admin/project_status/{{$status=1}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>مفتوح </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/admin/project_status/{{$status=1-1}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p> معلق </p>
                </a>
              </li>
            
              <li class="nav-item">
                <a href="/admin/project_status/{{$status=2}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p> قيد التنفيذ  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/admin/project_status/{{$status=3}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p> قيد التسليم  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/admin/project_status/{{$status=4}}"class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>لا يتلقى عروض  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/admin/project_status/{{$status=5}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>مغلق</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="/admin/offers" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                احدث العروض
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/admin/offer_status/{{$status=1}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>تم اختيارها </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/admin/offer_status/{{$status=0}}"  class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>  تم الالغاء</p>
                </a>
              </li>
           
            </ul>
          </li>
          <li class="nav-item">
            <a href="/admin/complains" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                 الشكاوي
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>  لم يتم حلها </p>
                </a>
              </li>

              <li class="nav-item">
                <a href="" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>تم الحل </p>
                </a>
              </li>
           
           
            </ul>
          </li>
          <li class="nav-item">
            <a href="/admin/complains" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                 التعليقات

              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/admin/complains" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                 التقيمات
              </p>
            </a>
          </li>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
  <main>
  <div class="content-wrapper" style="margin-left: 0px;">
    <!-- Content Header (Page header) -->
    <div class="content-header">
                @yield('side')
                {{-- here --}}
    </div>
  </div>
            </main>
 <!-- /.content-wrapper -->
 <footer class="main-footer">
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.1.0
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{asset('admin/plugins/jquery/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{asset('admin/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{asset('admin/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- ChartJS -->
<script src="{{asset('admin/plugins/chart.js/Chart.min.js')}}"></script>
<!-- Sparkline -->
<script src="{{asset('admin/plugins/sparklines/sparkline.js')}}"></script>
<!-- JQVMap -->
<script src="{{asset('admin/plugins/jqvmap/jquery.vmap.min.js')}}"></script>
<script src="{{asset('admin/plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
<!-- jQuery Knob Chart -->
<script src="{{asset('admin/plugins/jquery-knob/jquery.knob.min.js')}}"></script>
<!-- daterangepicker -->
<script src="{{asset('admin/plugins/moment/moment.min.js')}}"></script>
<script src="{{asset('admin/plugins/daterangepicker/daterangepicker.js')}}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{asset('admin/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
<!-- Summernote -->
<script src="{{asset('admin/plugins/summernote/summernote-bs4.min.js')}}"></script>
<!-- overlayScrollbars -->
<script src="{{asset('admin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('admin/dist/js/adminlte.js')}}"></script>
<!-- AdminLTE for demo purposes -->

<script src="{{asset('admin/plugins/datatables/jquery.dataTables.min.js')}}"></script>
  <script src="{{asset('admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
  <script src="{{asset('admin/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
  <script src="{{asset('admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
  <script src="{{asset('admin/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
  <script src="{{asset('admin/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
  <script src="{{asset('admin/plugins/select2/js/select2.full.min.js')}}"></script>

<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{asset('admin/dist/js/pages/dashboard.js')}}"></script>
<script>
    $(function () {
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
      });

       //Initialize Select2 Elements
    $('.select2').select2()
    });
  </script>
  <script src={{ asset('user_dash_assets/js/core/popper.min.js') }}></script>
  <script src={{ asset('user_dash_assets/js/core/bootstrap.min.js') }}></script>
  <script src={{ asset('user_dash_assets/js/plugins/perfect-scrollbar.min.js') }}></script>
  <script src={{ asset('user_dash_assets/js/plugins/smooth-scrollbar.min.js') }}></script>
  <script src={{ asset('user_dash_assets/js/plugins/fullcalendar.min.js') }}></script>
  <script src={{ asset('user_dash_assets/js/plugins/chartjs.min.js') }}></script>

  <script src={{ asset('user_dash_assets/js/plugins/choices.min.js') }}></script>

  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/docsearch.js@2/dist/cdn/docsearch.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://js.pusher.com/7.0/pusher.min.js"></script>
    <script>
        let user="{{{(Auth::user()) ? Auth::user()->id : 0 }}}";
        let src="{{asset('images/'.Auth::user()->image )}}";
        let user_name=  "{{Auth::user()->name }}";
    </script>
    <script src="{{ asset('js/realtime_notification.js') }}" ></script>
</body>
</html>
