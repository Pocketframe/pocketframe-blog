@layout('layouts/app')

@block('title')
Create Post
@endblock

@block('content')
<div class="bg-white p-6 rounded shadow mt-6">
  <h2 class="text-xl font-bold mb-4">Create Post</h2>
  <form action="{{ route('admin.posts.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mb-4">
      <label for="title" class="block text-gray-700 font-bold mb-2">Title</label>
      <input type="text" id="title" name="title"
        value="{{ old('title') }}"
        class="w-full px-3 py-2 border rounded focus:outline-none focus:ring-1 focus:ring-blue-500">
      {{ error_message('title') }}
    </div>

    <div class="mb-4">
      <label for="category_id" class="block text-gray-700 font-bold mb-2">Category</label>
      <select id="category_id" name="category_id"
        class="w-full px-3 py-2 border rounded focus:outline-none focus:ring-1 focus:ring-blue-500">
        <option value="">--select--</option>
        @foreach($categories as $category)
        <option value="{{ $category->id }}" @selected(old('category_id')==$category->id)>
          {{ $category->category_name }}
        </option>
        @endforeach
      </select>
      {{ error_message('category_id') }}
    </div>

    <div class="mb-4">
      <label for="status" class="block text-gray-700 font-bold mb-2">Status</label>
      <select id="status" name="status"
        class="w-full px-3 py-2 border rounded focus:outline-none focus:ring-1 focus:ring-blue-500">
        <option value="">--select--</option>
        <option value="published" @selected(old('status')=='published' )>Published</option>
        <option value="draft" @selected(old('status')=='draft' )>Draft</option>
      </select>
      {{ error_message('status') }}
    </div>

    <div class="mb-4">
      <label for="image" class="block text-gray-700 font-bold mb-2">Image</label>
      <input type="file" id="image" name="image"
        class="w-full px-3 py-2 border rounded focus:outline-none focus:ring-1 focus:ring-blue-500">
      {{ error_message('image') }}
    </div>

    <div class="mb-4">
      <label for="content" class="block text-gray-700 font-bold mb-2">Content</label>
      <textarea id="content" name="content" rows="10"
        class="w-full px-3 py-2 border rounded focus:outline-none focus:ring-1 focus:ring-blue-500">{{ old('content') }}</textarea>
      {{ error_message('content') }}
    </div>

    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition">Create</button>
  </form>
</div>
@endblock
