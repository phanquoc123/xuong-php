@extends('layouts.master')
@section('title')
Chi tiết sản phẩm
@endsection

@section('content')
<div class="header">
    <div class="left ">
        <h1>Details: {{ $product['name'] }}</h1>
    </div>
</div>



<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-400 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Key
                </th>
                <th></th>
                <th scope="col" class="px-6 py-3">
                    Value
                </th>
            </tr>
        </thead>
        <tbody class="text-center ">


            @foreach ($product as $key => $value)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 ">
                    <td class="px-2 py-3 ">{{ $key }}</td>

                    <td>
                        @if ($key == "img_thumbnail")
                            <td class="px-4 py-5 flex justify-center">
                                <img src="{{ asset("{$value}") }}" width="130px" height="100px" alt="" style="border-radius: 10px;">
                            </td>
                        @else
                            <td class="font-semibold">{{ $value }}</td>
                        @endif
                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>
</div>


@endsection