<td>
  <ul class="sf_admin_td_actions">
    <?php echo $helper->linkToEdit($Album, array(  'label' => 'Редактировать',  'params' =>   array(  ),  'class_suffix' => 'edit',)) ?>
    <?php echo $helper->linkToDelete($Album, array(  'label' => 'Удалить',  'params' =>   array(  ),  'confirm' => 'Are you sure?',  'class_suffix' => 'delete',)) ?>
  </ul>
</td>