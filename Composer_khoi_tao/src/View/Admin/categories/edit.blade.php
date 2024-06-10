@extends('layouts.master')
@section('title')
Cập Nhật Categoris
@endsection


@section('content')

<div class="header">
    <div class="left ">
        <h1>Edit Categoris</h1>
    </div>
</div>

{{-- ERROR --}}

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

@if (isset($_SESSION['status']))
<div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
    <span class="font-medium">{{ $_SESSION['msg'] }}</span>
</div>

@php
unset($_SESSION['status']);
unset($_SESSION['msg']);
@endphp
@endif


<form class="mt-2 bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" action="{{ url("admin/categories/{$category['id']}/update") }}" method="POST">
    {{-- Name --}}
    <div class="relative z-0 w-full mb-5 group">
        <label for="website-admin" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white rounded  ">Name</label>
        <input type="text" id="website-admin" name="name" value="{{ $category['name'] }}" class="erounded-e-lg bg-gray-50 border border-gray-300 text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full text-sm p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Bonnie Green">
    </div>

    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm size-full w-full px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
</form>
@endsection