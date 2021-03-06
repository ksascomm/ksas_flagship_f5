//Offcanvas menu
(function(w) {
  var $z = jQuery.noConflict();
  var $container = $z('.offcanvas-top');
  var $cHeightMax = $z('.o-content').outerHeight();
  
  $z(".off-canvas-submenu").hide();
  var $cHeightMin = $z('.o-content').outerHeight();

  $z(document).ready(function() {
    buildCanvas();
  });

  function buildCanvas() {
    $z(".off-canvas-submenu-call").click(function() {
      var icon = $z(this).parent().next(".off-canvas-submenu").is(':visible') ? '+' : '-';
      var $subMenu = $z(this).parent().next(".off-canvas-submenu");

      $z(this).find("span").text(icon);

      if ($subMenu.css('display') === 'none') {
        $container.height($cHeightMax);
        $subMenu.slideToggle('fast');
      } else {
        $container.height($cHeightMin);
        $subMenu.slideToggle('fast');
      }

    });

    $z('<a class="blue_bg button" href="#" id="trigger">Explore KSAS</a>').appendTo($container);

    $z('#trigger').bind('click', function(e) {
      e.preventDefault();
      var $this = $z(this);
      $container.toggleClass('active');
      if ($container.hasClass('active')) {
        $container.height($cHeightMin);
       $z('.o-content').show();
        $this.text('Hide');
      } else {
        $container.height(50);
        $z('.o-content').hide();
        $this.text('Explore KSAS');
        $z(".off-canvas-submenu").hide();
        $z(".off-canvas-submenu-call span").text('+');
      }
    });

  }

})(this);