@extends('layouts.master')
@section('title')
Danh sách danh mục
@endsection

@section('content')
<div class="header">
    <div class="left">
        <h1>List Categories</h1>
    </div>
</div>

<div class="py-4">
    <a href=" {{ url('admin/categories/create') }} ">
        <button type="button " class="w-full focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-10 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
            Add More
        </button>
    </a>
</div>

<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-center rtl:text-center text-gray-800 dark:text-gray-700">
        <thead class="text-xs text-gray-700 uppercase bg-gray-400 dark:bg-gray-800 dark:text-gray-700">
            <tr>
                <th scope="col" class="p-4">
                    STT
                </th>
                <th scope="col" class="px-6 py-3">
                    Name
                </th>
                <th scope="col" class="px-6 py-3">
                    Action
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $item)
            <tr class="mt-2 bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                <td class="w-4 p-4">
                    <div class="text-center">
                        {{ $item['id'] }}
                    </div>
                </td>
                <td class="px-6 py-4">
                    {{ $item['name'] }}
                </td>
                <td class=" gap-3 text-center">
                    <a href="{{ url('admin/categories/' . $item['id'] . '/edit') }}" class="font-medium text-black dark:text-blue-500 hover:underline ">Edit</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <nav class="flex items-center flex-column flex-wrap md:flex-row justify-between pt-4" aria-label="Table navigation">

        <ul class="inline-flex -space-x-px rtl:space-x-reverse text-sm h-8">
            <li class="page-item {{ $page == 1 ? 'disabled' : '' }}">
                <a style="padding: 0 5px" class="page-link " href=" {{ url('admin/categories/?page=' . $page - 1) }}" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a>
            </li>

            @for ($i = 1; $i <= $totalPage; $i++) <li class="page-item {{ $i == $page ? 'active' : '' }}">
                <a style="padding: 0 5px" class="page-link" href="{{ url('admin/categories/?page=') . $i }}">{{ $i }}</a>
                </li>
                @endfor

                <li class="page-item {{ $page == $totalPage ? 'disabled' : '' }}">
                    <a style="padding: 0 5px" class="page-link " href="{{ $page < $totalPage ? url('admin/categories/?page=' . $page + 1) : '' }}" aria-label="Next"><span aria-hidden="true">&raquo;</span></a>
                </li>

        </ul>
    </nav>
</div>
<!-- <div class="row justify-content-center">
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

    </div> -->
@endsection