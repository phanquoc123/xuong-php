@extends('layouts.master')
@section('title')
    Danh sách User
@endsection

@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="white_card card_height_100 mb_30">
                <div class="white_card_header">
                    <div class="box_header m-0">
                        <div class="main-title">
                            <h2 class="m-0">Danh sách User</h2>
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
                                    <th scope="col">STT</th>
                                    <th scope="col">NAME</th>
                                    <th scope="col">AVATAR</th>
                                    <th scope="col">EMAIL</th>
                                    <th scope="col">TYPE</th>

                                    <th scope="col">CREATED_AT</th>
                                    <th scope="col">UPDATED_AT</th>
                                    <th scope="col">ACTION</th>
                                </tr>
                            </thead>
                            <tbody>


                                @foreach ($user as $item)
                                    <tr>
                                        <th scope="row"><?= $item['id'] ?></th>
                                        <td><?= $item['name'] ?></td>
                                        <td>
                                            <img src="{{ asset($item['avatar']) }}" alt="" width="100"
                                                height="100">
                                        </td>
                                        <td><?= $item['email'] ?></td>
                                        <td><?= $item['type'] ?></td>

                                        <td><?= $item['created_at'] ?></td>
                                        <td><?= $item['updated_at'] ?></td>
                                        <td>
                                            <a class="btn btn-danger" onclick="return confirm('Co muon xoa khong')"
                                                href="{{ url('admin/users/' . $item['id'] . '/delete') }}"> Xóa </a>
                                            <a class="btn btn-success"
                                                href="{{ url('admin/users/' . $item['id'] . '/show') }}"> Xem </a>
                                            <a class="btn btn-warning"
                                                href="{{ url('admin/users/' . $item['id'] . '/edit') }}"> Sửa </a>

                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            
                        </table>
                        {{-- <nav aria-label="Page navigation example">
                            <ul class="pagination">
                              <li class="page-item">
                                <a class="page-link" href="{{ url("admin/products/{$_GET['page'] - 1 ?? 1}") }}" aria-label="Previous">
                                  <span aria-hidden="true">&laquo;</span>
                                </a>
                              </li>
                              <li class="page-item"><a class="page-link" href="{{ url("admin/products/{$_GET['page']}") }}">1</a></li>
                              <li class="page-item"><a class="page-link" href="{{ url("admin/products/{$_GET['page']}") }}">2</a></li>
                              <li class="page-item"><a class="page-link" href="{{ url("admin/products/{$_GET['page']}") }}">3</a></li>
                              <li class="page-item">
                                <a class="page-link" href="{{ url("admin/products/{$_GET['page'] + 1} ") }}" aria-label="Next">
                                  <span aria-hidden="true">&raquo;</span>
                                </a>
                              </li>
                            </ul>
                          </nav> --}}
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
