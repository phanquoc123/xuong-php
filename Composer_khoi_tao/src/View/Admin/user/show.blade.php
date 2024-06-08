@extends('layouts.master')
@section('title')
    Chi tiết User
@endsection

@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="white_card card_height_100 mb_30">
                <div class="white_card_header">
                    <div class="box_header m-0">
                        <div class="main-title">
                            <h2 class="m-0">Thông tin USER : {{ $user['name'] }}</h2>
                        </div>
                    </div>
                </div>
                <div class="white_card_body">
                    <a href=" {{ url('admin/users/create') }} ">
                        <button type="button" class="btn btn-primary">Thêm mới user</button>
                    </a>

                    <div class="table-responsive">
                       
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Trường</th>
                                    <th scope="col">Giá trị</th>


                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($user as $key => $value)
                                    <tr>
                                        <td>{{ $key }}</td>

                                        <td>
                                            @if ($key == 'avatar')
                                                <img src="{{ asset("{$value}") }}" alt="" width="120"
                                                    height="100">
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
