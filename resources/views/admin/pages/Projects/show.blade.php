@extends('admin.layouts.master')
@section('side')





<section class="text-gray-600 body-font">
  <div class="container px-5 py-24 mx-auto flex flex-col">
    <div class="lg:w-4/6 mx-auto">
     
      <div class="flex flex-col sm:flex-row mt-10">
        <div class="sm:w-1/3 text-center sm:pr-8 sm:py-8">
          <div class="w-20 h-20 rounded-full inline-flex items-center justify-center bg-gray-200 text-gray-400">
            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-10 h-10" viewBox="0 0 24 24">
              <path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2"></path>
              <circle cx="12" cy="7" r="4"></circle>
            </svg>
          </div>
          <div class="flex flex-col items-center text-center justify-center">
            <h2 class="font-medium title-font mt-4 text-gray-900 text-lg">Phoebe Caulfield</h2>
            <div class="w-12 h-1 bg-indigo-500 rounded mt-2 mb-4"></div>
            <p class="text-base">Raclette knausgaard hella meggs normcore williamsburg enamel pin sartorial venmo tbh hot chicken gentrify portland.</p>
          </div>
        </div>
        <div class="sm:w-2/3 sm:pl-8 sm:py-8 sm:border-l border-gray-200 sm:border-t-0 border-t mt-4 pt-4 sm:mt-0 text-center sm:text-left">
         <div class=" flex items-start mt-4 justify-center bg-gray-200">

  <div class="bg-white p-8 rounded"> 


      <div class="flex flex-col items-center">
               
        
       </div>
    <header class="flex  text-sm text-right justify-end mt-2">
      <p class="mr-1">نظره حول المشروع</p>
      <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 rotate-90 -ml-2"  viewBox="0 0 24 24" stroke="#219EBC">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4" />
        </svg>
    </header>

    <h2 class="font-bold text-3xl mt-2 text-right">
     اسم المشروع
    </h2>
    

    <p class="mt-5 text-right"> 
      طالب الخدمة:
      <a href="#" class="text-[#219EBC]">أكاديمية رواد  </a>
    </p>

    <p class="text-right"> 
     منجز الخدمة:
      <a href="#" class="text-[#219EBC]"> سباء الشميري </a>
    </p>

    <h3 class="font-bold text-xl text-right mt-8"> وصف المشروع </h3>
    <p class="text-right"> 
     منصة إلكترونية تسهل عملية البحث عن مقدم خدمة يمتلك المهارة المناسبة لتقديم خدمة معينة ، وكذلك تسهل إيجاد فرص عمل للأشخاص الذين يمتلكون مهارات مختلفة .  تمكن المنصة طالب الخدمة من إضافة طلباته ومقدم الخدمة من التقديم لأي طلب يناسب مهاراته
     </p>


        <h3 class="font-bold text-xl text-right mt-8"> المهارات المطلوبة  </h3>
        <p class="text-right"> 
      السرعة ,الصبر , المشي على  الاسبرنت بالاضافة بوتستراب و لارافل  </p>


          <p class="mt-5 text-right"> 
              مدة التسليم 
            <a href="#" class="text-[#219EBC]"> 30 أيام  </a>
          </p>

        <p class="text-right"> 
            تاريخ التسليم :
          <a href="#" class="text-[#219EBC]"> 17 / 5 / 2022  </a>
        </p>

   

  </div>

</div>
        </div>
      </div>
    </div>
  </div>
</section>





  <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">

         
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
