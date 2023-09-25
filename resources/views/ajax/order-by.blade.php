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
        <div class="product">
            <div class="product_image"><img src="{{$image}}" alt=""></div>
            <div class="product_content">
                <div class="product_title"><a href="{{route('show_product',[$category->id, $product->id])}}">{{$product->title}}</a></div>
                @if($product->new_price != null)
                    <div class="product_discount">${{$product->price}}</div>
                    <div class="product_price">${{$product->new_price}}</div>
                @else
                    <div class="product_price">${{$product->price}}</div>
                @endif
            </div>
        </div>
 @endforeach
