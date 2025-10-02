<x-app-layout>
@php
    $user = Auth::user();
@endphp

<div class="flex justify-between items-center py-5">
    <h2 class="text-3xl font-semibold">Movies</h2>
    @if($user->role == 'admin')
        <a href="{{ route('admin.AddMovie') }}" 
        class="bg-info-500 hover:bg-info-700 text-white font-medium py-2 px-4 rounded">
            Add Movie
        </a>
    @elseif($user->role == 'manager')
        <a href="{{ route('manager.AddMovie') }}" 
        class="bg-info-500 hover:bg-info-700 text-white font-medium py-2 px-4 rounded">
            Add Movie
        </a>
    @endif
</div>

@if(session('success'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4" style="background: green;color: #fff;">
        {{ session('success') }}
    </div>
@endif

@if(session('error'))
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4" style="background: red;color: #fff;">
        {{ session('error') }}
    </div>
@endif
<div>
<table class="table-auto w-full border-collapse border border-gray-300">
    <thead class="bg-gray-800 text-white">
        <tr>
            <th class="border px-4 py-2">S No.</th>
            <th class="border px-4 py-2">Image</th>
            <th class="border px-4 py-2">Title</th>
            <th class="border px-4 py-2">Category</th>
            <th class="border px-4 py-2">Theater</th>
            <th class="border px-4 py-2">Date</th>
            <th class="border px-4 py-2">Price</th>
            <th class="border px-4 py-2">Total Seats</th>
            <th class="border px-4 py-2">Status</th>
            <th class="border px-4 py-2">Show Timings</th>
            <th class="border px-4 py-2">Actions</th>
        </tr>
    </thead>
    <tbody>
        @php $i = 1; @endphp
        @foreach($movies as $movie)
            <tr class="text-center">
                <td class="border px-4 py-2">{{ $i++ }}</td>
                  <td class="border px-4 py-2">
                    @if($movie->image)
                        <img src="{{ asset($movie->image) }}" alt="Movie Image" class="w-20 h-20 object-cover mx-auto">
                    @else
                        -
                    @endif
                </td>
                <td class="border px-4 py-2">{{ $movie->title }}</td>
                <td class="border px-4 py-2">
                    @if($movie->category)
                        {{ $movie->category->name }}
                    @else
                        -
                    @endif
                </td>

                <td class="border px-4 py-2">
                    @if($movie->theater)
                        {{ $movie->theater->name }}
                    @else
                        -
                    @endif
                </td>
                <td class="border px-4 py-2">{{ $movie->date }}</td>
                <td class="border px-4 py-2">{{ $movie->price }}</td>
                <td class="border px-4 py-2">{{ $movie->total_seats }}</td>
                <td class="border px-4 py-2">{{ ucfirst($movie->status) }}</td>
                <td class="border px-4 py-2">
                    @if($movie->show_timings)
                        @php
                            $timings = json_decode($movie->show_timings, true);
                        @endphp
                        {{ implode(', ', $timings) }}
                    @else
                        -
                    @endif
                </td>
              
                <td class="border px-4 py-2 gap-2">
                   @if(Auth::user()->role == 'admin')
                        <a href="{{ route('admin.editMovie', ['id' => $movie->id]) }}" 
                        class="bg-info-500 hover:bg-info-700 text-white font-medium py-1 px-3 rounded mb-1 inline-block">
                            Edit
                        </a>
                        <a href="{{ route('admin.deleteMovie', ['id' => $movie->id]) }}" 
                        class="bg-red-500 hover:bg-red-700 text-white font-medium py-1 px-3 rounded inline-block">
                            Delete
                        </a>
                    @elseif(Auth::user()->role == 'manager')
                        <a href="{{ route('manager.editMovie', ['id' => $movie->id]) }}" 
                        class="bg-info-500 hover:bg-info-700 text-white font-medium py-1 px-3 rounded mb-1 inline-block">
                            Edit
                        </a>
                        <a href="{{ route('manager.deleteMovie', ['id' => $movie->id]) }}" 
                        class="bg-red-500 hover:bg-red-700 text-white font-medium py-1 px-3 rounded inline-block">
                            Delete
                        </a>
                    @endif
                    <a href="{{ route('movie.Booking', ['id' => $movie->id]) }}" 
                        class="hover:text-white font-medium py-1 px-3 rounded inline-block text-white" style="background:green">
                            Booking
                        </a>

                </td>
            </tr>
        @endforeach
    </tbody>
</table>


</div>

</x-app-layout>
