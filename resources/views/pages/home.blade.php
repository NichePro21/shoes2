@extends('layout')
@section('content')
<div class="row">
  <!-- Sidebar-->
  <aside class="col-lg-4">
    <!-- Sidebar-->
    <div class="offcanvas offcanvas-collapse bg-white w-100 rounded-3 shadow-lg py-1" id="shop-sidebar" style="max-width: 22rem;">
      <div class="offcanvas-header align-items-center shadow-sm">
        <h2 class="h5 mb-0">Filters</h2>
        <button class="btn-close ms-auto" type="button" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body py-grid-gutter px-lg-grid-gutter">
        <!-- Categories-->
        <div class="widget widget-categories mb-4 pb-4 border-bottom">
          <h3 class="widget-title">Categories</h3>
          <div class="accordion mt-n1" id="shop-categories">
            <!-- Shoes-->
            @foreach($category as $key => $cate_pro)
            <div class="accordion-item">
              <h3 class="accordion-header">
                  <a class="accordion-button collapsed" href="{{URL::to('/category/'.$cate_pro->CatID)}}" role="button" aria-expanded="false" aria-controls="shoes">
                      {{$cate_pro->CateName}}
                    </a>
                </h3>
            </div>
            @endforeach
        
      </div>
    </div>
    <div class="widget widget-filter mb-4 pb-4 border-bottom">
        <h3 class="widget-title">Brand</h3>
        <div class="input-group input-group-sm mb-2">
          <input class="widget-filter-search form-control rounded-end pe-5" type="text" placeholder="Search"><i class="ci-search position-absolute top-50 end-0 translate-middle-y fs-sm me-3"></i>
        </div>
        <ul class="widget-list widget-filter-list list-unstyled pt-1" style="max-height: 11rem;" data-simplebar="init" data-simplebar-auto-hide="false"><div class="simplebar-wrapper" style="margin: -4px -16px 0px 0px;"><div class="simplebar-height-auto-observer-wrapper"><div class="simplebar-height-auto-observer"></div></div><div class="simplebar-mask"><div class="simplebar-offset" style="right: 0px; bottom: 0px;"><div class="simplebar-content-wrapper" style="height: auto; overflow: hidden scroll;"><div class="simplebar-content" style="padding: 4px 16px 0px 0px;">
          @foreach($brand as $key => $brand_product)
            <li class="widget-filter-item d-flex justify-content-between align-items-center mb-1">
            <div class="form-check">
              <input class="form-check-input" type="checkbox" id="adidas">
              <label class="form-check-label widget-filter-item-text" for="adidas">{{$brand_product->BName}}</label>
            </div>
          </li>
          @endforeach
        </div></div></div></div><div class="simplebar-placeholder" style="width: auto; height: 870px;"></div></div><div class="simplebar-track simplebar-horizontal" style="visibility: hidden;"><div class="simplebar-scrollbar simplebar-visible" style="width: 0px; display: none;"></div></div><div class="simplebar-track simplebar-vertical" style="visibility: visible;"><div class="simplebar-scrollbar simplebar-visible" style="height: 35px; transform: translate3d(0px, 141px, 0px); display: block;"></div></div></ul>
      </div>
  </aside>
  <!-- Content  -->
  <section class="col-lg-8">
    <!-- Toolbar-->
    <div class="d-flex justify-content-center justify-content-sm-between align-items-center pt-2 pb-4 pb-sm-5">
      <div class="d-flex flex-wrap">
        <div class="d-flex align-items-center flex-nowrap me-3 me-sm-4 pb-3">
          <label class="text-light fs-sm opacity-75 text-nowrap me-2 d-none d-sm-block" for="sorting">Sort by:</label>
          <select class="form-select" id="sorting">
            <option>Popularity</option>
            <option>Low - Hight Price</option>
            <option>High - Low Price</option>
            <option>Average Rating</option>
            <option>A - Z Order</option>
            <option>Z - A Order</option>
          </select><span class="fs-sm text-light opacity-75 text-nowrap ms-2 d-none d-md-block">of 287 products</span>
        </div>
      </div>
      <div class="d-flex pb-3"><a class="nav-link-style nav-link-light me-3" href="#"><i class="ci-arrow-left"></i></a><span class="fs-md text-light">1 / 5</span><a class="nav-link-style nav-link-light ms-3" href="#"><i class="ci-arrow-right"></i></a></div>
      <div class="d-none d-sm-flex pb-3"><a class="btn btn-icon nav-link-style nav-link-light me-2" href="shop-grid-ls.html"><i class="ci-view-grid"></i></a><a class="btn btn-icon nav-link-style bg-light text-dark disabled opacity-100" href="#"><i class="ci-view-list"></i></a></div>
    </div>
<div class="row mx-n2">
    <!-- Product-->
    @foreach($all_product as $key => $product)
    <div class="col-md-4 col-sm-6 px-2 mb-4">
      <div class="card product-card">
        <button class="btn-wishlist btn-sm" type="button" data-bs-toggle="tooltip" data-bs-placement="left" title="" data-bs-original-title="Add to wishlist" aria-label="Add to wishlist"><i class="ci-heart"></i></button><a class="card-img-top d-block overflow-hidden" href="{{URL::to('/product/'.$product->PID)}}"><img src="{{URL::to('/public/uploads/product/')}}/{{$product->PPhoto}}" alt="Product"></a>
        <div class="card-body py-2"><a class="product-meta d-block fs-xs pb-1" href="#">Sneakers &amp; Keds</a>
          <h3 class="product-title fs-sm"><a href="shop-single-v1.html">{{$product->PName}}</a></h3>
          <div class="d-flex justify-content-between">
            <div class="product-price"><span class="text-accent">{{number_format($product->PPrice)}} <small>VND</small></span></div>
            <div class="star-rating"><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star"></i>
            </div>
          </div>
        </div>
        <div class="card-body card-body-hidden">
          <div class="text-center pb-2">
            <div class="form-check form-option form-check-inline mb-2">
              <input class="form-check-input" type="radio" name="size1" id="s-75">
              <label class="form-option-label" for="s-75">7.5</label>
            </div>
            <div class="form-check form-option form-check-inline mb-2">
              <input class="form-check-input" type="radio" name="size1" id="s-80" checked="">
              <label class="form-option-label" for="s-80">8</label>
            </div>
            <div class="form-check form-option form-check-inline mb-2">
              <input class="form-check-input" type="radio" name="size1" id="s-85">
              <label class="form-option-label" for="s-85">8.5</label>
            </div>
            <div class="form-check form-option form-check-inline mb-2">
              <input class="form-check-input" type="radio" name="size1" id="s-90">
              <label class="form-option-label" for="s-90">9</label>
            </div>
          </div>
          <button class="btn btn-primary btn-sm d-block w-100 mb-2" type="button"><i class="ci-cart fs-sm me-1"></i>Add to Cart</button>
          <div class="text-center"><a class="nav-link-style fs-ms" href="#quick-view" data-bs-toggle="modal"><i class="ci-eye align-middle me-1"></i>Quick view</a></div>
        </div>
      </div>
      <hr class="d-sm-none">
    </div>
    <!-- Product-->
   @endforeach
  </div>
@endsection