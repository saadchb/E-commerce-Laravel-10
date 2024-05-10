  <?php

    use App\Models\Famille;
    use App\Models\Produit;
    use App\Models\SousFamille;

    $sous_familles = SousFamille::all();
    $produit = Produit::latest()->get();
    $Fmaille = Famille::all();
    ?>
  <!-- HEADER -->
  <header id="header" class="header-area style-01 layout-03">
      <div class="header-top bg-main hidden-xs">
          <div class="container">
              <div class="top-bar left">
                  <ul class="horizontal-menu">
                      <li><a href="#"><i class="fa fa-envelope" aria-hidden="true"></i>CHB@company.com</a></li>
                      <li><a href="#">(+212) 685899222</a></li>
                  </ul>
              </div>
              <div class="top-bar right">
                  <ul class="social-list">
                      <li><a href="#"><i class="fa fa-twitter'" aria-hidden="true"></i></a></li>
                      <li><a href="#"><i class="fa fa-facebook'" aria-hidden="true"></i></a></li>
                      <li><a href="#"><i class="fa fa-pinterest'" aria-hidden="true"></i></a></li>
                  </ul>
                  <ul class="horizontal-menu">
                      <li class="horz-menu-item lang">
                          <select name="language">
                              <option value="fr">French (EUR)</option>
                              <option value="en" selected>English (USD)</option>
                              <option value="ger">Germany (GBP)</option>
                              <option value="jp">Japan (JPY)</option>
                          </select>
                      </li>
                      @auth

                      @if(auth()->user()->isAdmin == 0)
                      <li style="padding-right: 4px !important;"><a href="/user/dachboard" style="margin-right: 38px !important;" target="_blank"><i class="fas fa-home"></i><span style="margin-left: 9px !important;">dachboard</span></a></li>
                      <li style="padding-left: 4px !important; text-align: center;"> <a href="{{route('login.logout')}}"><i class="fas fa-power-off" style="margin-right: 9px !important;"></i><span>Logout</span></a></li>
                      @elseif(auth()->user()->isAdmin == 2)
                      <li style="padding-right: 4px !important;"><a href="/commercial/dachboard" target="_blank" style="margin-right: 38px !important;"><i class="fas fa-home"></i><span style="margin-left: 9px !important;">dachboard</span></a></li>
                      <li style="padding-left: 4px !important; text-align: center;"> <a href="{{route('login.logout')}}"><i class="fas fa-power-off" style="margin-right: 9px !important;"></i><span>Logout</span></a></li>
                      @else
                      <li style="padding-right: 4px !important;"><a href="/admin/dachboard" style="margin-right: 38px !important;"><i class="fas fa-home"></i><span style="margin-left: 9px !important;">dachboard</span></a></li>
                      <li style="padding-left: 4px !important; text-align: center;"> <a href="{{route('login.logout')}}"><i class="fas fa-power-off" style="margin-right: 9px !important;"></i><span>Logout</span></a></li>

                      @endif

                      @endauth

                      @guest
                      <li><a href="/login" class="login-link"><i class="biolife-icon icon-login"></i>Login/Register</a></li>
                      @endguest

                  </ul>
              </div>
          </div>
      </div>
      <div class="header-middle biolife-sticky-object ">
          <div class="container">
              <div class="row">
                  <div class="col-lg-3 col-md-2 col-md-6 col-xs-6">
                      <a href="/" class="biolife-logo"><img src="{{asset('build/assets/images/organic-3.png')}}" alt="biolife logo" width="135" height="34"></a>
                  </div>
                  <div class="col-lg-6 col-md-7 hidden-sm hidden-xs">
                      <div class="primary-menu">
                          <ul class="menu biolife-menu clone-main-menu clone-primary-menu" id="primary-menu" data-menuname="main menu">
                              <li class="menu-item"><a href="/">Home</a></li>
                              <li class="menu-item"><a href="/about-us">About US</a></li>
                              <li class="menu-item menu-item-has-children has-megamenu">
                                  <a href="#" class="menu-name" data-title="Shop">Shop</a>
                                  <div class="wrap-megamenu lg-width-900 md-width-750">
                                      <div class="mega-content">
                                          @foreach ($sous_familles as $sofam)
                                          @if($sofam ->active ==1)
                                          <div class="col-lg-3 col-md-3 col-xs-12 md-margin-bottom-0 xs-margin-bottom-25">
                                              <div class="wrap-custom-menu vertical-menu">
                                                  <div class="top-banner-menu">
                                                      <a href="#"><img src="{{asset('storage/'.$sofam->image)}}" width="255" height="150" alt="Vergetables"></a>
                                                  </div>
                                                  <h4 class="menu-title">{{$sofam->libelle}}</h4>
                                                  <ul class="menu">
                                                      @foreach ($produit as $item)
                                                      @if($item-> sous_famille_id == $sofam->id)                                                 
                                                          <!-- for ($i = Int($produit); $i <= 11 ; $i++) -->
                                                          <li><a href="/Products/{{$item->id}}">{{$item->designation}}</a></li>
                                                          <!-- endfor -->
                                                          @endif
                                                          @endforeach
                                            
                                                  </ul>
                                              </div>
                                          </div>
                                          @endif
                                          @endforeach
                     
                                      </div>
                                  </div>
                              </li>
                              <li class="menu-item ">
                                  <a href="/Products" class="menu-name" data-title="Products">Products</a>
                                  <!-- <ul class="sub-menu">
                                      <li class="menu-item"><a href="#">Omelettes</a></li>
                                      <li class="menu-item"><a href="#">Breakfast Scrambles</a></li>
                                      <li class="menu-item menu-item-has-children has-child"><a href="#" class="menu-name" data-title="Eggs & other considerations">Eggs & other considerations</a>
                                          <ul class="sub-menu">
                                              <li class="menu-item"><a href="#">Classic Breakfast</a></li>
                                              <li class="menu-item"><a href="#">Huevos Rancheros</a></li>
                                              <li class="menu-item"><a href="#">Everything Egg Sandwich</a></li>
                                              <li class="menu-item"><a href="#">Egg Sandwich</a></li>
                                              <li class="menu-item"><a href="#">Vegan Burrito</a></li>
                                              <li class="menu-item"><a href="#">Biscuits and Gravy</a></li>
                                              <li class="menu-item"><a href="#">Bacon Avo Egg Sandwich</a></li>
                                          </ul>
                                      </li>
                                      <li class="menu-item"><a href="#">Griddle</a></li>
                                      <li class="menu-item menu-item-has-children has-child"><a href="#" class="menu-name" data-title="Sides & Extras">Sides & Extras</a>
                                          <ul class="sub-menu">
                                              <li class="menu-item"><a href="#">Breakfast Burrito</a></li>
                                              <li class="menu-item"><a href="#">Crab Cake Benedict</a></li>
                                              <li class="menu-item"><a href="#">Corned Beef Hash</a></li>
                                              <li class="menu-item"><a href="#">Steak & Eggs</a></li>
                                              <li class="menu-item"><a href="#">Oatmeal</a></li>
                                              <li class="menu-item"><a href="#">Fruit & Yogurt Parfait</a></li>
                                          </ul>
                                      </li>
                                      <li class="menu-item"><a href="#">Biscuits</a></li>
                                      <li class="menu-item"><a href="#">Seasonal Fruit Plate</a></li>
                                  </ul> -->
                              </li>

                              <li class="menu-item menu-item-has-children has-megamenu">
                                  <a href="#" class="menu-name" data-title="Blog">Blog</a>
                                  <div class="wrap-megamenu lg-width-800 md-width-750">
                                      <div class="mega-content">
                                          <div class="col-lg-3 col-md-3 col-xs-6">
                                              <div class="wrap-custom-menu vertical-menu">
                                                  <h4 class="menu-title">Blog Categories</h4>
                                                  <ul class="menu">
                                                      <li><a href="#">Beauty (30)</a></li>
                                                      <li><a href="#">Fashion (50)</a></li>
                                                      <li><a href="#">Food (10)</a></li>
                                                      <li><a href="#">Life Style (60)</a></li>
                                                      <li><a href="#">Travel (10)</a></li>
                                                      <li><a href="#">Nutrition (35)</a></li>
                                                      <li><a href="#">Food Decoration (45)</a></li>
                                                  </ul>
                                              </div>
                                          </div>
                                          <div class="col-lg-3 col-md-3 col-xs-6">
                                              <div class="wrap-custom-menu vertical-menu">
                                                  <h4 class="menu-title">Featured Posts</h4>
                                                  <ul class="menu">
                                                      <li><a href="#">Post example<sup>#1</sup></a></li>
                                                      <li><a href="#">Post example<sup>#2</sup></a></li>
                                                      <li><a href="#">Post example<sup>#3</sup></a></li>
                                                      <li><a href="#">Post example<sup>#4</sup></a></li>
                                                      <li><a href="#">Post example<sup>#5</sup></a></li>
                                                      <li><a href="#">Post example<sup>#6</sup></a></li>
                                                      <li><a href="#">Post example<sup>#7</sup></a></li>
                                                  </ul>
                                              </div>
                                          </div>
                                          <div class="col-lg-6 col-md-6 col-xs-12 md-margin-top-0 xs-margin-top-25px">
                                              <div class="block-posts">
                                                  <h4 class="menu-title">Recent Posts</h4>
                                                  <ul class="posts">
                                                      <li>
                                                          <div class="block-post-item">
                                                              <div class="thumb"><a href="#"><img src="{{asset('build/assets/images/megamenu/thumb-05.jpg')}}" width="100" height="73')}}" alt=""></a></div>
                                                              <div class="left-info">
                                                                  <h4 class="post-name"><a href="#">Ashwagandha: The #1 Herb in the World for Anxiety?</a></h4>
                                                                  <span class="p-date">Jan 05, 2019</span>
                                                                  <span class="p-comment">2 Comments</span>
                                                              </div>
                                                          </div>
                                                      </li>
                                                      <li>
                                                          <div class="block-post-item">
                                                              <div class="thumb"><a href="#"><img src="{{asset('build/assets/images/megamenu/thumb-06.jpg')}}" width="100" height="73')}}" alt=""></a></div>
                                                              <div class="left-info">
                                                                  <h4 class="post-name"><a href="#">Ashwagandha: The #1 Herb in the World for Anxiety?</a></h4>
                                                                  <span class="p-date">May 15, 2019</span>
                                                                  <span class="p-comment">8 Comments</span>
                                                              </div>
                                                          </div>
                                                      </li>
                                                      <li>
                                                          <div class="block-post-item">
                                                              <div class="thumb"><a href="#"><img src="{{asset('build/assets/images/megamenu/thumb-07.jpg')}}" width="100" height="73')}}" alt=""></a></div>
                                                              <div class="left-info">
                                                                  <h4 class="post-name"><a href="#">Ashwagandha: The #1 Herb in the World for Anxiety?</a></h4>
                                                                  <span class="p-date">Apr 26, 2019</span>
                                                                  <span class="p-comment">10 Comments</span>
                                                              </div>
                                                          </div>
                                                      </li>
                                                  </ul>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                              </li>
                              <li class="menu-item"><a href="/contact-us">Contact</a></li>
                          </ul>
                      </div>
                  </div>
                  <div class="col-lg-3 col-md-3 col-md-6 col-xs-6">
                      <div class="biolife-cart-info">
                          <div class="mobile-search">
                              <a href="javascript:void(0)" class="open-searchbox"><i class="biolife-icon icon-search"></i></a>
                              <div class="mobile-search-content">
                                  <form action="#" class="form-search" name="mobile-seacrh" method="get">
                                      <a href="#" class="btn-close"><span class="biolife-icon icon-close-menu"></span></a>
                                      <input type="text" name="s" class="input-text" value="" placeholder="Search here...">
                                      <select name="category">
                                          <option value="-1" selected>All Categories</option>
                                          @foreach ($Fmaille as $fam)
                                          <option value="{{$fam->id}}">{{$fam->libelle}}</option>
                                          @endforeach
                                      </select>
                                      <button type="submit" class="btn-submit">go</button>
                                  </form>
                              </div>
                          </div>
                          <div class="wishlist-block hidden-sm hidden-xs">
                              <a href="#" class="link-to">
                                  <span class="icon-qty-combine">
                                      <i class="icon-heart-bold biolife-icon"></i>
                                      <span class="qty">4</span>
                                  </span>
                              </a>
                          </div>
                          <div class="minicart-block">
                              <div class="minicart-contain">
                              @livewire('shoping-cart-content')                             
                              </div>
                          </div>
                          <div class="mobile-menu-toggle">
                              <a class="btn-toggle" data-object="open-mobile-menu" href="javascript:void(0)">
                                  <span></span>
                                  <span></span>
                                  <span></span>
                              </a>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
      <div class="header-bottom hidden-sm hidden-xs">
          <div class="container">
              <div class="row">
                  <div class="col-lg-3 col-md-4">
                      <div class="vertical-menu vertical-category-block">
                          <div class="block-title">
                              <span class="menu-icon">
                                  <span class="line-1"></span>
                                  <span class="line-2"></span>
                                  <span class="line-3"></span>
                              </span>
                              <span class="menu-title">All departments</span>
                              <span class="angle" data-tgleclass="fa fa-caret-down"><i class="fa fa-caret-up" aria-hidden="true"></i></span>
                          </div>
                          <div class="wrap-menu">
                              <ul class="menu clone-main-menu">
                                  <li class="menu-item menu-item-has-children has-megamenu">
                                      <a href="#" class="menu-name" data-title="Fruit & Nut Gifts"><i class="biolife-icon icon-fruits"></i>Fruit & Nut Gifts</a>
                                      <div class="wrap-megamenu lg-width-900 md-width-640">
                                          <div class="mega-content">
                                              <div class="row">
                                                  <div class="col-lg-3 col-md-4 col-sm-12 xs-margin-bottom-25 md-margin-bottom-0">
                                                      <div class="wrap-custom-menu vertical-menu">
                                                          <h4 class="menu-title">Fresh Fuits</h4>
                                                          <ul class="menu">
                                                              <li><a href="#">Fruit & Nut Gifts</a></li>
                                                              <li><a href="#">Mixed Fruits</a></li>
                                                              <li><a href="#">Oranges</a></li>
                                                              <li><a href="#">Bananas & Plantains</a></li>
                                                              <li><a href="#">Fresh Gala Apples</a></li>
                                                              <li><a href="#">Berries</a></li>
                                                              <li><a href="#">Pears</a></li>
                                                              <li><a href="#">Produce</a></li>
                                                              <li><a href="#">Snack Foods</a></li>
                                                          </ul>
                                                      </div>
                                                  </div>
                                                  <div class="col-lg-3 col-md-4 col-sm-12 lg-padding-left-23 xs-margin-bottom-25 md-margin-bottom-0">
                                                      <div class="wrap-custom-menu vertical-menu">
                                                          <h4 class="menu-title">Nut Gifts</h4>
                                                          <ul class="menu">
                                                              <li><a href="#">Non-Dairy Coffee Creamers</a></li>
                                                              <li><a href="#">Coffee Creamers</a></li>
                                                              <li><a href="#">Mayonnaise</a></li>
                                                              <li><a href="#">Almond Milk</a></li>
                                                              <li><a href="#">Ghee</a></li>
                                                              <li><a href="#">Beverages</a></li>
                                                              <li><a href="#">Ranch Salad Dressings</a></li>
                                                              <li><a href="#">Hemp Milk</a></li>
                                                              <li><a href="#">Nuts & Seeds</a></li>
                                                          </ul>
                                                      </div>
                                                  </div>
                                                  <div class="col-lg-6 col-md-4 col-sm-12 lg-padding-left-50 xs-margin-bottom-25 md-margin-bottom-0">
                                                      <div class="biolife-products-block max-width-270">
                                                          <h4 class="menu-title">Bestseller Products</h4>
                                                          <ul class="products-list default-product-style biolife-carousel nav-none-after-1k2 nav-center" data-slick='{"rows":1,"arrows":true,"dots":false,"infinite":false,"speed":400,"slidesMargin":30,"slidesToShow":1, "responsive":[{"breakpoint":767, "settings":{ "arrows": false}}]}'>
                                                              <li class="product-item">
                                                                  <div class="contain-product none-overlay">
                                                                      <div class="product-thumb">
                                                                          <a href="#" class="link-to-product">
                                                                              <img src="{{asset('build/assets/images/products/p-08.jpg')}}" alt="dd" width="270" height="270" class="product-thumnail">
                                                                          </a>
                                                                      </div>
                                                                      <div class="info">
                                                                          <b class="categories">Fresh Fruit</b>
                                                                          <h4 class="product-title"><a href="#" class="pr-name">National Fresh Fruit</a></h4>
                                                                          <div class="price">
                                                                              <ins><span class="price-amount"><span class="currencySymbol">£</span>85.00</span></ins>
                                                                              <del><span class="price-amount"><span class="currencySymbol">£</span>95.00</span></del>
                                                                          </div>
                                                                      </div>
                                                                  </div>
                                                              </li>
                                                              <li class="product-item">
                                                                  <div class="contain-product none-overlay">
                                                                      <div class="product-thumb">
                                                                          <a href="#" class="link-to-product">
                                                                              <img src="{{asset('build/assets/images/products/p-11.jpg')}}" alt="dd" width="270" height="270" class="product-thumnail">
                                                                          </a>
                                                                      </div>
                                                                      <div class="info">
                                                                          <b class="categories">Fresh Fruit</b>
                                                                          <h4 class="product-title"><a href="#" class="pr-name">National Fresh Fruit</a></h4>
                                                                          <div class="price">
                                                                              <ins><span class="price-amount"><span class="currencySymbol">£</span>85.00</span></ins>
                                                                              <del><span class="price-amount"><span class="currencySymbol">£</span>95.00</span></del>
                                                                          </div>
                                                                      </div>
                                                                  </div>
                                                              </li>
                                                              <li class="product-item">
                                                                  <div class="contain-product none-overlay">
                                                                      <div class="product-thumb">
                                                                          <a href="#" class="link-to-product">
                                                                              <img src="{{asset('build/assets/images/products/p-15.jpg')}}" alt="dd" width="270" height="270" class="product-thumnail">
                                                                          </a>
                                                                      </div>
                                                                      <div class="info">
                                                                          <b class="categories">Fresh Fruit</b>
                                                                          <h4 class="product-title"><a href="#" class="pr-name">National Fresh Fruit</a></h4>
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
                                              </div>
                                              <div class="row">
                                                  <div class="col-lg-12 col-md-12 col-sm-12 md-margin-top-9">
                                                      <div class="biolife-brand">
                                                          <ul class="brands">
                                                              <li><a href="#"><img src="{{asset('build/assets/images/megamenu/brand-organic.png')}}" width="161" height="136" alt="organic"></a></li>
                                                              <li><a href="#"><img src="{{asset('build/assets/images/megamenu/brand-explore.png')}}" width="160" height="136" alt="explore"></a></li>
                                                              <li><a href="#"><img src="{{asset('build/assets/images/megamenu/brand-organic-2.png')}}" width="99" height="136" alt="organic 2"></a></li>
                                                              <li><a href="#"><img src="{{asset('build/assets/images/megamenu/brand-eco-teas.png')}}" width="164" height="136" alt="eco teas"></a></li>
                                                          </ul>
                                                      </div>
                                                  </div>
                                              </div>
                                          </div>
                                      </div>
                                  </li>
                                  <li class="menu-item menu-item-has-children has-megamenu">
                                      <a href="#" class="menu-name" data-title="Vegetables"><i class="biolife-icon icon-broccoli-1"></i>Vegetables</a>
                                      <div class="wrap-megamenu lg-width-900 md-width-640 background-mega-01">
                                          <div class="mega-content">
                                              <div class="row">
                                                  <div class="col-lg-3 col-md-4 col-sm-12 xs-margin-bottom-25 md-margin-bottom-0">
                                                      <div class="wrap-custom-menu vertical-menu">
                                                          <h4 class="menu-title">Vegetables</h4>
                                                          <ul class="menu">
                                                              <li><a href="#">Fruit & Nut Gifts</a></li>
                                                              <li><a href="#">Mixed Fruits</a></li>
                                                              <li><a href="#">Oranges</a></li>
                                                              <li><a href="#">Bananas & Plantains</a></li>
                                                              <li><a href="#">Fresh Gala Apples</a></li>
                                                              <li><a href="#">Berries</a></li>
                                                              <li><a href="#">Pears</a></li>
                                                              <li><a href="#">Produce</a></li>
                                                              <li><a href="#">Snack Foods</a></li>
                                                          </ul>
                                                      </div>
                                                  </div>
                                                  <div class="col-lg-4 col-md-4 col-sm-12 lg-padding-left-23 xs-margin-bottom-25 md-margin-bottom-0">
                                                      <div class="wrap-custom-menu vertical-menu">
                                                          <h4 class="menu-title">Gifts</h4>
                                                          <ul class="menu">
                                                              <li><a href="#">Non-Dairy Coffee Creamers</a></li>
                                                              <li><a href="#">Coffee Creamers</a></li>
                                                              <li><a href="#">Mayonnaise</a></li>
                                                              <li><a href="#">Almond Milk</a></li>
                                                              <li><a href="#">Ghee</a></li>
                                                              <li><a href="#">Beverages</a></li>
                                                              <li><a href="#">Ranch Salad Dressings</a></li>
                                                              <li><a href="#">Hemp Milk</a></li>
                                                              <li><a href="#">Nuts & Seeds</a></li>
                                                          </ul>
                                                      </div>
                                                  </div>
                                                  <div class="col-lg-5 col-md-4 col-sm-12 lg-padding-left-57 md-margin-bottom-30">
                                                      <div class="biolife-brand vertical md-boder-left-30">
                                                          <h4 class="menu-title">Hot Brand</h4>
                                                          <ul class="brands">
                                                              <li><a href="#"><img src="{{asset('build/assets/images/megamenu/v-brand-organic.png')}}" width="167" height="74')}}" alt="organic"></a></li>
                                                              <li><a href="#"><img src="{{asset('build/assets/images/megamenu/v-brand-explore.png')}}" width="167" height="72')}}" alt="explore"></a></li>
                                                              <li><a href="#"><img src="{{asset('build/assets/images/megamenu/v-brand-organic-2.png')}}" width="167" height="99')}}" alt="organic 2"></a></li>
                                                              <li><a href="#"><img src="{{asset('build/assets/images/megamenu/v-brand-eco-teas.png')}}" width="167" height="67')}}" alt="eco teas"></a></li>
                                                          </ul>
                                                      </div>
                                                  </div>
                                              </div>
                                          </div>
                                      </div>
                                  </li>
                                  <li class="menu-item menu-item-has-children has-megamenu">
                                      <a href="#" class="menu-name" data-title="Fresh Berries"><i class="biolife-icon icon-grape"></i>Fresh Berries</a>
                                      <div class="wrap-megamenu lg-width-900 md-width-640 background-mega-02">
                                          <div class="mega-content">
                                              <div class="row">
                                                  <div class="col-lg-3 col-md-4 sm-col-12 md-margin-bottom-83 xs-margin-bottom-25">
                                                      <div class="wrap-custom-menu vertical-menu">
                                                          <h4 class="menu-title">Fresh Berries</h4>
                                                          <ul class="menu">
                                                              <li><a href="#">Fruit & Nut Gifts</a></li>
                                                              <li><a href="#">Mixed Fruits</a></li>
                                                              <li><a href="#">Oranges</a></li>
                                                              <li><a href="#">Bananas & Plantains</a></li>
                                                              <li><a href="#">Fresh Gala Apples</a></li>
                                                              <li><a href="#">Berries</a></li>
                                                              <li><a href="#">Pears</a></li>
                                                              <li><a href="#">Produce</a></li>
                                                              <li><a href="#">Snack Foods</a></li>
                                                          </ul>
                                                      </div>
                                                  </div>
                                                  <div class="col-lg-3 col-md-4 sm-col-12 lg-padding-left-23 xs-margin-bottom-36px md-margin-bottom-0">
                                                      <div class="wrap-custom-menu vertical-menu">
                                                          <h4 class="menu-title">Gifts</h4>
                                                          <ul class="menu">
                                                              <li><a href="#">Non-Dairy Coffee Creamers</a></li>
                                                              <li><a href="#">Coffee Creamers</a></li>
                                                              <li><a href="#">Mayonnaise</a></li>
                                                              <li><a href="#">Almond Milk</a></li>
                                                              <li><a href="#">Ghee</a></li>
                                                              <li><a href="#">Beverages</a></li>
                                                              <li><a href="#">Ranch Salad Dressings</a></li>
                                                              <li><a href="#">Hemp Milk</a></li>
                                                              <li><a href="#">Nuts & Seeds</a></li>
                                                          </ul>
                                                      </div>
                                                  </div>
                                                  <div class="col-lg-6 col-md-4 sm-col-12 lg-padding-left-25 md-padding-top-55">
                                                      <div class="biolife-banner layout-01">
                                                          <h3 class="top-title">Farm Fresh</h3>
                                                          <p class="content"> All the Lorem Ipsum generators on the Internet tend.</p>
                                                          <b class="bottomm-title">Berries Series</b>
                                                      </div>
                                                  </div>
                                              </div>
                                          </div>
                                      </div>
                                  </li>
                                  <li class="menu-item"><a href="#" class="menu-name" data-title="Ocean Foods"><i class="biolife-icon icon-fish"></i>Ocean Foods</a></li>
                                  <li class="menu-item menu-item-has-children has-child">
                                      <a href="#" class="menu-name" data-title="Butter & Eggs"><i class="biolife-icon icon-honey"></i>Butter & Eggs</a>
                                      <ul class="sub-menu">
                                          <li class="menu-item"><a href="#">Omelettes</a></li>
                                          <li class="menu-item"><a href="#">Breakfast Scrambles</a></li>
                                          <li class="menu-item menu-item-has-children has-child"><a href="#" class="menu-name" data-title="Eggs & other considerations">Eggs & other considerations</a>
                                              <ul class="sub-menu">
                                                  <li class="menu-item"><a href="#">Classic Breakfast</a></li>
                                                  <li class="menu-item"><a href="#">Huevos Rancheros</a></li>
                                                  <li class="menu-item"><a href="#">Everything Egg Sandwich</a></li>
                                                  <li class="menu-item"><a href="#">Egg Sandwich</a></li>
                                                  <li class="menu-item"><a href="#">Vegan Burrito</a></li>
                                                  <li class="menu-item"><a href="#">Biscuits and Gravy</a></li>
                                                  <li class="menu-item"><a href="#">Bacon Avo Egg Sandwich</a></li>
                                              </ul>
                                          </li>
                                          <li class="menu-item"><a href="#">Griddle</a></li>
                                          <li class="menu-item menu-item-has-children has-child"><a href="#" class="menu-name" data-title="Sides & Extras">Sides & Extras</a>
                                              <ul class="sub-menu">
                                                  <li class="menu-item"><a href="#">Breakfast Burrito</a></li>
                                                  <li class="menu-item"><a href="#">Crab Cake Benedict</a></li>
                                                  <li class="menu-item"><a href="#">Corned Beef Hash</a></li>
                                                  <li class="menu-item"><a href="#">Steak & Eggs</a></li>
                                                  <li class="menu-item"><a href="#">Oatmeal</a></li>
                                                  <li class="menu-item"><a href="#">Fruit & Yogurt Parfait</a></li>
                                              </ul>
                                          </li>
                                          <li class="menu-item"><a href="#">Biscuits</a></li>
                                          <li class="menu-item"><a href="#">Seasonal Fruit Plate</a></li>
                                      </ul>
                                  </li>
                                  <li class="menu-item"><a href="#" class="menu-title"><i class="biolife-icon icon-fast-food"></i>Fastfood</a></li>
                                  <li class="menu-item"><a href="#" class="menu-title"><i class="biolife-icon icon-beef"></i>Fresh Meat</a></li>
                                  <li class="menu-item"><a href="#" class="menu-title"><i class="biolife-icon icon-onions"></i>Fresh Onion</a></li>
                                  <li class="menu-item"><a href="#" class="menu-title"><i class="biolife-icon icon-avocado"></i>Papaya & Crisps</a></li>
                                  <li class="menu-item"><a href="#" class="menu-title"><i class="biolife-icon icon-contain"></i>Oatmeal</a></li>
                                  <li class="menu-item"><a href="#" class="menu-title"><i class="biolife-icon icon-fresh-juice"></i>Fresh Bananas & Plantains</a></li>
                              </ul>
                          </div>
                      </div>
                  </div>
                  <div class="col-lg-9 col-md-8 padding-top-2px">
                      <div class="header-search-bar layout-01">
                          <form action="#" class="form-search" name="desktop-seacrh" method="get">
                              <input type="text" name="s" class="input-text" value="" placeholder="Search here...">
                              <select name="category">
                                  <option value="-1" selected>All Categories</option>
                                  @foreach ($Fmaille as $fam)
                                  @if($fam->active == 1)
                                  <option value="{{$fam->id}}"><a href="/categoris/{{$fam->id}}" style="color: red;"> {{$fam->libelle}}</a></option>
                                  @endif
                                  @endforeach
                              </select>
                              <button type="submit" class="btn-submit"><i class="biolife-icon icon-search"></i></button>
                          </form>
                      </div>
                      <div class="live-info">
                          <p class="telephone"><i class="fa fa-phone')}}" aria-hidden="true"></i><b class="phone-number">(+212) 123 456 7891</b></p>
                          <p class="working-time">Mon-Fri: 8:30am-7:30pm; Sat-Sun: 9:30am-4:30pm</p>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </header>