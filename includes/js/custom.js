jQuery(document).ready(function() {

    /*-----------------------------------------------------------------------------------*/
    /*	Responsive Menu
     /*-----------------------------------------------------------------------------------*/
    $(window).resize(function() {
        if ($("#primary-nav").width() > 700) {
            $("#responsive-menu").hide();
        }

    });

    $(".btn-nav-left").click(function() {
        $("#responsive-menu").slideToggle(300);
    });


    $('#twitter').sharrre({
  share: {
    twitter: true
  },
  template: '<a class="box" href="#"><div class="count" href="#">{total}</div><div class="share"><span></span>Tweet</div></a>',
  enableHover: false,
  enableTracking: true,
  buttons: { twitter: {via: '_JulienH'}},
  click: function(api, options){
    api.simulateClick();
    api.openPopup('twitter');
  }
});
$('#facebook').sharrre({
  share: {
    facebook: true
  },
  template: '<a class="box" href="#"><div class="count" href="#">{total}</div><div class="share"><span></span>Like</div></a>',
  enableHover: false,
  enableTracking: true,
  click: function(api, options){
    api.simulateClick();
    api.openPopup('facebook');
  }
});
$('#googleplus').sharrre({
  share: {
    googlePlus: true
  },
  template: '<a class="box" href="#"><div class="count" href="#">{total}</div><div class="share"><span></span>Google+</div></a>',
  enableHover: false,
  enableTracking: true,
  click: function(api, options){
    api.simulateClick();
    api.openPopup('googlePlus');
  }
});
});