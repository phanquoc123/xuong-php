@extends('layouts.master')
@section('title')
    Thêm mới sản phẩm
@endsection

@section('content')
    {{-- <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="white_card card_height_100 mb_30">
                <div class="white_card_header">
                    <div class="box_header m-0">
                        <div class="main-title">
                            <h2 class="m-0">Thêm mới sản phẩm</h2>
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
                
                <form action="{{ url('admin/products/store') }}" enctype="multipart/form-data" method="POST">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3 mt-3">
                                <label for="category_id" class="form-label">Category:</label>
                    
                                <select name="category_id" id="category_id" class="form-select">
                                    <option value="" selected>Tất cả</option>
                                    @foreach ($categoryPluck as $id => $name)
                                        
                                        <option value="{{ $id }}">{{ $name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3 mt-3">
                                <label for="name" class="form-label">Name:</label>
                                <input type="text" class="form-control" id="name" placeholder="Enter name" name="name">
                            </div>
                            <div class="mb-3 mt-3">
                                <label for="name" class="form-label">Price Regular :</label>
                                <input type="number" class="form-control" id="name" min="1" placeholder="Enter price" name="price_regular">
                            </div>
                            <div class="mb-3 mt-3">
                                <label for="name" class="form-label">Price Sale:</label>
                                <input type="number" class="form-control" id="name" min="0" placeholder="Enter price_sale" name="price_sale">
                            </div>
                            <div class="mb-3 mt-3">
                                <label for="img_thumbnail" class="form-label">Img :</label>
                                <input type="file" class="form-control" id="img_thumbnail" placeholder="Enter img_thumbnail" name="img_thumbnail">
                            </div>
                        </div>
            
                        <div class="col-md-6">
                            <div class="mb-3 mt-3">
                                <label for="overview" class="form-label">Overview:</label>
                                <textarea class="form-control" id="overview" placeholder="Enter overview" name="overview"></textarea>
                            </div>
            
                            <div class="mb-3 mt-3">
                                <label for="content" class="form-label">Content:</label>
                                <textarea class="form-control" id="content" rows="4" placeholder="Enter content" name="content"></textarea>
                            </div>
                        </div>
                    </div>
                    
                    <button type="submit" class="btn btn-primary mt-5">Submit</button>
                </form>
                

                </div>
            </div>
        </div>

    </div> --}}
    <div class="header">
        <div class="left ">
            <h1>Add Prpduct</h1>
        </div>
    </div>
    {{-- ERROR --}}

    @if (!empty($_SESSION['errors']))
        <div class="flex p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400"
            role="alert">
            <svg class="flex-shrink-0 inline w-4 h-4 me-3 mt-[2px]" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                fill="currentColor" viewBox="0 0 20 20">
                <path
                    d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
            </svg>
            <span class="sr-only">ERROR</span>
            <div>
                <span class="font-medium">Ensure that these requirements are met:</span>
                <ul class="mt-1.5 list-disc list-inside">
                    @foreach ($_SESSION['errors'] as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @php
                unset($_SESSION['errors']);
            @endphp
        </div>
    @endif

    <form class="mt-2 bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" action="{{ url('admin/products/store') }}"
        enctype="multipart/form-data" method="POST">
        {{-- Name product --}}
        <div class="relative z-0 w-full mb-5 group">
            <label for="email-address-icon" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                Name product</label>
            <div class="relative">
                <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                </div>
                <input type="text" id="name" name="name"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            </div>
        </div>

        {{-- Category --}}
        <div class="relative z-0 w-full mb-5 group">
            <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Category</label>
            <select name="category_id" id="category_id"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option value="" selected>Tất cả</option>
                @foreach ($categoryPluck as $id => $name)
                    <option value="{{ $id }}">{{ $name }}</option>
                @endforeach
            </select>
        </div>

        {{-- Price Regular --}}
        <div class="relative z-0 w-full mb-5 group">
            <label for="email-address-icon" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your
                Price regular</label>
            <div class="relative">
                <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                </div>
                <input type="number" id="email-address-icon" name="price_regular" min="1"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="$">
            </div>
        </div>
        {{-- Price Sale --}}
        <div class="relative z-0 w-full mb-5 group">
            <label for="email-address-icon" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your
                Price sale</label>
            <div class="relative">
                <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                </div>
                <input type="number" id="email-address-icon" name="price_sale" min="1"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="$">
            </div>
        </div>

        {{-- IMG --}}
        <div class=" w-full mb-5 group">
            <input
                class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 py-2.5 px-3 leading-tight focus:outline-none focus:bg-white dark:text-gray-400 dark:border-gray-600 dark:bg-gray-700 dark:placeholder-gray-400"
                id="file_inpute" type="file" name="img_thumbnail">
        </div>

        {{-- Content --}}
        <div class="grid md:grid-cols-2 md:gap-6">

            <div class="relative z-0 w-full mb-5 group">
                <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    Overview:</label>
                <textarea id="message" rows="4" name="overview"
                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Leave a comment..."></textarea>
            </div>

            <div class="relative z-0 w-full mb-5 group">
                <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    Content:</label>
                <textarea id="message" rows="4" name="content"
                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Leave a comment..."></textarea>
            </div>
        </div>

        <button type="submit"
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm size-full w-full px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
    </form>

@endsection
