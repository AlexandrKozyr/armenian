<?php use_helper('I18N', 'Date') ?>
<?php include_partial('album/assets') ?>

<div id="sf_admin_container">
  <h1><?php echo __('Фотоальбомы', array(), 'messages') ?></h1>

  <?php include_partial('album/flashes') ?>

  <div id="sf_admin_header">
    <?php include_partial('album/list_header', array('pager' => $pager)) ?>
  </div>


  <div id="sf_admin_content">
    <?php include_partial('album/list', array('pager' => $pager, 'sort' => $sort, 'helper' => $helper)) ?>
    <ul class="sf_admin_actions">
      <?php include_partial('album/list_batch_actions', array('helper' => $helper)) ?>
      <?php include_partial('album/list_actions', array('helper' => $helper)) ?>
    </ul>
  </div>

  <div id="sf_admin_footer">
    <?php include_partial('album/list_footer', array('pager' => $pager)) ?>
  </div>
</div>
