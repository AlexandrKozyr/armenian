<td class="sf_admin_text sf_admin_list_td_title">
  <?php echo $Video->getTitle() ?>
</td>
<td class="sf_admin_date sf_admin_list_td_created_at">
  <?php echo false !== strtotime($Video->getCreatedAt()) ? format_date($Video->getCreatedAt(), "f") : '&nbsp;' ?>
</td>
<td class="sf_admin_date sf_admin_list_td_updated_at">
  <?php echo false !== strtotime($Video->getUpdatedAt()) ? format_date($Video->getUpdatedAt(), "f") : '&nbsp;' ?>
</td>
