@layout('layouts/blog')

@block('title')
Pocketframe
@endblock

@block('content')


<!-- Hero Section -->
<section class="bg-gradient-to-r from-blue-600 to-indigo-700 text-white py-32 mt-16">
  <div class="max-w-7xl mx-auto px-6 flex flex-col md:flex-row items-center">
    <div class="md:w-1/2 text-left md:pr-12">
      <h2 class="text-4xl md:text-5xl font-bold leading-tight">Discover a World of <span class="text-yellow-300">Ideas</span></h2>
      <p class="mt-6 text-xl font-light leading-relaxed">Explore insightful articles, engaging stories, and expert opinions from our community of creative thinkers.</p>
      <div class="mt-8 flex flex-col sm:flex-row space-y-4 sm:space-y-0 sm:space-x-4">
        <button class="bg-white text-indigo-600 font-medium px-6 py-3 rounded-lg shadow-lg hover:shadow-xl transition transform hover:-translate-y-1">Start Reading</button>
        <button class="bg-transparent border-2 border-white text-white font-medium px-6 py-3 rounded-lg hover:bg-white hover:text-indigo-600 transition transform hover:-translate-y-1">Subscribe</button>
      </div>
    </div>
    <div class="md:w-1/2 mt-12 md:mt-0">
      <img src="/api/placeholder/600/400" alt="Hero Image" class="rounded-xl shadow-2xl">
    </div>
  </div>
</section>

<!-- Categories -->
<section class="bg-white py-16">
  <div class="max-w-7xl mx-auto px-6">
    <h2 class="text-3xl font-bold mb-12 text-center">Explore Categories</h2>
    <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
      <a href="#" class="bg-blue-50 p-6 rounded-xl text-center hover:shadow-lg transition card-hover">
        <div class="bg-blue-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
          <i class="fas fa-laptop-code text-blue-600 text-2xl"></i>
        </div>
        <h3 class="font-semibold text-lg text-gray-800">Technology</h3>
      </a>
      <a href="#" class="bg-green-50 p-6 rounded-xl text-center hover:shadow-lg transition card-hover">
        <div class="bg-green-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
          <i class="fas fa-leaf text-green-600 text-2xl"></i>
        </div>
        <h3 class="font-semibold text-lg text-gray-800">Health</h3>
      </a>
      <a href="#" class="bg-purple-50 p-6 rounded-xl text-center hover:shadow-lg transition card-hover">
        <div class="bg-purple-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
          <i class="fas fa-paint-brush text-purple-600 text-2xl"></i>
        </div>
        <h3 class="font-semibold text-lg text-gray-800">Art</h3>
      </a>
      <a href="#" class="bg-amber-50 p-6 rounded-xl text-center hover:shadow-lg transition card-hover">
        <div class="bg-amber-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
          <i class="fas fa-plane text-amber-600 text-2xl"></i>
        </div>
        <h3 class="font-semibold text-lg text-gray-800">Travel</h3>
      </a>
    </div>
  </div>
</section>

<!-- Featured Post -->
<section class="py-12 px-6">
  <div class="max-w-7xl mx-auto">
    <div class="flex flex-col md:flex-row bg-gradient-to-r from-indigo-500 to-purple-600 rounded-2xl overflow-hidden shadow-xl">
      <div class="md:w-1/2">
        <img src="/api/placeholder/800/600" alt="Featured Post" class="w-full h-full object-cover">
      </div>
      <div class="md:w-1/2 p-8 md:p-12 flex flex-col justify-center text-white">
        <span class="text-xs uppercase tracking-wider bg-white bg-opacity-20 inline-block px-3 py-1 rounded-full mb-4">Featured</span>
        <h3 class="text-3xl font-bold mb-4">The Future of Remote Work in 2025</h3>
        <p class="text-sm mb-2">By <span class="font-medium">Jamie Smith</span> • March 15, 2025</p>
        <p class="mt-4 text-white text-opacity-90">Discover how remote work continues to evolve and shape businesses worldwide. Learn about the latest trends, tools, and strategies for success in the digital workspace...</p>
        <button class="mt-8 bg-white text-indigo-600 px-6 py-3 rounded-lg font-medium self-start hover:shadow-lg transition">Read Article</button>
      </div>
    </div>
  </div>
</section>

<!-- Blog Posts -->
<section class="p-6 md:p-8 max-w-7xl mx-auto">
  <div class="flex justify-between items-center mb-10">
    <h2 class="text-3xl font-bold text-gray-800">Latest Articles</h2>
    <div class="hidden md:flex space-x-2" id="article-filters">
      <button data-filter="all" class="px-3 py-1 rounded-md bg-blue-100 text-blue-600 font-medium hover:bg-blue-200 transition active">All</button>
      <button data-filter="popular" class="px-3 py-1 rounded-md hover:bg-gray-100 transition">Popular</button>
      <button data-filter="recent" class="px-3 py-1 rounded-md hover:bg-gray-100 transition">Recent</button>
    </div>
  </div>
  <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8" id="articles-grid">
    @each($posts, post, No post found)
    <article class="bg-white rounded-xl shadow-md hover:shadow-xl transition-all duration-300 flex flex-col overflow-hidden card-hover"
      data-category="{{ in_array($loop->index, [0,3,5]) ? 'popular' : 'recent' }}">
      <div class="relative">
        <img src="{{ store_path($post['image_path'] ?? 'images/placeholder.png') }}" alt="{{ $post['title'] }}" class="w-full h-60 object-cover">
        <!-- <div class="absolute top-4 left-4 bg-blue-600 text-white text-xs uppercase tracking-wider px-2 py-1 rounded">{{ $post->category }}</div> -->
      </div>
      <div class="p-6 flex flex-col flex-grow">
        <h3 class="text-xl font-bold text-gray-900 hover:text-blue-600 transition">{{ $post['title'] }}</h3>
        <div class="flex items-center mt-3 mb-4">
          <img src="/api/placeholder/40/40" alt="Author" class="w-8 h-8 rounded-full">
          <!-- <p class="ml-2 text-sm text-gray-600">{{ $post['author'] }} • <span>{{ $post['published_at'] }}</span></p> -->
        </div>
        <!-- <p class="text-gray-700 flex-grow">{{ substr($post->content, 0, 120) }}...</p> -->
        <div class="mt-6 flex justify-between items-center">
          <a href="{{ route('posts.show', ['id' => $post['id']]) }}" class="text-blue-600 font-medium hover:text-blue-800 transition flex items-center">
            Read More
            <i class="fas fa-arrow-right ml-2 text-sm"></i>
          </a>
          <div class="flex space-x-2 text-gray-400">
            <span class="flex items-center"><i class="far fa-eye mr-1"></i> {{ rand(100, 999) }}</span>
            <span class="flex items-center"><i class="far fa-comment mr-1"></i> {{ rand(5, 30) }}</span>
          </div>
        </div>
      </div>
    </article>
    @endeach
  </div>
  <div class="mt-12 text-center">
    <button id="load-more"
      class="px-8 py-3 bg-blue-600 text-white rounded-lg font-medium hover:bg-blue-700 transition shadow-md hover:shadow-lg disabled:opacity-50 disabled:cursor-not-allowed"
      {{ $hasMore ? '' : 'disabled' }}
      data-current-page="{{ $currentPage }}">
      <span class="inline-flex items-center">
        <span class="load-more-text">Load More Articles</span>
        <svg class="load-more-spinner ml-2 h-4 w-4 animate-spin hidden" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
          <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
          <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
        </svg>
      </span>
    </button>
  </div>
</section>

<!-- Author Spotlight -->
<section class="bg-white py-16">
  <div class="max-w-7xl mx-auto px-6">
    <h2 class="text-3xl font-bold mb-12 text-center">Meet Our Top Authors</h2>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
      @foreach(range(1, 4) as $i)
      <div class="text-center">
        <img src="/api/placeholder/120/120" alt="Author" class="w-32 h-32 rounded-full mx-auto mb-4 object-cover">
        <h3 class="font-bold text-xl mb-2">{{ ['Sarah Johnson', 'Mike Chen', 'Emma Davis', 'Alex Thompson'][$i-1] }}</h3>
        <p class="text-gray-600 mb-4">{{ ['Tech Writer', 'AI Researcher', 'Culture Editor', 'Travel Blogger'][$i-1] }}</p>
        <div class="flex justify-center space-x-3">
          <a href="#" class="text-gray-400 hover:text-blue-600 transition"><i class="fab fa-twitter"></i></a>
          <a href="#" class="text-gray-400 hover:text-blue-600 transition"><i class="fab fa-linkedin"></i></a>
          <a href="#" class="text-gray-400 hover:text-blue-600 transition"><i class="fab fa-instagram"></i></a>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</section>

<!-- Statistics -->
<section class="bg-gradient-to-r from-blue-600 to-indigo-600 py-16 text-white">
  <div class="max-w-7xl mx-auto px-6">
    <div class="grid grid-cols-2 md:grid-cols-4 gap-8 text-center">
      <div>
        <div class="text-4xl font-bold mb-2">50K+</div>
        <div class="text-blue-100">Monthly Readers</div>
      </div>
      <div>
        <div class="text-4xl font-bold mb-2">1000+</div>
        <div class="text-blue-100">Published Articles</div>
      </div>
      <div>
        <div class="text-4xl font-bold mb-2">100+</div>
        <div class="text-blue-100">Expert Writers</div>
      </div>
      <div>
        <div class="text-4xl font-bold mb-2">24/7</div>
        <div class="text-blue-100">Support Available</div>
      </div>
    </div>
  </div>
</section>

<!-- Newsletter -->
<section class="bg-gray-100 py-16">
  <div class="max-w-4xl mx-auto px-6 text-center">
    <h2 class="text-3xl font-bold mb-3">Stay Updated</h2>
    <p class="text-gray-600 mb-8">Join our newsletter to receive the latest articles and updates directly in your inbox.</p>
    <div class="flex flex-col md:flex-row space-y-4 md:space-y-0 max-w-xl mx-auto">
      <input type="email" placeholder="Your Email Address" class="flex-grow px-4 py-3 rounded-l-lg md:rounded-r-none rounded-r-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
      <button class="bg-blue-600 text-white px-6 py-3 rounded-r-lg md:rounded-l-none rounded-l-lg font-medium hover:bg-blue-700 transition">Subscribe</button>
    </div>
    <p class="text-xs text-gray-500 mt-4">We respect your privacy. Unsubscribe at any time.</p>
  </div>
</section>
@endblock
