<?php use_helper('I18N', 'Date') ?>
<?php include_partial('news/assets') ?>

<div id="sf_admin_container">
  <h1><?php echo __('Редактирование новости "%%Title%%"', array('%%Title%%' => $News->getTitle()), 'messages') ?></h1>

  <?php include_partial('news/flashes') ?>

  <div id="sf_admin_header">
    <?php include_partial('news/form_header', array('News' => $News, 'form' => $form, 'configuration' => $configuration)) ?>
  </div>

  <div id="sf_admin_content">
    <?php include_partial('news/form', array('News' => $News, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?>
  </div>

  <div id="sf_admin_footer">
    <?php include_partial('news/form_footer', array('News' => $News, 'form' => $form, 'configuration' => $configuration)) ?>
  </div>
</div>
