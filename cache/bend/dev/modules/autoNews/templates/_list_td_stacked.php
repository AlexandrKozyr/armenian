<td colspan="3">
  <?php echo __('%%title%% - %%created_at%% - %%updated_at%%', array('%%title%%' => $News->getTitle(), '%%created_at%%' => false !== strtotime($News->getCreatedAt()) ? format_date($News->getCreatedAt(), "f") : '&nbsp;', '%%updated_at%%' => false !== strtotime($News->getUpdatedAt()) ? format_date($News->getUpdatedAt(), "f") : '&nbsp;'), 'messages') ?>
</td>
