<td class="sf_admin_text sf_admin_list_td_FIO">
  <?php echo $Anketa->getFio() ?>
</td>
<td class="sf_admin_text sf_admin_list_td_phone">
  <?php echo $Anketa->getPhone() ?>
</td>
<td class="sf_admin_text sf_admin_list_td_email">
  <?php echo $Anketa->getEmail() ?>
</td>
<td class="sf_admin_date sf_admin_list_td_created_at">
  <?php echo false !== strtotime($Anketa->getCreatedAt()) ? format_date($Anketa->getCreatedAt(), "f") : '&nbsp;' ?>
</td>
