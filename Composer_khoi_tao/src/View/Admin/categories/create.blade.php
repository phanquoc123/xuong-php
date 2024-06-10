@extends('layouts.master')
@section('title')
Thêm mới danh mục
@endsection

@section('content')

<div class="header">
    <div class="left ">
        <h1>Add Categories</h1>
    </div>
</div>
@if (!empty($_SESSION['errors']))
<div class="flex p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
    <svg class="flex-shrink-0 inline w-4 h-4 me-3 mt-[2px]" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
        <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
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
<form class="mt-2 bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" action="{{ url('admin/categories/store') }}" enctype="multipart/form-data" method="POST">
    {{-- Name product --}}
    <div class="relative z-0 w-full mb-5 group">
        <label for="email-address-icon" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
            Name Category</label>
        <div class="relative">
            <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
            </div>
            <input type="text" id="name" name="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
        </div>
    </div>
    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm size-full w-full px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>

</form>
@endsection