<div class="domains index">
	<h2><?php echo __('Domains');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('site_id');?></th>
			<th><?php echo $this->Paginator->sort('name');?></th>
			<th><?php echo $this->Paginator->sort('current_response');?></th>
			<th><?php echo $this->Paginator->sort('ip_address');?></th>
			<th><?php echo $this->Paginator->sort('created');?></th>
			<th><?php echo $this->Paginator->sort('updated');?></th>
			<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($domains as $domain): ?>
	<tr>
		<td><?php echo h($domain['Domain']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($domain['Site']['name'], array('controller' => 'sites', 'action' => 'view', $domain['Site']['id'])); ?>
		</td>
		<td><?php echo h($domain['Domain']['name']); ?>&nbsp;</td>
		<td><?php echo h($domain['Domain']['current_response']); ?>&nbsp;</td>
		<td><?php echo h($domain['Domain']['ip_address']); ?>&nbsp;</td>
		<td><?php echo h($domain['Domain']['created']); ?>&nbsp;</td>
		<td><?php echo h($domain['Domain']['updated']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $domain['Domain']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $domain['Domain']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $domain['Domain']['id']), null, __('Are you sure you want to delete # %s?', $domain['Domain']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%')
	));
	?>	</p>

	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Domain'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Sites'), array('controller' => 'sites', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Site'), array('controller' => 'sites', 'action' => 'add')); ?> </li>
	</ul>
</div>
