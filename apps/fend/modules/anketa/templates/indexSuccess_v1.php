<?php use_javascript('https://www.google.com/recaptcha/api.js') ?>

<div class="main organization">			
    <h2>Вступление в САУ</h2>
    <div class="requirements">
        <p>Членом МО может быть лицо, достигшее 14 лет, проживающее на территории Кировоградской области, независимо от гражданства, от национальной, религиозной, расовой принадлежности.</p>
        <p>Члены МО имеют равные права и несут равные обязанности</p>
    </div>
    <div class="user_form">
        <form name="anketa" method="post" action="<?php echo url_for('@anketa') ?>" enctype="multipart/form-data">
            <?php echo $anketa->renderHiddenFields() ?>
            <fieldset>
                <div class="personality">
                    <h3>Персональные данные</h3>
                    <div class="row">
                        <label for="FIO">Фамилия Имя Отчество *</label>
                        <input type="text" required="" id="FIO" name="FIO" value="">
                    </div>					
                    <div class="row">
                        <label for="birthday">Дата рождения *</label>
                        <input type="text" required="" id="birthday" name="birthday" value="">
                    </div>				
                    <div class="row">
                        <label>Пол *</label>
                        <div class="radio_wrap">
                            <input type="radio" required="" checked="checked" name="sex" id="man" value="man">
                            <label for="man">мужской</label>
                            <input type="radio" required="" name="sex" id="woman" value="woman">
                            <label for="woman">женский</label>
                        </div>
                    </div>				
                    <div class="row">
                        <label>Семейное положение *</label>
                        <div class="radio_wrap">
                            <input type="radio" class="radio" checked="checked" name="family" id="married" value="married">
                            <label for="married">замужем / женат</label>
                            <input type="radio" class="radio" name="family" id="not_married" value="not_married">
                            <label for="not_married">не замужем / не женат</label>
                        </div>
                    </div>									
                    <div class="row">
                        <label for="photo">Ваше фото *</label>
                        <?php if ($anketa['image']->hasError()): ?>

                            <?php echo $anketa['image']->renderError() ?>
                            <input type="file" class="error" required="" id="photo" name="image">
                        <?php else: ?>
                            <input type="file" required="" id="photo" name="image">
                        <?php endif ?>
                        <div class="file_wrap">

                        </div>
                    </div>
                </div>
                <div class="contacts_info">
                    <h3>Контактная информация</h3>									
                    <div class="row">
                        <label for="zip">Адрес *</label>
                        <input type="textarea" required="" id="zip" name="adress" value="">
                    </div>				
                    <div class="row">
                        <label for="phone">Контактный телефон *</label>
                        <input type="text" required="" id="pnohe" name="phone" value="">
                    </div>				

                    <div class="row">
                        <label for="email">E-mail *</label>
                        <input type="text" required="" id="email" name="email" value="">
                    </div>
                </div>
                <div class="additional">
                    <h3>Дополнительная информация</h3>				
                    <div class="row">
                        <label>Образование *</label>
                        <div class="radio_wrap">
                            <input type="radio" class="radio" checked="checked" name="edu" id="higher_edu" value="высшее">
                            <label for="higher_edu">высшее</label>
                            <input type="radio" class="radio" name="edu" id="secondary_edu" value="среднее">
                            <label for="secondary_edu">среднее</label>
                            <br><input type="radio" class="radio" name="edu" id="secondary_edu_p" value="средне-специальное">
                            <label for="secondary_edu_p">среднее специальное</label>
                        </div>
                    </div>
                    <div class="row">
                        <label for="job">Место работы *</label>
                        <input type="textarea" required="" id="job" name="work" value="">
                    </div>	
                    <div class="row">
                        <label for="office">Сообщение *</label>
                        <input type="textarea" required="" id="office" name="message" value="">
                    </div>	
                </div>
                <div class="row">
                    <div class="g-recaptcha" data-sitekey="6LdDBwkTAAAAAG9XiXUAGjc-WfB1zMnu4xwc3-8g"></div>
                </div>	
                <div class="row">
                    <input type="submit" class="submit button" value="Вступить в организацию">
                </div>
            </fieldset>
        </form>
    </div>
</div>