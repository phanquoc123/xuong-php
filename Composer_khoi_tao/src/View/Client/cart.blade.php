@extends('layouts.master')
@section('title')
Cart
@endsection



@section('content')
<form class="bg0 p-t-75 p-b-85 mt-3">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 col-xl-7 m-lr-auto m-b-50">
                <div class="m-l-25 m-r--38 m-lr-0-xl">
                    <div class="wrap-table-shopping-cart">
                        <table class="table-shopping-cart">
                            <tr class="table_head">
                                <th class="column-1">Product</th>
                                <th class="column-2"></th>
                                <th class="column-3">Price</th>
                                <th class="column-4">Quantity</th>
                                <th class="column-5">Total</th>
                            </tr>

                            <tr class="table_row">
                                <td class="column-1">
                                    <div class="how-itemcart1">
                                        <img src="images/item-cart-04.jpg" alt="IMG">
                                    </div>
                                </td>
                                <td class="column-2">Fresh Strawberries</td>
                                <td class="column-3">$ 36.00</td>
                                <td class="column-4">
                                    <div class="wrap-num-product flex-w m-l-auto m-r-0">
                                        <div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
                                            <i class="fs-16 zmdi zmdi-minus"></i>
                                        </div>

                                        <input class="mtext-104 cl3 txt-center num-product" type="number" name="num-product1" value="1">

                                        <div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
                                            <i class="fs-16 zmdi zmdi-plus"></i>
                                        </div>
                                    </div>
                                </td>
                                <td class="column-5">$ 36.00</td>
                            </tr>

                            <tr class="table_row">
                                <td class="column-1">
                                    <div class="how-itemcart1">
                                        <img src="images/item-cart-05.jpg" alt="IMG">
                                    </div>
                                </td>
                                <td class="column-2">Lightweight Jacket</td>
                                <td class="column-3">$ 16.00</td>
                                <td class="column-4">
                                    <div class="wrap-num-product flex-w m-l-auto m-r-0">
                                        <div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
                                            <i class="fs-16 zmdi zmdi-minus"></i>
                                        </div>

                                        <input class="mtext-104 cl3 txt-center num-product" type="number" name="num-product2" value="1">

                                        <div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
                                            <i class="fs-16 zmdi zmdi-plus"></i>
                                        </div>
                                    </div>
                                </td>
                                <td class="column-5">$ 16.00</td>
                            </tr>
                        </table>
                    </div>


                </div>
            </div>

            <div class="col-sm-10 col-lg-7 col-xl-5 m-lr-auto m-b-50">
                <div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm">
                    <h4 class="mtext-109 cl2 p-b-30">
                        Cart Totals
                    </h4>

                    <div class="flex-w flex-t bor12 p-b-13">
                        <div class="size-208">
                            <span class="stext-110 cl2">
                                Subtotal:
                            </span>
                        </div>

                        <div class="size-209">
                            <span class="mtext-110 cl2">
                                $79.65
                            </span>
                        </div>
                    </div>

                    <div class="flex-w flex-t bor12 p-t-15 p-b-30 ">
                        <div class="size-208 w-full-ssm">
                            <span class="stext-110 cl2">
                               Info:
                            </span>
                        </div>

                        <div class="size-209 p-r-18 p-r-0-sm w-full-ssm">
                            
                            
                            <div class="p-t-15">
                            

                               
                                <div class="bor8 bg0 m-b-12">
                                   <input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="state" placeholder="Enter your name">
                                </div>

                                    <div class="bor8 bg0 m-b-22">
                                        <input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="state" placeholder="Enter your name"
                                        value="{{ $_SESSION['user']['email'] ?? null }}" name="user_email"
                                        class="p-2 text-sm w-full outline outline-2 outline-gray-300">
                                    </div>

                                    <div class="bor8 bg0 m-b-22">
                                        <input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="state" placeholder="Enter your phone"
                                        value="{{ $_SESSION['user']['phone'] ?? null }}" name="user_phone"
                                        class="p-2 text-sm w-full outline outline-2 outline-gray-300">
                                    </div>
                                    <div class="bor8 bg0 m-b-22">
                                        <input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="state" placeholder="Enter your address"
                                        value="{{ $_SESSION['user']['address'] ?? null }} " name="user_address"
                                        class="p-2 text-sm w-full outline outline-2 outline-gray-300">
                                    </div>
                                </div>
                                
                               
                                    
                            </div>
                        </div>
                    </form>

                    <div class="flex-w flex-t p-t-27 p-b-33">
                        <div class="size-208">
                            <span class="mtext-101 cl2">
                                Total:
                            </span>
                        </div>

                        <div class="size-209 p-t-1">
                            <span class="mtext-110 cl2">
                                $79.65
                            </span>
                        </div>
                    </div>

                    <button class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer">
                        Proceed to Checkout
                    </button>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection



{{-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('assets/admin/css/style1.css') }}">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Latest compiled JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</head>

<body>
    <div class="container">
        <h1> Trang Home</h1>
        <div class="row">
            <h1> WELCOME {{ $name }}</h1>
            @if (!isset($_SESSION['user']))
            <a href="{{ url('login') }}"><button type="button" class="btn btn-primary">LOGIN</button></a>
            @endif
            @if (isset($_SESSION['user']))
            <form action="{{ url('logout') }}" method="post">
                <button type="submit" class="btn btn-danger">LOGOUT</button>
            </form>

            @endif


        </div>
    </div>








</body>

</html> --}}