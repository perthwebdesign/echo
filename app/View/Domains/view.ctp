<div class="domains view">
<h2><?php  echo __('Domain');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($domain['Domain']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Site'); ?></dt>
		<dd>
			<?php echo $this->Html->link($domain['Site']['name'], array('controller' => 'sites', 'action' => 'view', $domain['Site']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Company'); ?></dt>
		<dd>
			<?php echo h($domain['Domain']['company']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($domain['Domain']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Current Response'); ?></dt>
		<dd>
			<?php echo h($domain['Domain']['current_response']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Ip Address'); ?></dt>
		<dd>
			<?php echo h($domain['Domain']['ip_address']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($domain['Domain']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Updated'); ?></dt>
		<dd>
			<?php echo h($domain['Domain']['updated']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Domain'), array('action' => 'edit', $domain['Domain']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Domain'), array('action' => 'delete', $domain['Domain']['id']), null, __('Are you sure you want to delete # %s?', $domain['Domain']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Domains'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Domain'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Sites'), array('controller' => 'sites', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Site'), array('controller' => 'sites', 'action' => 'add')); ?> </li>
	</ul>
</div>
