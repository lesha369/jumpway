
<footer class="footer_section" id="contact">
    <div class="container">
        <div class="footer_bottom"> <span>Copyright © 2018  <a href="http://hack-dag.ru">HacK-DaG</a>. </span> </div>
    </div>
</footer>
<script type="text/javascript">
    $(document).ready(function(e) {
        $('#header_outer').scrollToFixed();
        $('.res-nav_click').click(function(){
            $('.main-nav').slideToggle();
            return false

        });

    });
</script>
<script>
    wow = new WOW(
        {
            animateClass: 'animated',
            offset:       100
        }
    );
    wow.init();
    document.getElementById('').onclick = function() {
        var section = document.createElement('section');
        section.className = 'wow fadeInDown';
        section.className = 'wow shake';
        section.className = 'wow zoomIn';
        section.className = 'wow lightSpeedIn';
        this.parentNode.insertBefore(section, this);
    };
</script>
<script type="text/javascript">
    $(window).load(function(){

        $('a').bind('click',function(event){
            var $anchor = $(this);

            $('html, body').stop().animate({
                scrollTop: $($anchor.attr('href')).offset().top - 91
            }, 1500,'easeInOutExpo');
            /*
             if you don't want to use the easing effects:
             $('html, body').stop().animate({
             scrollTop: $($anchor.attr('href')).offset().top
             }, 1000);
             */
            event.preventDefault();
        });
    })
</script>
<div id="sh_button" class="shc sh_btn sh_btn_right sh_btn_right_bottom">
    <div class="shc sh_title_text" rel="title">
        <a href="<?=WEB_SERVER?>/main/raspisanie">
        <div class="shc sh_btn_char">Р </div>
        <div class="shc sh_btn_char">А </div>
        <div class="shc sh_btn_char">С </div>
        <div class="shc sh_btn_char">П </div>
        <div class="shc sh_btn_char">И </div>
        <div class="shc sh_btn_char">С </div>
        <div class="shc sh_btn_char">А </div>
        <div class="shc sh_btn_char">Н </div>
        <div class="shc sh_btn_char">И </div>
        <div class="shc sh_btn_char">Е </div>
        </a>
    </div>

</div>

<!--<script type="text/javascript">

$(window).load(function(){


  var $container = $('.portfolioContainer'),
      $body = $('body'),
      colW = 350,
      columns = null;


  $container.isotope({
    // disable window resizing
    resizable: true,
    masonry: {
      columnWidth: colW
    }
  });

  $(window).smartresize(function(){
    // check if columns has changed
    var currentColumns = Math.floor( ( $body.width() -30 ) / colW );
    if ( currentColumns !== columns ) {
      // set new column count
      columns = currentColumns;
      // apply width to container manually, then trigger relayout
      $container.width( columns * colW )
        .isotope('reLayout');
    }

  }).smartresize(); // trigger resize to set container width
  $('.portfolioFilter a').click(function(){
        $('.portfolioFilter .current').removeClass('current');
        $(this).addClass('current');

        var selector = $(this).attr('data-filter');
        $container.isotope({

            filter: selector,
         });
         return false;
    });

});

</script>


-->
</body>
</html>