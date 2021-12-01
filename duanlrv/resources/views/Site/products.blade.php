@extends('layouts.site')

@section('main')

    <!-- Breadcrumb Section Begin -->
    <div class="breacrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <a href="#"><i class="fa fa-home"></i> Home</a>
                        <span>Shop</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section Begin -->

    <!-- Product Shop Section Begin -->
    <section class="product-shop spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-8 order-2 order-lg-1 produts-sidebar-filter">
                    <div class="filter-widget">
                        <h4 class="fw-title">Danh mục</h4>
                        <ul class="filter-catagories">
                            @foreach ($categoryNav as $cate)
                            <li><a href="{{URL::to('/danh-muc-san-pham/'.$cate->slug)}}">{{$cate->name_nav}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="filter-widget">
                        <h4 class="fw-title">Giá</h4>
                        <div class="filter-range-wrap">
                            <div class="range-slider">
                                <div class="price-input">
                                    <input type="text" id="minamount">
                                    <input type="text" id="maxamount">
                                </div>
                            </div>
                            <div class="price-range ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content"
                                data-min="33" data-max="98">
                                <div class="ui-slider-range ui-corner-all ui-widget-header"></div>
                                <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
                                <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
                            </div>
                        </div>
                        <a href="#" class="filter-btn">Lọc</a>
                    </div>
                    <div class="filter-widget">
                        <h4 class="fw-title">Thương hiệu</h4>
                        <div class="fw-brand-check">
                            <div class="bc-item">
                                <label for="bc-calvin">
                                    Calvin Klein
                                    <input type="checkbox" id="bc-calvin">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <div class="bc-item">
                                <label for="bc-diesel">
                                    Diesel
                                    <input type="checkbox" id="bc-diesel">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <div class="bc-item">
                                <label for="bc-polo">
                                    Polo
                                    <input type="checkbox" id="bc-polo">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <div class="bc-item">
                                <label for="bc-tommy">
                                    Tommy Hilfiger
                                    <input type="checkbox" id="bc-tommy">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="filter-widget">
                        <!-- <h4 class="fw-title">Tags</h4>
                        <div class="fw-tags">
                            <a href="#">Towel</a>
                            <a href="#">Shoes</a>
                            <a href="#">Coat</a>
                            <a href="#">Dresses</a>
                            <a href="#">Trousers</a>
                            <a href="#">Men's hats</a>
                            <a href="#">Backpack</a>
                        </div> -->
                    </div>
                </div>
                <div class="col-lg-9 order-1 order-lg-2">
                    <div class="product-show-option">
                        <div class="row">
                            <div class="col-lg-7 col-md-7">
                                <div class="select-option">
                                    <select class="sorting">
                                        @foreach($category_by_id as $key =>$cate_id)
                                            <a href="{{URL::to('/show-category/'.$cate_id->slug)}}">
                                            <option  value="">{{$cate_id->name}}</option>
                                            </a>
                                        @endforeach
                                        <option value="" selected>-- phân loại --</option>
                                    </select>
                                    <select class="p-show">
                                        <option value="">Show:</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-5 col-md-5 text-right">
                                <p>Hiển thị 01- 09 trong 36 sản phẩm</p>
                            </div>
                        </div>
                    </div>
                    <div class="product-list">
                        <div class="row">
                            <!-- products -->
                            @foreach($products as $product)
                            <div class="col-lg-4 col-sm-6">
                                <div class="product-item">
                                    <div class="pi-pic">
                                        <img src="{{ asset('uploads') }}/{{$product->image}}" height="300px" alt="">
                                        <div class="sale pp-sale">Sale</div>
                                        <div class="icon">
                                            <i class="icon_heart_alt"></i>
                                        </div>
                                        <ul>
                                            <li class="w-icon active"><a href="#"  data-url="{{route('addToCart', ['id'=>$product->id])}}" class=" add_to_cart"  ><i class="icon_bag_alt add_to_cart"></i></a></li>
                                            <!-- <li class="quick-view add_to_cart"><a href="{{URL::to('chi-tiet-san-pham/'.$product->slug_product)}}">Xem chi tiết</a></li> -->
                                            <li class="quick-view"><a href="{{URL::to('chi-tiet-san-pham/'.$product->slug_product)}}">Xem chi tiết</a></li>
                                            <li class="w-icon"><a href="#"><i class="fa fa-random"></i></a></li>
                                        </ul>
                                    </div>
                                    <div class="pi-text">
                                        <div class="catagory-name"></div>
                                        <!-- <div class="catagory-name">{{$product->id}}</div> -->
                                        <a href="#">
                                            <h5>{{$product-> title}}</h5>
                                        </a>
                                        <div class="product-price">
                                        {{$product-> discount}} đ
                                            <span>{{$product-> price}}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            
                        </div>
                    </div>
                    <div class="loading-more">
                        <!-- <i class="icon_loading"></i> -->
                        {{$products->appends(request()->all())->links()}}
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Product Shop Section End -->

@endsection