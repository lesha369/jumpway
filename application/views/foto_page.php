<!-- Portfolio -->
<section id="Portfolio" class="content">

    <!-- Container -->
    <div class="container portfolio-title">

        <!-- Section Title -->
        <div class="section-title">
            <h2>&nbsp;</h2>
            <h2>Фото и видео</h2>
            <h3>Жизнь нашего зала. Стань его частью </h3>

            <?php

            $i = imageCreate(200, 300);
            $color = imageColorAllocate($i, 255, 255, 0);
            imageFilledRectangle($i, 0, 0, imageSX($i), imageSY($i), $color);
            Header("Content-type: image/jpeg");
            imageJpeg($i);
            imageDestroy($i);

            ?>

        </div>
        <!--/Section Title -->

    </div>
    <!-- Container -->

    <!--/Project Page Holder-->

</section>
<!--/Portfolio -->