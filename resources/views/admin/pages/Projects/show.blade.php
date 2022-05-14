@extends('admin.layouts.master')
@section('side')
<!-- Main content -->
  <!-- Main content -->
  <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">

            <div class="row">
              <div class="col-12 col-sm-4">
                <div class="info-box bg-light">
                  <div class="info-box-content">
                    <span class="info-box-text text-center text-muted">Estimated budget</span>
                    <span class="info-box-number text-center text-muted mb-0">2300</span>
                  </div>
                </div>
              </div>
              <div class="col-12 col-sm-4">
                <div class="info-box bg-light">
                  <div class="info-box-content">
                    <span class="info-box-text text-center text-muted">Total amount spent</span>
                    <span class="info-box-number text-center text-muted mb-0">2000</span>
                  </div>
                </div>
              </div>
              <div class="col-12 col-sm-4">
                <div class="info-box bg-light">
                  <div class="info-box-content">
                    <span class="info-box-text text-center text-muted">Estimated project duration</span>
                    <span class="info-box-number text-center text-muted mb-0">20</span>
                  </div>
                </div>
              </div>
            </div>
            </div>
            <div class="col-md-9">
              <!-- Box Comment -->
              <div class="card card-widget ">
                <div class="card-header justify-content-start">
                  <span class="username h5"><a href="#">{{$data->title}} </a></span>
                  </br>
                  <span class="description">{{$data->created_at->format('m/d/Y')}} </span>

                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <!-- post text -->
                
                  <p>{{$data->description}}</p>



                  <!-- Social sharing buttons -->
                  <button type="button" class="btn btn-default btn-sm"><i class="fas fa-clock"></i> {{$data->duration}} (أيام)</button>
                  <button type="button" class="btn btn-default btn-sm"><i class="fas fa-dollar-sign"></i>{{$data->price}} </button>
                  <span class="float-right text-muted"> عدد العروض: {{$data->sal_offers->count()}} </span>
                  
                </div>
                <!-- /.card-body -->
                <div class="card-footer card-comments">
                  <div class="card-comment d-flex justify-content-start">
                    <!-- User image -->
                    <img class="img-circle img-sm ml-3" src="{{$data->sal_created_by->image}}" alt="User Image">

                    <div class="comment-text">
                      <span class="username">

                        {{$data->sal_created_by->name}}
                        <span class="text-muted float-right">{{$data->sal_created_by->created_at->format('m/d/Y')}}</span>
                      </span><!-- /.username -->
                    {{$data->sal_created_by->email}}
                    </div>

                    <button type="button" class="btn btn-default btn-sm"><i class="fas fa-clock"></i> 15days</button>
                    <button type="button" class="btn btn-default btn-sm"><i class="fas fa-dollar-sign"></i> 300</button>
                    <!-- /.comment-text -->
                  </div>
                </div>
              </div>
              <!-- /.card -->
            </div>
            <div class="col-12 col-md-3">

              <h5 class="mt-5 text-muted">ملفات المشروع </h5>
              <ul class="list-unstyled">
                @foreach ($data->sal_project_attach as $file )
                  
                <li>
                  <a href="" class="btn-link text-secondary"><i class="far fa-fw fa-file-word"></i>{{$file->file_name}}</a>
                </li>
  
                @endforeach
              </ul>

              <h5 class="mt-5 text-muted">المهارات المطلوبة</h5>
              <ul class="list-unstyled">
                
                @forelse($data->sal_skills_by as $skill)
                
                <li>
                  <a href="" class="btn-link text-secondary"><i class="far fa-fw fa-file-word"></i>{{$skill->sal_skill->title}}</a>
                </li>
                @empty
                <div class="flex_between">
                    <div>
                        <h5 class="project_name"> لا يوجد مهارات جديدة</h5>
                    </div>
                </div>
                @endforelse
            
              </ul>

            </div>

            <div class="col-md-12">
              <!-- Box Comment -->
              <div class="card card-widget ">
                <div class="card-header justify-content-start">
                  <span class="username h5"><a href="#"> احدث العروض</a></span>
                </div>
                <!-- /.card-header -->
                <div class="card-body">

                <!-- /.card-body -->
                <div class=" card-comments">

                  <div class="card-comment d-flex  justify-content-start">
                    <!-- User image -->
                    @if (!empty($data->sal_handel_by->image))
                    <img class="img-circle img-sm ml-3" src=" {{$data->sal_handel_by->image}}" alt="User Image">

                    @else
                    <div>
                      no image
                    </div>
                    @endif
                
                    <div class="  comment-text">
                      <span class="username">
                        
                    @if (!empty($data->sal_handel_by->name))
                      {{$data->sal_handel_by->name}}
                      @else
                      no name
                      @endif
                        <br>
                        <span class="text-muted float-right">created_at</span>
                      </span><!-- /.username -->
                    {{-- {{$data->sal_offers->description}} --}}

                    @forelse($data->sal_offers as $s)
                {{$s->description}}
                    @empty
                    <div class="flex_between">
                        <div>
                            <h5 class="project_name"> لا يوجد  وصف </h5>
                        </div>
                    </div>
                    @endforelse

                    </div>
                    <div class=" d-flex comment-text">

                      
                    @forelse($data->sal_offers as $s)
                    <button type="button" class="btn btn-default btn-sm"><i class="fas fa-clock"></i>  {{$s->duration}}</button>
                        @empty
                        <div class="flex_between">
                            <div>
                                <h5 class="project_name"> لا يوجد  وقت </h5>
                            </div>
                        </div>
                        @endforelse

                        @forelse($data->sal_offers as $s)
                        <button type="button" class="btn btn-default btn-sm"><i class="fas fa-dollar-sign"></i>  {{$s->price}}</button>
                            @empty
                            <div class="flex_between">
                                <div>
                                    <h5 class="project_name"> لا يوجد  سعر </h5>
                                </div>
                            </div>
                            @endforelse

                        
                    {{-- <button type="button" class="btn btn-default btn-sm"><i class="fas fa-clock"></i> {{$data->sal_offers->duration}}</button> --}}
                    {{-- <button type="button" class="btn btn-default btn-sm"><i class="fas fa-dollar-sign"></i> {{$data->sal_offers->price}}</button> --}}
                    </div>
                    <!-- /.comment-text -->
                  </div>
                </div>
                </div>
              </div>
              <!-- /.card -->
            </div>
            <div class="col-md-6">
              <div class="card card-success card-outline direct-chat direct-chat-success">
                <div class="card-header ">
                  <h3 class="card-title text-right">الدردشة  </h3>

                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <!-- Conversations are loaded here -->
                  <div class="direct-chat-messages">
                    <!-- Message. Default to the left -->
                    <div class="direct-chat-msg">
                      <div class="direct-chat-infos clearfix">
                        <span class="direct-chat-name float-left">Alexander Pierce</span>
                        <span class="direct-chat-timestamp float-right">23 Jan 2:00 pm</span>
                      </div>
                      <!-- /.direct-chat-infos -->
                      <img class="direct-chat-img" src="dist/img/user1-128x128.jpg" alt="Message User Image">
                      <!-- /.direct-chat-img -->
                      <div class="direct-chat-text">
                        Is this template really for free? That's unbelievable!
                      </div>
                      <!-- /.direct-chat-text -->
                    </div>
                    <!-- /.direct-chat-msg -->

                    <!-- Message to the right -->
                    <div class="direct-chat-msg right">
                      <div class="direct-chat-infos clearfix">
                        <span class="direct-chat-name float-right">Sarah Bullock</span>
                        <span class="direct-chat-timestamp float-left">23 Jan 2:05 pm</span>
                      </div>
                      <!-- /.direct-chat-infos -->
                      <img class="direct-chat-img" src="dist/img/user3-128x128.jpg" alt="Message User Image">
                      <!-- /.direct-chat-img -->
                      <div class="direct-chat-text">
                        You better believe it!
                      </div>
                      <!-- /.direct-chat-text -->
                    </div>
                    <!-- /.direct-chat-msg -->
                  </div>
                  <!--/.direct-chat-messages-->

                  <!-- Contacts are loaded here -->
                  <div class="direct-chat-contacts">
                    <ul class="contacts-list">
                      <li>
                        <a href="#">
                          <img class="contacts-list-img" src="dist/img/user1-128x128.jpg" alt="User Avatar">

                          <div class="contacts-list-info">
                            <span class="contacts-list-name">
                              Count Dracula
                              <small class="contacts-list-date float-right">2/28/2015</small>
                            </span>
                            <span class="contacts-list-msg">How have you been? I was...</span>
                          </div>
                          <!-- /.contacts-list-info -->
                        </a>
                      </li>
                      <!-- End Contact Item -->
                    </ul>
                    <!-- /.contatcts-list -->
                  </div>
                  <!-- /.direct-chat-pane -->
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <form action="#" method="post">
                    <div class="input-group">
                      <input type="text" name="message" placeholder="Type Message ..." class="form-control">
                      <span class="input-group-append">
                        <button type="submit" class="btn btn-success">Send</button>
                      </span>
                    </div>
                  </form>
                </div>
                <!-- /.card-footer-->
              </div>
              <!-- /.card -->
            </div>
            <div class="col-md-6">
              <div class="card card-widget widget-user-2">
                <!-- Add the bg color to the header using any of the bg-* classes -->
                <div class="widget-user-header bg-warning">
                  <div class="widget-user-image">
                    <img class="img-circle elevation-2" src="dist/img/user7-128x128.jpg" alt="User Avatar">
                  </div>
                  <!-- /.widget-user-image -->
                  <h3 class="widget-user-username">Nadia Carmichael</h3>
                  <h5 class="widget-user-desc">project provider</h5>
                </div>
                <div class="card-footer p-0">
                  <ul class="nav flex-column">
                    <li class="nav-item">
                      <a href="#" class="nav-link">
                        Projects <span class="float-right badge bg-primary">31</span>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="#" class="nav-link">
                        Tasks <span class="float-right badge bg-info">5</span>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="#" class="nav-link">
                        Completed Projects <span class="float-right badge bg-success">12</span>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="#" class="nav-link">
                        Followers <span class="float-right badge bg-danger">842</span>
                      </a>
                    </li>
                  </ul>
                </div>
              </div>
              <!-- /.card -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
      </section>
      <!-- /.content -->
<!-- /.content -->
@endsection
