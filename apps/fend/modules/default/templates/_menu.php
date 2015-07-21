
<ul class="header_menu">
    <li 
         <?php if (is_int(strpos($rout, 'news'))):?>
        class="active"
        <?php endif?>
        >
        <div class="top_line"></div>
        <a href="<?php echo url_for('@news-index?page=1') ?>">Новости</a>
        <div class="bottom_line"></div>
    </li>
    <li class="dropdown 
        <?php if (is_int(strpos($rout, 'fotoalbum'))|| is_int(strpos($rout, 'video'))):?>
        active
        <?php endif?>
        " id="galli">
        <div class="top_line"></div>
        <a href="<?php echo url_for('@fotoalbum-index?page=1') ?>">Галерея</a>
        <div class="bottom_line"></div>
        <div class="drop">
            <ul>
                <li><a href="<?php echo url_for('@fotoalbum-index?page=1') ?>">Фотогалерея</a></li>
                <li><a href="<?php echo url_for('@video-index?page=1') ?>">Видео</a></li>
            </ul>
        </div>
    </li>
    <li 
         <?php if (is_int(strpos($rout, 'about'))):?>
        class="active"
        <?php endif?>
        >
        <div class="top_line"></div>
        <a href="<?php echo url_for('@about') ?>">О нас</a>
        <div class="bottom_line"></div>
    </li>
    <li 
         <?php if (is_int(strpos($rout, 'anketa'))):?>
        class="active"
        <?php endif?>
        >
        <div class="top_line"></div>
        <a href="<?php echo url_for('@anketa') ?>">Вступление в САУ</a>
        <div class="bottom_line"></div>
    </li>
</ul>