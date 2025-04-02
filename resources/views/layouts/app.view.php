<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Dashboard</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 text-gray-900">
  <div class="flex h-screen">
    <!-- Sidebar -->
    <aside class="w-64 bg-gray-900 text-white p-5 flex flex-col">
      <h2 class="text-xl font-bold mb-6">Admin Panel</h2>
      <nav>
        <ul>
          <li class="mb-3"><a href="{{ route('admin.index') }}" class="block p-3 rounded hover:bg-gray-700">📊 Dashboard</a></li>
          <li class="mb-3"><a href="{{ route('admin.categories.index') }}" class="block p-3 rounded hover:bg-gray-700">📂 Categories</a></li>
          <li class="mb-3"><a href="#" class="block p-3 rounded hover:bg-gray-700">📝 Manage Posts</a></li>
          <li class="mb-3"><a href="#" class="block p-3 rounded hover:bg-gray-700">👥 Manage Users</a></li>
        </ul>
      </nav>
    </aside>

    <!-- Main Content Area -->
    <div class="flex-1 flex flex-col">
      <!-- Header -->
      <header class="bg-white shadow p-4 flex justify-between items-center">
        <h1 class="text-2xl font-semibold">@insert('title')</h1>
        <div class="relative">
          <button class="flex items-center space-x-2">
            <img src="https://via.placeholder.com/40" alt="Avatar" class="w-10 h-10 rounded-full">
          </button>
        </div>
      </header>

      <!-- Content -->
      <main class="p-6">
        @insert('content')
      </main>
    </div>
  </div>
</body>

</html>
