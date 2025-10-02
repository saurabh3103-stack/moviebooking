<x-app-layout>
<div class="flex justify-between items-center py-5">
    <h2 class="text-3xl font-semibold">
        @if(isset($movie))
            Edit Movie
        @else
            Add Movie
        @endif
    </h2>
</div>

@if(session('success'))
    <div class="bg-green-100 border border-green-400 text-white px-4 py-3 rounded mb-4" style="background: green;">
        {{ session('success') }}
    </div>
@endif

@if(session('error'))
    <div class="bg-red-100 border border-red-400 text-white px-4 py-3 rounded mb-4" style="background: red;">
        {{ session('error') }}
    </div>
@endif

<div class="page_body">
  <div class="card">
    <div class="card__header">
        <h3 class="text-xl">
            @if(isset($movie))
                Edit Movie 
            @else
                Add Movie 
            @endif
        </h3>
    </div>
    <div class="card__body">
      <form action="{{ route('admin.storeMovie') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @isset($movie)
            <input type="hidden" name="id" value="{{ $movie->id }}">
        @endisset
        <div class="field mb-4">
    <label class="block mb-1 font-semibold">Theater</label>

        @if(Auth::user()->role == 'admin')
            <select name="theater_id" class="w-full border border-gray-300 rounded px-3 py-2" required>
                <option value="">-- Select Theater --</option>
                @foreach($theater as $theater)
                    <option value="{{ $theater->id }}" 
                        @if(isset($movie) && $movie->theater_id == $theater->id) selected @endif>
                        {{ $theater->name }}
                    </option>
                @endforeach
            </select>
        @elseif(Auth::user()->role == 'manager')
            <input type="hidden" name="theater_id" value="{{ $theater->where('manager_id', Auth::user()->id)->first()->id  }}">
            <input type="text" 
                value="{{ optional($theater->where('manager_id', Auth::user()->id)->first())->name }}" 
                class="w-full border border-gray-300 rounded px-3 py-2 bg-gray-100" 
                disabled>
            
        @endif
    </div>

        <div class="field mb-4">
            <label class="block mb-1 font-semibold">Title</label>
            <input type="text" name="title" placeholder="Movie Title"
                   class="w-full border border-gray-300 rounded px-3 py-2"
                   value="{{ $movie->title ?? old('title') }}" required>
        </div>

        <div class="field mb-4">
            <label class="block mb-1 font-semibold">Category</label>
            <select name="category_id" class="w-full border border-gray-300 rounded px-3 py-2" required>
                <option value="">-- Select Category --</option>
                @foreach($category as $cat)
                    <option value="{{ $cat->id }}" 
                        @if(isset($movie) && $movie->category_id == $cat->id) selected @endif>
                        {{ $cat->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="field mb-4">
            <label class="block mb-1 font-semibold">Date</label>
            <input type="date" name="date" 
                   class="w-full border border-gray-300 rounded px-3 py-2"
                   value="{{ $movie->date ?? old('date') }}" required>
        </div>

    

        <div class="field mb-4">
            <label class="block mb-1 font-semibold">Description</label>
            <textarea name="description" rows="3" placeholder="Movie Description"
                      class="w-full border border-gray-300 rounded px-3 py-2">{{ $movie->description ?? old('description') }}</textarea>
        </div>

        {{-- Price --}}
        <div class="field mb-4">
            <label class="block mb-1 font-semibold">Price</label>
            <input type="number" name="price" placeholder="Ticket Price"
                   class="w-full border border-gray-300 rounded px-3 py-2"
                   value="{{ $movie->price ?? old('price') }}" required>
        </div>

        <div class="field mb-4">
            <label class="block mb-1 font-semibold">Status</label>
            <select name="status" class="w-full border border-gray-300 rounded px-3 py-2" required>
                <option value="active" @if(isset($movie) && $movie->status=='active') selected @endif>Active</option>
                <option value="inactive" @if(isset($movie) && $movie->status=='inactive') selected @endif>Inactive</option>
            </select>
        </div>

        <div class="field mb-4">
            <label class="block mb-1 font-semibold">Image</label>
            <input type="file" name="image" class="w-full border border-gray-300 rounded px-3 py-2">
            @if(isset($movie) && $movie->image)
                <img src="{{ asset($movie->image) }}" alt="Movie Image" class="w-32 mt-2 rounded">
            @endif
        </div>

        <div class="field mb-4">
            <label class="block mb-1 font-semibold">Total Seats</label>
            <input type="number" name="total_seats" placeholder="Enter total seats"
                   class="w-full border border-gray-300 rounded px-3 py-2"
                   value="{{ $movie->total_seats ?? old('total_seats') }}" required>
        </div>

           <div class="field mb-4">
    <label class="block mb-1 font-semibold">Show Timings</label>

    <label class="inline-flex items-center mr-4">
        <input type="checkbox" name="show_timings[]" value="10:00 AM" 
            <?php if(isset($movie) && $movie->show_timings && in_array('10:00 AM', json_decode($movie->show_timings, true))) echo 'checked'; ?> >
        <span class="ml-2">10:00 AM</span>
    </label>

    <label class="inline-flex items-center mr-4">
        <input type="checkbox" name="show_timings[]" value="01:00 PM" 
            <?php if(isset($movie) && $movie->show_timings && in_array('01:00 PM', json_decode($movie->show_timings, true))) echo 'checked'; ?> >
        <span class="ml-2">01:00 PM</span>
    </label>

    <label class="inline-flex items-center mr-4">
        <input type="checkbox" name="show_timings[]" value="04:00 PM" 
            <?php if(isset($movie) && $movie->show_timings && in_array('04:00 PM', json_decode($movie->show_timings, true))) echo 'checked'; ?> >
        <span class="ml-2">04:00 PM</span>
    </label>

    <label class="inline-flex items-center mr-4">
        <input type="checkbox" name="show_timings[]" value="07:00 PM" 
            <?php if(isset($movie) && $movie->show_timings && in_array('07:00 PM', json_decode($movie->show_timings, true))) echo 'checked'; ?> >
        <span class="ml-2">07:00 PM</span>
    </label>

    <label class="inline-flex items-center mr-4">
        <input type="checkbox" name="show_timings[]" value="09:00 PM" 
            <?php if(isset($movie) && $movie->show_timings && in_array('09:00 PM', json_decode($movie->show_timings, true))) echo 'checked'; ?> >
        <span class="ml-2">09:00 PM</span>
    </label>
</div>

        <button type="submit" class="bg-info-500 hover:bg-info-700 text-white font-medium py-2 px-4 rounded">
            @if(isset($movie))
                Update
            @else
                Save
            @endif
        </button>
      </form>
    </div>
  </div>
</div>
</x-app-layout>
