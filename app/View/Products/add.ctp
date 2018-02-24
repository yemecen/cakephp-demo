<div class="products form">
<?php echo $this->Form->create('Product'); ?>
	<fieldset>
		<legend><?php echo __('Add Product'); ?></legend>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('description');
		echo $this->Form->input('brandId');
		echo $this->Form->input('brandName');
		echo $this->Form->input('categoryId');
		echo $this->Form->input('categoryName');
		echo $this->Form->input('sku');
		echo $this->Form->input('stock');
		echo $this->Form->input('tax');
		echo $this->Form->input('category');
		echo $this->Form->input('image');
		echo $this->Form->input('price');
		echo $this->Form->input('priceNot');
		echo $this->Form->input('created_at');
		echo $this->Form->input('updated_at');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Products'), array('action' => 'index')); ?></li>
	</ul>
</div>
