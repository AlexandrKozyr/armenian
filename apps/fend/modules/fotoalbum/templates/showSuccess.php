

<?php use_javascript('/js/jquery.jcarousel.min.js') ?>
<?php use_javascript('/js/jcarousel.connected-carousels.js') ?>
<?php use_javascript('/js/jquery.bpopup.min.js') ?>

<div class="main album">
    <div class="breadcrumbs">
        <a href="<?php echo url_for('@homepage') ?>">Главная</a>
        <a href="<?php echo url_for('@fotoalbum-index?page=1') ?>">Фотогалерея</a>
        <a class="active" href="<?php echo url_for('@fotoalbum-show?id=' . $curAlbum->getId()) ?>">Фотоальбом &#171;<?php echo $curAlbum->getTitle() ?>&#187;</a>
    </div>
    <h2>Фотоальбом &#171;<?php echo $curAlbum->getTitle() ?>&#187;</h2>
    <div class="item">
        <span class="date"><?php echo substr($curAlbum->getCreatedAt(), 0, 10) ?></span>
        <span class="time"><?php echo substr($curAlbum->getCreatedAt(), 11, 5) ?></span>
    </div>
    <div class="connected-carousels">
        <div class="carousel_wrap">
            <div class="navigation">
                <a href="#" class="prev prev-navigation">&lsaquo;</a>
                <a href="#" class="next next-navigation">&rsaquo;</a>
                <div class="carousel carousel-navigation">
                    <ul>
                        <?php foreach ($listOfImg as $img): ?>
                            <li><img src="<?php echo url_for('@image-resize?x=120&y=80&hash=' . $img[0]) ?>" width="120" height="80" alt=""></li>
                        <?php endforeach ?>
                    </ul>
                </div>
            </div>
            <div class="stage">
                <div class="carousel carousel-stage">
                    <ul>
                        <?php foreach ($listOfImg as $img): ?>

                            <li>
                                <div class="carousel_div">
                                    <?php if (is_string($img[1])): ?>
                                        <?php echo $img[1] ?>
                                    <?php else: ?>
                                        <?php echo 'Изображение ' . $curAlbum->getTitle() ?>
                                    <?php endif ?>
                                </div> 
                                <img src="<?php echo url_for('@image-resize?x=780&y=519&hash=' . $img[0]) ?>" width="780" height="519" alt="">
                            </li>
                        <?php endforeach ?>
                    </ul>
                </div>
                <a href="#" class="prev prev-stage"><span>&lsaquo;</span></a>
                <a href="#" class="next next-stage"><span>&rsaquo;</span></a>
            </div>
            <div class="count">
                <span class="current">1/</span>
                <span class="total"></span>
            </div>
        </div>
    </div>

</div>
