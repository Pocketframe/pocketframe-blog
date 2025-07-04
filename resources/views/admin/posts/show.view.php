@layout('layouts/app')

@block('title')
Post Details
@endblock

@block('content')
<div>
  <div class="container mx-auto py-8 px-4 md:px-8">
    <!-- Main post card -->
    <div class="bg-white rounded-lg shadow-lg overflow-hidden mb-8">
      <!-- Header with action buttons -->
      <div class="bg-gradient-to-r from-blue-600 to-indigo-700 p-6">
        <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center">
          <h1 class="text-2xl font-bold text-white mb-4 sm:mb-0">{{ $post->title }}</h1>
          <div class="space-x-3">
            <a href="{{ route('admin.posts.edit', ['id' => $post->id]) }}" class="inline-flex items-center px-4 py-2 bg-white bg-opacity-20 hover:bg-opacity-30 rounded-md text-white text-sm font-medium transition">
              <i class="fas fa-edit mr-2"></i> Edit
            </a>
            <a href="{{ route('admin.posts.index') }}" class="inline-flex items-center px-4 py-2 bg-white bg-opacity-20 hover:bg-opacity-30 rounded-md text-white text-sm font-medium transition">
              <i class="fas fa-arrow-left mr-2"></i> Back
            </a>
          </div>
        </div>
        <div class="flex flex-wrap items-center mt-4 space-x-0 space-y-2 sm:space-x-3 sm:space-y-0">
          <span class="px-3 py-1 text-xs font-medium bg-blue-200 text-blue-800 rounded-full">{{ $post->category ? $post->category->category_name : 'No Category' }}</span>
          <span class="px-3 py-1 text-xs font-medium {{ $post->status == 'published' ? 'bg-green-200 text-green-800' : 'bg-yellow-200 text-yellow-800' }} rounded-full">{{ ucfirst($post->status) }}</span>
          <span class="text-sm text-blue-100"><i class="far fa-calendar-alt mr-1"></i> {{ $post->created_at }}</span>
          <span class="text-sm text-blue-100"><i class="far fa-user mr-1"></i>User</span>
        </div>
      </div>

      <!-- Featured Image Section -->
      <div class="relative">
        @if($post->image)
        <div class="w-full">
          <img src="{{ store_path($post->image) }}" alt="{{ $post->title }}" class="w-full h-64 md:h-96 object-cover">


          <!-- Image overlay controls -->
          <div class="absolute bottom-4 right-4 flex space-x-2">
            <button class="bg-black bg-opacity-50 hover:bg-opacity-70 text-white p-2 rounded-full transition">
              <i class="fas fa-edit"></i>
            </button>
            <button class="bg-black bg-opacity-50 hover:bg-opacity-70 text-white p-2 rounded-full transition">
              <i class="fas fa-trash-alt"></i>
            </button>
          </div>
        </div>
        @else
        <div class="w-full bg-gray-200 h-64 flex items-center justify-center">
          <div class="text-center">
            <div class="text-gray-400 mb-3">
              <i class="fas fa-image text-5xl"></i>
            </div>
            <p class="text-gray-500 mb-3">No featured image</p>
            <a href="{{ route('admin.posts.edit', ['id' => $post->id]) }}#featured-image" class="inline-flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-md text-sm font-medium transition">
              <i class="fas fa-upload mr-2"></i> Add Image
            </a>
          </div>
        </div>
        @endif
      </div>

      <!-- Post content -->
      <div class="p-6">
        <div class="prose max-w-none">
          {{ $post->content }}
        </div>
      </div>

      <!-- Image Gallery (if multiple images) -->
      @if(isset($post->images) && count($post->images) > 0)
      <div class="px-6 pb-6">
        <h3 class="text-lg font-semibold text-gray-800 mb-4">Image Gallery</h3>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
          @foreach($post->images as $image)
          <div class="relative group">
            <img src="{{ store_path($image->path) }}" alt="Post image" class="h-32 w-full object-cover rounded-lg">
            <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-50 flex items-center justify-center transition-all duration-200 opacity-0 group-hover:opacity-100">
              <div class="flex space-x-2">
                <button class="text-white p-1">
                  <i class="fas fa-edit"></i>
                </button>
                <button class="text-white p-1">
                  <i class="fas fa-trash-alt"></i>
                </button>
              </div>
            </div>
          </div>
          @endforeach
          <div class="flex items-center justify-center h-32 bg-gray-100 rounded-lg border-2 border-dashed border-gray-300">
            <button class="text-gray-500 hover:text-gray-700">
              <i class="fas fa-plus mr-2"></i> Add Image
            </button>
          </div>
        </div>
      </div>
      @endif

      <!-- Metadata footer -->
      <div class="border-t border-gray-200 px-6 py-4 bg-gray-50">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 text-sm">
          <div>
            <p class="text-gray-500 font-medium">Last Updated</p>
            <p class="mt-1">{{ $post->updated_at }}</p>
          </div>
          <div>
            <p class="text-gray-500 font-medium">Views</p>
            <p class="mt-1">{{ $post->views ?? 0 }}</p>
          </div>
          <div>
            <p class="text-gray-500 font-medium">Comments</p>
            <p class="mt-1">0</p>
          </div>
        </div>
      </div>
    </div>

    <!-- SEO Information Card -->
    <div class="bg-white rounded-lg shadow-lg overflow-hidden mb-8">
      <div class="px-6 py-4 bg-gray-50 border-b border-gray-200">
        <div class="flex items-center">
          <i class="fas fa-search text-gray-500 mr-2"></i>
          <h3 class="text-lg font-semibold text-gray-800">SEO Information</h3>
        </div>
      </div>
      <div class="p-6 grid grid-cols-1 md:grid-cols-2 gap-6">
        <div>
          <p class="text-gray-500 font-medium mb-2">Meta Title</p>
          <p class="text-gray-800">{{ $post->meta_title ?? $post->title }}</p>
        </div>
        <div>
          <p class="text-gray-500 font-medium mb-2">Meta Keywords</p>
          <p class="text-gray-800">{{ $post->meta_keywords ?? 'Not set' }}</p>
        </div>
        <div class="md:col-span-2">
          <p class="text-gray-500 font-medium mb-2">Meta Description</p>
          <p class="text-gray-800">{{ $post->meta_description ?? 'Not set' }}</p>
        </div>
      </div>
    </div>

    <!-- Tabs navigation -->
    <div class="mb-6 bg-white rounded-lg shadow-lg overflow-hidden">
      <div class="flex border-b border-gray-200">
        <button id="tab-comments" class="px-6 py-4 text-blue-600 border-b-2 border-blue-600 font-medium flex items-center">
          <i class="fas fa-comments mr-2"></i> Comments
        </button>
        <button id="tab-actions" class="px-6 py-4 text-gray-500 hover:text-gray-700 font-medium flex items-center">
          <i class="fas fa-cog mr-2"></i> Post Actions
        </button>
      </div>

      <!-- Comments section -->
      <div id="comments-content" class="p-6">
        <div class="flex justify-between items-center mb-6">
          <h2 class="text-lg font-semibold text-gray-800">Comments (0)</h2>
          <button class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-md text-sm font-medium transition">
            <i class="fas fa-plus mr-2"></i> Add Comment
          </button>
        </div>

        <!-- Comment form -->
        <form class="mb-8 bg-gray-50 p-4 rounded-lg">
          <div class="mb-4">
            <label for="comment" class="block text-sm font-medium text-gray-700 mb-1">Add a new comment</label>
            <textarea id="comment" rows="3" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="Write your comment here..."></textarea>
          </div>
          <div class="flex justify-end">
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-md text-sm font-medium transition">
              Submit Comment
            </button>
          </div>
        </form>

        <!-- Comments list -->
        <div class="space-y-6">
          @forelse($post->comments as $comment)
          <div class="bg-white border border-gray-200 rounded-lg p-4 shadow-sm">
            <div class="flex justify-between items-start">
              <div class="flex items-start">
                <div class="w-10 h-10 rounded-full bg-gray-300 flex items-center justify-center text-gray-600">
                  <i class="fas fa-user"></i>
                </div>
                <div class="ml-4">
                  <h3 class="text-sm font-medium text-gray-900">{{ $comment->user ? $comment->user->name : 'Anonymous' }}</h3>
                  <p class="text-xs text-gray-500">{{ $comment->created_at }}</p>
                </div>
              </div>
              <div class="flex space-x-2">
                <button class="text-gray-400 hover:text-blue-600">
                  <i class="fas fa-edit"></i>
                </button>
                <button class="text-gray-400 hover:text-red-600">
                  <i class="fas fa-trash-alt"></i>
                </button>
              </div>
            </div>
            <div class="mt-3 text-sm text-gray-700">
              {{ $comment->content }}
            </div>
          </div>
          @empty
          <div class="text-center py-6 text-gray-500">
            <i class="fas fa-comments text-gray-300 text-4xl mb-3"></i>
            <p>No comments yet. Be the first to comment!</p>
          </div>
          @endforelse

          <!-- If there are many comments, add pagination -->
          @if($post > 5)
          <div class="mt-6 flex justify-center">
            <nav class="flex items-center">
              <a href="#" class="px-3 py-1 rounded-md bg-gray-100 text-gray-700 hover:bg-gray-200 mr-1">
                <i class="fas fa-chevron-left"></i>
              </a>
              <span class="px-3 py-1 rounded-md bg-blue-600 text-white">1</span>
              <a href="#" class="px-3 py-1 rounded-md bg-gray-100 text-gray-700 hover:bg-gray-200 mx-1">2</a>
              <a href="#" class="px-3 py-1 rounded-md bg-gray-100 text-gray-700 hover:bg-gray-200 mx-1">3</a>
              <a href="#" class="px-3 py-1 rounded-md bg-gray-100 text-gray-700 hover:bg-gray-200 ml-1">
                <i class="fas fa-chevron-right"></i>
              </a>
            </nav>
          </div>
          @endif
        </div>
      </div>

      <!-- Post actions section (initially hidden) -->
      <div id="actions-content" class="p-6 hidden">
        <h2 class="text-lg font-semibold text-gray-800 mb-4">Post Actions</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
          <a href="{{ route('admin.posts.edit', ['id' => $post->id]) }}" class="flex items-center p-4 bg-blue-50 rounded-lg hover:bg-blue-100 transition">
            <span class="w-10 h-10 flex items-center justify-center bg-blue-500 text-white rounded-full">
              <i class="fas fa-edit"></i>
            </span>
            <span class="ml-3 font-medium text-blue-700">Edit Post</span>
          </a>
          <a href="#" class="flex items-center p-4 bg-purple-50 rounded-lg hover:bg-purple-100 transition">
            <span class="w-10 h-10 flex items-center justify-center bg-purple-500 text-white rounded-full">
              <i class="fas fa-eye"></i>
            </span>
            <span class="ml-3 font-medium text-purple-700">Preview</span>
          </a>
          <a href="#" class="flex items-center p-4 bg-yellow-50 rounded-lg hover:bg-yellow-100 transition">
            <span class="w-10 h-10 flex items-center justify-center bg-yellow-500 text-white rounded-full">
              <i class="fas fa-download"></i>
            </span>
            <span class="ml-3 font-medium text-yellow-700">Export</span>
          </a>
          <form method="POST" action="{{ route('admin.posts.destroy', ['id' => $post->id]) }}" class="flex items-center p-4 bg-red-50 rounded-lg hover:bg-red-100 transition cursor-pointer" onclick="if(confirm('Are you sure you want to delete this post?')) { this.submit(); }">
            @csrf
            @method('DELETE')
            <span class="w-10 h-10 flex items-center justify-center bg-red-500 text-white rounded-full">
              <i class="fas fa-trash-alt"></i>
            </span>
            <span class="ml-3 font-medium text-red-700">Delete Post</span>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- Simple JavaScript for tabs functionality -->
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const tabComments = document.getElementById('tab-comments');
      const tabActions = document.getElementById('tab-actions');
      const commentsContent = document.getElementById('comments-content');
      const actionsContent = document.getElementById('actions-content');

      tabComments.addEventListener('click', function() {
        commentsContent.classList.remove('hidden');
        actionsContent.classList.add('hidden');
        tabComments.classList.add('text-blue-600', 'border-b-2', 'border-blue-600');
        tabComments.classList.remove('text-gray-500');
        tabActions.classList.add('text-gray-500');
        tabActions.classList.remove('text-blue-600', 'border-b-2', 'border-blue-600');
      });

      tabActions.addEventListener('click', function() {
        commentsContent.classList.add('hidden');
        actionsContent.classList.remove('hidden');
        tabActions.classList.add('text-blue-600', 'border-b-2', 'border-blue-600');
        tabActions.classList.remove('text-gray-500');
        tabComments.classList.add('text-gray-500');
        tabComments.classList.remove('text-blue-600', 'border-b-2', 'border-blue-600');
      });
    });
  </script>
</div>
@endblock
