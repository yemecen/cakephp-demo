<?php if ($this->Session->check('ShoppingCard')) { ?>
	    <div class="row">
			<div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
				<ul class="list-group">
					<?php foreach ($this->Session->read('ShoppingCard')['Cart']['CartItems'] as $product) { ?>
						<li class="list-group-item">
							<span class="badge"><?php echo $product['qty']; ?></span>
							<strong><?php echo $product['Product']['name']; ?></strong>
							<span class="label label-success"><?php echo $product['price'];?> TL</span>
							<span><a href="shoppings/productDecrease/<?php echo $product['Product']['id']; ?>"><i class="fas fa-minus"></i></a></span>
							<span><a href="shoppings/productAddCard/<?php echo $product['Product']['id']; ?>"><i class="fas fa-plus"></i></a></span>
						</li>
					<?php } ?>
				</ul>
			</div>
	    </div>

	    <div class="row">
	    	<div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
	    		<strong>Sepet Toplam Tutarı: <?php echo $this->Session->read('ShoppingCard')['Cart']['CartPriceTotal']; ?></strong>	    		
	    	</div>
	    </div>

<?php } else { ?>

		<div class="row">
	    	<div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
			<h2>Sepet Boş.</h2>
	    	</div>
		</div>
<?php } ?>