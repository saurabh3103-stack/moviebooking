<x-app-layout>

<div class="flex justify-between items-center py-5">
    <h2 class="text-3xl font-semibold">All Transcation</h2>
 
</div>


<table class="table">
    <thead class="table-dark">
        <tr>
          <th>S. no</th>
                <th>Movie</th>
                
                <th>Transaction ID</th>
                
                <th>Order ID</th>
                
                <th>Transaction Amount</th>
                <th>Status</th>
                <th>Booked At</th>
                <th>View Ticket</th>
        </tr>
    </thead>
    <tbody>
        @php $i = 1; @endphp
        @foreach($transaction as $transaction)
                <tr>
                    <td>{{ $i++ }}</td>
                    <td>{{ $transaction->booking->movie->title }}</td>
                    <td>{{ $transaction->transaction_id }}</td>
                    <td>{{ $transaction->order_id }}</td>
                    <td>₹ {{ $transaction->amount }}</td>
                    <td>{{ $transaction->status }}</td>
                    <td>{{ $transaction->created_at->format('d M, Y H:i') }}</td>
                    <td>
                      <a href="/movie-ticket?id={{$transaction->booking_id}}" target="_blank">View Ticket</a>
                    </td>
                </tr>
            @endforeach
    </tbody>
</table>

</x-app-layout>
