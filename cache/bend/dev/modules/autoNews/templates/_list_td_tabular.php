<td class="sf_admin_text sf_admin_list_td_title">
  <?php echo $News->getTitle() ?>
</td>
<td class="sf_admin_date sf_admin_list_td_created_at">
  <?php echo false !== strtotime($News->getCreatedAt()) ? format_date($News->getCreatedAt(), "f") : '&nbsp;' ?>
</td>
<td class="sf_admin_date sf_admin_list_td_updated_at">
  <?php echo false !== strtotime($News->getUpdatedAt()) ? format_date($News->getUpdatedAt(), "f") : '&nbsp;' ?>
</td>
