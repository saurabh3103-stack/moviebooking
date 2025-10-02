<x-app-layout>

<div class="flex justify-between items-center py-5">
    <h2 class="text-3xl font-semibold">
        @if(isset($theater))
            Edit Theater
        @else
            Add Theater
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
            @if(isset($theater))
                Edit Theater
            @else
                Add Theater
            @endif
        </h3>
    </div>
    <div class="card__body">
      <form action="{{ route('admin.storeTheater') }}" method="POST">
        @csrf

        @if(isset($theater))
            <input type="hidden" name="id" value="{{ $theater->id }}">
        @endif

        {{-- Theater Name --}}
        <div class="field mb-4">
            <label class="block mb-1 font-semibold">Theater Name</label>
            @if(isset($theater))
                <input type="text" name="name" value="{{ $theater->name }}" placeholder="Theater Name" class="w-full border border-gray-300 rounded px-3 py-2" required>
            @else
                <input type="text" name="name" value="{{ old('name') }}" placeholder="Theater Name" class="w-full border border-gray-300 rounded px-3 py-2" required>
            @endif
        </div>

        {{-- Manager Name --}}
        <div class="field mb-4">
            <label class="block mb-1 font-semibold">Manager Name</label>
            @if(isset($theater))
                <input type="text" name="manager_name" value="{{ $theater->manager_name }}" placeholder="Manager Name" class="w-full border border-gray-300 rounded px-3 py-2" required>
            @else
                <input type="text" name="manager_name" value="{{ old('manager_name') }}" placeholder="Manager Name" class="w-full border border-gray-300 rounded px-3 py-2" required>
            @endif
        </div>

        {{-- Manager Email --}}
        <div class="field mb-4">
            <label class="block mb-1 font-semibold">Manager Email</label>
            @if(isset($theater) && $theater->manager)
                <input type="email" name="manager_email" value="{{ $theater->manager->email }}" placeholder="Manager Email" class="w-full border border-gray-300 rounded px-3 py-2" required>
            @else
                <input type="email" name="manager_email" value="{{ old('manager_email') }}" placeholder="Manager Email" class="w-full border border-gray-300 rounded px-3 py-2" required>
            @endif
        </div>

        {{-- Manager Password --}}
        <div class="field mb-4">
            <label class="block mb-1 font-semibold">Manager Password</label>
            <input type="password" name="manager_password" placeholder="Manager Password" class="w-full border border-gray-300 rounded px-3 py-2">
        </div>

        {{-- Status --}}
        <div class="field mb-4">
            <label class="block mb-1 font-semibold">Status</label>
            <select name="status" class="w-full border border-gray-300 rounded px-3 py-2" required>
                @if(isset($theater) && $theater->status == 'active')
                    <option value="active" selected>Active</option>
                    <option value="inactive">Inactive</option>
                @elseif(isset($theater) && $theater->status == 'inactive')
                    <option value="active">Active</option>
                    <option value="inactive" selected>Inactive</option>
                @else
                    <option value="active">Active</option>
                    <option value="inactive">Inactive</option>
                @endif
            </select>
        </div>

        {{-- Submit Button --}}
        <button type="submit" class="bg-info-500 hover:bg-info-700 text-white font-medium py-2 px-4 rounded">
            @if(isset($theater))
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
