<td colspan="4">
  <?php echo __('%%FIO%% - %%phone%% - %%email%% - %%created_at%%', array('%%FIO%%' => $Anketa->getFio(), '%%phone%%' => $Anketa->getPhone(), '%%email%%' => $Anketa->getEmail(), '%%created_at%%' => false !== strtotime($Anketa->getCreatedAt()) ? format_date($Anketa->getCreatedAt(), "f") : '&nbsp;'), 'messages') ?>
</td>
