@extends('layouts.master')
@section('title')
    Thêm mới danh mục
@endsection

@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="white_card card_height_100 mb_30">
                <div class="white_card_header">
                    <div class="box_header m-0">
                        <div class="main-title">
                            <h2 class="m-0">THÊM DANH MỤC </h2>
                        </div>
                    </div>
                </div>
                <div class="white_card_body">


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

                    <form action="{{ url('admin/categories/store') }}" enctype="multipart/form-data" method="POST">
                        <div class="mb-3 mt-3">
                            <label for="name" class="form-label">Name:</label>
                            <input type="text" class="form-control" id="name" placeholder="Enter name"
                                name="name">
                        </div>
                      
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>

                </div>
            </div>
        </div>

    </div>
@endsection
