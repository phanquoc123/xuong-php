@extends('layouts.master')
@section('title')
    Chi tiết sản phẩm
@endsection

@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="white_card card_height_100 mb_30">
                <div class="white_card_header">
                    <div class="box_header m-0">
                        <div class="main-title">
                            <h2 class="m-0">Thông tin sản phẩm : {{ $product['name'] }}</h2>
                        </div>
                    </div>
                </div>
                <div class="white_card_body">


                    <div class="table-responsive">

                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Trường</th>
                                    <th scope="col">Giá trị</th>


                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($product as $key => $value)
                                    <tr>
                                        <td>{{ $key }}</td>

                                        <td>
                                            @if ($key == "img_thumbnail")   
                                                <img src="{{ asset("{$value}") }}" width="130px" height="100px"
                                                    alt="">
                                            @else
                                                {{ $value }}
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
