@extends('layouts.app')

@section('custom_css')
    <link rel="stylesheet" type="text/css" href="{{asset('styles/cart.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('styles/cart_responsive.css')}}">
@endsection

@section('custom_js')
    <script src="{{asset('js/cart.js')}}"></script>
    <script>
        let radioButtons = document.getElementsByName('radio');
        let products_price = document.getElementsByClassName('cart_item_price');
        let product_price = document.getElementById('product_price');
        let total_price = document.getElementById('total_price');
        var price = '';
        var sum = '';

        for(let i = 0; i < radioButtons.length;i++){
            radioButtons[i].addEventListener('click',()=>{
                if(radioButtons[i].checked){
                    let deliveryOptions = document.getElementsByClassName('delivery_options');
                   price = deliveryOptions[0].children[i].children[2].textContent;
                    let shipping_price = document.getElementById('shipping_price');
                    shipping_price.textContent = price;
                    let num1 = parseFloat(price.replace('$', ''));
                    let num2 = parseFloat(sum.replace('$', ''));
                    let result = num2 + num1;
                    total_price.textContent = '$' + result;
                }
            })
        }

        for(let i =0; i < products_price.length;i++){
            let value = parseInt(products_price[i].textContent.replace('$', ''), 10);
            sum += value;

        }
        product_price.textContent = '$' + sum;
        total_price.textContent = '$' + sum + price;

    </script>
@endsection

@section('content')
    <div class="home">
        <div class="home_container">
            <div class="home_background" style="background-image:url('/images/cart.jpg')"></div>
            <div class="home_content_container">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <div class="home_content">
                                <div class="breadcrumbs">
                                    <ul>
                                        <li><a href="{{route('index')}}">Home</a></li>
                                        <li>Shopping Cart</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Cart Info -->

    <div class="cart_info">
        <div class="container">
            <div class="row">
                <div class="col">
                    <!-- Column Titles -->
                    <div class="cart_info_columns clearfix">
                        <div class="cart_info_col cart_info_col_product">Product</div>
                        <div class="cart_info_col cart_info_col_price">Price</div>
                    </div>
                </div>
            </div>
            <div class="row cart_items_row">
                <div class="col">
                    @if(isset($cart))
                        @foreach($cart as $key => $product)
                                @php
                                    $images = [];
                                    if(count($product->images) >0){
                                        $images[0] = '/Images/'. $product->images[0]['img'];
                                    }
                                    else
                                        $images[0] = 'https://img.icons8.com/ios-filled/500/no-image.png';

                                @endphp
                            <div class="cart_item d-flex flex-lg-row flex-column align-items-lg-center align-items-start justify-content-start">
                                <!-- Name -->
                                <div class="cart_item_product d-flex flex-row align-items-center justify-content-start">
                                    <div class="cart_item_image">
                                        <div><img src="{{$images[0]}}" alt=""></div>
                                    </div>
                                    <div class="cart_item_name_container">
                                        <div class="cart_item_name"><a href="#">{{$product->title}}</a></div>
                                    </div>
                                </div>
                                <!-- Price -->
                                <div class="cart_item_price">${{$product->price}}</div>
                                <div class="button clear_cart_button"><a href="{{route('cart_remove',$key)}}">Remove</a></div>
                            </div>

                        @endforeach
                    @else
                        <h1>Cart is empty</h1>
                    @endif

                </div>
            </div>
            <div class="row row_cart_buttons">
                <div class="col">
                    <div class="cart_buttons d-flex flex-lg-row flex-column align-items-start justify-content-start">
                        <div class="button continue_shopping_button"><a href="{{route('index')}}">Continue shopping</a></div>
                        <div class="cart_buttons_right ml-lg-auto">
                            <div class="button clear_cart_button"><a href="{{route('clear_cart')}}">Clear cart</a></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row row_extra">
                <div class="col-lg-4">

                    <!-- Delivery -->
                    <div class="delivery">
                        <div class="section_title">Shipping method</div>
                        <div class="section_subtitle">Select the one you want</div>
                        <div class="delivery_options">
                            <label class="delivery_option clearfix">Next day delivery
                                <input  type="radio" name="radio">
                                <span class="checkmark"></span>
                                <span class="delivery_price">$4.99</span>
                            </label>
                            <label class="delivery_option clearfix">Standard delivery
                                <input type="radio" name="radio">
                                <span class="checkmark"></span>
                                <span class="delivery_price">$1.99</span>
                            </label>
                            <label class="delivery_option clearfix">Personal pickup
                                <input type="radio" checked="checked" name="radio">
                                <span class="checkmark"></span>
                                <span class="delivery_price">$0.99</span>
                            </label>
                        </div>
                    </div>

                    <!-- Coupon Code -->
                    <div class="coupon">
                        <div class="section_title">Coupon code</div>
                        <div class="section_subtitle">Enter your coupon code</div>
                        <div class="coupon_form_container">
                            <form action="#" id="coupon_form" class="coupon_form">
                                <input type="text" class="coupon_input" required="required">
                                <button class="button coupon_button"><span>Apply</span></button>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 offset-lg-2">
                    <div class="cart_total">
                        <div class="section_title">Cart total</div>
                        <div class="section_subtitle">Final info</div>
                        <div class="cart_total_container">
                            <ul>
                                <li class="d-flex flex-row align-items-center justify-content-start">
                                    <div class="cart_total_title">Subtotal</div>
                                    <div class="cart_total_value ml-auto" id="product_price">$790.90</div>
                                </li>
                                <li class="d-flex flex-row align-items-center justify-content-start">
                                    <div class="cart_total_title">Shipping</div>
                                    <div class="cart_total_value ml-auto" id="shipping_price">$1.99</div>
                                </li>
                                <li class="d-flex flex-row align-items-center justify-content-start">
                                    <div class="cart_total_title">Total</div>
                                    <div class="cart_total_value ml-auto" id="total_price">$790.90</div>
                                </li>
                            </ul>
                        </div>
                        <div class="button checkout_button"><a href="#">Proceed to checkout</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
