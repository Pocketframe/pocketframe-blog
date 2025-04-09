@layout('layouts.app')

@block('title')
Create Category
@endblock

@block('content')
<div class="bg-white p-6 rounded shadow mt-6">
  <h2 class="text-xl font-bold mb-4">Category Details</h2>
  <div class="grid grid-cols-2 gap-4">
    <div>
      <p class="font-bold text-gray-700 mb-2">Category Name</p>
      <p class="text-gray-600">{{ $category->category_name }}</p>
    </div>

    <div>
      <p class="font-bold text-gray-700 mb-2">Status</p>
      <p class="text-gray-600">{{ $category->status }}</p>
    </div>

    <div>
      <p class="font-bold text-gray-700 mb-2">Tags</p>
      <ul>
        @foreach($category->tags as $tag)
        <li class="list-decimal list-inside text-gray-600 mb-1">{{ $tag->tag_name }}</li>
        @endforeach
      </ul>
    </div>
    <div>
      <p class="font-bold text-gray-700 mb-2">Description</p>
      <p class="text-gray-600">{{ $category->description }}</p>
    </div>
  </div>
  <div class="mt-4">
    <a href="{{ route('admin.categories.index') }}" class="text-blue-600 hover:text-blue-800 transition hover:underline">Back to Categories</a>
  </div>
</div>
@endblock
