<?php
App::uses('AppController', 'Controller');
App::uses('Cart','Model');

/**
 * Products Controller
 *
 * @property Product $Product
 * @property PaginatorComponent $Paginator
 */
class ProductsController extends AppController 
{

	/**
	 * Components
	 *
	 * @var array
	 */
		//public $components = array('Paginator');
		public $uses = array('Product');
	/**
	 * index method
	 *
	 * @return void
	 */
	public function index() 
	{

		$products = $this->Product->find('all');
		
		$this->set('products', $products);
	}

	/**
	 * view method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function view($id = null) 
	{
		/*if (!$this->Product->exists($id)) {
			throw new NotFoundException(__('Invalid product'));
		}*/
		$products = $this->Product->query("SELECT * FROM products WHERE id = ".$id);
		$this->set('products', $products);
	}

    /**
     * Ürünleri isme göre sıralar.
     *
     * @return \Illuminate\Http\Response
     */
    public function orderByName()
    {
        //Ürünleri isme göre sıralıyoruz
		$products = $this->Product->find('all',  array(
        'order' => array('Product.name' => 'asc')
    	));

		$this->set('products',$products);

        $this->view = 'index';
    }

    /**
     * Ürünleri fiyatına göre sıralar.
     *
     * @return \Illuminate\Http\Response
     */
    public function orderByPrice()
    {
        //Ürünleri fiyata göre sıralar
        $products = $this->Product->find('all',  array(
        'order' => array('Product.price' => 'asc')
    	));

		$this->set('products',$products);

        $this->view = 'index';
    }

    public function test()
    {
    	/*$shoppingCart = array('items' => array('' => , );, );
    	$cart = new Cart();*/
    }

}
