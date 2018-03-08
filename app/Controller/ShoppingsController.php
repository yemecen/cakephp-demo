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
        
    }
   
    public function productAddCard($id = null)
    {
        //Sepete eklenecek ürünün id si ile db den bilgilerini alıyoruz
        $product = $this->Product->find('first',array('conditions' => array('Product.id' => $id)));

        //Sepette olan ürünleri shoppingCart değişkenine atıyoruz
        $shoppingCart = $this->Session->check('ShoppingCard') ? $this->Session->read('ShoppingCard') : array();
        
            //Session'da tutulan Sepet datası(data önce sepete ürün eklendi ise dolu olacaktır) boş mu? kontrol ediyoruz
            if (!empty($shoppingCart)) {
                //Sepet dolu ise ve aynı ürün eklenmek isteniyorsa
                if (array_key_exists($id, $shoppingCart['Cart']['CartItems'])) {
                    //Sepette ki ürün
                    $shoppingCart['Cart']['CartItems'][$id]['price'] += $shoppingCart['Cart']['CartItems'][$id]['Product']['price'];
                    $shoppingCart['Cart']['CartItems'][$id]['qty'] ++;
                    //Sepet genel toplam ve miktar güncelle
                    $shoppingCart['Cart']['CartPriceTotal'] += $shoppingCart['Cart']['CartItems'][$id]['Product']['price'];
                    $shoppingCart['Cart']['CartQtyTotal'] ++;
                    //Session güncelleme
                    $this->Session->delete('ShoppingCard');
                    $this->Session->write('ShoppingCard',$shoppingCart);

                } else {
                    //Sepette olmayan, yeni bir ürün ekleniyorsa,yeni ürün ekliyoruz.
                    $shoppingCart['Cart']['CartItems'][$product['Product']['id']] = array('Product'=>$product['Product'], 'price'=> $product['Product']['price'], 'qty'=> 1);
                    //Sepet genel toplam ve miktar güncelle
                    $shoppingCart['Cart']['CartPriceTotal'] += $product['Product']['price'];
                    $shoppingCart['Cart']['CartQtyTotal'] ++;
                    //Session güncelleme
                    $this->Session->delete('ShoppingCard');
                    $this->Session->write('ShoppingCard',$shoppingCart);
                }

            } else {
                //Sepet boş ise
                $shoppingCart = array('Cart' => 
                                       array('CartItems' => array($product['Product']['id'] => array('Product'=>$product['Product'], 'price'=> $product['Product']['price'], 'qty'=> 1)),
                                             'CartPriceTotal' => $product['Product']['price'], 
                                             'CartQtyTotal' => 1) 
                                    );

                $this->Session->write('ShoppingCard', $shoppingCart);
            }

        $this->redirect('/');
    }

    /**
     * Sepette ki ürünü bir azaltır. Bir tane kalınca, azaltıldığında sepetten kaldırır.
     *
     */
    public function productDecrease($id = null)
    {
        $shoppingCart = $this->Session->read('ShoppingCard');
            //Çıkarılacak ürün 1 den fazla ise...
            if ($shoppingCart['Cart']['CartItems'][$id]['qty'] > 1) {

                $shoppingCart['Cart']['CartItems'][$id]['price'] -= $shoppingCart['Cart']['CartItems'][$id]['Product']['price'];
                
                $shoppingCart['Cart']['CartItems'][$id]['qty'] --;

                $shoppingCart['Cart']['CartPriceTotal'] -= $shoppingCart['Cart']['CartItems'][$id]['Product']['price'];
                $shoppingCart['Cart']['CartQtyTotal'] --;

                $this->Session->delete('ShoppingCard');
                $this->Session->write('ShoppingCard',$shoppingCart);
        
                $this->redirect('/');
                
            } else {
                //Çıkarılacak ürün toplamda 1 adet ise...

                $shoppingCart['Cart']['CartPriceTotal'] -= $shoppingCart['Cart']['CartItems'][$id]['Product']['price'];
                $shoppingCart['Cart']['CartQtyTotal'] --;

                unset($shoppingCart['Cart']['CartItems'][$id]);

                $this->Session->delete('ShoppingCard');
                $this->Session->write('ShoppingCard',$shoppingCart);
        
                $this->redirect('/');
            }exit();
    }

}
