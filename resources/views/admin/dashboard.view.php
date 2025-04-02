@layout('layouts/app')

@block('title')
Dashboard
@endblock

@block('content')
<div class="grid grid-cols-3 gap-6">
  <div class="bg-white p-6 rounded-lg shadow flex items-center justify-between">
    <div>
      <h3 class="text-lg font-semibold">Total Posts</h3>
      <p class="text-2xl font-bold">150</p>
    </div>
    <span class="text-blue-500 text-3xl">📝</span>
  </div>
  <div class="bg-white p-6 rounded-lg shadow flex items-center justify-between">
    <div>
      <h3 class="text-lg font-semibold">Total Views</h3>
      <p class="text-2xl font-bold">12,450</p>
    </div>
    <span class="text-green-500 text-3xl">👁️</span>
  </div>
  <div class="bg-white p-6 rounded-lg shadow flex items-center justify-between">
    <div>
      <h3 class="text-lg font-semibold">Comments</h3>
      <p class="text-2xl font-bold">320</p>
    </div>
    <span class="text-yellow-500 text-3xl">💬</span>
  </div>
</div>

<div class="bg-white p-6 rounded shadow mt-6">
  <h2 class="text-xl font-bold mb-4">Recent Posts</h2>
  <table class="w-full text-left border-collapse">
    <thead>
      <tr class="bg-gray-200">
        <th class="p-3">Title</th>
        <th class="p-3">Author</th>
        <th class="p-3">Date</th>
        <th class="p-3">Actions</th>
      </tr>
    </thead>
    <tbody>
      <tr class="border-t">
        <td class="p-3">How to Learn Tailwind</td>
        <td class="p-3">John Doe</td>
        <td class="p-3">March 19, 2025</td>
        <td class="p-3">
          <button class="text-blue-500">✏️ Edit</button>
          <button class="text-red-500 ml-2">🗑️ Delete</button>
        </td>
      </tr>
      <tr class="border-t">
        <td class="p-3">Understanding CSS Grid</td>
        <td class="p-3">Jane Smith</td>
        <td class="p-3">March 18, 2025</td>
        <td class="p-3">
          <button class="text-blue-500">✏️ Edit</button>
          <button class="text-red-500 ml-2">🗑️ Delete</button>
        </td>
      </tr>
    </tbody>
  </table>
</div>
@endblock
