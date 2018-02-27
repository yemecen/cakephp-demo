<div class="container">
	<div class="row">
		<!--Sıralama-->
			    <ul class="nav navbar-nav navbar-right">
				    <li class="dropdown">
					      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Akıllı Sıralama <span class="caret"></span></a>

					      <ul class="dropdown-menu">
					        <li><?php echo $this->Html->link('İsme Göre','orderByName'); ?></li>
					        <li><?php echo $this->Html->link('Fiyata Göre','orderByPrice'); ?></li>
					      </ul>
				    </li>
				</ul> 
	</div>
		 
	<div class="row">
		
		<?php foreach ($products as $item) 
				{   ?>
						<div class="col-sm-6 col-md-4">
						    <div class="thumbnail">
						      <img src="<?php echo $item['Product']['image']; ?>" width="700px" height="700px">
						      <div class="caption">
						        <h3><?php echo $item['Product']['name']; ?></h3>
						        <p><?php echo $item['Product']['price']; ?></p>
						        <p><a href="products/view/<?php echo $item['Product']['id']; ?>" class="btn btn-primary" role="button">İncele</a> 
						           <a href="#<?php echo $item['Product']['id']; ?>" class="btn btn-default" role="button">Sepete Ekle</a>
						       	</p>
						      </div>
						    </div>
						</div>
		<?php 	}   ?>
	</div>
</div>