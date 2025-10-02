<x-app-layout>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

<div class="py-5">
    <h2 class="text-3xl font-semibold mb-5">Today Movies Booking Details</h2>
    <div class="row gap-3">
    @foreach($report as $item)
            <div class="col-lg-2 bg-white rounded shadow">
                <h3 class="font-semibold text-lg mb-2">{{ $item['movie_title'] }}</h3>
                <p><strong>Timing:</strong> {{ $item['timing'] }}</p>
                <p><strong>Total Seats:</strong> {{ $item['total_seats'] }}</p>
                <p><strong>Booked Seats:</strong> {{ $item['booked_seats'] }}</p>
                <p><strong>Left Seats:</strong> {{ $item['left_seats'] }}</p>
            </div>
        @endforeach
    </div>
    <table class="table-auto w-full border border-gray-300 mt-3">
        <thead class="bg-gray-800 text-white">
            <tr>
                <th class="px-4 py-2">S.no</th>
                <th class="px-4 py-2">Movie</th>
                <th class="px-4 py-2">Transaction Amount</th>
                <th class="px-4 py-2">Status</th>
                <th class="px-4 py-2">Booked At</th>
                <th class="px-4 py-2">View</th>
            </tr>
        </thead>
        <tbody>
            @php $i = 1; @endphp
            @foreach($bookings as $booking)
                <tr class="border-b">
                    <td class="px-4 py-2">{{ $i++ }}</td>
                    <td class="px-4 py-2">{{ optional($booking->movie)->title }}</td>
                    <td class="px-4 py-2">₹ {{ optional($booking->transaction)->amount ?? 'Failed' }}</td>
                    <td class="px-4 py-2">{{ optional($booking->transaction)->status ?? 'Failed' }}</td>
                    <td class="px-4 py-2">{{ $booking->created_at->format('d M, Y H:i') }}</td>
                    <td class="px-4 py-2">
                        <a href="/movie-ticket?id={{ $booking->id }}" target="_blank" class="text-blue-500 underline">View Ticket</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
</x-app-layout>
