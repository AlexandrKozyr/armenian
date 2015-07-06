<?php use_helper('I18N', 'Date') ?>
<?php include_partial('album/assets') ?>

<div id="sf_admin_container">
  <h1><?php echo __('Редактирование альбома "%%Title%%"', array('%%Title%%' => $Album->getTitle()), 'messages') ?></h1>

  <?php include_partial('album/flashes') ?>

  <div id="sf_admin_header">
    <?php include_partial('album/form_header', array('Album' => $Album, 'form' => $form, 'configuration' => $configuration)) ?>
  </div>

  <div id="sf_admin_content">
    <?php include_partial('album/form', array('Album' => $Album, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?>
  </div>

  <div id="sf_admin_footer">
    <?php include_partial('album/form_footer', array('Album' => $Album, 'form' => $form, 'configuration' => $configuration)) ?>
  </div>
</div>
