<x-app-layout>

<div class="flex justify-between items-center py-5">
    <h2 class="text-3xl font-semibold">
        @if(isset($category))
            Edit Category
        @else
            Add Category
        @endif
    </h2>
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
<div class="page_body">
  <div class="card">
    <div class="card__header">
        <div>
            <h3 class="text-xl">
                @if(isset($category))
                    Edit Movie Category
                @else
                    Add Movie Category
                @endif
            </h3>
        </div>
    </div>
    <div class="card__body">
      <form action="{{ route('admin.storCategory') }}" method="POST">
        @csrf
        @if(isset($category))
            <input type="hidden" name="id" value="{{ $category->id }}">
        @endif

        <div class="field mb-4">
            <label>Category Name</label>
            <label class="form-control w-full">
                <input type="text" name="name" placeholder="Category Name" 
                       class="w-full border border-gray-300 rounded px-3 py-2"
                       value="@if(isset($category)) {{ $category->name }} @else {{ old('name') }} @endif" required>
            </label>
        </div>

        <button type="submit" class="bg-info-500 hover:bg-info-700 text-white font-medium py-2 px-4 rounded">
            @if(isset($category))
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
