<div class="container">
	<div class="row">

					<div class="col-xs-4 item-photo">
	                    <img style="max-width:100%;" src="<?php echo $products[0]['products']['image']; ?>" />
	                </div>

	                <div class="col-xs-5" style="border:0px solid gray">
	                    
	                    <h3><?php echo $products[0]['products']['name']; ?></h3>    
	                    <h5 >Marka: <a href="#"><?php echo $products[0]['products']['brandName']; ?></a></h5>
	        
	                    <h6 class="title-price"><small>Fiyat</small></h6>
	                    <h3 style="margin-top:0px;"><?php echo $products[0]['products']['price']; ?></h3>
	         
	                    <div class="section" style="padding-bottom:20px;">
	                        <a href="<!--route('shoppingCard',$product->id)-->" class="btn btn-success"><span style="margin-right:20px" class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span> Sepete Ekle</a>
	                    </div>                                        
	                </div>                              
	        
	                <div class="col-xs-9">
	                    <h4>Ürün Detayı</h4>
	                    <div style="width:100%;border-top:1px solid silver">
	                        <p style="padding:15px;">
	                            <small>
	                            <?php echo $products[0]['products']['description']; ?>
	                            </small>
	                        </p>
	                        
	                    </div>
	                </div>	
			
		</div>
</div>