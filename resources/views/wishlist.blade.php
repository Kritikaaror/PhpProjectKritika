@extends('layouts.front')

@section('page')
      <div class="container-fluid">
            <div class="row bg-border-color medium-padding120">
                  <div class="container">
                        <div class="row">

                        <div class="col-lg-12">

                              <div class="cart">

                                    <h1 class="cart-title">In Your Wish List: <span class="c-primary"> {{ Cart::content()->count() }} items</span></h1>

                              </div>

                              <form action="#" method="post" class="cart-main">

                                    <table class="shop_table cart">
                                    <thead class="cart-product-wrap-title-main">
                                    <tr>
                                          <th class="product-remove">&nbsp;</th>
                                          <th class="product-thumbnail">Product</th>
                                          <th class="product-price">Price</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    @foreach(Cart::content() as $pdt)
                                          <tr class="cart_item">

                                                <td class="product-remove">
                                                      <a href="{{ route('wishlist.delete', ['id' => $pdt->rowId ]) }}" class="product-del remove" title="Remove this item">
                                                      <i class="seoicon-delete-bold"></i>
                                                      </a>
                                                </td>

                                                <td class="product-thumbnail">

                                                      <div class="cart-product__item">
                                                      <a href="#">
                                                            <img src="{{ asset($pdt->model->image) }}" width="250px"
                                                                 height="250px" alt="product" class="attachment-shop_thumbnail size-shop_thumbnail wp-post-image">
                                                      </a>
                                                      <div class="cart-product-content">
                                                            <h5 class="cart-product-title">{{ $pdt->name }}</h5>
                                                      </div>
                                                      </div>
                                                </td>

                                                <td class="product-price">
                                                      <h5 class="price amount">${{ $pdt->price }}</h5>
                                                </td>

                                             
                                          </tr>
                                    @endforeach

                                    

                             

                                    </tbody>
                                    </table>


                              </form>

                            
                        </div>

                        </div>
                  </div>
            </div>
      </div>
@endsection