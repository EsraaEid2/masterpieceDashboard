@extends('theme.master')
@section('title','Wishlist')
@section('content')

@include('theme.partials.hero',['title' => 'Wishlist'])

<!--== Page Content Wrapper Start ==-->
<div id="page-content-wrapper" class="p-9">
    <div class="container">
        <!-- Wishlist Page Content Start -->
        <div class="row">
            <div class="col-lg-12">
                <!-- Wishlist Table Area -->
                <div class="cart-table table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th class="pro-thumbnail">Thumbnail</th>
                                <th class="pro-title">Product</th>
                                <th class="pro-price">Price</th>
                                <th class="pro-quantity">Stock Status</th>
                                <th class="pro-subtotal">Add to Cart</th>
                                <th class="pro-remove">Remove</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="pro-thumbnail"><a href="#"><img class="img-fluid"
                                            src="{{ asset('assets') }}/img/product-1.jpg" alt="Product" /></a></td>
                                <td class="pro-title"><a href="#">Zeon Zen 4 Pro</a></td>
                                <td class="pro-price"><span>$295.00</span></td>
                                <td class="pro-quantity"><span class="text-success">In Stock</span></td>
                                <td class="pro-subtotal"><a href="cart.html" class="btn-add-to-cart">Add to Cart</a>
                                </td>
                                <td class="pro-remove"><a href="#"><i class="fa fa-trash-o"></i></a></td>
                            </tr>
                            <tr>
                                <td class="pro-thumbnail"><a href="#"><img class="img-fluid"
                                            src="{{ asset('assets') }}/img/product-2.jpg" alt="Product" /></a></td>
                                <td class="pro-title"><a href="#">Aquet Drone D 420</a></td>
                                <td class="pro-price"><span>$275.00</span></td>
                                <td class="pro-quantity"><span class="text-success">In Stock</span></td>
                                <td class="pro-subtotal"><a href="cart.html" class="btn-add-to-cart">Add to Cart</a>
                                </td>
                                <td class="pro-remove"><a href="#"><i class="fa fa-trash-o"></i></a></td>
                            </tr>
                            <tr>
                                <td class="pro-thumbnail"><a href="#"><img class="img-fluid"
                                            src="{{ asset('assets') }}/img/product-3.jpg" alt="Product" /></a></td>
                                <td class="pro-title"><a href="#">Game Station X 22</a></td>
                                <td class="pro-price"><span>$295.00</span></td>
                                <td class="pro-quantity"><span class="text-danger">Stock Out</span></td>
                                <td class="pro-subtotal"><a href="cart.html" class="btn-add-to-cart disabled">Add to
                                        Cart</a></td>
                                <td class="pro-remove"><a href="#"><i class="fa fa-trash-o"></i></a></td>
                            </tr>
                            <tr>
                                <td class="pro-thumbnail"><a href="#"><img class="img-fluid"
                                            src="{{ asset('assets') }}/img/product-4.jpg" alt="Product" /></a></td>
                                <td class="pro-title"><a href="#">Roxxe Headphone Z 75 </a></td>
                                <td class="pro-price"><span>$110.00</span></td>
                                <td class="pro-quantity"><span class="text-success">In Stock</span></td>
                                <td class="pro-subtotal"><a href="cart.html" class="btn-add-to-cart">Add to Cart</a>
                                </td>
                                <td class="pro-remove"><a href="#"><i class="fa fa-trash-o"></i></a></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- Wishlist Page Content End -->
    </div>
</div>
<!--== Page Content Wrapper End ==-->

@endsection