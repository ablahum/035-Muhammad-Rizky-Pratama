@extends('layouts/dashboard')

@section('content')
<main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-200">
    <div class="container px-6 py-8 mx-auto">
        <div class="flex justify-between">
            <h3 class="text-3xl font-semibold text-gray-700 capitalize">{{ $title }}</h3>

            <button class="uppercase bg-indigo-500 text-white px-3 py-1 rounded-lg"><a href="/orders/create">add new order</a></button>
        </div>

        @if (session()->has('success_message'))
        <div class="bg-green-300 py-2 px-4 rounded-lg mt-4">
            <p class="font-semibold">{{ session('success_message') }}</p>
        </div>
        @endif
        
        <div class="flex flex-col mt-8">
            <div class="py-2 -my-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">
                <div class="inline-block min-w-full overflow-hidden align-middle border-b border-gray-200 shadow sm:rounded-lg">
                    <table class="min-w-full">
                        <thead>
                            <tr>
                                <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">guest name</th>

                                <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">guest origin</th>

                                <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">guest phone</th>

                                <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">room number</th>

                                <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">start date</th>

                                <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">end date</th>

                                <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">total price</th>

                                <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">action</th>
                            </tr>
                        </thead>

                        <tbody class="bg-white">
                            @foreach ($orders as $order)
                            <tr>
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200"><p class="text-sm leading-5 text-gray-900 capitalize">{{ $order->guest->name }}</p></td>
                                
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200"><p class="text-sm leading-5 text-gray-900 capitalize">{{ $order->guest->origin }}</p></td>
                                
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200"><p class="text-sm leading-5 text-gray-900">{{ $order->guest->phone }}</p></td>
                                
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200"><p class="text-sm leading-5 text-gray-900">{{ $order->room->number }}</p></td>

                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200"><p class="text-sm leading-5 text-gray-900">{{ $order->start_date }}</p></td>

                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200"><p class="text-sm leading-5 text-gray-900">{{ $order->end_date }}</p></td>

                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200"><p class="text-sm leading-5 text-gray-900">{{ $order->total_price }}</p></td>

                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 flex items-center gap-2">
                                    <a href="/orders/{{ $order->id }}/edit" class="text-indigo-500 hover:text-indigo-900 uppercase">edit</a>

                                    <form method="post" action="/orders/{{ $order->id }}">
                                        @method('delete')
                                        @csrf
                                        <button class="text-red-500 hover:text-indigo-900 uppercase" onclick="return confirm('Are you sure?')">delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection