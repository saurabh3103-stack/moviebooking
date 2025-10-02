<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            @if(Auth::user()->role === 'admin' || Auth::user()->role === 'manager')
            @if(Auth::user()->role === 'admin')
            {{ __('Admin Dashboard') }}

            @elseif(Auth::user()->role === 'manager')
            {{ __('Manager Dashboard') }}

            @endif
            @else
                {{ __('Customer Dashboard') }}
            @endif
        </h2>
    </x-slot>

    <div class="">
        <div class="max-w-9xl mx-auto sm:px-6 lg:px-8 space-y-6">

            @if(Auth::user()->role === 'admin' || Auth::user()->role === 'manager')
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div class="bg-white p-6 rounded-lg shadow">
                        <h3 class="text-lg font-semibold text-gray-700">Today’s Bookings</h3>
                        <p class="mt-4 text-3xl font-bold text-indigo-600">{{$dashboard['todaysBookings']}}</p>
                    </div>
                    <div class="bg-white p-6 rounded-lg shadow">
                        <h3 class="text-lg font-semibold text-gray-700">Occupancy % (per screen)</h3>
                        <p class="mt-4 text-3xl font-bold text-green-600">78%</p>
                    </div>
                    <div class="bg-white p-6 rounded-lg shadow">
                        <h3 class="text-lg font-semibold text-gray-700">Cancelled vs Confirmed</h3>
                        <p class="mt-4 text-3xl font-bold text-red-600">{{$dashboard['cancelled']}} / <span class="text-green-600">{{$dashboard['confirmed']}}</span></p>
                    </div>
                    <div class="bg-white p-6 rounded-lg shadow">
                        <h3 class="text-lg font-semibold text-gray-700">Total Transcation</h3>
                        <p class="mt-4 text-3xl font-bold text-green-600">₹ {{$dashboard['totalSuccessAmount']}} </p>
                    </div>
                </div>
                

            @else
                
            @endif

        </div>
    </div>
</x-app-layout>
