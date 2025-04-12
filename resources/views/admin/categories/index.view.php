@layout('layouts.app')

@block('title')
Categories
@endblock

@block('content')
<div class="bg-white p-6 rounded shadow mt-6">
  <div class="mb-4 flex justify-between">
    <h2 class="text-xl font-bold">Post Categories</h2>
    <div>
      <!-- <a href="javascript:window.print()" class="text-white bg-gray-500 px-4 py-2 rounded hover:bg-gray-600 mr-2">Print</a> -->
      <a href="#" class="text-white bg-gray-500 px-4 py-2 rounded hover:bg-gray-600 mr-2">Export</a>
      <a href="#" class="text-white bg-green-500 px-4 py-2 rounded hover:bg-green-600 mr-2">Import</a>

      <a href="{{ route('admin.categories.create') }}" class="text-white bg-blue-500 px-4 py-2 rounded hover:bg-blue-600">Add New Category</a>
    </div>
  </div>
  <div class="mb-4">
    <p class="text-gray-600">Manage your post categories here. You can add, edit, or delete categories.</p>
    <div>
      @if(session()->has('success'))
      <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded" role="alert">
        <strong class="font-bold">Success!</strong> <br />
        <span class="block sm:inline">{{ session()->get('success') }}</span>
      </div>
      @endif
    </div>
  </div>
  <table class="w-full text-left border-collapse">
    <thead>
      <tr class="bg-gray-200">
        <th class="p-3">#</th>
        <th class="p-3">Category</th>
        <th class="p-3">Tags</th>
        <th class="p-3">Status</th>
        <th class="p-3">Actions</th>
      </tr>
    </thead>
    <tbody>
      @foreach($categories as $category)
      <tr class="border-t">
        <td class="p-3">{{ $loop->iteration }}</td>
        <td class="p-3">
          <a href="{{ route('admin.categories.show', ['id' => $category->id]) }}" class="text-gray-600 hover:text-gray-800 transition hover:underline">
            {{ $category->category_name }}
          </a>
        </td>
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
          <a href="{{ route('admin.categories.show', ['id' => $category->id]) }}" class="text-gray-600 hover:text-gray-800 transition hover:underline">👁 View</a>
          <a href="{{ route('admin.categories.edit', ['id' => $category->id]) }}" class="text-blue-500 hover:text-blue-600 ml-2 transition hover:underline">✏️ Edit</a>
          <form action="{{ route('admin.categories.destroy', ['id' => $category->id]) }}" method="POST" class="inline">
            @csrf
            @method('DELETE')
            <button type="submit" class="text-red-500 hover:text-red-600 ml-2 transition hover:underline">🗑️ Delete</button>
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endblock
