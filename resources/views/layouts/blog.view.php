<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>{{ config('app.app_name') }} | @insert('title')</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <style>
    body {
      font-family: 'Poppins', sans-serif;
      scroll-behavior: smooth;
    }

    .card-hover {
      transition: all 0.3s ease;
    }

    .card-hover:hover {
      transform: translateY(-8px);
    }

    .gradient-text {
      background-clip: text;
      -webkit-background-clip: text;
      color: transparent;
      background-image: linear-gradient(90deg, #3b82f6, #6366f1);
    }

    .dropdown {
      display: none;
      position: absolute;
      right: 0;
      top: 100%;
      z-index: 100;
    }

    .dropdown-trigger:hover .dropdown {
      display: block;
    }

    .dropdown-trigger:focus-within .dropdown {
      display: block;
    }

    .prose {
      max-width: 65ch;
      line-height: 1.75;
    }

    .prose p {
      margin-bottom: 1.5em;
    }

    .prose h2 {
      font-size: 1.5em;
      margin-top: 2em;
      margin-bottom: 1em;
      font-weight: 600;
    }

    .prose h3 {
      font-size: 1.25em;
      margin-top: 1.5em;
      margin-bottom: 0.75em;
      font-weight: 600;
    }
  </style>
</head>

<body class="bg-gray-50 text-gray-900">
  <header class="bg-white shadow-sm p-4 flex justify-between items-center fixed w-full top-0 z-50">
    <div class="flex items-center">
      <div class="text-3xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-indigo-600">{{ config('app.app_name') }}</div>
    </div>
    <nav class="hidden md:block">
      <ul class="flex space-x-8 text-lg">
        <li><a href="{{ route('home') }}" class="font-medium hover:text-blue-500 transition relative after:absolute after:bottom-0 after:left-0 after:h-0.5 after:w-0 after:bg-blue-500 after:transition-all hover:after:w-full">Home</a></li>
        <li><a href="{{ route('categories.index') }}" class="font-medium hover:text-blue-500 transition relative after:absolute after:bottom-0 after:left-0 after:h-0.5 after:w-0 after:bg-blue-500 after:transition-all hover:after:w-full">Categories</a></li>
        <li><a href="#" class="font-medium hover:text-blue-500 transition relative after:absolute after:bottom-0 after:left-0 after:h-0.5 after:w-0 after:bg-blue-500 after:transition-all hover:after:w-full">About</a></li>
        <li><a href="#" class="font-medium hover:text-blue-500 transition relative after:absolute after:bottom-0 after:left-0 after:h-0.5 after:w-0 after:bg-blue-500 after:transition-all hover:after:w-full">Contact</a></li>
      </ul>
    </nav>
    <div class="flex items-center space-x-4">
      <div class="relative hidden md:block">
        <input type="text" placeholder="Search..." class="pl-10 pr-4 py-2 rounded-full border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
        <i class="fas fa-search absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
      </div>

      <!-- Login Button (for logged out users) -->
      <button class="hidden bg-gradient-to-r from-blue-500 to-indigo-600 text-white px-5 py-2 rounded-lg shadow hover:shadow-lg transition duration-300 ease-in-out transform hover:-translate-y-1">Login</button>

      <!-- User Avatar & Dropdown (for logged in users) -->
      <div class="relative dropdown-trigger">
        <button class="flex items-center space-x-2 focus:outline-none">
          <div class="w-10 h-10 rounded-full bg-gradient-to-r from-blue-500 to-indigo-600 flex items-center justify-center text-white font-medium">JS</div>
          <span class="hidden md:block text-gray-700">John Smith</span>
          <i class="fas fa-chevron-down text-gray-500 text-xs"></i>
        </button>
        <div class="dropdown mt-2 bg-white rounded-lg shadow-lg py-2 w-48">
          <div class="px-4 py-2 border-b border-gray-100">
            <p class="text-sm font-medium text-gray-900">John Smith</p>
            <p class="text-xs text-gray-500">john.smith@example.com</p>
          </div>
          <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 transition">
            <i class="fas fa-user mr-2 text-gray-500"></i> Profile
          </a>
          <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 transition">
            <i class="fas fa-cog mr-2 text-gray-500"></i> Settings
          </a>
          <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 transition">
            <i class="fas fa-bookmark mr-2 text-gray-500"></i> Saved Articles
          </a>
          <div class="border-t border-gray-100 mt-2 pt-2">
            <a href="#" class="block px-4 py-2 text-sm text-red-600 hover:bg-gray-100 transition">
              <i class="fas fa-sign-out-alt mr-2"></i> Logout
            </a>
          </div>
        </div>
      </div>

      <button class="md:hidden text-gray-600">
        <i class="fas fa-bars text-2xl"></i>
      </button>
    </div>
  </header>

  <main>
    @insert('content')
  </main>

  <!-- Footer -->
  <footer class="bg-gray-900 text-white pt-12 pb-6">
    <div class="max-w-7xl mx-auto px-6">
      <div class="grid grid-cols-1 md:grid-cols-4 gap-8 pb-8">
        <div>
          <h3 class="text-2xl font-bold mb-4 text-transparent bg-clip-text bg-gradient-to-r from-blue-400 to-indigo-400">{{ config('app.app_name') }}</h3>
          <p class="text-gray-400 mb-4">Delivering thoughtful content and engaging stories from around the world.</p>
          <div class="flex space-x-4">
            <a href="#" class="text-gray-400 hover:text-white transition"><i class="fab fa-facebook-f"></i></a>
            <a href="#" class="text-gray-400 hover:text-white transition"><i class="fab fa-twitter"></i></a>
            <a href="#" class="text-gray-400 hover:text-white transition"><i class="fab fa-instagram"></i></a>
            <a href="#" class="text-gray-400 hover:text-white transition"><i class="fab fa-linkedin-in"></i></a>
          </div>
        </div>
        <div>
          <h4 class="text-lg font-semibold mb-4">Quick Links</h4>
          <ul class="space-y-2">
            <li><a href="#" class="text-gray-400 hover:text-white transition">Home</a></li>
            <li><a href="#" class="text-gray-400 hover:text-white transition">About Us</a></li>
            <li><a href="#" class="text-gray-400 hover:text-white transition">Contact</a></li>
            <li><a href="#" class="text-gray-400 hover:text-white transition">Careers</a></li>
          </ul>
        </div>
        <div>
          <h4 class="text-lg font-semibold mb-4">Categories</h4>
          <ul class="space-y-2">
            <li><a href="#" class="text-gray-400 hover:text-white transition">Technology</a></li>
            <li><a href="#" class="text-gray-400 hover:text-white transition">Health</a></li>
            <li><a href="#" class="text-gray-400 hover:text-white transition">Art</a></li>
            <li><a href="#" class="text-gray-400 hover:text-white transition">Travel</a></li>
          </ul>
        </div>
        <div>
          <h4 class="text-lg font-semibold mb-4">Contact Us</h4>
          <ul class="space-y-2 text-gray-400">
            <li class="flex items-start">
              <i class="fas fa-map-marker-alt mt-1 mr-3"></i>
              <span>123 Innovation Street, Tech City, 10001</span>
            </li>
            <li class="flex items-center">
              <i class="fas fa-envelope mr-3"></i>
              <span>contact@example.com</span>
            </li>
            <li class="flex items-center">
              <i class="fas fa-phone mr-3"></i>
              <span>+1 (555) 123-4567</span>
            </li>
          </ul>
        </div>
      </div>
      <div class="border-t border-gray-800 pt-6 flex flex-col md:flex-row justify-between items-center">
        <p class="text-sm text-gray-400">&copy; 2025 {{ config('app.app_name') }}. All rights reserved.</p>
        <div class="mt-4 md:mt-0">
          <ul class="flex space-x-6 text-sm text-gray-400">
            <li><a href="#" class="hover:text-white transition">Terms</a></li>
            <li><a href="#" class="hover:text-white transition">Privacy</a></li>
            <li><a href="#" class="hover:text-white transition">Cookies</a></li>
          </ul>
        </div>
      </div>
    </div>
  </footer>

  <script>
    document.addEventListener('DOMContentLoaded', function() {
      // Load More functionality
      const loadMoreBtn = document.getElementById('load-more');
      const articlesGrid = document.getElementById('articles-grid');
      const loadMoreText = loadMoreBtn.querySelector('.load-more-text');
      const loadMoreSpinner = loadMoreBtn.querySelector('.load-more-spinner');

      loadMoreBtn.addEventListener('click', async function() {
        try {
          // Disable button and show loading state
          loadMoreBtn.disabled = true;
          loadMoreText.textContent = 'Loading...';
          loadMoreSpinner.classList.remove('hidden');

          // Get next page
          const currentPage = parseInt(loadMoreBtn.dataset.currentPage);
          const nextPage = currentPage + 1;

          // Fetch more posts
          const response = await fetch(`?page=${nextPage}&_ajax=1`);

          if (!response.ok) throw new Error('Failed to load more articles');

          const data = await response.json();

          // Add new posts to the grid
          data.posts.forEach(post => {
            const article = document.createElement('article');
            article.className = 'bg-white rounded-xl shadow-md hover:shadow-xl transition-all duration-300 flex flex-col overflow-hidden card-hover';
            article.innerHTML = `
              <div class="relative">
                <img src="${post.image}" alt="Post Image" class="w-full h-60 object-cover">
              </div>
              <div class="p-6 flex flex-col flex-grow">
                <h3 class="text-xl font-bold text-gray-900 hover:text-blue-600 transition">${post.title}</h3>
                <div class="flex items-center mt-3 mb-4">
                  <img src="/api/placeholder/40/40" alt="Author" class="w-8 h-8 rounded-full">
                </div>
                <div class="mt-6 flex justify-between items-center">
                  <a href="#" class="text-blue-600 font-medium hover:text-blue-800 transition flex items-center">
                    Read More
                    <i class="fas fa-arrow-right ml-2 text-sm"></i>
                  </a>
                  <div class="flex space-x-2 text-gray-400">
                    <span class="flex items-center"><i class="far fa-eye mr-1"></i> ${Math.floor(Math.random() * 900) + 100}</span>
                    <span class="flex items-center"><i class="far fa-comment mr-1"></i> ${Math.floor(Math.random() * 25) + 5}</span>
                  </div>
                </div>
              </div>
            `;
            articlesGrid.appendChild(article);
          });

          // Update button state
          loadMoreBtn.dataset.currentPage = nextPage;
          if (!data.hasMore) {
            loadMoreBtn.disabled = true;
            loadMoreText.textContent = 'No More Articles';
          } else {
            loadMoreBtn.disabled = false;
            loadMoreText.textContent = 'Load More Articles';
          }
        } catch (error) {
          console.error('Error:', error);
          loadMoreText.textContent = 'Error Loading Articles';
          setTimeout(() => {
            loadMoreBtn.disabled = false;
            loadMoreText.textContent = 'Try Again';
          }, 3000);
        } finally {
          loadMoreSpinner.classList.add('hidden');
        }
      });

      // Article filtering functionality
      const filterButtons = document.querySelectorAll('#article-filters button');
      const articles = document.querySelectorAll('#articles-grid article');

      filterButtons.forEach(button => {
        button.addEventListener('click', () => {
          // Update active button state
          filterButtons.forEach(btn => {
            btn.classList.remove('bg-blue-100', 'text-blue-600');
            btn.classList.add('hover:bg-gray-100');
          });
          button.classList.add('bg-blue-100', 'text-blue-600');
          button.classList.remove('hover:bg-gray-100');

          const filter = button.getAttribute('data-filter');

          articles.forEach(article => {
            if (filter === 'all' || article.getAttribute('data-category') === filter) {
              article.style.display = 'flex';
            } else {
              article.style.display = 'none';
            }
          });
        });
      });

      // Toggle dropdown functionality
      const header = document.querySelector('header');

      window.addEventListener('scroll', function() {
        if (window.scrollY > 100) {
          header.classList.add('shadow-md');
          header.classList.remove('shadow-sm');
        } else {
          header.classList.remove('shadow-md');
          header.classList.add('shadow-sm');
        }
      });

      // For demonstration purposes - to toggle between logged in and logged out states
      const loginButton = document.querySelector('button.hidden');
      const userAvatar = document.querySelector('.dropdown-trigger');

      // Uncomment to test toggle between logged in/out states
      // loginButton.classList.remove('hidden');
      // userAvatar.classList.add('hidden');
    });
  </script>
</body>

</html>
