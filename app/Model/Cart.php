<?php

class Cart 
{
	public $items = array();
	public $cartTotalQuantity = 0;
	public $cartTotalPrice = 0;

	public function __construct($oldCart)
	{
		if ($oldCart) {
			
		    $this->items = $oldCart['items'];	
		    $this->cartTotalQuantity = $oldCart['cartTotalQuantity'];	
		    $this->cartTotalPrice = $oldCart['cartTotalPrice'];	
		}
	}

	public function add($item,$id)
	{
	    $storedItem = array('quantity' => 0, 'price' => $item['Product']['price'], 'item' => $item);
	   
	    if ($this->items) {
	    	if (array_key_exists($id, $this->items)) {
	    		$storedItem = $this->items[$id];
	    	}
	    }
	    $storedItem['quantity']++;
	    $storedItem['price'] = $item['Product']['price'] * $storedItem['quantity']; 
	    
	    $this->items[$id] = $storedItem;
	    $this->cartTotalQuantity++;
	    $this->cartTotalPrice += $item['Product']['price'];    	
	}
}
