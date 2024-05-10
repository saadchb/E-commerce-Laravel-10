<div class="minicart-block">
    <div class="minicart-contain">
        <a href="javascript:void(0)" class="link-to">
            <span class="icon-qty-combine">
                <i class="icon-cart-mini biolife-icon"></i>
                <span class="qty">{{ $cartContentGeneral['nbItemCart'] }} </span>
            </span>
            <span class="title">My Cart -</span>
            <span class="sub-total">
                Mad{{ $cartContentGeneral['total'] }}</span>
        </a>
        <div class="cart-content">
            <div class="cart-inner">
                <ul class="products">
                    @foreach ($cartContent as $item)
                        <li>
                            <div class="minicart-item">
                                <div class="thumb">
                                    @if (!isset($item['image']))
                            <img src="{{ asset('assets2/images/home-01/defautl-image-product.png') }}"
                                alt="Product" width="90" height="90"
                                class="product-thumnail">
                        @else
                            <img src="{{ asset('storage/' . $item['image']) }}" alt="Product"
                            width="90" height="90"

                                class="product-thumnail">
                        @endif
                                </div>
                                <div class="left-info">
                                    <div class="product-title"><a href="#"
                                            class="product-name">{{ $item['name'] }}</a>
                                    </div>
                                    <div class="price">

                                        @if ($item['new_price_ht'])
                                            <ins><span class="price-amount"><span
                                                        class="currencySymbol">Mad</span>
                                                    {{ $item['new_price_ht'] }}</span></ins>
                                            <del><span class="price-amount"><span
                                                        class="currencySymbol">Mad</span>
                                                    {{ $item['price'] }}</span></del>
                                        @else
                                            <ins><span class="price-amount"><span
                                                        class="currencySymbol">Mad</span>
                                                    {{ $item['price'] }}</span></ins>
                                        @endif
                                    </div>
                                    <div class="qty">
                                        <label for="cart[id123][qty]">Qty:</label>
                                        <input type="number" class="input-qty"
                                            name="cart[id123][qty]" id="cart[id123][qty]"
                                            value="{{$item['qty']}}" disabled>
                                    </div>
                                </div>
                                <div class="action">
                                    <a href="#" class="edit"><i
                                            class="fa fa-pencil"
                                            aria-hidden="true"></i></a>
                                    <a href="#" class="remove"><i
                                            class="fa fa-trash-o"
                                            aria-hidden="true"></i></a>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
                <p class="btn-control">
                    <a href="#" class="btn view-cart">view cart</a>
                    <a href="#" class="btn">checkout</a>
                </p>
            </div>
        </div>
    </div>
</div>