@layout('layouts.app')

@block('title')
Categories
@endblock

@block('content')
<div class="bg-white p-6 rounded shadow mt-6">
  <div class="mb-4 flex justify-between">
    <h2 class="text-xl font-bold">Post Categories</h2>
    <div>
      <a href="{{ route('admin.categories.create') }}" class="text-white bg-blue-500 px-4 py-2 rounded hover:bg-blue-600">Add New Category</a>
    </div>
  </div>
  <table class="w-full text-left border-collapse">
    <thead>
      <tr class="bg-gray-200">
        <th class="p-3">Category</th>
        <th class="p-3">Tags</th>
        <th class="p-3">Status</th>
        <th class="p-3">Actions</th>
      </tr>
    </thead>
    <tbody>
      @foreach($categories as $category)
      <tr class="border-t">
        <td class="p-3">{{ $category->category_name }}</td>
        <td class="p-3">
          @foreach($category->tags as $tag)
          <span class="inline-block bg-green-200 text-green-700 rounded px-2 py-1 mr-2">{{ $tag->tag_name ?? 'No tag' }}</span>
          @endforeach
        </td>
        <td class="p-3">
          @if($category->status == 'active')
          <span class="inline-block bg-green-200 text-green-700 rounded px-2 py-1 mr-2">{{ $category->status }}</span>
          @else
          <span class="inline-block bg-red-200 text-red-700 rounded px-2 py-1 mr-2">{{ $category->status }}</span>
          @endif
        </td>
        <td class="p-3">
          <a href="{{ route('admin.categories.show', $category->id) }}" class="text-gray-600 hover:text-gray-800 transition hover:underline">👁 View</a>
          <a href="#" class="text-blue-500 hover:text-blue-600 ml-2 transition hover:underline">✏️ Edit</a>
          <button class="text-red-500 hover:text-red-600 ml-2 transition hover:underline">🗑️ Delete</button>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endblock
