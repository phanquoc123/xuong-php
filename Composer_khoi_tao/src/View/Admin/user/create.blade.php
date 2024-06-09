@extends('layouts.master')
@section('title')
    Thêm mới User
@endsection

@section('content')
    <div class="header">
        <div class="left ">
            <h1>Add User</h1>
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
    <div>

    </div>
    <form class="mt-2 bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" action="{{ url('admin/users/store') }}"
        enctype="multipart/form-data" method="POST">
        {{-- Name --}}
        <div class="relative z-0 w-full mb-5 group">
            <label for="website-admin"
                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white rounded  ">Username</label>
            <div class="flex">
                <span
                    class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 border border-e-0 border-gray-300 rounded-s-md dark:bg-gray-600 dark:text-gray-400 dark:border-gray-600">
                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M10 0a10 10 0 1 0 10 10A10.011 10.011 0 0 0 10 0Zm0 5a3 3 0 1 1 0 6 3 3 0 0 1 0-6Zm0 13a8.949 8.949 0 0 1-4.951-1.488A3.987 3.987 0 0 1 9 13h2a3.987 3.987 0 0 1 3.951 3.512A8.949 8.949 0 0 1 10 18Z" />
                    </svg>
                </span>
                <input type="text" id="website-admin" name="name"
                    class="erounded-e-lg bg-gray-50 border border-gray-300 text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full text-sm p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Bonnie Green">
            </div>
        </div>

        {{-- Email --}}
        <div class="relative z-0 w-full mb-5 group">
            <label for="email-address-icon" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your
                Email</label>
            <div class="relative">
                <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                </div>
                <input type="text" id="email-address" name="email"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="name@flowbite.com">
            </div>
        </div>

        {{-- Password --}}
        <div class="relative z-0 w-full mb-5 group">
            <label for="email-address-icon" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your
                Password</label>
            <div class="relative">
                <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                </div>
                <input type="password" id="email-address-icon" name="password"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder=". . . . . .">
            </div>
        </div>
        {{-- Type --}}
        <div class="flex item-center gap-4">
            <div class="flex items-center mb-4 gap-2">
                <label for="country-option-1" class="block ms-2  text-sm font-medium text-gray-900 dark:text-gray-300">
                    Member
                </label>
                <input id="country-option-1" type="radio" name="type" value="member"
                    class="w-4 h-4 border-gray-300 focus:ring-2 focus:ring-blue-300 dark:focus:ring-blue-600 dark:focus:bg-blue-600 dark:bg-gray-700 dark:border-gray-600"
                    checked>
            </div>
            <div class="flex items-center mb-4 gap-2">
                <label for="country-option-1" class="block ms-2  text-sm font-medium text-gray-900 dark:text-gray-300">
                    Admin
                </label>
                <input id="country-option-1" type="radio" name="type" value="admin"
                    class="w-4 h-4 border-gray-300 focus:ring-2 focus:ring-blue-300 dark:focus:ring-blue-600 dark:focus:bg-blue-600 dark:bg-gray-700 dark:border-gray-600">
            </div>
        </div>

        {{-- IMG --}}
        <div class=" w-full mb-5 group">
            <input
                class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 py-2.5 px-3 leading-tight focus:outline-none focus:bg-white dark:text-gray-400 dark:border-gray-600 dark:bg-gray-700 dark:placeholder-gray-400"
                id="file_inpute" type="file" name="avatar">
        </div>

        <button type="submit"
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm size-full w-full px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
    </form>

    {{-- <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="white_card card_height_100 mb_30">
                <div class="white_card_header">
                    <div class="box_header m-0">
                        <div class="main-title">
                            <h2 class="m-0">ADD ADMIN USSER</h2>
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

                    <form action="{{ url('admin/users/store') }}" enctype="multipart/form-data" method="POST">
                        <div class="mb-3 mt-3">
                            <label for="name" class="form-label">Name:</label>
                            <input type="text" class="form-control" id="name" placeholder="Enter name"
                                name="name">
                        </div>
                        <div class="mb-3 mt-3">
                            <label for="email" class="form-label">Email:</label>
                            <input type="email" class="form-control" id="email" placeholder="Enter email"
                                name="email">
                        </div>
                        <div class="mb-3 mt-3">
                            <label for="avatar" class="form-label">Avatar:</label>
                            <input type="file" class="form-control" id="avatar" placeholder="Enter avatar"
                                name="avatar">
                        </div>
                        <label for="avatar" class="form-label">Type:</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" checked name="type" value="member"
                                id="flexRadioDefault1">
                            <label class="form-check-label" for="flexRadioDefault1">
                                Member
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="type" value="admin"
                                id="flexRadioDefault2">
                            <label class="form-check-label" for="flexRadioDefault2">
                                Admin
                            </label>
                        </div>
                        <div class="mb-3 mt-3">
                            <label for="password" class="form-label">Password:</label>
                            <input type="text" class="form-control" id="password" placeholder="Enter password"
                                name="password">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>

                </div>
            </div>
        </div>

    </div> --}}
@endsection
