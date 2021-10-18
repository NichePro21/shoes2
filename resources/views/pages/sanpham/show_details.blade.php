@extends('layout')
@section('content')
@foreach($detail_product as $key => $detail)

<div class="container pb-5 mb-2 mb-md-4">
<div class="container">
  <div class="bg-light shadow-lg rounded-3">
    <!-- Tabs-->
    <ul class="nav nav-tabs" role="tablist">
      <li class="nav-item"><a class="nav-link py-4 px-sm-4 active" href="#general" data-bs-toggle="tab" role="tab">        <h1 class="h3 text-light mb-2">Smartwatch Youth Edition</h1>
<h3><span class="d-none d-sm-inline">{{$detail->PName}}</span></h3></a></li>
      
    </ul>
    <div class="px-4 pt-lg-3 pb-3 mb-5">
      <div class="tab-content px-lg-3">
        <!-- General info tab-->
        <div class="tab-pane fade show active" id="general" role="tabpanel">
          <div class="row">
            <!-- Product gallery-->
            <div class="col-lg-7 pe-lg-0">
              <div class="product-gallery">
                <div class="product-gallery-preview order-sm-2">
                  <div class="product-gallery-preview-item active" id="first">
                    <img class="image-zoom" src="{{URL::to('/public/uploads/product/')}}/{{$detail->PPhoto}}" data-zoom="{{URL::to('/public/uploads/product/')}}/{{$detail->PPhoto}}" alt="Product image">

                  </div>
                </div>
                <div class="product-gallery-thumblist order-sm-1">
                  <a class="product-gallery-thumblist-item active" href="#first">
                    <img src="{{URL::to('/public/uploads/product/')}}/{{$detail->PPhoto}}" alt="Product thumb"></a>
                          <a class="product-gallery-thumblist-item video-item" href="https://www.youtube.com/watch?v=nrQevwouWn0" lg-uid="lg0">
                    <div class="product-gallery-thumblist-item-text">
                      <i class="ci-video"></i>Video</div></a></div>
              </div>
            </div>
            <!-- Product details-->
            <div class="col-lg-5 pt-4 pt-lg-0">
              <div class="product-details ms-auto pb-3">
                <form action="{{URL::to('/save-cart')}}" method="post">
                  {{ csrf_field() }}
                <div class="h3 fw-normal text-accent mb-3 me-1">{{number_format($detail->PPrice)}}<small> VND</small></div>
                <div class="fs-sm mb-4"><span class="text-heading fw-medium me-1">Brand:</span><span class="text-muted" id="colorOption">{{$detail->BName}}</span></div>
                <div class="fs-sm mb-4"><span class="text-heading fw-medium me-1">Category:</span><span class="text-muted" id="colorOption">{{$detail->CateName}}</span></div>
                
                <div class="mb-3">
                  <div class="d-flex justify-content-between align-items-center pb-1">
                    <label class="form-label" for="product-size">Size:</label><a class="nav-link-style fs-sm" href="#size-chart" data-bs-toggle="modal"><i class="ci-ruler lead align-middle me-1 mt-n1"></i>Size guide</a>
                  </div>
                  <select class="form-select" required="" id="product-size">
                    <option value="">Select size</option>
                    <option value="xs" name="size">{{$detail->PSize}}</option>
                  </select>
                </div>
                <div class="form-group col-md-3">
                  <label for="inputZip">Qty:</label>
                  <input type="number" min="1" class="form-control" name="qty" value="1">
                  <input type="hidden" class="form-control" name="PID_hidden" value="{{$detail->PID}}">
                </div>
                <br>
                <button class="btn btn-primary btn-shadow d-block w-100" type="submit"><i class="ci-cart fs-lg me-2"></i>Add to Cart</button>
                <br>
                <div class="position-relative me-n4 mb-3">
                  <div style="padding-top:1%" class="product-badge product-available mt-n1"><i class="ci-security-check"></i>Product available</div>
                </div>
                </form>
              </div>
            </div>
          </div>
        </div>

        </div>
      </div>
    </div>
  </div>
  @endforeach
  
@endsection