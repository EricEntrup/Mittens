@extends('layouts.master')

@section('head')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/instantsearch.css@7/themes/algolia-min.css"/>
    <link rel="stylesheet" href="{{ asset('css/Ecommerce.css') }}">
    <link rel="stylesheet" href="{{ asset('css/EcommerceResponsive.css') }}">
@endsection
@section('content')
<div id="content-page" class="content-page">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="iq-card">
                    <div class="row d-flex align-items-center mb-2">
                        <div class="col-md-9">
                            <div class="d-flex align-items-center">
                                <h4 class="mb-0 p-3 ml-2">Wishlist</h4>
                                <ol class="breadcrumb bg-transparent mb-0 mt-1">
                                    <li class="breadcrumb-item"><a href="{{ route('home') }}" class="" target="_self"><i class="ri-home-4-line mr-1 float-left"></i>Home</a></li>
                                    <li class="breadcrumb-item active"><span aria-current="location">Wishlist</span></li>
                                </ol>
                            </div>
                        </div>
                        <!-- <div class="text-right col-md-3"><button type="button" class="btn text-warning btn-none"><i class="ri-star-fill font-size-24"></i></button></div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="iq-product-layout-list">
                    <div>
                        <div class="iq-card ">
                            <div class="card-body">
                                <div class="row align-items-center align-content-center">
                                    <div class="col-lg-12">
                                        <div class="d-flex justify-content-between">
                                            <div>
                                                <div class="d-block d-md-none">
                                                    <div class="h-56 d-flex align-items-center justify-content-center bg-white iq-border-radius-15">
                                                        <a href="javascript:void(0)">
                                                            <img src="https://cdn-demo.algolia.com/bestbuy-0118/5578851_sb.jpg" alt="Amazon - Echo Dot" class="grid-view-img px-4 w-130">
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="media">
                                                    <div class="w-20 text-center mr-4 d-none d-md-block align-self-center bg-white">
                                                        <a href="javascript:void(0)">
                                                            <img  src="https://cdn-demo.algolia.com/bestbuy-0118/5578851_sb.jpg" alt="Amazon - Echo Dot" class="img-fluid mr-3"></a>
                                                    </div>
                                                    <div class="media-body">
                                                        <h5><a href="javascript:void(0)" title="Amazon - Echo Dot">Amazon - Echo Dot </a></h5>
                                                        <span class="font-size-14 text-muted">By <b>Amazon</b></span>
                                                        <p class="text-success">In stock</p>
                                                        <div class="price d-flex flex-wrap align-items-center mb-3">
                                                            <h5>$ 49.99</h5>
                                                            <h6 class="ml-2 mr-2"><del style="color: rgb(119, 125, 116);">$ 47.99</del></h6>
                                                            <h6 class="text-success">10% off </h6>
                                                            <p class="text-success mb-0"> 3 Offer Avilable</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div>
                                                <div class="d-flex justify-content-between">
                                                    <div class="checkout-policy">
                                                        <p class="mb-0 mt-2">Delivery by, Thu Jan 30 </p>
                                                        <p class="m-0">10 Days Replacement Policy</p>
                                                        <div class="d-flex justify-content-start btn-increment my-2">
                                                            <button type="button" class="btn-less"><i class="ri-subtract-fill"></i></button>
                                                            <input type="number" min="1" max="10" value="1" class="increment">
                                                            <button type="button" class="btn-plus"><i class="ri-add-fill"></i></button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="iq-product-action">
                                                    <p class="font-size-14 mt-2"><i class="ri-shopping-cart-line"></i>Free Shipping</p>
                                                    <button type="button" class="btn btn-light iq-waves-effect text-uppercase mr-1 btn-sm"><i class="fas fa-times mr-0"></i></button>
                                                    <button type="button" class="btn btn-primary iq-waves-effect text-uppercase  btn-sm"><i class="fas fa-cart-plus mr-0"></i> </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- <div class="col">
                <div class="iq-card">
                    <div class="card-body iq-card-body ">
                        <h4 class="mb-2">You don't have any items in your wishlist.</h4>
                        <a href="{{ route('wish.list') }}" class="btn btn-primary" target="_self">Continue Shopping</a>
                    </div>
                </div>
            </div> -->
        </div>
    </div>
</div>
@endsection
