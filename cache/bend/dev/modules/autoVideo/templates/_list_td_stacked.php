<td colspan="3">
  <?php echo __('%%title%% - %%created_at%% - %%updated_at%%', array('%%title%%' => $Video->getTitle(), '%%created_at%%' => false !== strtotime($Video->getCreatedAt()) ? format_date($Video->getCreatedAt(), "f") : '&nbsp;', '%%updated_at%%' => false !== strtotime($Video->getUpdatedAt()) ? format_date($Video->getUpdatedAt(), "f") : '&nbsp;'), 'messages') ?>
</td>
