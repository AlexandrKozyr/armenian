<?php

class myWidgetFormImages extends sfWidgetForm {

    protected function configure($options = array(), $attributes = array()) {
        parent::configure($options, $attributes);
        $this->setOption('needs_multipart', true);
    }

    public function render($name, $value = null, $attributes = array(), $errors = array()) {
        // генерируем часть название нашего списка в результате получим
        // в результате $id = album_images
        $widgetId = $this->generateId($name);

        // $value это данные, полученные albumForm.class.php public UpdateDefaultsFromObject()
        // и которые являются значениями полученными из БД
             
        //созаем отображение нашего массива картинок
        //массив $current[] будет содержать текущие картинки

        $current = '';
        if (false == empty($value) && isset($value['current'])) {
            $hash  = $value['current']['hash'];
            $title = $value['current']['title'];
            $ids   = $value['current']['ids'];
            
            for ($i = 0; $i < count($value['current']['hash']); $i++) {
                $current .= '
                    <li>
                        <input type=hidden name="' . $name . '[current][hash][]" value="' . $hash[$i] . '" />
                        <input type=hidden name="' . $name . '[current][ids][]" value="' . $ids[$i] . '" />
                        <img src="/uploads/200/125/' . $hash[$i] . '" / style="margin: 1em;"></br>
                        <input type=text name="' . $name . '[current][title][]" value="' . $title[$i] . '" />
                        <button type=button>-</button>
                    </li>';
            }
        }

        return '

        <ul id="widget-' . $widgetId . '">
            ' . $current .'
            <li>
                </br>
                <input type=file name="' . $name . '[new][file][]" />
                <input type=text name="' . $name . '[new][title][]" />
                <button type=button>-</button>
                <button type=button>+</button>
            </li>
        </ul>

        <script type=text/javascript>
            
            $("#widget-' . $widgetId . '").on("click", "button", function(){
                if ($(this).text() == "+") {
                    a = $(this).parent().html();
                    $("#widget-' . $widgetId . '").append("<li>" + a + "</li>");
                } else {
                parentli = $(this).parent();
                    if(!$(this).parent().is(":last-child")){
                        $(this).parent().remove();
                    }
                }
            });
        </script>

        ';
    }

}
