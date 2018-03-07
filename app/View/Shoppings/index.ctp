<?php if ($this->Session->check('ShoppingCard')) { ?>
	    <div class="row">
			<div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
				<ul class="list-group">
					<?php foreach ($prodcuts as $product) { ?>
						<li class="list-group-item">
							<span class="badge"><?php $product['quantity'] ?></span>
							<strong><?php $product['item']['attributes']['name'] ?></strong>
							<span class="label label-success"><?php $product['price'] ?> TL</span>
							<span><a href="shoppingCard/Decrease/<?php $product['item']['attributes']['id'] ?>"><i class="fas fa-minus"></i></a></span>
							<span><a href="shoppingCard/Increase/<?php $product['item']['attributes']['id'] ?>"><i class="fas fa-plus"></i></a></span>
						</li>
					<?php } ?>
				</ul>
			</div>
	    </div>

	    <div class="row">
	    	<div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
	    		<strong>Sepet Toplam Tutarı: <?php $totalPrice ?></strong>	    		
	    	</div>
	    </div>

<?php } else { ?>

		<div class="row">
	    	<div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
			<h2>Sepet Boş.</h2>
	    	</div>
		</div>
<?php } ?>