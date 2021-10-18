@extends('layout')
@section('content')

<div class="container pb-5 mb-2 mb-md-4">
    <div class="row">
      <?php 
      // $content = Cart::content();
      //   echo '<pre>';
      //     print_r($content);
      //     echo'</pre>';
      $content = Cart::content();
        ?>
      <section class="col-lg-8">
        <div class="d-flex justify-content-between align-items-center pt-3 pb-4 pb-sm-5 mt-1">
          <h2 class="h6 text-light mb-0">Products</h2><a class="btn btn-outline-primary btn-sm ps-2" href="/"><i class="ci-arrow-left me-2"></i>Continue shopping</a>
        </div>
        <!-- Item-->
        @foreach($content as $key => $content)
        <div class="d-sm-flex justify-content-between align-items-center my-2 pb-3 border-bottom">
          <div class="d-block d-sm-flex align-items-center text-center text-sm-start">
            <a class="d-inline-block flex-shrink-0 mx-auto me-sm-4" href="shop-single-v1.html">
              <img src="{{URL::to('/public/uploads/product/')}}/{{$content->options->image}}" width="160" alt="Product"></a>
            <div class="pt-2">
              <h3 class="product-title fs-base mb-2"><a href="shop-single-v1.html">{{$content->name}}</a></h3>
              <div class="fs-sm"><span class="text-muted me-2">Size:</span>{{$content->options->size}}</div>
              <div class="fs-lg text-accent pt-2">{{number_format($content->price)}}.<small> VND</small></div>
            </div>
          </div>
          
          <div class="pt-2 pt-sm-0 ps-sm-3 mx-auto mx-sm-0 text-center text-sm-start" style="max-width: 9rem;">
            <form action="{{URL::to('/update-cart-quantity')}}" method="post">
              {{csrf_field()}}
            <label class="form-label" for="quantity1">Quantity</label>
            <input class="form-control" type="number" min="1" name="cart_quantity" value="{{$content->qty}}">
            <input type="hidden" name="rowId_cart" value="{{$content->rowId}}">
            <input type="submit" name="update_qty" value="Update" class="btn btn-default btn-sm">
            <a href="{{URL::to('/delete-to-cart/'.$content->rowId)}}">
            <button class="btn btn-link px-0 text-danger" type="button">
              <i class="ci-close-circle me-2"></i><span class="fs-sm">Remove</span>
            </button>
          </a>
            </form>
          </div>
        </div>
        @endforeach
        
        <button class="btn btn-outline-accent d-block w-100 mt-4" type="button"><i class="ci-loading fs-base me-2"></i>Update cart</button>
      </section>
      <!-- Sidebar-->
      <aside class="col-lg-4 pt-4 pt-lg-0 ps-xl-5">
        <div class="bg-white rounded-3 shadow-lg p-4">
          <div class="py-2 px-xl-2">
            <div class="text-center mb-4 pb-3 border-bottom">
              <h2 class="h6 mb-3 pb-1">Subtotal</h2>
              <h3 class="fw-normal">{{Cart::subtotal(0)}}<small> VND</small></h3>
            </div>
            <div class="mb-3 mb-4">
              <label class="form-label mb-3" for="order-comments"><span class="badge bg-info fs-xs me-2">Note</span><span class="fw-medium">Additional comments</span></label>
              <textarea class="form-control" rows="6" id="order-comments"></textarea>
            </div>
            <div class="accordion" id="order-options">
              <label class="form-label mb-3" for="order-comments">
                <span class="fw-medium" style="padding-top:1%">Shipping fee: </span>Free<hr>
                <span class="fw-medium" style="padding-top:1%">Tax 5% : </span>{{Cart::tax(0).''. ' VND'}}<hr>
                <h3><span class="fw-medium">Total: </span>{{Cart::total(0).''. ' VND'}}</h3>

              </label>
              <?php 
              $customer_id = Session::get('CID');
              if($customer_id != NULL){
              ?>
            </div><a class="btn btn-primary btn-shadow d-block w-100 mt-4" href="/checkout"><i class="ci-card fs-lg me-2"></i>Proceed to Checkout</a>

              <?php  }else{ ?>
            </div><a class="btn btn-primary btn-shadow d-block w-100 mt-4" href="/login-checkout"><i class="ci-card fs-lg me-2"></i>Proceed to Checkout</a>
            <?php } ?>
          </div>
        </div>
      </aside>
    </div>
  </div>

@endsection