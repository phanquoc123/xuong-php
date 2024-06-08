@extends('layouts.master')
@section('title')
    Danh sách danh mục 
@endsection

@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="white_card card_height_100 mb_30">
                <div class="white_card_header">
                    <div class="box_header m-0">
                        <div class="main-title">
                            <h2 class="m-0">Danh sách danh mục </h2>
                        </div>
                    </div>
                </div>
                <div class="white_card_body">
                    <a href=" {{ url('admin/categories/create') }} ">
                        <button type="button" class="btn btn-primary">Thêm mới danh mục</button>
                    </a>

                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">STT</th>
                                    <th scope="col">NAME</th>
                                   
                                </tr>
                            </thead>
                            <tbody>


                                @foreach ($categories as $item)
                                    <tr>
                                        <th scope="row"><?= $item['id'] ?></th>
                                        <td><?= $item['name'] ?></td>
                                        
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
