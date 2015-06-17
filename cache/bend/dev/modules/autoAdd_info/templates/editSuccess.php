<?php use_helper('I18N', 'Date') ?>
<?php include_partial('add_info/assets') ?>

<div id="sf_admin_container">
  <h1><?php echo __('Редактирование "%%Title%%"', array('%%Title%%' => $AddInfo->getTitle()), 'messages') ?></h1>

  <?php include_partial('add_info/flashes') ?>

  <div id="sf_admin_header">
    <?php include_partial('add_info/form_header', array('AddInfo' => $AddInfo, 'form' => $form, 'configuration' => $configuration)) ?>
  </div>

  <div id="sf_admin_content">
    <?php include_partial('add_info/form', array('AddInfo' => $AddInfo, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?>
  </div>

  <div id="sf_admin_footer">
    <?php include_partial('add_info/form_footer', array('AddInfo' => $AddInfo, 'form' => $form, 'configuration' => $configuration)) ?>
  </div>
</div>
