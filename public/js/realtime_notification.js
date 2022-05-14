
  
Pusher.logToConsole = true;
var pusher = new Pusher('eb2a94bfb75ea010bb8a', {
    // encrypted: true
    cluster: 'mt1'
});
alert(user)
 var notificationsWrapper   = $('.dropdown-notifications');
  var notificationsCountElem = notificationsWrapper.find('span[data-count]');
  var notificationsCount     = parseInt(notificationsCountElem.data('count'));
  
  var channel = pusher.subscribe('salman');
  // var users = (Auth::user())?Auth::user()->id:0;
    channel.bind('salman', function(data) {

      if (data.receiver_id == user) {
        alert("id")
        var n_body = $("#notify_body");
        var html='<li class="notification active"><div class="media"><div class="media-left"><div class="media-object">'+
             '<h5><a href="'+data.link+'" class="nav-link"></a></h5>'+
            '</div></div><div class="media-body"> <strong class="notification-title" id="messege">'+
              data.message+'</strong><div class="notification-meta">'+
            '</div></div></div></li>';
        n_body.prepend(html);
      
        notificationsCount += 1;
    notificationsCountElem.attr('data-count', notificationsCount);
    notificationsWrapper.find('.notif-count').text(notificationsCount);
    notificationsWrapper.show();
  console.log(JSON.stringify(data.message));
      }
    });
// channel.bind('salman', function(data) {
//   if(data.receiver_id=={{ Auth::user()->receiver_id }}){
//  var n_body=$("#notify_body");
//  var n_mess=JSON.stringify(data.message);
//   n_body.prepend(n_mess);
//  var fi =document.getElementByreceiver_id('counter_notify').innerHTML;
//          fi=n_mess;
//         document.getElementByreceiver_id('counter_notify').innerHTML = fi; 

// notificationsCount += 1;
//     notificationsCountElem.attr('data-count', notificationsCount);
//     notificationsWrapper.find('.notif-count').text(notificationsCount);
//     notificationsWrapper.show();
//   console.log(JSON.stringify(data.message));
//   alert(JSON.stringify(data.receiver_id+data.message));
// }
// });