<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, maximum-scale=1">
    <title>Homepage</title>
    <link rel="icon" href="/favicon.png" type="image/png">
    <link href="/css/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="/css/style.css" rel="stylesheet" type="text/css">
    <link href="/css/linecons.css" rel="stylesheet" type="text/css">
    <link href="/css/font-awesome.css" rel="stylesheet" type="text/css">
    <link href="/css/responsive.css" rel="stylesheet" type="text/css">
    <link href="/css/animate.css" rel="stylesheet" type="text/css">

    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">




    <link href='http://fonts.googleapis.com/css?family=Lato:400,900,700,700italic,400italic,300italic,300,100italic,100,900italic' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Dosis:400,500,700,800,600,300,200' rel='stylesheet' type='text/css'>

    <!--[if IE]><style type="text/css">.pie {behavior:url(PIE.htc);}</style><![endif]-->

    <script type="text/javascript" src="/js/jquery.1.8.3.min.js"></script>
    <script type="text/javascript" src="/js/bootstrap.js"></script>
    <script type="text/javascript" src="/js/jquery-scrolltofixed.js"></script>
    <script type="text/javascript" src="/js/jquery.easing.1.3.js"></script>
    <script type="text/javascript" src="/js/jquery.isotope.js"></script>
    <script type="text/javascript" src="/js/wow.js"></script>
    <script type="text/javascript" src="/js/classie.js"></script>

    <!--[if lt IE 9]>
    <script src="/js/respond-1.1.0.min.js"></script>
    <script src="/js/html5shiv.js"></script>
    <script src="/js/html5element.js"></script>
    <![endif]-->
    <script src="/css/bootstrap-formhelpers-phone.js"></script>
    <script type="text/javascript">
        $(document).ready(function(e) {
            $('.res-nav_click').click(function(){
                $('ul.toggle').slideToggle(600)
            });

            $(document).ready(function() {
                $(window).bind('scroll', function() {
                    if ($(window).scrollTop() > 0) {
                        $('#header_outer').addClass('fixed');
                    }
                    else {
                        $('#header_outer').removeClass('fixed');
                    }
                });

            });


        });
        function resizeText() {
            var preferredWidth = 767;
            var displayWidth = window.innerWidth;
            var percentage = displayWidth / preferredWidth;
            var fontsizetitle = 25;
            var newFontSizeTitle = Math.floor(fontsizetitle * percentage);
            $(".divclass").css("font-size", newFontSizeTitle)
        }
    </script>
</head>
<body>

<!--Header_section-->
<header id="header_outer">
    <div class="row">
        <div class="col-lg-1 hidden-xs hidden-sm"><div class="logo"><a href="<?=WEB_SERVER;?>/main"><img src="/img/logojw.png"  alt=""></a></div></div>
        <div class="col-lg-8 col-sm-12 col-xs-12">
            <div class="header_section">

                <nav class="nav" id="nav">
                    <ul class="toggle">
                        <li><a href="#top_content">Главная</a></li>
                        <li><a href="#service">Фото</a></li>
                        <li><a href="#work_outer">Запись на тренировку</a></li>
                        <li><a href="#client_outer">Расписание и цены</a></li>
                        <li><a href="#Portfolio">Контакты</a></li>
                    </ul>
                    <ul class="">
                        <li><a href="<?=WEB_SERVER;?>/main">Главная</a></li>
                        <li><a href="<?=WEB_SERVER;?>/main/sport">Спорт</a></li>
                        <li><a href="<?=WEB_SERVER;?>/main/hollidays">Праздники</a></li>
                        <li><a href="<?=WEB_SERVER;?>/main/trainers">Команда</a></li>
                        <li><a href="<?=WEB_SERVER;?>/main/actions">Мероприятия и акции</a></li>
                        <li><a href="<?=WEB_SERVER;?>/main/raspisanie">Расписание и цены</a></li>
                        <li><a href="<?=WEB_SERVER;?>/main/foto">Галерея</a></li>
                        <li><a href="<?=WEB_SERVER;?>/main/about">Контакты</a></li>

                    </ul>
                </nav>
                <a class="res-nav_click animated wobble wow"  href="javascript:void(0)"><i class="fa-bars"></i></a> </div>
        </div>
        <div class="col-lg-3 hidden-xs hidden-sm">
            <div class="logo_info alert-warning"><span class="glyphicon glyphicon-earphone"></span> +7 (495) 118-22-12<br><small><span class="glyphicon glyphicon-home"></span> г.Мытищи, Коммунистическая ул. д.1, ТЦ XL-3</small></div>
        </div>
    </div>
</header>
<!--Header_section-->
<div class="container portfolio-title" style="height: 600px">
    <h1>&nbsp;</h1><h1>&nbsp;</h1>
    <!-- Section Title -->
    <div class="section-title alert alert-warning">
        <h2><?php echo $heading; ?></h2>
        <h3 class="text-center"><?php echo $message; ?> (Страница не найдена)</h3>

    </div>
    <!--/Section Title -->

</div>

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