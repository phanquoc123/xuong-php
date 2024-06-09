@extends('layouts.master')
@section('title')
    Danh sách User
@endsection

@section('content')
    <div class="header">
        <div class="left">
            <h1>List User</h1>
        </div>
    </div>

    <div class="py-4">
        <a href=" {{ url('admin/users/create') }} ">
            <button type="button "
                class="w-full focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-10 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                Add More
            </button>

        </a>
    </div>

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="p-4">
                        STT
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Name
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Email
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Type
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Created_At
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Updated_At
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($user as $item)
                    <tr
                        class="mt-2 bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <td class="w-4 p-4">
                            <div class="text-center">
                                {{ $item['id'] }}
                            </div>
                        </td>
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $item['name'] }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $item['email'] }}
                        </td>
                        <td class="px-6 py-4">
                            {!! $item['type'] == 'admin'
                                ? '<span class="bg-green-300 rounded px-1 text-black font-semibled">admin</span>'
                                : '<span class="bg-blue-300 rounded px-1  text-black font-semibled">member</span>' !!}
                        </td>
                        <td class="px-6 py-4">
                            {{ $item['created_at'] }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $item['updated_at'] }}
                        </td>

                        <td class=" gap-3 text-center">
                            <ul class="">
                                <li class="bg-green-300 rounded my-2">
                                    <a href="{{ url('admin/users/' . $item['id'] . '/show') }}"
                                        class="font-medium text-black dark:text-blue-500 hover:underline ">See</a>
                                </li>
                                <li class="bg-blue-300 rounded my-2">
                                    <a href="{{ url('admin/users/' . $item['id'] . '/edit') }}"
                                        class="font-medium text-black dark:text-blue-500 hover:underline ">Edit</a>
                                </li>
                                <li class="bg-red-300 rounded my-2">
                                    <a href="{{ url('admin/users/' . $item['id'] . '/delete') }}"
                                        onclick="return confirm('Co muon xoa khong')"
                                        class="font-medium text-black dark:text-blue-500 hover:underline">Delete</a>
                                </li>
                            </ul>
                        </td>
                @endforeach
            </tbody>
        </table>
        <nav class="flex items-center flex-column flex-wrap md:flex-row justify-between pt-4" aria-label="Table navigation">
            <!-- <span
                class="px-2 text-sm font-normal text-gray-500 dark:text-gray-400 mb-4 md:mb-0 block w-full md:inline md:w-auto">Showing
                <span class="font-semibold text-gray-900 dark:text-white">1-10</span> of <span
                    class="font-semibold text-gray-900 dark:text-white">1000</span>
            </span> -->
            <ul class="inline-flex -space-x-px rtl:space-x-reverse text-sm h-8">
                <li class="page-item {{ $page == 1 ? 'disabled' : '' }}">
                    <a class="page-link " href=" {{ url('admin/users/?page=' . $page - 1) }}" aria-label="Previous"
                        class="flex items-center justify-center px-3 h-8 ms-0 leading-tight text-gray-500 bg-white border border-gray-300 rounded-s-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white" >Previous</a>
                </li>

                @for ($i = 1; $i <= $totalPage; $i++)
                <li class="page-item {{ $i == $page ? 'active' : '' }}">
                    <a class="page-link"
                        href="{{ url('admin/users/?page=') . $i }}"
                        class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">{{ $i }}</a>
                </li>
                @endfor
            
                <li class="page-item {{ $page == $totalPage ? 'disabled' : '' }}">
                    <a class="page-link " href="{{ $page < $totalPage ? url('admin/users/?page=' . $page + 1) : '' }}" aria-label="Next"
                        class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 rounded-e-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">Next</a>
                </li>
                <!-- <li>
                    <a href="#"
                        class="flex items-center justify-center px-3 h-8 ms-0 leading-tight text-gray-500 bg-white border border-gray-300 rounded-s-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">Previous</a>
                </li>
                <li>
                    <a href="#"
                        class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">1</a>
                </li>
                
                <li>
                    <a href="#"
                        class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 rounded-e-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">Next</a>
                </li> -->
            </ul>
        </nav>
    </div>
@endsection
