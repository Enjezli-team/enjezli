@extends('website.layouts.master')

@section('content')
<script>
  var current_user={{ Auth::user()->id }}
  console.log(current_user)
</script>
<style>
  body {
      margin-top: 20px;
  }
  /***** 1.Variables *****/
  /* ------------------ Color Pallet ------------------ */
  /***** 2.Mixins *****/
  /****************
****************
              Search Box
****************
****************/
  
  .chat-search-box {
      -webkit-border-radius: 3px 0 0 0;
      -moz-border-radius: 3px 0 0 0;
      border-radius: 3px 0 0 0;
      padding: 0.9rem 0.75rem;
  }
  
  .chat-search-box .input-group .form-control {
      -webkit-border-radius: 2px 0 0 2px;
      -moz-border-radius: 2px 0 0 2px;
      border-radius: 2px 0 0 2px;
      border-right: 0;
  }
  
  .chat-search-box .input-group .form-control:focus {
      border-right: 0;
  }
  
  .chat-search-box .input-group .input-group-btn .btn {
      -webkit-border-radius: 0 2px 2px 0;
      -moz-border-radius: 0 2px 2px 0;
      border-radius: 0 2px 2px 0;
      margin: 0;
  }
  
  .chat-search-box .input-group .input-group-btn .btn i {
      font-size: 1.2rem;
      line-height: 100%;
      vertical-align: middle;
  }
  
  @media (max-width: 767px) {
      .chat-search-box {
          display: none;
      }
  }
  /****************
****************
            Users Container
****************
****************/
  
  .users-container {
      position: relative;
      padding: 1rem 0;
      border-right: 1px solid #e6ecf3;
      height: 100%;
      display: -ms-flexbox;
      display: flex;
      -ms-flex-direction: column;
      flex-direction: column;
      background: #a9c9d0;
  }
  /****************
****************
                Users
****************
****************/
  
  .users {
      padding: 0;
  }
  
  .users .person {
      position: relative;
      width: 100%;
      padding: 10px 1rem;
      cursor: pointer;
      border-bottom: 1px solid #f0f4f8;
  }
  
  .users .person:hover {
      background-color: #ffffff;
      /* Fallback Color */
      background-image: -webkit-gradient(linear, left top, left bottom, from(#e9eff5), to(#ffffff));
      /* Saf4+, Chrome */
      background-image: -webkit-linear-gradient(right, #e9eff5, #ffffff);
      /* Chrome 10+, Saf5.1+, iOS 5+ */
      background-image: -moz-linear-gradient(right, #e9eff5, #ffffff);
      /* FF3.6 */
      background-image: -ms-linear-gradient(right, #e9eff5, #ffffff);
      /* IE10 */
      background-image: -o-linear-gradient(right, #e9eff5, #ffffff);
      /* Opera 11.10+ */
      background-image: linear-gradient(right, #e9eff5, #ffffff);
  }
  
  .users .person.active-user {
      background-color: #ffffff;
      /* Fallback Color */
      background-image: -webkit-gradient(linear, left top, left bottom, from(#f7f9fb), to(#ffffff));
      /* Saf4+, Chrome */
      background-image: -webkit-linear-gradient(right, #f7f9fb, #ffffff);
      /* Chrome 10+, Saf5.1+, iOS 5+ */
      background-image: -moz-linear-gradient(right, #f7f9fb, #ffffff);
      /* FF3.6 */
      background-image: -ms-linear-gradient(right, #f7f9fb, #ffffff);
      /* IE10 */
      background-image: -o-linear-gradient(right, #f7f9fb, #ffffff);
      /* Opera 11.10+ */
      background-image: linear-gradient(right, #f7f9fb, #ffffff);
  }
  
  .users .person:last-child {
      border-bottom: 0;
  }
  
  .users .person .user {
      display: inline-block;
      position: relative;
      margin-right: 10px;
  }
  
  .users .person .user img {
      width: 48px;
      height: 48px;
      -webkit-border-radius: 50px;
      -moz-border-radius: 50px;
      border-radius: 50px;
  }
  
  .users .person .user .status {
      width: 10px;
      height: 10px;
      -webkit-border-radius: 100px;
      -moz-border-radius: 100px;
      border-radius: 100px;
      background: #e6ecf3;
      position: absolute;
      top: 0;
      right: 0;
  }
  
  .users .person .user .status.online {
      background: #9ec94a;
  }
  
  .users .person .user .status.offline {
      background: #c4d2e2;
  }
  
  .users .person .user .status.away {
      background: #f9be52;
  }
  
  .users .person .user .status.busy {
      background: #fd7274;
  }
  
  .users .person p.name-time {
      font-weight: 600;
      font-size: .85rem;
      display: inline-block;
  }
  
  .users .person p.name-time .time {
      font-weight: 400;
      font-size: .7rem;
      text-align: right;
      color: #8796af;
  }
  
  @media (max-width: 767px) {
      .users .person .user img {
          width: 30px;
          height: 30px;
      }
      .users .person p.name-time {
          display: none;
      }
      .users .person p.name-time .time {
          display: none;
      }
  }
  /****************
****************
            Chat right side
****************
****************/
  
  .selected-user {
      width: 100%;
      padding: 0 15px;
      min-height: 64px;
      line-height: 64px;
      border-bottom: 1px solid #e6ecf3;
      -webkit-border-radius: 0 3px 0 0;
      -moz-border-radius: 0 3px 0 0;
      border-radius: 0 3px 0 0;
  }
  
  .selected-user span {
      line-height: 100%;
  }
  
  .selected-user span.name {
      font-weight: 700;
  }
  
  .chat-container {
      position: relative;
      padding: 1rem;
  }
  
  .chat-container li.chat-left,
  .chat-container li.chat-right {
      display: flex;
      flex: 1;
      flex-direction: row;
      margin-bottom: 40px;
  }
  
  .chat-container li img {
      width: 48px;
      height: 48px;
      -webkit-border-radius: 30px;
      -moz-border-radius: 30px;
      border-radius: 30px;
  }
  
  .chat-container li .chat-avatar {
      margin-right: 20px;
  }
  
  .chat-container li.chat-right {
      justify-content: flex-end;
  }
  
  .chat-container li.chat-right>.chat-avatar {
      margin-left: 20px;
      margin-right: 0;
  }
  
  .chat-container li .chat-name {
      font-size: .75rem;
      color: #999999;
      text-align: center;
  }
  
  .chat-container li .chat-text {
      padding: .4rem 1rem;
      -webkit-border-radius: 4px;
      -moz-border-radius: 4px;
      border-radius: 4px;
      background: #ffffff;
      font-weight: 300;
      line-height: 150%;
      position: relative;
  }
  
  .chat-container li .chat-text:before {
      content: '';
      position: absolute;
      width: 0;
      height: 0;
      top: 10px;
      left: -20px;
      border: 10px solid;
      border-color: transparent #ffffff transparent transparent;
  }
  
  .chat-container li.chat-right>.chat-text {
      text-align: right;
  }
  
  .chat-container li.chat-right>.chat-text:before {
      right: -20px;
      border-color: transparent transparent transparent #ffffff;
      left: inherit;
  }
  
  .chat-container li .chat-hour {
      padding: 0;
      margin-bottom: 10px;
      font-size: .75rem;
      display: flex;
      flex-direction: row;
      align-items: center;
      justify-content: center;
      margin: 0 0 0 15px;
  }
  
  .chat-container li .chat-hour>span {
      font-size: 16px;
      color: #9ec94a;
  }
  
  .chat-container li.chat-right>.chat-hour {
      margin: 0 15px 0 0;
  }
  
  @media (max-width: 767px) {
      .chat-container li.chat-left,
      .chat-container li.chat-right {
          flex-direction: column;
          margin-bottom: 30px;
      }
      .chat-container li img {
          width: 32px;
          height: 32px;
      }
      .chat-container li.chat-left .chat-avatar {
          margin: 0 0 5px 0;
          display: flex;
          align-items: center;
      }
      .chat-container li.chat-left .chat-hour {
          justify-content: flex-end;
      }
      .chat-container li.chat-left .chat-name {
          margin-left: 5px;
      }
      .chat-container li.chat-right .chat-avatar {
          order: -1;
          margin: 0 0 5px 0;
          align-items: center;
          display: flex;
          justify-content: right;
          flex-direction: row-reverse;
      }
      .chat-container li.chat-right .chat-hour {
          justify-content: flex-start;
          order: 2;
      }
      .chat-container li.chat-right .chat-name {
          margin-right: 5px;
      }
      .chat-container li .chat-text {
          font-size: .8rem;
      }
  }
  
  .chat-form {
      padding: 15px;
      width: 100%;
      left: 0;
      right: 0;
      bottom: 0;
      background-color: #ffffff;
      border-top: 1px solid white;
  }
  
  ul {
      list-style-type: none;
      margin: 0;
      padding: 0;
  }
  
  .card {
      border: 0;
      background: #a9c9d047;
      -webkit-border-radius: 2px;
      -moz-border-radius: 2px;
      border-radius: 2px;
      margin-bottom: 2rem;
      box-shadow: none;
  }
  
  .send_btn {
      margin-top: 12px;
      width: 143px;
      height: 38px;
      border-radius: 0.25rem;
      outline: none;
      border: none;
      color: white;
      background: #176c80;
      cursor: pointer;
      /* margin: 19px 39%; */
      float: right;
  }
  
  .btn-info {
      color: #000;
      background-color: #ffffff;
      border-color: #ffffff;
      padding-bottom: 23px;
      border: none;
      text-align: center;
      display: flex;
      justify-content: center
  }
  
  .btn-check:focus+.btn-info,
  .btn-info:focus {
      color: #e7f0f2;
      background-color: #176c80;
      border-color: #176c80;
      box-shadow: none;
  }
  
  .form-control:focus {
      color: #212529;
      background-color: #fff;
      border-color: white;
      outline: 0;
      box-shadow: none;
  }
  
  .btn-info:hover {
      color: #fff;
      background-color: #176c80;
      border-color: #176c80;
  }
</style>
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<div class="container">

    <!-- Page header start -->
    <div class="page-title">
        <div class="row gutters">
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                <!-- <h5 class="title">Chat App</h5> -->
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12"> </div>
        </div>
    </div>
    <!-- Page header end -->

    <!-- Content wrapper start -->
    <div class="content-wrapper">

        <!-- Row start -->
        <div class="row gutters">

            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">

                <div class="card m-0">

                    <!-- Row start -->
                    <div class="row no-gutters">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="selected-user">
                                <!-- <span>To: <span class="name">Emily Russell</span></span> -->
                            </div>
                             @role('Admin')
                             <a href="{{route('chats_solve',$project_id)}}"><button style="color:black ;border:none" type='submit '
                                class="note">تم  حل المشكله</button></a>
                             @endrole
                           
                                                            <div class="chat-container">
                                <ul class="chat-box chatContainerScroll" id="chat_body">
                                   
                                    @foreach($chat as $data)
                                    <span style="display: none" id="receiver">{{ $data->receiver_chat->id}}</span>
                                    <span style="display: none" id="receiver2">{{ $data->receiver_chat2->id}}</span>
                                    <span style="display: none" id="receiver3">{{ $data->sender_chat->id}}</span>
                               
                                    @if(Auth::user()->id==$data->sender_id)
                                    <li class="chat-left">
                                        <div class="chat-avatar">
                                            <img src="https://www.bootdey.com/img/Content/avatar/avatar3.png" alt="Retail Admin">
                                            @if($data->sender_chat)<div class="chat-name">{{$data->sender_chat->name}}</div>@endif
                                        </div>
                                        <div class="chat-text">  {{$data->message}}</div>
                                        <div class="chat-hour">{{$data->created_at}}<span class="fa fa-check-circle"></span></div>
                                     </li>
                                    @elseif(Auth::user()->id==$data->receiver_id1)
                                    <li class="chat-right">
                                        <div class="chat-hour">{{$data->created_at}} <span class="fa fa-check-circle"></span></div>
                                        <div class="chat-text">  {{$data->message}}</div>
                                        <div class="chat-avatar">
                                        

                                            <img src="https://www.bootdey.com/img/Content/avatar/avatar3.png" alt="Retail Admin">
                                            <div class="chat-name">{{$data->receiver_chat->name}}</div>
                                        </div>
                                    </li>
                                    @elseif(Auth::user()->id==$data->receiver_id2)
                                    <li class="chat-right">
                                        <div class="chat-hour">{{$data->created_at}} <span class="fa fa-check-circle"></span></div>
                                        <div class="chat-text">  {{$data->message}}</div>
                                        <div class="chat-avatar">
                                        

                                            <img src="https://www.bootdey.com/img/Content/avatar/avatar3.png" alt="Retail Admin">
                                            <div class="chat-name">{{$data->receiver_chat2->name}}</div>
                                        </div>
                                    </li>
                                    @endif
                                    @endforeach
                                </ul>
                                @if($type==2)
                                    <div class="form-group mt-3 mb-0">
                                        <textarea class="form-control" rows="3" id="chatMassage" placeholder="Type your message here..."></textarea>
                                    </div>
                                  <button type="button" class="send_btn" onclick="send({{$project_id}})">إرسال</button>
                                @endif
                            </div>
                        </div>
                        

                    </div>
                    <!-- Row end -->
                </div>

            </div>

        </div>
        <!-- Row end -->

    </div>
    <!-- Content wrapper end -->

</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/docsearch.js@2/dist/cdn/docsearch.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script src="https://js.pusher.com/7.0/pusher.min.js"></script>
<script>
  var d = new Date();

var month = d.getMonth()+1;
var day = d.getDate();

var output = d.getFullYear() + '/' +
  (month<10 ? '0' : '') + month + '/' +
  (day<10 ? '0' : '') + day;

    $.ajaxSetup({
  headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});
    function send(id)
    {
        var receiver=$('#receiver').text();
        var receiver2=$('#receiver2').text();
        var receiver3=$('#receiver3').text();
        var message=$('#chatMassage').val();
        $.ajax('/chatSend', 
{
  data:{'receiver_id':receiver,'receiver_id2':receiver2,'receiver_id3':receiver3,'message':message,'id':id},
  success: function (data,status,xhr) {   // success callback function
    $('#chatMassage').val('');

  }
});
    }
  Pusher.logToConsole = true;
  var pusher = new Pusher('eb2a94bfb75ea010bb8a', {
    // encrypted: true
    cluster: 'mt1'
  });
     var channel = pusher.subscribe('chatProblem');
  var user="{{(Auth::user())?Auth::user()->id:0}}";
  channel.bind('chatProblem', function(data) {
      console.log(data)
      var n_body = $("#chat_body");
      user_name=""
      user_image=""
        if(current_user==data.sender_id ){
                                       
                                          
                                         
            var html='<li class="chat-left">'+
            '  <div class="chat-avatar">'+
            '<img src="https://www.bootdey.com/img/Content/avatar/avatar3.png" alt="Retail Admin"><div class="chat-name">'+data.sender_name+'</div> '+
            '<div class="chat-text">'+data.message+'</div>'+
            '<div class="chat-hour">'+output+'<span class="fa fa-check-circle"></span></div>'+
            '</div> </li>';
                    }
 
        else if(current_user==data.receiver_id1){
                var html =' <li class="chat-right">'+
                    ' <div class="chat-text">'+data.message+'</div> <div class="chat-avatar">'+
                         ' <img src="https://www.bootdey.com/img/Content/avatar/avatar3.png" alt="Retail Admin">'+
                         ' <div class="chat-name">'+data.recever_name1+'</div><div class="chat-hour">'+output+' <span class="fa fa-check-circle"></span></div> </div> </li>';
        }
        else if(current_user==data.receiver_id2){
                var html =' <li class="chat-right">'+
                    ' <div class="chat-text">'+data.message+'</div> <div class="chat-avatar">'+
                         ' <img src="https://www.bootdey.com/img/Content/avatar/avatar3.png" alt="Retail Admin">'+
                         ' <div class="chat-name">'+data.recever_name2+'</div><div class="chat-hour">'+output+' <span class="fa fa-check-circle"></span></div> </div> </li>';
        }
        
    n_body.append(html);
    $('#chatMassage').val('');
    
  });
</script>
 @endsection