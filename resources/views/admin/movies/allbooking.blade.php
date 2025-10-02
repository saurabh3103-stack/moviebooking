<x-app-layout>

<div class="flex justify-between items-center py-5">
    <h2 class="text-3xl font-semibold">Ticket</h2>
 
</div>


<table class="table">
    <thead class="table-dark">
        <tr>
            <th>S.no</th>
                <th>Movie</th>
                <th>Transaction Amount</th>
                <th>Status</th>
                <th>Booked At</th>
                <th>View</th>
        </tr>
    </thead>
    <tbody>
        @php $i = 1; @endphp
        @foreach($bookings as $booking)
                <tr>
                    <td>{{ $i++ }}</td>
                    <td>{{ $booking->movie->title}}</td>
                    <td>₹ {{ $booking->transaction->amount ?? 'failed' }}</td>
                    <td>{{ $booking->transaction->status ?? 'failed' }}</td>
                    <td>{{ $booking->created_at->format('d M, Y H:i') }}</td>
                    <td>
                        <a href="/movie-ticket?id={{$booking->id}}" target="_blank">View Ticket</a>
                    </td>
                </tr>
            @endforeach
    </tbody>
</table>

</x-app-layout>
