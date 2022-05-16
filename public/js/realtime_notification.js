
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
Pusher.logToConsole = true;
var pusher = new Pusher('eb2a94bfb75ea010bb8a', {
    // encrypted: true
    cluster: 'mt1'
});
// alert(user)
 var notificationsWrapper   = $('.align-items-center');
  var notificationsCountElem = notificationsWrapper.find('span[data-count]');
  var notificationsCount     = parseInt(notificationsCountElem.data('count'));
  
  var channel = pusher.subscribe('salman');
  // var users = (Auth::user())?Auth::user()->id:0;
    channel.bind('salman', function(data) {

      if (data.receiver_id == user) {
        
        var n_body = $("#notify_body");
        var html='<li class="mb-2"> <a class="dropdown-item border-radius-md" href="'+data.link+'">'+
                '<div class="d-flex py-1"><div class="my-auto">'+
                  '<img src="'+src+'" class="avatar avatar-sm  ms-3 "></div>'+
                   ' <div class="d-flex flex-column justify-content-center"> <h6 class="text-sm font-weight-normal mb-1"><span class="font-weight-bold">'+
              data.message+'</span>'+user_name+'</h6><p class="text-xs text-secondary mb-0 ms-auto">'+
           ' <i class="fa fa-clock me-1" aria-hidden="true"></i>'+output+           
             ' </p> </div></div> </a> </li>';
        n_body.prepend(html);
      
        notificationsCount += 1;
    notificationsCountElem.attr('data-count', notificationsCount);
    notificationsWrapper.find('.notif-count').text(notificationsCount);
    notificationsWrapper.show();
  console.log(JSON.stringify(data.message));
      }
    });
