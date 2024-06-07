@extends('layouts.master')
@section('title')
    Cập nhật sản phẩm 
@endsection



@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="white_card card_height_100 mb_30">
                <div class="white_card_header">
                    <div class="box_header m-0">
                        <div class="main-title">
                            <h2 class="m-0">Cập nhật sản phẩm</h2>
                        </div>
                    </div>
                </div>
                <div class="white_card_body">

                   
                    <a href="{{ asset('admin/products') }}">
                        <button class="btn btn-primary"> Danh sách sản phẩm  </button>
                    </a>
                
                    @if (!empty($_SESSION['errors']))
                        <div class="alert alert-warning">
                            <ul>
                                @foreach ($_SESSION['errors'] as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                
                            @php
                                unset($_SESSION['errors']);
                            @endphp
                        </div>
                    @endif
                
                    @if (isset($_SESSION['status']) && $_SESSION['status'])
                        <div class="alert alert-success">
                            {{ $_SESSION['msg'] }}
                        </div>
                
                        @php
                            unset($_SESSION['status']);
                            unset($_SESSION['msg']);
                        @endphp
                    @endif
                
                    <form action="{{ url("admin/products/{$product['id']}/update") }}" enctype="multipart/form-data" method="POST">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3 mt-3">
                                    <label for="category_id" class="form-label">Category:</label>
                
                                    <select name="category_id" id="category_id" class="form-select">
                                        @foreach ($categoryPluck as $id => $name)
                                            <option @if ($product['category_id'] == $id) selected 
                                            @endif value="{{ $id }}">
                
                                                {{ $name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3 mt-3">
                                    <label for="name" class="form-label">Name:</label>
                                    <input type="text" class="form-control" id="name" placeholder="Enter name"
                                        value="{{ $product['name'] }}" name="name">
                                </div>
                                <div class="mb-3 mt-3">
                                    <label for="img_thumbnail" class="form-label">Img Thumbnail:</label>
                                    <input type="file" class="form-control" id="img_thumbnail" placeholder="Enter img_thumbnail"
                                        name="img_thumbnail">
                                    <img src="{{ asset($product['img_thumbnail']) }}" width="100px" alt="">
                                </div>
                                <div class="mb-3 mt-3">
                                    <label for="name" class="form-label">Price Regular :</label>
                                    <input type="number" class="form-control" id="name" min="1" placeholder="Enter price" name="price_regular" value="{{$product['price_regular'] }}">
                                </div>
                                <div class="mb-3 mt-3">
                                    <label for="name" class="form-label">Price Sale:</label>
                                    <input type="number" class="form-control" id="name" min="0" placeholder="Enter price_sale" name="price_sale"  value="{{$product['price_sale'] }}">
                                </div>
                            </div>
                
                            <div class="col-md-6">
                                <div class="mb-3 mt-3">
                                    <label for="overview" class="form-label">Overview:</label>
                                    <textarea class="form-control" id="overview" placeholder="Enter overview" name="overview">{{ $product['overview'] }}</textarea>
                                </div>
                
                                <div class="mb-3 mt-3">
                                    <label for="content" class="form-label">Content:</label>
                                    <textarea class="form-control" id="content" rows="4" placeholder="Enter content" name="content">{{ $product['content'] }}</textarea>
                                </div>
                            </div>
                        </div>
                
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>

                </div>
            </div>
        </div>

    </div>
@endsection
