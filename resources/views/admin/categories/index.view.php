@layout('layouts.app')

@block('title') Categories @endblock

@block('content')
<div class="bg-white p-6 rounded shadow mt-6">

  <div class="mb-4 flex justify-between">
    <h2 class="text-xl font-bold">Post Categories</h2>
    <div>
      <a href="{{ route('admin.categories.export') }}"
        class="text-white bg-gray-500 px-4 py-2 rounded hover:bg-gray-600 mr-2">Export</a>
      <a href="{{ route('admin.categories.create') }}"
        class="text-white bg-blue-500 px-4 py-2 rounded hover:bg-blue-600">Add New Category</a>
    </div>
  </div>

  @if(has_flash('success'))
  <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
    <strong>Success!</strong> {{ get_flash('success') }}
  </div>
  @endif

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
      @foreach($categories as $cat)
      <tr class="border-t">
        <td class="p-3">{{ $loop->iteration }}</td>
        <td class="p-3">{{ $cat->category_name }}</td>
        <td class="p-3">
          @if($cat->tags->count())
          {{ $cat->tags->join(', ', 'tag_name') }}
          @else
          No Tags
          @endif
        </td>
        <td class="p-3">
          <span class="inline-block px-2 py-1 rounded {{ $cat->status=='active' ? 'bg-green-200 text-green-700' : 'bg-red-200 text-red-700' }}">
            {{ ucfirst($cat->status) }}
          </span>
        </td>
        <td class="p-3 space-x-2">
          <a href="{{ route('admin.categories.show', ['id' => $cat->id]) }}"
            class="view-btn text-gray-600 hover:underline">👁 View</a>

          <a href="{{ route('admin.categories.edit', ['id' => $cat->id]) }}"
            class="edit-btn text-blue-500 hover:underline">✏️ Edit</a>

          <form action="{{ route('admin.categories.destroy', ['id' => $cat->id]) }}" method="POST" class="inline">
            @csrf
            @method('DELETE')
            <button type="submit" class="delete-btn text-red-500 hover:underline">🗑️ Delete</button>
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>

@endblock
