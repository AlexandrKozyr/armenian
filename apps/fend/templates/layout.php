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
                    <h1><a class="logo" href="<?php echo url_for('@homepage') ?>">Союз армян Украины Кировоград</a>
                        <a class="logo_samu" href="http://samu.net.ua/">Союз армянской молодежи Украины</a></h1>
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
							<a class="footer_logo" href=""></a>
							<a class="mail" href="">http://samu.net.ua</a>
						</div>
					</div>
					<div class="footer_right">
						<h5>Связаться с нами</h5>
						<form action="#">
							<fieldset>							
								<div class="client">
									<div class="row">
										<input type="text" value="Фамилия Имя Отчество"/>
									</div>
									<div class="row">
										<input type="text" value="E-mail"/>
									</div>
									<div class="row">
										<input type="text" value="Телефон"/>
									</div>
								</div>
								<textarea name="message">Текст сообщения</textarea>
								<div class="row">
									<input type="submit" class="submit button form-list" value="Отправить"/>
								</div>
							</fieldset>
						</form>						
					</div>
				</div>
			</div>
			<div class="footer_bottom">
				<span>&copy; 2015 Кировоградская областная армянская молодежная община &#34;ТАРОН&#34;. Все права защищены.</span>
			</div>
		</footer>

        </body>
</html>
