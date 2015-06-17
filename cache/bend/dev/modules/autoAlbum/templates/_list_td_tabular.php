<td class="sf_admin_text sf_admin_list_td_id">
  <?php echo link_to($Album->getId(), 'album_edit', $Album) ?>
</td>
<td class="sf_admin_text sf_admin_list_td_title">
  <?php echo $Album->getTitle() ?>
</td>
<td class="sf_admin_date sf_admin_list_td_created_at">
  <?php echo false !== strtotime($Album->getCreatedAt()) ? format_date($Album->getCreatedAt(), "f") : '&nbsp;' ?>
</td>
<td class="sf_admin_date sf_admin_list_td_updated_at">
  <?php echo false !== strtotime($Album->getUpdatedAt()) ? format_date($Album->getUpdatedAt(), "f") : '&nbsp;' ?>
</td>
