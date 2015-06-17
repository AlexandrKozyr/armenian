<?php use_helper('I18N', 'Date') ?>
<?php include_partial('add_info/assets') ?>

<div id="sf_admin_container">
  <h1><?php echo __('Дополнительная информация', array(), 'messages') ?></h1>

  <?php include_partial('add_info/flashes') ?>

  <div id="sf_admin_header">
    <?php include_partial('add_info/list_header', array('pager' => $pager)) ?>
  </div>


  <div id="sf_admin_content">
    <?php include_partial('add_info/list', array('pager' => $pager, 'sort' => $sort, 'helper' => $helper)) ?>
    <ul class="sf_admin_actions">
      <?php include_partial('add_info/list_batch_actions', array('helper' => $helper)) ?>
      <?php include_partial('add_info/list_actions', array('helper' => $helper)) ?>
    </ul>
  </div>

  <div id="sf_admin_footer">
    <?php include_partial('add_info/list_footer', array('pager' => $pager)) ?>
  </div>
</div>
