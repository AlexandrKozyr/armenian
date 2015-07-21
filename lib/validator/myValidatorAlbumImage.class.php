<?php

class myValidatorAlbumImage extends sfValidatorBase {

    protected function configure($options = array(), $messages = array()) {
        $this->addOption('mime_types', array(
            'image/jpeg',
            'image/png',
            'image/bmp',
        ));
        $this->addMessage('mime_types', 'Вы загружаете не допустимый формат файла!
                Поддерживаемые форматы  - .jpeg, .png, .bmp');

        $this->addOption('picture_size', array(
             2097152
        ));
        $this->addMessage('picture_size', 'Ваше изображение слишком большого размера!
                Убедитесь что ваш файл не больше 2 Мб');
    }
    /**
     * makes our checks(validation)
     * @param array $value
     * @return type
     */
    protected function doClean($value) {

        $return    = array('current' => array(), 'new' => array());
        $mimeTypes = $this->getOption('mime_types');

        foreach ($value['new']['file'] as $file) {
            if ($file['error'] == 0) {
                $this->validatePictureMimeType($file['type']);
                $this->validatePictureSize($file['size']);
                $return['new']['file'][] = $file;
            }
        }


        if (false == empty($value['new']['title'])) {
            foreach ($value['new']['title'] as $item) {
                $titleNew[] = htmlspecialchars($item);
            }
            $return['new']['title'] = $titleNew;
        }

        if (false == empty($value['current']['ids'])) {
            $return['current']['ids'] = $value['current']['ids'];

            if (false == empty($value['current']['title'])) {
                foreach ($value['current']['title'] as $item) {
                    $titleCur[] = htmlspecialchars($item);
                }
                $return['current']['title'] = $titleCur;
            }
        }
        return $return;
    }

    /**
     * this function check did our image got our secure mime_types from declared option
     * @param string $currentPictureMimeType
     * @throws sfValidatorError
     */
    protected function validatePictureMimeType($currentPictureMimeType) {
        $mimeTypes = $this->getOption('mime_types');

        if (false == in_array(strtolower($currentPictureMimeType), $mimeTypes)) {
            throw new sfValidatorError($this, $this->getMessage('mime_types'));
        }
    }

    /**
     * this function check did our image is not large then definded at options 
     * @param int $currentPictureSize
     * @throws sfValidatorError
     */
    protected function validatePictureSize($currentPictureSize) {

        $p_size = $this->getOption('picture_size');
        if ($p_size[0] < $currentPictureSize) {
            throw new sfValidatorError($this, $this->getMessage('picture_size'));
        }
    }

}
