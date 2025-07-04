@layout('layouts/app')

@block('title')
Posts
@endblock

@block('content')
<div class="bg-white p-6 rounded shadow mt-6">
  <div class="mb-4 flex justify-between">
    <h2 class="text-xl font-bold">Posts</h2>
    <div>
      <a href="{{ route('admin.posts.create') }}" class="text-white bg-blue-500 px-4 py-2 rounded hover:bg-blue-600">Add New Post</a>
    </div>
  </div>
  <div class="mb-4">
    <p class="text-gray-600">Manage your posts here. You can add, edit, or delete posts.</p>
    <div>
      @if(has_flash('success'))
      <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded" role="alert">
        <strong class="font-bold">Success!</strong> <br />
        <span class="block sm:inline">{{ get_flash('success') }}</span>
      </div>
      @endif
    </div>
  </div>
  <div>
    <table class="w-full text-left border-collapse">
      <thead>
        <tr class="bg-gray-200">
          <th class="p-3">#</th>
          <th class="p-3">Title</th>
          <th class="p-3">Category</th>
          <th class="p-3">Status</th>
          <th class="p-3">Actions</th>
        </tr>
      </thead>
      <tbody>
        @foreach($posts as $post)
        <tr class="border-t">
          <td class="p-3">{{ $loop->iteration }}</td>
          <td class="p-3">
            <a href="{{ route('admin.posts.show', ['id' => $post->id]) }}" class="text-gray-600 hover:text-gray-800 transition hover:underline">
              {{ $post->title }}
            </a>
          </td>
          <td class="p-3">
            {{ $post->category ? $post->category->category_name : 'No category' }}
          </td>
          <td class="p-3">
            @if($post->status == 'published')
            <span class="inline-block bg-green-200 text-green-700 rounded px-2 py-1 mr-2">Published</span>
            @else
            <span class="inline-block bg-red-200 text-red-700 rounded px-2 py-1 mr-2">Draft</span>
            @endif
          </td>
          <td class="p-3">
            <a href="{{ route('admin.posts.show', ['id' => $post->id]) }}" class="text-gray-600 hover:text-gray-800 transition hover:underline">👁 View</a>
            <a href="{{ route('admin.posts.edit', ['id' => $post->id]) }}" class="text-blue-500 hover:text-blue-600 ml-2 transition hover:underline">✏️ Edit</a>
            <form action="{{ route('admin.posts.destroy', ['id' => $post->id]) }}" method="POST" class="inline">
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
</div>
@endblock
