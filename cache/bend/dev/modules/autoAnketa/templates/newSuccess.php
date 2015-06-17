<?php use_helper('I18N', 'Date') ?>
<?php include_partial('anketa/assets') ?>

<div id="sf_admin_container">
  <h1><?php echo __('Новая анкета', array(), 'messages') ?></h1>

  <?php include_partial('anketa/flashes') ?>

  <div id="sf_admin_header">
    <?php include_partial('anketa/form_header', array('Anketa' => $Anketa, 'form' => $form, 'configuration' => $configuration)) ?>
  </div>

  <div id="sf_admin_content">
    <?php include_partial('anketa/form', array('Anketa' => $Anketa, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?>
  </div>

  <div id="sf_admin_footer">
    <?php include_partial('anketa/form_footer', array('Anketa' => $Anketa, 'form' => $form, 'configuration' => $configuration)) ?>
  </div>
</div>
