<?php

class myValidatorImage extends sfValidatorBase {

    protected function configure($options = array(), $messages = array()) {
        $this->addOption('mime_types', array(
            'image/jpeg',
            'image/png',
            'image/bmp',
        ));
        $this->addMessage('mime_types', 'Вы загружаете не допустимый формат файла!
                Поддерживаемые форматы  - .jpeg, .png, .bmp');

        $this->addOption('picture_size', array(
            5242880
        ));
        $this->addMessage('picture_size', 'Ваше изображение слишком большого размера!
                Убедитесь что ваш файл не больше 5 Мб');
    }

    protected function doClean($value) {
//     if we got an image at our form we will use our validators
        
        if ($value['size'] > 0) {
            $this->validatePictureSize($value['size']);
            $this->validatePictureMimeType($value['type']);
        }
        return $validatedValue = $value;
        
    }

//this function check did our image got our secure mime_types from declared option
// on line 5 this file
    protected function validatePictureMimeType($currentPictureMimeType) {
        $mimeTypes = $this->getOption('mime_types');
             
        if (false == in_array(strtolower($currentPictureMimeType), $mimeTypes)) {
            throw new sfValidatorError($this, $this->getMessage('mime_types'));
        }
    }

//this function check did our image is not large then definded at line 13
    protected function validatePictureSize($currentPictureSize) {

        $p_size = $this->getOption('picture_size');
        if ($p_size[0] < $currentPictureSize ) {
            throw new sfValidatorError($this, $this->getMessage('picture_size'));
        }
    }

}
