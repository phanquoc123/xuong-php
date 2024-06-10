@extends('layouts.master')
@section('title')
Cart
@endsection



@section('content')
<div class="bg0 p-t-75 p-b-85 mt-3">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 col-xl-7 m-lr-auto m-b-50">
                <div class="m-l-25 m-r--38 m-lr-0-xl w-full ">
                    <div class="table-shopping-cart">
                        <table class="table-shopping-cart border text-center">
                            <tr class="table_head ">
                                <th class="column-1">Product</th>
                                <th class="column-2"></th>
                                <!-- <th class="column-3">Price</th> -->
                                <th class="column-4">Quantity</th>
                                <th class="column-5">Total</th>
                                <th class="column-6">Action</th>
                            </tr>

                            @if (!empty($_SESSION['cart']) || !empty($_SESSION['cart-' . (isset($_SESSION['user']['id']) ? $_SESSION['user']['id'] : '')]))
                            @php
                            $cart = $_SESSION['cart'] ?? $_SESSION['cart-' . $_SESSION['user']['id']];
                            @endphp

                            @php($totalPrice = 0)
                            @foreach ($cart as $item)
                            @php($totalPrice += $item['price_regular'] * $item['quantity'])

                            <tr class="table_row ">
                                <td class="column-1">
                                    <div class="how-itemcart1">
                                        <img src="{{ asset($item['img_thumbnail']) }}" alt="IMG">
                                    </div>
                                </td>
                                <td class="column-2 font-bold">{{$item['name']}}</td>
                                <td class="column-4">
                                    <div class="wrap-num-product flex-w m-l-auto m-r-0">
                                        @php
                                        $url = url('cart/quantityDec') . '?productID=' . $item['id'];
                                        if (isset($_SESSION['cart-' . $_SESSION['user']['id']])) {
                                        $url .= '&cartID=' . $_SESSION['cart_id'];
                                        }
                                        @endphp
                                        <a href="{{$url}}" class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m"><i class="fs-16 zmdi zmdi-minus"></i></a>

                                        <input class="mtext-104 cl3 txt-center num-product" type="number" name="num-product1" value="{{ $item['quantity'] }}">

                                        @php
                                        $url = url('cart/quantityInc') . '?productID=' . $item['id'];
                                        if (isset($_SESSION['cart-' . $_SESSION['user']['id']])) {
                                        $url .= '&cartID=' . $_SESSION['cart_id'];
                                        }
                                        @endphp
                                        <a href="{{$url}}" class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m"><i class="fs-16 zmdi zmdi-plus"></i></a>
                                    </div>
                                </td>
                                <td class="column-5">
                                    ${{number_format($item['quantity'] * ($item['price_regular'] ?? $item['price_sale']),2) }}
                                </td>
                                @php
                                $url = url('cart/remove') . '?productID=' . $item['id'];
                                if (isset($_SESSION['user'])) {
                                if (!empty($_SESSION['cart-' . $_SESSION['user']['id']])) {
                                $url .= '&cartID=' . $_SESSION['cart_id'];
                                }
                                }
                                @endphp
                                <td>
                                    <a href="{{ $url }}" onclick="return confirm('Are you sure?')" class="text-xs mr-2 underline cursor-pointer ">Remove</a>
                                </td>
                            </tr>
                            @endforeach
                            @endif

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
                                Total:
                            </span>
                        </div>

                        <div class="size-209">
                            <span class="mtext-110 cl2">
                                ${{ number_format($totalPrice ?? 0, 2) }}
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

                            <form action="{{ url('order/checkout') }} " method="POST">
                                <div class="p-t-15">
                                    <div class="bor8 bg0 m-b-12">
                                        <input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" placeholder="name" {{ $_SESSION['user']['name'] ?? null }} name="user_name" class="p-2 text-sm w-full text-blue outline outline-2 outline-gray-300">
                                    </div>

                                    <div class="bor8 bg0 m-b-22">
                                        <input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" placeholder="email" value="{{ $_SESSION['user']['email'] ?? null }}" name="user_email" class="p-2 text-sm w-full text-blue outline outline-2 outline-gray-300">
                                    </div>

                                    <div class="bor8 bg0 m-b-22">
                                        <input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" placeholder="phone" value="{{ $_SESSION['user']['phone'] ?? null }}" name="user_phone" class="p-2 text-sm w-full text-blue outline outline-2 outline-gray-300">
                                    </div>
                                    <div class="bor8 bg0 m-b-22">
                                        <input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" placeholder="address" value="{{  $_SESSION['user']['address'] ?? null }}" name="user_address" class="p-2 text-sm w-full text-blue outline outline-2 outline-gray-300">
                                    </div>

                                </div>
                        </div>
                    </div>

                    @if (empty($_SESSION['user']))
                    <button type="submit" class="mt-2 flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer">
                        Login To Checkout</button>
                    @else
                    <button type="submit" class="mt-2 flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer" disabled>Proceed to Checkout</button>
                    @endif
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection