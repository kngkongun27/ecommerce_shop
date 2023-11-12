<div class="col-lg-3 col-sm-6">
    <div class="product-item">
        <div class="pi-pic">
            <img src="front/img/products/{{ $product->productImages[0]->path ?? ''}}" alt="">

            @if($product->discount != null)
            <div class="sale pp-sale">Sale</div>
            @endif
            <div class="icon">
                <i class="icon_heart_alt"></i>
            </div>
            <ul>
                <li class="w-icon active"><a href=""><i class="icon_bag_alt"></i></a></li>
                <li class="quick-view"><a href="shop/product/{{ $product->id }}">+ Chi Tiết</a></li>
                <li class="w-icon"><a href="#"><i class="fa fa-random"></i></a></li>
            </ul>
        </div>
        <div class="pi-text">
            <div class="category-name">{{ $product->tag }}</div>
            <a href="#">
                <h5>{{ $product->name }}</h5>
            </a>
            <div class="product-price">
                @if ($product->discount != null)
                ${{ $product->discount }}
                <span>${{ $product->price }}</span>
                @else
                <span>${{ $product->price }}</span>
                @endif
            </div>
        </div>
    </div>
</div>