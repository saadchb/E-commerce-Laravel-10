@extends('layouts.platform.app')
@section('title','Product list')
@section('content')
<!--Hero Section-->
<div class="hero-section hero-background">
    <h1 class="page-title">Organic Fruits</h1>
</div>

<!--Navigation section-->
<div class="container">
    <nav class="biolife-nav">
        <ul>
            <li class="nav-item"><a href="/" class="permal-link">Home</a></li>
            <li class="nav-item"><a href="#" class="permal-link">Product list</a></li>
        </ul>
    </nav>
</div>
<div class="page-contain category-page right-sidebar">
    <div class="container">
        <div class="row">
            <!-- Main content -->
            <div id="main-content" class="main-content col-lg-9 col-md-8 col-sm-12 col-xs-12">

                <div class="block-item recently-products-cat md-margin-bottom-39">
                    <ul class="products-list biolife-carousel nav-center-02 nav-none-on-mobile" data-slick='{"rows":1,"arrows":true,"dots":false,"infinite":false,"speed":400,"slidesMargin":0,"slidesToShow":5, "responsive":[{"breakpoint":1200, "settings":{ "slidesToShow": 3}},{"breakpoint":992, "settings":{ "slidesToShow": 3, "slidesMargin": 10}},{"breakpoint":768, "settings":{ "slidesToShow": 2, "slidesMargin":10 }}]}'>
                        @foreach ($produits as $item)
                        <li class="product-item slick-slide" tabindex="-1" style="margin-right: 10px; width: 163.931px;" data-slick-index="8" aria-hidden="true">
                            <div class="contain-product layout-02">
                                <div class="product-thumb">
                                    <a href="/Products/{{$item->id}}" class="link-to-product" tabindex="-1">
                                        <img src="{{asset('storage/'.$item->image)}}" alt="dd" width="270" height="270" class="product-thumnail">
                                    </a>
                                </div>
                                <div class="info">
                                    @foreach($sous_familles as $souFam)
                                    @if($souFam->id == $item->sous_famille_id)
                                    <b class="categories">{{$souFam->libelle}}</b>
                                    @endif
                                    @endforeach
                                    <h4 class="product-title"><a href="/Products/{{$item->id}}" class="pr-name" tabindex="-1">{{$item->designation}}</a></h4>
                                    @if($item->prix_vente && $item->prix_ht)
                                    <div class="price">
                                        <ins><span class="price-amount"><span class="currencySymbol">dh</span>{{$item->prix_vente}} </span></ins>
                                        <del><span class="price-amount"><span class="currencySymbol">dh</span>{{$item->prix_ht}}</span></del>
                                    </div>
                                    @endif
                                    @if($item->prix_vente && !$item->prix_ht)
                                    <div class="price">
                                        <ins><span class="price-amount"><span class="currencySymbol">dh</span>{{$item->prix_vente}}</span></ins>
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>

                <div class="product-category grid-style">

                    <div id="top-functions-area" class="top-functions-area">
                        <div class="flt-item to-left group-on-mobile">
                            <span class="flt-title">Refine</span>
                            <a href="#" class="icon-for-mobile">
                                <span></span>
                                <span></span>
                                <span></span>
                            </a>
                            <div class="wrap-selectors">
                                <form action="#" name="frm-refine" method="get">
                                    <span class="title-for-mobile">Refine Products By</span>
                                    <div data-title="Price:" class="selector-item">
                                        <select name="price" class="selector">
                                            <option value="all">Price</option>
                                            <option value="class-1st">Less than 5$</option>
                                            <option value="class-2nd">$5-10$</option>
                                            <option value="class-3rd">$10-20$</option>
                                            <option value="class-4th">$20-45$</option>
                                            <option value="class-5th">$45-100$</option>
                                            <option value="class-6th">$100-150$</option>
                                            <option value="class-7th">More than 150$</option>
                                        </select>
                                    </div>
                                    <div data-title="Brand:" class="selector-item">
                                        <select name="brad" class="selector">
                                            <option value="all">Top brands</option>
                                            @foreach ($marques as $brand)
                                            <option value="{{$brand->id}}">{{$brand->marque}}</option>
                                            @endforeach
                                        </select>
                                    </div>                            
                                    <p class="btn-for-mobile"><button type="submit" class="btn-submit">Go</button></p>
                                </form>
                            </div>
                        </div>
                        <div class="flt-item to-right">
                            <span class="flt-title">Sort</span>
                            <div class="wrap-selectors">
                                <div class="selector-item orderby-selector">
                                    <form action="{{ route('product_lis') }}" method="GET">
                                        <select name="orderby" class=" orderby" aria-label="Shop order">
                                            <!-- <option value="Sort by" >Sort</option> -->
                                            <option value="menu_order" {{ request()->input('orderby') == 'menu_order' ? 'selected' : '' }}>Default sorting</option>
                                            <!-- <option value="popularity" {{ request()->input('orderby') == 'popularity' ? 'selected' : '' }}>Popularity</option> -->
                                            <option value="rating" {{ request()->input('orderby') == 'rating' ? 'selected' : '' }}>Average rating</option>
                                            <option value="date" {{ request()->input('orderby') == 'date' ? 'selected' : '' }}>Newness</option>
                                            <option value="price" {{ request()->input('orderby') == 'price' ? 'selected' : '' }}>Price: Low to High</option>
                                            <option value="price-desc" {{ request()->input('orderby') == 'price-desc' ? 'selected' : '' }}>Price: High to Low</option>
                                        </select>
                                        <button type="submit" class="btn  add-to-cart-btn" >Sort</button>
                                    </form>
                                </div>
                                <!-- Other selector items -->
                            </div>
                        </div>

                    </div>

                    <div class="row">
                        <ul class="products-list">

                            @foreach ($produits as $item)

                            <li class="product-item col-lg-4 col-md-4 col-sm-4 col-xs-6">
                                <div class="contain-product layout-default">
                                    <div class="product-thumb">
                                        <a href="/Products/{{$item->id}}" class="link-to-product">
                                            <img src="{{asset('storage/'.$item->image)}}" alt="dd" width="270" height="270" class="product-thumnail">
                                        </a>
                                    </div>
                                    <div class="info">
                                        @foreach($sous_familles as $souFam)
                                        @if($souFam->id == $item->sous_famille_id)
                                        <b class="categories">{{$souFam->libelle}}</b>
                                        @endif
                                        @endforeach
                                        <h4 class="product-title"><a href="/Products/{{$item->id}}" class="pr-name" tabindex="-1">{{$item->designation}}</a></h4>
                                        @if($item->prix_vente && $item->prix_ht)
                                        <div class="price">
                                            <ins><span class="price-amount"><span class="currencySymbol">dh</span>{{$item->prix_vente}} </span></ins>
                                            <del><span class="price-amount"><span class="currencySymbol">dh</span>{{$item->prix_ht}}</span></del>
                                        </div>
                                        @endif
                                        @if($item->prix_vente && !$item->prix_ht)
                                        <div class="price">
                                            <ins><span class="price-amount"><span class="currencySymbol">dh</span>{{$item->prix_vente}}</span></ins>
                                        </div>
                                        @endif

                                        <div class="slide-down-box">
                                            <p class="message">{{$item->description}}</p>
                                            <div class="buttons">
                                                <a href="#" class="btn wishlist-btn"><i class="fa fa-heart" aria-hidden="true"></i></a>
                                                @livewire('shoping-cart',['product'=>$item])

                                                <!-- <a href="#" class="btn add-to-cart-btn"><i class="fa fa-cart-arrow-down" aria-hidden="true"></i>add to cart</a> -->
                                                <a href="#" class="btn compare-btn"><i class="fa fa-random" aria-hidden="true"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>

                    <div class="biolife-panigations-block">
                        <ul class="panigation-contain">
                            <li><span class="current-page">1</span></li>
                            <li><a href="#" class="link-page">2</a></li>
                            <li><a href="#" class="link-page">3</a></li>
                            <li><span class="sep">....</span></li>
                            <li><a href="#" class="link-page">20</a></li>
                            <li><a href="#" class="link-page next"><i class="fa fa-angle-right" aria-hidden="true"></i></a></li>
                        </ul>
                    </div>

                </div>

            </div>

            <!-- Sidebar -->
            <aside id="sidebar" class="sidebar col-lg-3 col-md-4 col-sm-12 col-xs-12">
                <div class="biolife-mobile-panels">
                    <span class="biolife-current-panel-title">Sidebar</span>
                    <a class="biolife-close-btn" href="#" data-object="open-mobile-filter">&times;</a>
                </div>
                <div class="sidebar-contain">
                    <div class="widget biolife-filter">
                        <h4 class="wgt-title">Departements</h4>
                        <div class="wgt-content">
                            <ul class="cat-list">
                                @foreach($sous_familles as $souFam)
                                @if( $souFam->active == 1)
                                <li class="cat-list-item"><a href="/categoris/{{$souFam->id}}" class="cat-link">{{$souFam->libelle}}</a></li>
                                @endif
                                @endforeach
                            </ul>
                        </div>
                    </div>

                    <div class="widget biolife-filter">
                        <h4 class="wgt-title">Shipping & Pickup</h4>
                        <div class="wgt-content">
                            <ul class="cat-list">
                                <li class="cat-list-item"><a href="#" class="cat-link">Show all</a></li>
                                <li class="cat-list-item"><a href="#" class="cat-link">2- Day shipping</a></li>
                                <li class="cat-list-item"><a href="#" class="cat-link">Shop to Home</a></li>
                                <li class="cat-list-item"><a href="#" class="cat-link">Free Pickup</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="widget price-filter biolife-filter">
                        <h4 class="wgt-title">Price</h4>
                        <div class="wgt-content">
                            <div class="frm-contain">
                                <form action="#" name="price-filter" id="price-filter" method="get">
                                    <p class="f-item">
                                        <label for="pr-from">$</label>
                                        <input class="input-number" type="number" id="pr-from" value="" name="price-from">
                                    </p>
                                    <p class="f-item">
                                        <label for="pr-to">to $</label>
                                        <input class="input-number" type="number" id="pr-to" value="" name="price-from">
                                    </p>
                                    <p class="f-item"><button class="btn-submit" type="submit">go</button></p>
                                </form>
                            </div>
                            <ul class="check-list bold single">
                                <li class="check-list-item"><a href="#" class="check-link">$0 - $5</a></li>
                                <li class="check-list-item"><a href="#" class="check-link">$5 - $10</a></li>
                                <li class="check-list-item"><a href="#" class="check-link">$15 - $20</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="widget biolife-filter">
                        <h4 class="wgt-title">Brand</h4>
                        <div class="wgt-content">
                            <ul class="check-list multiple">
                                <li class="check-list-item"><a href="#" class="check-link">Great Value Organic</a></li>
                                <li class="check-list-item"><a href="#" class="check-link">Plum Organic</a></li>
                                <li class="check-list-item"><a href="#" class="check-link">Shop to Home</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="widget biolife-filter">
                        <h4 class="wgt-title">Color</h4>
                        <div class="wgt-content">
                            <ul class="color-list">
                                <li class="color-item"><a href="#" class="c-link"><span class="symbol img-color"></span>Multi</a></li>
                                <li class="color-item"><a href="#" class="c-link"><span class="symbol hex-code color-01"></span>Red</a></li>
                                <li class="color-item"><a href="#" class="c-link"><span class="symbol hex-code color-02"></span>Orrange</a></li>
                                <li class="color-item"><a href="#" class="c-link"><span class="symbol hex-code color-03"></span>Other</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="widget biolife-filter">
                        <h4 class="wgt-title">Popular Size</h4>
                        <div class="wgt-content">
                            <ul class="check-list bold multiple">
                                <li class="check-list-item"><a href="#" class="check-link">8oz</a></li>
                                <li class="check-list-item"><a href="#" class="check-link">15oz</a></li>
                                <li class="check-list-item"><a href="#" class="check-link">6oz</a></li>
                                <li class="check-list-item"><a href="#" class="check-link">30oz</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="widget biolife-filter">
                        <h4 class="wgt-title">Number of Pieces</h4>
                        <div class="wgt-content">
                            <ul class="check-list bold">
                                <li class="check-list-item"><a href="#" class="check-link">1 to 9</a></li>
                                <li class="check-list-item"><a href="#" class="check-link">10 to 15</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="widget biolife-filter">
                        <h4 class="wgt-title">Recently Viewed</h4>
                        <div class="wgt-content">
                            <ul class="products">
                                <li class="pr-item">
                                    <div class="contain-product style-widget">
                                        <div class="product-thumb">
                                            <a href="#" class="link-to-product" tabindex="0">
                                                <img src="assets/images/products/p-13.jpg" alt="dd" width="270" height="270" class="product-thumnail">
                                            </a>
                                        </div>
                                        <div class="info">
                                            <b class="categories">Fresh Fruit</b>
                                            <h4 class="product-title"><a href="#" class="pr-name" tabindex="0">National Fresh Fruit</a></h4>
                                            <div class="price">
                                                <ins><span class="price-amount"><span class="currencySymbol">£</span>85.00</span></ins>
                                                <del><span class="price-amount"><span class="currencySymbol">£</span>95.00</span></del>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="pr-item">
                                    <div class="contain-product style-widget">
                                        <div class="product-thumb">
                                            <a href="#" class="link-to-product" tabindex="0">
                                                <img src="assets/images/products/p-14.jpg" alt="dd" width="270" height="270" class="product-thumnail">
                                            </a>
                                        </div>
                                        <div class="info">
                                            <b class="categories">Fresh Fruit</b>
                                            <h4 class="product-title"><a href="#" class="pr-name" tabindex="0">National Fresh Fruit</a></h4>
                                            <div class="price">
                                                <ins><span class="price-amount"><span class="currencySymbol">£</span>85.00</span></ins>
                                                <del><span class="price-amount"><span class="currencySymbol">£</span>95.00</span></del>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="pr-item">
                                    <div class="contain-product style-widget">
                                        <div class="product-thumb">
                                            <a href="#" class="link-to-product" tabindex="0">
                                                <img src="assets/images/products/p-10.jpg" alt="dd" width="270" height="270" class="product-thumnail">
                                            </a>
                                        </div>
                                        <div class="info">
                                            <b class="categories">Fresh Fruit</b>
                                            <h4 class="product-title"><a href="#" class="pr-name" tabindex="0">National Fresh Fruit</a></h4>
                                            <div class="price">
                                                <ins><span class="price-amount"><span class="currencySymbol">£</span>85.00</span></ins>
                                                <del><span class="price-amount"><span class="currencySymbol">£</span>95.00</span></del>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="widget biolife-filter">
                        <h4 class="wgt-title">Product Tags</h4>
                        <div class="wgt-content">
                            <ul class="tag-cloud">
                                <li class="tag-item"><a href="#" class="tag-link">Fresh Fruit</a></li>
                                <li class="tag-item"><a href="#" class="tag-link">Natural Food</a></li>
                                <li class="tag-item"><a href="#" class="tag-link">Hot</a></li>
                                <li class="tag-item"><a href="#" class="tag-link">Organics</a></li>
                                <li class="tag-item"><a href="#" class="tag-link">Dried Organic</a></li>
                            </ul>
                        </div>
                    </div>
                </div>

            </aside>

        </div>
    </div>
</div>
<script>
    // Attach event listener to the dropdown menu
    document.querySelector(".submitButton").addEventListener("change", function() {
        // Submit the form when an option is selected
        this.parentElement.submit();
    });
</script>
@endsection