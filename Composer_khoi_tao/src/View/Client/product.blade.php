@extends('layouts.master')
@section('title')
    Danh sách tất cả sản phẩm
@endsection
@include('layouts.partials.banner')

<div class="container">
    @include('layouts.partials.phanbenduoiOverview')
</div>
@section('content')
   
    <div class="row isotope-grid">
        @foreach ($products as $item)
            <div class=" col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item women">
                <!-- Block2 -->
                <div class="block2">

                    <div class="block2-pic hov-img0">
                        <img src="{{ asset($item['img_thumbnail']) }}" alt="IMG-PRODUCT">

                        {{-- <a href="#" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1">
                Quick View
            </a> --}}
                    </div>
                    <div class="block2-txt flex-w flex-t p-t-14">
                        <div class="block2-txt-child1 flex-col-l ">
                            <a href="{{ url('product/' . $item['id']) }}" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                                {{ $item['name'] }}
                            </a>

                            <span class="stext-105 cl3">
                                {{ $item['price_regular'] }}
                            </span>
                        </div>

                        <div class="block2-txt-child2 flex-r p-t-3">
                            <a href="#" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
                                <img class="icon-heart1 dis-block trans-04"
                                    src=" {{ asset('assets/client/images/icons/icon-heart-01.png') }} " alt="ICON">
                                <img class="icon-heart2 dis-block trans-04 ab-t-l"
                                    src="{{ asset('assets/client/images/icons/icon-heart-02.png') }}" alt="ICON">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <nav style="margin-left:45%" aria-label="Page navigation example">
        <ul class="pagination">
            <li class="page-item {{ $page == 1 ? 'disabled' : '' }}">
                <a class="page-link " href=" {{ url('product/?page=' . $page - 1) }}" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                </a>
            </li>

            @for ($i = 1; $i <= $totalPage; $i++)
                <li class="page-item {{ $i == $page ? 'active' : '' }}"><a class="page-link"
                        href="{{ url('product/?page=') . $i }}">{{ $i }}</a></li>
            @endfor

            <li class="page-item {{ $page == $totalPage ? 'disabled' : '' }}">
                <a class="page-link " href="{{ $page < $totalPage ? url('product/?page=' . $page + 1) : '' }}" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                </a>
            </li>
        </ul>
    </nav>
@endsection
