<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Dashboard</title>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.css" rel="stylesheet" />

</head>

<body class="bg-gray-100 text-gray-900">
  <div class="flex h-screen">
    <!-- Sidebar -->
    <aside class="w-64 bg-gray-900 text-white p-5 flex flex-col">
      <h2 class="text-xl font-bold mb-6">Admin Panel</h2>
      @include('partials.sidebar')
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
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
  @stack('js')
</body>

</html>
