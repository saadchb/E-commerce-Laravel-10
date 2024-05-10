<?php

namespace App\Livewire;
use App\Models\Product;
use App\Models\Produit;
use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Attributes\On;
use Livewire\Component;

class ShopingCartContent extends Component
{
    public $cartContent = array();
    public $cartContentGeneral = array();
    #[On('adedToCart')]
    public function mount(){
        $cart = Cart::content();
        $this->cartContent  = array();
        $this->cartContentGeneral['nbItemCart'] = Cart::count();
        $this->cartContentGeneral['total'] = Cart::total();
        foreach($cart as $item){
            $product = Produit::findorFail($item->id);
            array_push($this->cartContent,['id'=>$item->id,'price'=>$item->price,
                                            'rowId'=>$item->rowId,'new_price_ht'=>$product->new_price_ht,
                                            'qty'=>$item->qty,'image'=>$product->image,'name'=>$product->designation]);
        }
        // dd($this->cartContent);
    }
    public function render()
    {
        return view('livewire.shoping-cart-content');
    }
}
