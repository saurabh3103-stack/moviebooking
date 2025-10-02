<x-app-layout>

<div class="flex justify-between items-center py-5">
    <h2 class="text-3xl font-semibold">Theaters</h2>
    <a href="{{ route('admin.addtheatres') }}" class="bg-info-500 hover:bg-info-700 text-white font-medium py-2 px-4 rounded">
        Add
    </a>
</div>

@if(session('success'))
    <div class="bg-green-100 border border-green-400 text-white px-4 py-3 rounded mb-4" style="background: green;color: #fff;">
        {{ session('success') }}
    </div>
@endif

@if(session('error'))
    <div class="bg-red-100 border border-red-400 text-white px-4 py-3 rounded mb-4" style="background: red;color: #fff;">
        {{ session('error') }}
    </div>
@endif

<table class="table">
    <thead class="table-dark">
        <tr>
            <th>S No.</th>
            <th>Theater Name</th>
            <th>Manager Name</th>
            <th>Manager Email</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @php $i = 1; @endphp
        @foreach($theaters as $theater)
          <tr>
            <td>{{ $i++ }}</td>
            <td>{{ $theater->name }}</td>
            <td>{{ $theater->manager ? $theater->manager->name : '-' }}</td>
            <td>{{ $theater->manager ? $theater->manager->email : '-' }}</td>
            <td>{{ $theater->status }}</td>
            <td>
              <a href="{{ route('admin.editTheater', ['id' => $theater->id]) }}" class="bg-info-500 hover:bg-info-700 text-white font-medium py-2 px-4 rounded">Edit</a>
              <a href="{{ route('admin.deleteTheater', ['id' => $theater->id]) }}" class="bg-red-500 hover:bg-red-700 text-white font-medium py-2 px-4 rounded">Delete</a>    
            </td>
          </tr>
        @endforeach
    </tbody>
</table>

</x-app-layout>
