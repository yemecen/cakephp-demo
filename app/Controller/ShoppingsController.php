<?php
App::uses('AppController', 'Controller');

/**
 * ShoppingCarts Controller
 */
class ShoppingsController extends AppController 
{
    public $uses = array('Product');

    /**
     * Sepetin içeriğini getirir.
     *
     */
    public function index()
    {
        if (!$this->Session->check('ShoppingCard')) {
            $this->set(array());
        } else{
            $oldCart = Session::read('ShoppingCard');
            $cart = new Cart($oldCart);
            $this->set(array('products' => $cart->items,'totalPrice' => $cart->cartTotalPrice));
        }
    }
   
    public function productAddCard($id = null)
    {
        //Sepete eklenecek ürünün id si ile db den bilgilerini alıyoruz
        $product = $this->Product->find('first',array('id' => $id));

        //Sepette olan ürünleri shoppingCart değişkenine atıyoruz
        $shoppingCart = $this->Session->check('ShoppingCard') ? $this->Session->read('ShoppingCard') : array();
        
        //Session'da tutulan Sepet datası(data önce sepete ürün eklendi ise dolu olacaktır) boş mu? kontrol ediyoruz
        if (!empty($shoppingCart)) {
            //Sepet dolu ise ve aynı ürün eklenmek isteniyorsa
            if (array_key_exists($id, $shoppingCart['Cart']['CartItems'])) {
                //Sepette ki ürün
                $shoppingCart['Cart']['CartItems'][$id]['price'] += $shoppingCart['Cart']['CartItems'][$id]['Product']['price'];
                $shoppingCart['Cart']['CartItems'][$id]['qty'] ++;
                //Sepet genel toplam
                $shoppingCart['Cart']['CartPriceTotal'] += $shoppingCart['Cart']['CartItems'][$id]['Product']['price'];
                $shoppingCart['Cart']['CartQtyTotal'] ++;
                //Session güncelleme
                $this->Session->delete('ShoppingCard');
                $this->Session->write('ShoppingCard',$shoppingCart);

            } else {
                //Sepette olmayan, yeni bir ürün ekleniyorsa,yeni ürün array i
                $new = array($product['Product']['id'] => array('Product'=>$product['Product'], 'price'=> $product['Product']['price'], 'qty'=> 1))
                //Yeni ürün sepete ekleme
                array_push($shoppingCart['Cart']['CartItems'], $new);
                //Session güncelleme
                $this->Session->delete('ShoppingCard');
                $this->Session->write('ShoppingCard',$shoppingCart);
            }

        } else {
            echo "Boş";
            //Sepet boş ise
            $shoppingCart = array('Cart' => 
                                   array('CartItems' => array($product['Product']['id'] => array('Product'=>$product['Product'], 'price'=> $product['Product']['price'], 'qty'=> 1)),
                                         'CartPriceTotal' => $product['Product']['price'], 
                                         'CartQtyTotal' => 1) 
                                );

            $this->Session->write('ShoppingCard', $shoppingCart);
        }

        echo "<pre>";print_r($this->Session->read('ShoppingCard'));
        exit();
    }

    /**
     * Sepette ki ürünü bir azaltır. Bir tane kalınca, azaltıldığında sepetten kaldırır.
     *
     */
    public function productDecrease($id = null)
    {
        /*//Eklenecek ürünün bilgisini alıyor.
        $product = Product::find($id);
        //Sepette eklenmiş ürün varsa, $oldCart değişkenimize atıyoruz
        $oldCart = Session::has('ShoppingCard') ? Session::get('ShoppingCard') : null;
        //Yeni bir Cart nesnesi türetiyoruz
        $cart = new Cart($oldCart);
        //$cart nesnemize, ürünü bir azaltıyoruz
        $cart->decrease($product,$product->id);
        //Mevcutta olanlar ile($oldCart olanlar), yeni eklenecek ürün ile birleştirip ShoppingCard Session'a ekliyoruz
        $request->session()->put('ShoppingCard',$cart);
        return redirect('shoppingCard');*/
    }

}
