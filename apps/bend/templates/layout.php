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
    <body style="padding-top: 70px;">
        <?php if ($sf_user->isAuthenticated()): ?>
            <nav class="navbar navbar-default navbar-fixed-top">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <a class="navbar-brand" href="<?php echo url_for('@homepage') ?>"><b style="color: burlywood">Панель управления </b></a>
                    </div>
                    <div id="navbar" class="navbar-collapse collapse">
                        <ul class="nav navbar-nav">
                            <li><a href="<?php echo url_for('news/index') ?>">Новости</a></li>
                            <li><a href="<?php echo url_for('album/index') ?>">Фотоальбомы</a></li>
                            <li><a href="<?php echo url_for('video/index') ?>">Видео</a></li>
                            <li><a href="<?php echo url_for('add_info/index') ?>">Дополнительная информация</a></li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Обращения<span class="caret"></span></a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="<?php echo url_for('anketa/index') ?>">Заявки на вступления в САУ</a></li>
                                    <li class="divider"></li>
                                    <li><a href="<?php echo url_for('question/index') ?>">Другие обращения</a></li>
                                </ul>
                            </li>
                        </ul>
                        
                        <ul class="nav navbar-nav navbar-right">
                            <li><a href="<?php echo url_for('@homepage') ?>">На главную</a></li>
                            <li><a href="<?php echo url_for('@logout') ?>">Выйти</a></li>
                        </ul>
                    </div><!--/.nav-collapse -->
                </div><!--/.container-fluid -->
            </nav>
        <?php endif ?>
        <?php echo $sf_content ?>
    </body>
</html>
