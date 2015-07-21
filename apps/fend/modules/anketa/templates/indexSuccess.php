<?php use_javascript('https://www.google.com/recaptcha/api.js') ?>
<?php use_javascript('/js/jquery.maskedinput.min.js') ?>
<?php use_javascript('/js/inputs.js') ?>
<?php use_javascript('/js/headMenu/Anketa.js') ?>

<div class="main organization">			
    <h2>Вступление в САУ</h2>
    <div class="requirements">
        <p>Членом МО может быть лицо, достигшее 14 лет, проживающее на территории Кировоградской области, независимо от гражданства, от национальной, религиозной, расовой принадлежности.</p>
        <p>Члены МО имеют равные права и несут равные обязанности</p>
    </div>
    <div class="user_form">
        <form name="anketa" method="post" action="" enctype="multipart/form-data">
            <?php echo $anketa->renderHiddenFields() ?>
            <fieldset>
                <div class="personality">
                    <h3>Персональные данные</h3>
                    <?php if ($anketa['FIO']->hasError()): ?>
                        <div class="row masserror">
                            <label><?php echo $anketa['FIO']->renderError() ?></label>
                        </div>
                        <div class="row">
                            <label for="anketa_FIO">Фамилия Имя Отчество *</label>
                            <?php echo $anketa['FIO']->render(array('class' => 'form-control, error', 'required' => 'true')) ?>
                        </div> 
                    <?php else: ?>
                        <div class="row">
                            <label for="anketa_FIO">Фамилия Имя Отчество *</label>
                            <?php echo $anketa['FIO']->render(array('class' => 'form-control', 'placeholder'=>'Иванов Иван Иванович', 'required' => 'true')) ?>
                        </div>                       
                    <?php endif ?>

                    <?php if ($anketa['birthday']->hasError()): ?>
                        <div class="row masserror">
                            <label><?php echo $anketa['birthday']->renderError() ?></label>
                        </div>
                        <div class="row">
                            <label for="anketa_birthday">Дата рождения *</label>
                            <?php echo $anketa['birthday']->render(array('class' => 'form-control, error', 'required' => 'true')) ?>
                        </div> 
                    <?php else: ?>
                        <div class="row">
                            <label for="anketa_birthday">Дата рождения *</label>
                            <?php echo $anketa['birthday']->render(array('class' => 'form-control', 'placeholder'=>'12 декабря 1985 г.', 'required' => 'true')) ?>
                        </div>                       
                    <?php endif ?>

                    <?php if ($anketa['sex']->hasError()): ?>
                        <div class="row masserror">
                            <label><?php echo $anketa['sex']->renderError() ?></label>
                        </div>
                        <div class="row">
                            <label for="anketa_sex">Пол *</label>
                            <?php echo $anketa['sex']->render(array('class' => 'form-control, error', 'required' => 'true')) ?>
                        </div> 
                    <?php else: ?>
                        <div class="row">
                            <label for="anketa_sex">Пол *</label>
                            <?php echo $anketa['sex']->render(array('class' => 'form-control', 'placeholder'=>'мужчина/женщина', 'required' => 'true')) ?>
                        </div>                       
                    <?php endif ?>

                    <?php if ($anketa['family']->hasError()): ?>
                        <div class="row masserror">
                            <label><?php echo $anketa['family']->renderError() ?></label>
                        </div>
                        <div class="row">
                            <label for="anketa_family">Семейное положение *</label>
                            <?php echo $anketa['family']->render(array('class' => 'form-control, error', 'required' => 'true')) ?>
                        </div> 
                    <?php else: ?>
                        <div class="row">
                            <label for="anketa_family">Семейное положение *</label>
                            <?php echo $anketa['family']->render(array('class' => 'form-control', 'placeholder'=>'замужем(женат) / не замужем(не женат)','required' => 'true')) ?>
                        </div>                       
                    <?php endif ?>

                    <?php if ($anketa['image']->hasError()): ?>
                        <div class="row masserror">
                            <label><?php echo $anketa['image']->renderError() ?></label>
                        </div>
                        <div class="row">
                            <label for="anketa_image">Ваше фото *</label>
                            <?php echo $anketa['image']->render(array('class' => 'form-control, error', 'required' => 'true')) ?>
                        </div> 
                    <?php else: ?>
                        <div class="row">
                            <label for="anketa_image">Ваше фото </br>( размер до 2Mb, .jpeg ) *</label>
                            <?php echo $anketa['image']->render(array('class' => 'form-control', 'required' => 'true')) ?>
                        </div>                       
                    <?php endif ?>
                </div>
                <div class="contacts_info">
                    <h3>Контактная информация</h3>									
                    <?php if ($anketa['adress']->hasError()): ?>
                        <div class="row masserror">
                            <label><?php echo $anketa['adress']->renderError() ?></label>
                        </div>
                        <div class="row">
                            <label for="anketa_adress">Адрес *</label>
                            <?php echo $anketa['adress']->render(array('class' => 'form-control, error', 'required' => 'true')) ?>
                        </div> 
                    <?php else: ?>
                        <div class="row">
                            <label for="anketa_adress">Адрес *</label>
                            <?php echo $anketa['adress']->render(array('class' => 'form-control','placeholder'=>'16872 г. Кировоград, ул. Карла Маркса, 22б, кв. 12', 'required' => 'true')) ?>
                        </div>                       
                    <?php endif ?>

                    <?php if ($anketa['phone']->hasError()): ?>
                        <div class="row masserror">
                            <label><?php echo $anketa['phone']->renderError() ?></label>
                        </div>
                        <div class="row">
                            <label for="anketa_phone">Контактный телефон *</label>
                            <?php echo $anketa['phone']->render(array('class' => 'form-control, error', 'id'=>'anketaphone', 'required' => 'true')) ?>
                        </div> 
                    <?php else: ?>
                        <div class="row">
                            <label for="anketa_phone">Контактный телефон *</label>
                            <?php echo $anketa['phone']->render(array('class' => 'form-control','id'=>'anketaphone', 'placeholder'=>'+38(056) 999-99-99', 'required' => 'true')) ?>
                        </div>                       
                    <?php endif ?>

                    <?php if ($anketa['email']->hasError()): ?>
                        <div class="row masserror">
                            <label><?php echo $anketa['email']->renderError() ?></label>
                        </div>
                        <div class="row">
                            <label for="anketa_email">E-mail *</label>
                            <?php echo $anketa['email']->render(array('class' => 'form-control, error', 'required' => 'true')) ?>
                        </div> 
                    <?php else: ?>
                        <div class="row">
                            <label for="anketa_email">E-mail *</label>
                            <?php echo $anketa['email']->render(array('class' => 'form-control', 'placeholder'=>'myemail@mail.com', 'required' => 'true')) ?>
                        </div>                       
                    <?php endif ?>

                </div>
                <div class="additional">
                    <h3>Дополнительная информация</h3>				

                    <?php if ($anketa['edu']->hasError()): ?>
                        <div class="row masserror">
                            <label><?php echo $anketa['edu']->renderError() ?></label>
                        </div>
                        <div class="row">
                            <label for="anketa_edu">Образование *</label>
                            <?php echo $anketa['edu']->render(array('class' => 'form-control, error', 'required' => 'true')) ?>
                        </div> 
                    <?php else: ?>
                        <div class="row">
                            <label for="anketa_edu">Образование *</label>
                            <?php echo $anketa['edu']->render(array('class' => 'form-control', 'placeholder'=>'высшее', 'required' => 'true')) ?>
                        </div>                       
                    <?php endif ?>

                    <?php if ($anketa['work']->hasError()): ?>
                        <div class="row masserror">
                            <label><?php echo $anketa['work']->renderError() ?></label>
                        </div>
                        <div class="row">
                            <label for="anketa_work">Место работы *</label>
                            <?php echo $anketa['work']->render(array('class' => 'form-control, error', 'required' => 'true')) ?>
                        </div> 
                    <?php else: ?>
                        <div class="row">
                            <label for="anketa_work">Место работы *</label>
                            <?php echo $anketa['work']->render(array('class' => 'form-control','placeholder'=>'ЗАО "Електросиситемы", директор', 'required' => 'true')) ?>
                        </div>                       
                    <?php endif ?>

                    <?php if ($anketa['message']->hasError()): ?>
                        <div class="row masserror">
                            <label><?php echo $anketa['message']->renderError() ?></label>
                        </div>
                        <div class="row">
                            <label for="anketa_message">Сообщение *</label>
                            <?php echo $anketa['message']->render(array('class' => 'form-control, error', 'required' => 'true')) ?>
                        </div> 
                    <?php else: ?>
                        <div class="row">
                            <label for="anketa_message">Сообщение *</label>
                            <?php echo $anketa['message']->render(array('class' => 'form-control', 'placeholder'=>'Я хочу вступить в Союз Армян Украины по тому что....', 'required' => 'true')) ?>
                        </div>                       
                    <?php endif ?>

                </div>
                <?php if ($recaptcha == false): ?>
                    <div class="row masserror">
                        <label>Пожалуйста введите код безопасности (решите предложеную ниже задачу):</label>
                    </div>
                    <div class="row masserror">
                        <label>Код безопасности*</label>
                        <div class="g-recaptcha" data-sitekey="6LdDBwkTAAAAAG9XiXUAGjc-WfB1zMnu4xwc3-8g"></div>
                    </div>
                <?php else: ?>
                    <div class="row">
                        <label>Код безопасности *</label>
                       <div class="g-recaptcha" data-sitekey="6LdDBwkTAAAAAG9XiXUAGjc-WfB1zMnu4xwc3-8g"></div>
                    </div>                       
                <?php endif ?>

                <div class="row">
                    <input type="submit" class="submit button" value="Вступить в организацию">
                </div>
            </fieldset>
        </form>
    </div>
</div> 


