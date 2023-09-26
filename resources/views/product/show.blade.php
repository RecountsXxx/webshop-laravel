@extends('layouts.app')

@section('custom_css')
    <link rel="stylesheet" type="text/css" href="{{asset('styles/product.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('styles/product_responsive.css')}}">
@endsection

@section('custom_js')
    <script src="{{asset('js/product.js')}}"></script>
@endsection

@section('content')
    <div class="product_details">
        <div class="home">
            <div class="home_container">
                <div class="home_background" style="background-image:url('/images/categories.jpg')"></div>
                <div class="home_content_container">
                    <div class="container">
                        <div class="row">
                            <div class="col">
                                <div class="home_content">
                                    <div class="home_title">Smart Phones<span>.</span></div>
                                    <div class="home_text"><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam a ultricies metus. Sed nec molestie eros. Sed viverra velit venenatis fermentum luctus.</p></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row details_row">

                <!-- Product Image -->
                <div class="col-lg-6">
                    <div class="details_image">
                        @php
                            $images = [];
                            if(count($item->images) >0){
                                $images[0] = '/Images/'. $item->images[0]['img'];
                            }
                            else
                                $images[0] = 'https://img.icons8.com/ios-filled/500/no-image.png';

                        @endphp
                        <div class="details_image_large"><img src="{{$images[0]}}" alt=""><div class="product_extra product_new"><a href="categories.html">New</a></div></div>
                        <div class="details_image_thumbnails d-flex flex-row align-items-start justify-content-between">
                            @foreach($item->images as $image)
                                <div class="details_image_thumbnail active" data-image="images/details_1.jpg"><img src="/images/{{$image['img']}}" alt=""></div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <!-- Product Content -->
                <div class="col-lg-6">
                    <div class="details_content">
                        <div class="details_name">{{$item->title}}</div>
                        @if($item->new_price != null)
                            <div class="details_discount">${{$item->price}}</div>
                            <div class="details_price">${{$item->new_price}}</div>
                        @else
                            <div class="details_price">${{$item->price}}</div>
                        @endif

                        <!-- In Stock -->
                        <div class="in_stock_container">
                            <div class="availability">Availability:</div>
                            @if($item->in_stock == true)
                                <span>In Stock</span>
                            @else
                                <spam>Not availability</spam>
                            @endif
                        </div>
                        <div class="details_text">
                           <p>{{$item->description}}</p>
                        </div>

                        <!-- Product Quantity -->
                        <div class="product_quantity_container">
                            <div class="product_quantity clearfix">
                                <span>Qty</span>
                                <input id="quantity_input" type="text" pattern="[0-9]*" value="1">
                                <div class="quantity_buttons">
                                    <div id="quantity_inc_button" class="quantity_inc quantity_control"><i class="fa fa-chevron-up" aria-hidden="true"></i></div>
                                    <div id="quantity_dec_button" class="quantity_dec quantity_control"><i class="fa fa-chevron-down" aria-hidden="true"></i></div>
                                </div>
                            </div>
                                <div type="submit" class="button cart_button"><a href="{{ route('cart_add', $item->id) }}">Add to cart</a></div>
                        </div>

                        <!-- Share -->
                        <div class="details_share">
                            <span>Share:</span>
                            <ul>
                                <li><a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row description_row">
                <div class="col">
                    <div class="description_title_container">
                        <div class="description_title">Description</div>
                        <div class="reviews_title"><a href="#">Reviews <span>(1)</span></a></div>
                    </div>
                    <div class="description_text">
                        <p>{{$item->description}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="products">
        <div class="container">
            <div class="row">
                <div class="col text-center">
                    <div class="products_title">Related Products</div>
                </div>
            </div>
            <div class="row">
                <div class="col">

                    <div class="product_grid" style="position: relative; height: 1019.6px;">
                        @foreach($products as $product)
                           @php
                               $image = '';
                           if(count($product->images) >0){
                               $image = '/Images/'.$product->images[0]['img'];
                           }
                           else
                               $image = 'https://img.icons8.com/ios-filled/500/no-image.png';
                           ?>
                           @endphp
                            <div class="product" style="position: absolute; left: 0px; top: 0px;">
                                <div class="product_image"><img src="{{$image}}" alt=""></div>
                                <div class="product_content">
                                    <div class="product_title"><a href="{{$product->id}}">{{$product->title}}</a></div>
                                    @if($product->new_price != null)
                                        <div class="product_discount">${{$product->price}}</div>
                                        <div class="product_price">${{$product->new_price}}</div>
                                    @else
                                        <div class="product_price">${{$product->price}}</div>
                                    @endif

                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="newsletter">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="newsletter_border"></div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <div class="newsletter_content text-center">
                        <div class="newsletter_title">Subscribe to our newsletter</div>
                        <div class="newsletter_text"><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam a ultricies metus. Sed nec molestie eros</p></div>
                        <div class="newsletter_form_container">
                            <form action="#" id="newsletter_form" class="newsletter_form">
                                <input type="email" class="newsletter_input" required="required">
                                <button class="newsletter_button trans_200"><span>Subscribe</span></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
