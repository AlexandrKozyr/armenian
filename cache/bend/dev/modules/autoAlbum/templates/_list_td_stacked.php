<td colspan="4">
  <?php echo __('%%id%% - %%title%% - %%created_at%% - %%updated_at%%', array('%%id%%' => link_to($Album->getId(), 'album_edit', $Album), '%%title%%' => $Album->getTitle(), '%%created_at%%' => false !== strtotime($Album->getCreatedAt()) ? format_date($Album->getCreatedAt(), "f") : '&nbsp;', '%%updated_at%%' => false !== strtotime($Album->getUpdatedAt()) ? format_date($Album->getUpdatedAt(), "f") : '&nbsp;'), 'messages') ?>
</td>
