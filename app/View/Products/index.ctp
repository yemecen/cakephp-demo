<div class="products index">
	<h2><?php echo __('Products'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('description'); ?></th>
			<th><?php echo $this->Paginator->sort('brandId'); ?></th>
			<th><?php echo $this->Paginator->sort('brandName'); ?></th>
			<th><?php echo $this->Paginator->sort('categoryId'); ?></th>
			<th><?php echo $this->Paginator->sort('categoryName'); ?></th>
			<th><?php echo $this->Paginator->sort('sku'); ?></th>
			<th><?php echo $this->Paginator->sort('stock'); ?></th>
			<th><?php echo $this->Paginator->sort('tax'); ?></th>
			<th><?php echo $this->Paginator->sort('category'); ?></th>
			<th><?php echo $this->Paginator->sort('image'); ?></th>
			<th><?php echo $this->Paginator->sort('price'); ?></th>
			<th><?php echo $this->Paginator->sort('priceNot'); ?></th>
			<th><?php echo $this->Paginator->sort('created_at'); ?></th>
			<th><?php echo $this->Paginator->sort('updated_at'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($products as $product): ?>
	<tr>
		<td><?php echo h($product['Product']['id']); ?>&nbsp;</td>
		<td><?php echo h($product['Product']['name']); ?>&nbsp;</td>
		<td><?php echo h($product['Product']['description']); ?>&nbsp;</td>
		<td><?php echo h($product['Product']['brandId']); ?>&nbsp;</td>
		<td><?php echo h($product['Product']['brandName']); ?>&nbsp;</td>
		<td><?php echo h($product['Product']['categoryId']); ?>&nbsp;</td>
		<td><?php echo h($product['Product']['categoryName']); ?>&nbsp;</td>
		<td><?php echo h($product['Product']['sku']); ?>&nbsp;</td>
		<td><?php echo h($product['Product']['stock']); ?>&nbsp;</td>
		<td><?php echo h($product['Product']['tax']); ?>&nbsp;</td>
		<td><?php echo h($product['Product']['category']); ?>&nbsp;</td>
		<td><?php echo h($product['Product']['image']); ?>&nbsp;</td>
		<td><?php echo h($product['Product']['price']); ?>&nbsp;</td>
		<td><?php echo h($product['Product']['priceNot']); ?>&nbsp;</td>
		<td><?php echo h($product['Product']['created_at']); ?>&nbsp;</td>
		<td><?php echo h($product['Product']['updated_at']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $product['Product']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $product['Product']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $product['Product']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $product['Product']['id']))); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
		'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
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
		<li><?php echo $this->Html->link(__('New Product'), array('action' => 'add')); ?></li>
	</ul>
</div>
