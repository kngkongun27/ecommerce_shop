@extends('front.layout.master')

@section('title', 'Home')

@section('body')
<!-- Hero Sectin Begin -->
<section class="hero-section">
    <div class="hero-items owl-carousel">
        <div class="single-hero-items set-bg" data-setbg="/front/img/hero-1.jpg">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5">
                        <span>Bag, Kids</span>
                        <h1>Black Friday</h1>
                        <p>Hôm nay là chủ nhật ngày 15/10/2023 đang ngồi update shop bán hàng</p>
                        <a href="#" class="primary-btn">Mua sắm ngay</a>
                    </div>
                </div>
                <div class="off-card">
                    <h2>Giảm giá <span>50%</span></h2>
                </div>
            </div>
        </div>
        <div class="single-hero-items set-bg" data-setbg="/front/img/hero-2.jpg">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5">
                        <span>Bag, Kids</span>
                        <h1>Black Friday</h1>
                        <p>Hôm nay là chủ nhật ngày 12/03/2023 đang ngồi code template shop bán hàng</p>
                        <a href="#" class="primary-btn">Mua sắm ngay</a>
                    </div>
                </div>
                <div class="off-card">
                    <h2>Giảm giá <span>50%</span></h2>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Hero Sectin End -->
<!-- Banner Begin  -->
<div class="banner-section spad">
    <div class="container-fuild">
        <div class="row">
            <div class="col-lg-4">
                <div class="single-banner">
                    <img src="/front/img/banner-1.jpg" alt="">
                    <div class="inner-text">
                        <h4>Man's</h4>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="single-banner">
                    <img src="/front/img/banner-2.jpg" alt="">
                    <div class="inner-text">
                        <h4>Women's</h4>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="single-banner">
                    <img src="/front/img/banner-3.jpg" alt="">
                    <div class="inner-text">
                        <h4>Kid's</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Women Banner Section Begin -->
<section class="women-banner spad">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3">
                <div class="product-large set-bg" data-setbg="/front/img/products/women-large.jpg">
                    <h2>Women's</h2>
                    <a href="#">Khám phá thêm</a>
                </div>
            </div>
            <div class="col-lg-8 offset-lg-1">
                <div class="filter-control">
                    <ul>
                        <li class="active item" data-tag="*" data-category="women">Tất cả</li>
                        <li class="item" data-tag=".Clothing" data-category="women">Quần Áo</li>
                        <li class="item" data-tag=".Handbag" data-category="women">Túi Xách</li>
                        <li class="item" data-tag=".Shoes" data-category="women">Giày</li>
                        <li class="item" data-tag=".Accessories" data-category="women">Phụ Kiện</li>
                    </ul>
                </div>
                <div class="product-slider owl-carousel women">

                    @foreach($featuredProducts['women'] as $product)
                    @include('front.components.product-item-women')
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</section>
<!-- Deal off The Week Section Begin -->
<section class="deal-of-week set-bg spad" data-setbg="/front/img/time-bg.jpg">
    <div class="container">
        <div class="col-lg-6 text-center">
            <div class="section-title">
                <h2>Khuyến mãi tuần</h2>
                <p>bây giờ là chiều chủ nhật 3h26p </p>
                <div class="product-price">
                    $35.00
                    <span>/ Túi xách</span>
                </div>
            </div>
            <div class="section-title">
                <h2>Khuyến mãi Tháng</h2>
                <p>tối thứ bảy </p>
                <div class="product-price">
                    $35.00
                    <span>/ Túi xách</span>
                </div>
            </div>
            <div class="countdown-timer" id="countdown">
                <div class="cd-item">
                    <span>56</span>
                    <p>Days</p>
                </div>
                <div class="cd-item">
                    <span>12</span>
                    <p>Hrs</p>
                </div>
                <div class="cd-item">
                    <span>40</span>
                    <p>Mins</p>
                </div>
            </div>
            <a href="" class="primary-btn">Shop Now</a>
        </div>
    </div>
</section>

<!-- Men Banner Section Begin -->
<section class="man-banner spad">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-8">
                <div class="filter-control">
                    <ul>
                        <li class="active item" data-tag="*" data-category="men">Tất Cả</li>
                        <li class="item" data-tag=".Clothing" data-category="men">Quần Áo</li>
                        <li class="item" data-tag=".Handbag" data-category="men">Túi Xách</li>
                        <li class="item" data-tag=".Shoes" data-category="men">Giày</li>
                        <li class="item" data-tag=".Accessories" data-category="men">Phụ Kiện</li>
                    </ul>
                </div>
                <div class="product-slider owl-carousel men">

                    @foreach($featuredProducts['men'] as $product)
                        @include('front.components.product-item-men')
                    @endforeach
                </div>

            </div>
            <div class="col-lg-3 offset-lg-1">
                <div class="product-large set-bg" data-setbg="/front/img/products/man-large.jpg">
                    <h2>Men's</h2>
                    <a href="#">Khám phá thêm</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Men Banner Section End -->

<!-- Instagram Section Begin -->
<div class="instagram-photo">
    <div class="insta-item set-bg" data-setbg="/front/img/insta-1.jpg">
        <div class="inside-text">
            <i class="ti-instagram"></i>
            <h5><a href="#">HungluonytCollection</a></h5>
        </div>
    </div>
    <div class="insta-item set-bg" data-setbg="/front/img/insta-2.jpg">
        <div class="inside-text">
            <i class="ti-instagram"></i>
            <h5><a href="#">HungluonytCollection</a></h5>
        </div>
    </div>
    <div class="insta-item set-bg" data-setbg="/front/img/insta-3.jpg">
        <div class="inside-text">
            <i class="ti-instagram"></i>
            <h5><a href="#">HungluonytCollection</a></h5>
        </div>
    </div>
    <div class="insta-item set-bg" data-setbg="/front/img/insta-4.jpg">
        <div class="inside-text">
            <i class="ti-instagram"></i>
            <h5><a href="#">HungluonytCollection</a></h5>
        </div>
    </div>
    <div class="insta-item set-bg" data-setbg="/front/img/insta-5.jpg">
        <div class="inside-text">
            <i class="ti-instagram"></i>
            <h5><a href="#">HungluonytCollection</a></h5>
        </div>
    </div>
    <div class="insta-item set-bg" data-setbg="/front/img/insta-6.jpg">
        <div class="inside-text">
            <i class="ti-instagram"></i>
            <h5><a href="#">HungluonytCollection</a></h5>
        </div>
    </div>
</div>

<!-- Lastest Blog Section Begin -->
<section class="latest-blog spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h2> Blog</h2>
                </div>
            </div>
        </div>
        <div class="row">

            @foreach($blogs as $blog)
            <div class="col-lg-4 col-md-6">
                <div class="single-latest-blog">
                    @if($blog->image === "Null")
                    <img src="/front/img/products/default-product.png" alt="" style="height: 250px;">
                    @else 
                    <img src="/front/img/blog/{{ $blog->image }}" alt="">
                    
                    @endif
                    <div class="latest-text">
                        <div class="tag-list">
                            <div class="tag-item">
                                <i class="fa fa-calendar-o"></i>
                                {{date('d M, Y', strtotime($blog->created_at))}}
                            </div>
                            <div class="tag-item">
                                <i class="fa fa-comment-o"></i>
                                {{count($blog->blogComments)}}
                            </div>
                        </div>
                        <a href="">
                            <h4>{{ $blog->title}} </h4>
                        </a>
                        <p>{{$blog->subtitle}} </p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="benefit-items">
            <div class="row">
                <div class="col-lg-4">
                    <div class="single-benefit">
                        <div class="sb-icon">
                            <img src="/front/img/icon-1.png" alt="">
                        </div>
                        <div class="sb-text">
                            <h6>Giao Hàng Nhanh Chóng</h6>
                            <p>Áp dụng cho mọi đơn hàng</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="single-benefit">
                        <div class="sb-icon">
                            <img src="/front/img/icon-2.png" alt="">
                        </div>
                        <div class="sb-text">
                            <h6>Đúng thời gian giao hàng</h6>
                            <p>Thời gian giao hàng chính xác</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="single-benefit">
                        <div class="sb-icon">
                            <img src="/front/img/icon-3.png" alt="">
                        </div>
                        <div class="sb-text">
                            <h6>Cam kết khi giao hàng</h6>
                            <p>Thanh toán khi nhận hàng</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Lastest Blog Section End -->
@endsection