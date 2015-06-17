
<div class="container">

    <form class="form-signin" role="form" method="post" action="<?php echo url_for('default/login') ?>">
        <h3 class="form-signin-heading"><b>Авторизация</b></h3>
        <input type="text" class="form-control" placeholder="Логин" required autofocus name="nog">
        <input type="password" class="form-control" placeholder="Пароль" required name="dro">
        <button class="btn btn-lg btn-primary btn-block" type="submit">Войти</button>
    </form>

</div> <!-- /container -->