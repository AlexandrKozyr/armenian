<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
        <?php include_http_metas() ?>
        <?php include_metas() ?>
        <?php include_title() ?>
        <link rel="shortcut icon" href="/favicon.png" />
        <?php include_stylesheets() ?>
        <?php include_javascripts() ?>
    </head>
    <body>
        <body>	
            <header>
                <div class="header_holder">
                    <h1>
                        <a class="logo" href="<?php echo url_for('@homepage') ?>">Союз армян Украины Кировоград</a>
                    </h1>
                    <ul class="header_menu">
                        <li>
                            <div class="top_line"></div>
                            <a href="<?php echo url_for('@news-index?page=1') ?>">Новости</a>
                            <div class="bottom_line"></div>
                        </li>
                        <li class="dropdown">
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
                        <li>
                            <div class="top_line"></div>
                            <a href="<?php echo url_for('@about') ?>">О нас</a>
                            <div class="bottom_line"></div>
                        </li>
                        <li>
                            <div class="top_line"></div>
                            <a href="<?php echo url_for('@anketa') ?>">Вступление в САУ</a>
                            <div class="bottom_line"></div>
                        </li>
                    </ul>
                </div>
            </header>

            <?php echo $sf_content ?>

            <footer>
                <div class="footer_top">
                    <div class="footer_holder">
                        <div class="footer_left">
                            <div class="contacts">
                                <h5>Контакты</h5>
                                <span class="address">Украина, г. Кировоград 25006,
                                    ул. Дворцовая 13, офис №200</span>
                                <span>0504596999</span>
                                <span>0504591999</span>
                                <a class="mail" href="">saukr@yandex.ua</a>
                            </div>
                            <div class="info">
                                <ul class="sprites">
                                    <li><a class="odnoklassniki" href="">odnoklassniki</a>
                                        <li><a class="vk" href="">vk</a>
                                            <li><a class="twitter" href="">twitter</a>
                                                <li><a class="facebook" href="">facebook</a>
                                                    </ul>

                                                    </div>
                            
                                                    </div>
                        
                                                    <div class="footer_right">
                                                        <div class="contacts">
                                                            <h5>Наши партнеры :</h5>
                                                        </div>
                                                        <a class="footer_logo logo_sau"  target="_blank" href="http://sau.net.ua/"></a>
                                                        <a class="footer_logo logo_samu" target="_blank"  href="http://samu.net.ua/"></a>
                                                        <a class="footer_logo logo_samu" href="http://samu.net.ua/"></a>
                                                        <a class="footer_logo logo_samu" href="http://samu.net.ua/"></a>
                                                        <a class="footer_logo logo_samu" href="http://samu.net.ua/"></a>
                                                    </div>
                                                    </div>
                                                    </div>
                                                    <div class="footer_bottom">
                                                        <span>&copy; 2015 Кировоградская областная организация Союза армян Украины. Все права защищены.</span>
                                                    </div>
                                                    </footer>

                                                    </body>
                                                    </html>
