@extends('layouts.master')
@section('title')
    Danh sách sản phẩm 
@endsection

@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="white_card card_height_100 mb_30">
                <div class="white_card_header">
                    <div class="box_header m-0">
                        <div class="main-title">
                            <h2 class="m-0">Danh sách sản phẩm</h2>
                        </div>
                    </div>
                </div>
                <div class="white_card_body">
                  <a href=" {{ url('admin/products/create') }} ">  <button type="button" class="btn btn-primary">Thêm mới sản phẩm </button></a>
      
                  <table class="table">
                      <thead>
                        <tr>
                          <th scope="col">STT</th>
                          <th scope="col">NAME</th>
                         
                          <th scope="col">IMG</th>
                          <th scope="col">PRICE ENGULAR</th>
                          <th scope="col">PRICE SALE</th>
                          <th scope="col">CATEGORY</th>
                          <th scope="col">CREATED_AT</th>
                          <th scope="col">UPDATED_AT</th>
                          <th scope="col">ACTION</th>
                        </tr>
                      </thead>
                      <tbody>
                        
                         
                          @foreach ($products as $item)  
                        <tr>
                          <th scope="row"><?= $item['id'] ?></th>
                          <td><?= $item['name'] ?></td>
                          <td>
                            <img src="{{ asset($item['img_thumbnail']) }}" alt="" width="130" height="100">
                          </td>
                          <td><?= $item['price_regular'] ?></td>
                          <td><?= $item['price_sale'] ?></td>
                          <td><?= $item['c_name'] ?></td>
                          
                          <td><?= $item['created_at'] ?></td>
                          <td><?= $item['updated_at'] ?></td>
                          <td> 
                          <a class="btn btn-danger" onclick="return confirm('Co muon xoa khong')" href="{{ url('admin/products/' . $item['id'] . '/delete') }}"> DELETE </a>
                          <a class="btn btn-success" href="{{ url('admin/products/' . $item['id'] . '/show') }}"> XEM  </a>
                          <a class="btn btn-warning" href="{{ url('admin/products/' . $item['id'] . '/edit') }}"> SỬA  </a>
             
                          </td>
                        </tr>
                          @endforeach
              
                          
                      </tbody>
                      
                    </table>
                    <div class="col-lg-12">
                      <div class="white_box mb_30">
                          <nav aria-label="Page navigation example">
                              <ul class="pagination">
                                  <li class="page-item {{ $page == 1 ? 'disabled' : '' }}">
                                      <a class="page-link " href=" {{ url('admin/products?page=' . $page - 1) }}"
                                          aria-label="Previous">
                                          <span aria-hidden="true">&laquo;</span>
                                      </a>
                                  </li>
          
                                  @for ($i = 1; $i <= $totalPage; $i++)
                                      <li class="page-item {{ $i == $page ? 'active' : '' }}"><a class="page-link"
                                              href="{{ url('admin/products?page=') . $i }}">{{ $i }}</a></li>
                                  @endfor
          
                                  <li class="page-item {{ $page == $totalPage ? 'disabled' : '' }}">
                                      <a class="page-link "
                                          href="{{ $page < $totalPage ? url('admin/products?page=' . $page + 1) : '' }}"
                                          aria-label="Next">
                                          <span aria-hidden="true">&raquo;</span>
                                      </a>
                                  </li>
                              </ul>
                          </nav>
                      </div>
                  </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
