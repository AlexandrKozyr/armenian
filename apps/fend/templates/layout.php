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
                        <a class="logo_samu_kir" href="<?php echo url_for('@homepage') ?>">Союз армян Украины Кировоград</a>
                    </h1>
                    <?php include_component('default', 'menu') ?>
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
                                    ул. Дворцовая 13, офис №209</span>
                                <span>0504598899</span>
                                <a class="mail" href="">saukr@yandex.ua</a>
                            </div>
                            <div class="info">
                                <ul class="sprites">
                                    <li><a class="odnoklassniki" target="_blank" href="https://vk.com/armyane_kirovograda">odnoklassniki</a>
                                        <li><a class="vk" target="_blank" href="https://vk.com/armyane_kirovograda">vk</a>
                                            <li><a class="twitter" target="_blank" href="https://vk.com/armyane_kirovograda">twitter</a>
                                                <li><a class="facebook" target="_blank" href="https://vk.com/armyane_kirovograda">facebook</a>
                                                    </ul>

                                                    </div>

                                                    </div>

                                                    <div class="footer_right">
                                                        <div class="contacts">
                                                            <h5>Полезные ресурсы :</h5>
                                                        </div>
                                                        <a class="footer_logo logo_sau"  target="_blank" href="http://sau.net.ua/"></a>
                                                        <a class="footer_logo logo_samu" target="_blank"  href="http://samu.net.ua/"></a>
                                                        <a class="footer_logo logo_ambass" target="_blank"  href="http://ukraine.mfa.am/ru/"></a>
                                                    </div>
                                                    </div>
                                                    </div>
                                                    <div class="footer_bottom">
                                                        <span>&copy; 2015 Союз армян Украины. Кировоград. Все права защищены.</span>
                                                    </div>
                                                    </footer>

                                                    </body>
                                                    </html>
