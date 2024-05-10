<?php

namespace App\Livewire;

use App\Models\Product;
use App\Models\Produit;
use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Component;

class ShopingCart extends Component
{
    public $product =array();

    public function AddtoCart($product){
        $this->dispatch('adedToCart');
        $productAded = Produit::findorFail($product)->toArray();
        $productAded['name'] =$productAded['designation'];
        $productAded['qty'] =1;
        $productAded['price'] =$productAded['prix_vente'] + ($productAded['prix_vente'] * ($productAded['tva']/100));
        Cart::add($productAded);
        // $cartContent = Cart::content();
        // dd($cartContent);
    }

    public function DeleteItem($product){
        $productDeltet = Produit::findorFail($product)->toArray();
        dd($productDeltet);
        Cart::remove($productDeltet);

    }
    public function render()
    {
        return view('livewire.shoping-cart');
    }
}
