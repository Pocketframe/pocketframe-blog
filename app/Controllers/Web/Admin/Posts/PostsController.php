<?php

namespace App\Controllers\Web\Admin\Posts;

use App\Entities\Category;
use App\Entities\Post;
use Pocketframe\Http\Request\Request;
use Pocketframe\Http\Response\Response;
use Pocketframe\Masks\Validator;
use Pocketframe\PocketORM\QueryEngine\QueryEngine;

class PostsController
{
  /**
   * Display a listing of the resources.
   *
   * @return Response The HTTP response containing the list of resources.
   */
  public function index(): Response
  {
    $posts = QueryEngine::for(Post::class)
      ->include(['category'])
      ->byDesc('created_at')
      ->get();

    // dd($posts);

    return Response::view('admin.posts.index', compact('posts'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return Response The HTTP response containing the creation form.
   */
  public function create(): Response
  {
    $categories = QueryEngine::for(Category::class)->get();
    return Response::view('admin.posts.create', compact('categories'));
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param Request $request The HTTP request instance containing resource data.
   * @return Response The HTTP response after storing the resource.
   */
  public function store(Request $request)
  {
    Validator::validate($request->all(), [
      'title'       => ['required'],
      'category_id' => ['required'],
      'status'      => ['required'],
      'content'     => ['required'],
    ])
      ->failed();

    $post = new Post([
      'title'       => $request->post('title'),
      'content'     => $request->post('content'),
      'category_id' => $request->post('category_id'),
      'status'      => $request->post('status'),
      'image'       => $request->storeFileOrNull('image', 'posts', 'public'),
    ]);

    $post->save();

    $category = new Category([
      'id' => $post->id,
      'post_id' => $post->id,
      'category_id' => $request->post('category_id')
    ]);
    $category->save();

    flash('success', 'Post created successfully');

    return Response::redirect(route('admin.posts.index'));
  }

  /**
   * Display the specified resource.
   *
   * @param Request $request The HTTP request instance.
   * @param mixed $id The unique identifier of the resource.
   * @return Response The HTTP response containing the resource details.
   */
  public function show(Request $request, $id)
  {
    $post = QueryEngine::for(Post::class)
      ->include(['category'])
      ->findOrFail($id);

    return Response::view('admin.posts.show', compact('post'));
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param Request $request The HTTP request instance.
   * @param mixed $id The unique identifier of the resource.
   * @return Response The HTTP response containing the edit form.
   */
  public function edit(Request $request, $id)
  {
    // Show form for editing the specified resource
  }

  /**
   * Update the specified resource in storage.
   *
   * @param Request $request The HTTP request instance containing updated data.
   * @param mixed $id The unique identifier of the resource.
   * @return Response The HTTP response after updating the resource.
   */
  public function update(Request $request, $id)
  {
    // Update the specified resource
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param Request $request The HTTP request instance.
   * @param mixed $id The unique identifier of the resource.
   * @return Response The HTTP response after deleting the resource.
   */
  public function destroy(Request $request, $id)
  {
    // Remove the specified resource
  }
}
