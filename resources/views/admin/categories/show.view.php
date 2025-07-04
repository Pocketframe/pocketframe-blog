@layout('layouts.app')

@block('title')
Category Details
@endblock

@block('content')
<div class="container mx-auto py-8 px-4 md:px-8">
  <!-- Top action bar -->
  <div class="flex flex-col md:flex-row md:justify-between md:items-center mb-6">
    <div class="flex items-center mb-4 md:mb-0">
      <a href="{{ route('admin.categories.index') }}" class="mr-4 text-gray-600 hover:text-gray-900 transition">
        <i class="fas fa-arrow-left"></i>
      </a>
      <h1 class="text-2xl font-bold text-gray-800">Category Details</h1>
    </div>
    <div class="flex space-x-3">
      <a href="{{ route('admin.categories.edit', ['id'=>$category->id]) }}" class="inline-flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-md text-sm font-medium transition">
        <i class="fas fa-edit mr-2"></i> Edit Category
      </a>
      <form method="POST" action="{{ route('admin.categories.destroy', ['id'=>$category->id]) }}" onsubmit="return confirm('Are you sure you want to delete this category?');">
        @csrf
        @method('DELETE')
        <button type="submit" class="inline-flex items-center px-4 py-2 bg-red-600 hover:bg-red-700 text-white rounded-md text-sm font-medium transition">
          <i class="fas fa-trash-alt mr-2"></i> Delete
        </button>
      </form>
    </div>
  </div>

  <!-- Main content -->
  <div class="bg-white rounded-lg shadow-lg overflow-hidden">
    <!-- Category header -->
    <div class="bg-gray-800 p-6">
      <div class="flex items-center">
        <div class="bg-white rounded-full p-3 mr-4">
          <i class="fas fa-folder text-gray-800 text-xl"></i>
        </div>
        <div>
          <h2 class="text-2xl font-bold text-white">{{ $category->category_name }}</h2>
          <div class="mt-2 flex items-center">
            <span class="px-3 py-1 text-xs font-medium rounded-full {{ $category->status == 'active' ? 'bg-green-200 text-green-800' : 'bg-yellow-200 text-yellow-800' }}">
              {{ ucfirst($category->status) }}
            </span>
            <span class="ml-4 text-gray-300 text-sm">
              <i class="fas fa-bookmark mr-1"></i> {{ $category->posts_count ?? count($category->posts) }} Posts
            </span>
            <span class="ml-4 text-gray-300 text-sm">
              <i class="fas fa-tags mr-1"></i> {{ count($category->tags) }} Tags
            </span>
          </div>
        </div>
      </div>
    </div>

    <!-- Description section -->
    <div class="p-6 border-b border-gray-200">
      <h3 class="text-lg font-semibold text-gray-800 mb-3">Description</h3>
      <p class="text-gray-600">{{ $category->description ?: 'No description available.' }}</p>
    </div>

    <!-- Tags section -->
    <div class="p-6 border-b border-gray-200">
      <div class="flex justify-between items-center mb-4">
        <h3 class="text-lg font-semibold text-gray-800">Tags</h3>
        <a href="#" class="text-blue-600 hover:text-blue-800 text-sm font-medium">
          <i class="fas fa-plus mr-1"></i> Add Tag
        </a>
      </div>

      @if(!is_null($category->tags))
      <div class="flex flex-wrap gap-2">
        @foreach($category->tags as $tag)
        <div class="group relative">
          <span class="px-3 py-1 bg-blue-100 text-blue-800 rounded-full text-sm font-medium flex items-center">
            <i class="fas fa-tag mr-2 text-blue-500"></i>
            {{ $tag->tag_name }}
            <a href="#" class="ml-2 text-blue-500 hover:text-blue-700">
              <i class="fas fa-pencil-alt text-xs"></i>
            </a>
          </span>
        </div>
        @endforeach
      </div>
      @else
      <p class="text-gray-500 italic">No tags assigned to this category.</p>
      @endif
    </div>

    <!-- Posts section -->
    <div class="p-6">
      <div class="flex justify-between items-center mb-4">
        <h3 class="text-lg font-semibold text-gray-800">Associated Posts</h3>
        <a href="#" class="text-blue-600 hover:text-blue-800 text-sm font-medium">
          <i class="fas fa-plus mr-1"></i> New Post
        </a>
      </div>

      @if(!is_null($category->posts) && count($category->posts) > 0)
      <div class="bg-gray-50 rounded-lg overflow-hidden">
        <table class="min-w-full divide-y divide-gray-200">
          <thead class="bg-gray-100">
            <tr>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Title</th>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
            </tr>
          </thead>
          <tbody class="bg-white divide-y divide-gray-200">
            @foreach($category->posts as $post)
            <tr class="hover:bg-gray-50">
              <td class="px-6 py-4 whitespace-nowrap">
                <div class="text-sm font-medium text-gray-900">{{ $post->title }}</div>
              </td>
              <td class="px-6 py-4 whitespace-nowrap">
                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ $post->status == 'published' ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800' }}">
                  {{ ucfirst($post->status) }}
                </span>
              </td>
              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                {{ $post->created_at }}
              </td>
              <td class="px-6 py-4 whitespace-nowrap text-sm font-medium space-x-2">
                <a href="#" class="text-blue-600 hover:text-blue-900">View</a>
                <a href="#" class="text-indigo-600 hover:text-indigo-900">Edit</a>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      @else
      <div class="text-center py-8 bg-gray-50 rounded-lg">
        <div class="text-gray-400 mb-3">
          <i class="fas fa-file-alt text-4xl"></i>
        </div>
        <p class="text-gray-500">No posts in this category yet.</p>
        <a href="#" class="mt-3 inline-block text-blue-600 hover:text-blue-800 font-medium">
          Create your first post
        </a>
      </div>
      @endif
    </div>
  </div>

  <!-- Statistics card -->
  <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-6">
    <div class="bg-white rounded-lg shadow-lg p-6">
      <div class="flex items-center justify-between">
        <h3 class="text-lg font-semibold text-gray-800">Post Count</h3>
        <span class="text-blue-600 rounded-full bg-blue-100 p-2">
          <i class="fas fa-file-alt"></i>
        </span>
      </div>
      <p class="text-3xl font-bold text-gray-900 mt-4">{{ $category->posts_count ?? count($category->posts) }}</p>
      <p class="text-sm text-gray-500 mt-1">Total posts in this category</p>
    </div>

    <div class="bg-white rounded-lg shadow-lg p-6">
      <div class="flex items-center justify-between">
        <h3 class="text-lg font-semibold text-gray-800">Views</h3>
        <span class="text-green-600 rounded-full bg-green-100 p-2">
          <i class="fas fa-eye"></i>
        </span>
      </div>
      <p class="text-3xl font-bold text-gray-900 mt-4">{{ $category->views_count ?? 0 }}</p>
      <p class="text-sm text-gray-500 mt-1">Total category views</p>
    </div>

    <div class="bg-white rounded-lg shadow-lg p-6">
      <div class="flex items-center justify-between">
        <h3 class="text-lg font-semibold text-gray-800">Last Updated</h3>
        <span class="text-purple-600 rounded-full bg-purple-100 p-2">
          <i class="fas fa-clock"></i>
        </span>
      </div>
      <p class="text-lg font-medium text-gray-900 mt-4">{{ $category->updated_at }}</p>
      <p class="text-sm text-gray-500 mt-1">Last modification date</p>
    </div>
  </div>
</div>
@endblock
