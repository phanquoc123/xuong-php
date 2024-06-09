@extends('layouts.master')

@section('title')
    Detail User
@endsection

@section('content')
    <div class="header">
        <div class="left ">
            <h1> User details: {{ $user['name'] }}</h1>
        </div>
    </div>



    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Key
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Value
                    </th>
                </tr>
            </thead>
            <tbody class="text-center ">
                @foreach ($user as $field => $value)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 ">
                        <td class="px-2 py-3 ">{{ $field }}</td>
                        @if ($field == 'avatar')
                            <td class="px-4 py-5 flex justify-center">
                                <img src="{{ asset("{$value}") }}" alt="" width="100"
                                    style="border-radius: 10px;">
                            </td>
                        @else
                            <td class="font-semibold">{{ $value }}</td>
                        @endif
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    
@endsection
