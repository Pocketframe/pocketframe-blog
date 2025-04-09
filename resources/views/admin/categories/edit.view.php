@layout('layouts.app')

@block('title')
Edit Category
@endblock

@block('content')
<div class="bg-white p-6 rounded shadow mt-6">
  <h2 class="text-xl font-bold mb-4">Edit Category</h2>
  <form action="{{ route('admin.categories.update', ['id' => $category->id]) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-4">
      <label for="category_name" class="block text-gray-700 font-bold mb-2">Category Name</label>
      <input type="text" id="category_name" name="category_name"
        value="{{ old('category_name', $category->category_name ?? '') }}"
        class="w-full px-3 py-2 border rounded focus:outline-none focus:ring-1 focus:ring-blue-500">
      {{ display_errors('category_name') }}
    </div>

    <div class="mb-4">
      <label for="tags" class="block text-gray-700 font-bold mb-2">Tags</label>
      <select id="tags" name="tags[]"
        class="w-full px-3 py-2 border rounded focus:outline-none focus:ring-1 focus:ring-blue-500"
        multiple>
        @foreach($tags as $tag)
        @php
        $isSelected = in_array($tag->id, old('tags', $category->tags->pluck('id')));
        @endphp
        <option
          value="{{ $tag->id }}"
          @selected($isSelected)>
          {{ $tag->tag_name }}
        </option>
        @endforeach
      </select>
      {{ display_errors('tags') }}
    </div>

    <div class="mb-4">
      <label for="status" class="block text-gray-700 font-bold mb-2">Status</label>
      <select id="status" name="status"
        class="w-full px-3 py-2 border rounded focus:outline-none focus:ring-1 focus:ring-blue-500">
        <option value="active" @selected(old('status') ?? $category->status === 'active')>Active</option>
        <option value="inactive" @selected(old('status') ?? $category->status === 'inactive')>Inactive</option>
      </select>
      {{ display_errors('status') }}
    </div>

    <div class="mb-4">
      <label for="description" class="block text-gray-700 font-bold mb-2">Description</label>
      <textarea id="description" name="description"
        class="w-full px-3 py-2 border rounded focus:outline-none focus:ring-1 focus:ring-blue-500">{{ old('description', $category->description) }}</textarea>
      {{ display_errors('description') }}
    </div>

    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition">Update</button>
  </form>
</div>
@endblock
