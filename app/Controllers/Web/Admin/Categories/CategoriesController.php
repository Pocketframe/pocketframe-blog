<?php

namespace App\Controllers\Web\Admin\Categories;

use App\Entities\Category;
use App\Entities\Post;
use App\Entities\Tag;
use App\Excel\Exports\CategoryExporter;
use App\Excel\Imports\CategoryImporter;
use Pocketframe\Essentials\Utilities\StringUtils;
use Pocketframe\Excel\Mask\Excel;
use Pocketframe\Http\Request\Request;
use Pocketframe\Http\Response\Response;
use Pocketframe\Masks\Validator;
use Pocketframe\PocketORM\Database\DataSafe;
use Pocketframe\PocketORM\QueryEngine\QueryEngine;
use Pocketframe\Validation\Rules\Unique;

class CategoriesController
{
  /**
   * Display a listing of the resources.
   *
   * @return Response The HTTP response containing the list of resources.
   */
  public function index()
  {
    // QueryEngine::enableQueryLog();
    $categories = QueryEngine::for(Category::class)
      ->include(['tags:id,tag_name, status', 'posts'])
      ->get();
    // $log = QueryEngine::getQueryLog();

    // dd($log, $categories);

    return Response::view('admin.categories.index', compact('categories'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return Response The HTTP response containing the creation form.
   */
  public function create()
  {
    $tags = fromEntity(Tag::class)
      ->select(['id', 'tag_name'])
      ->get();
    return Response::view('admin.categories.create', compact('tags'));
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param Request $request The HTTP request instance containing resource data.
   * @return Response The HTTP response after storing the resource.
   */
  public function store(Request $request): Response
  {

    // dd($request->all());
    Validator::validate($request->all(), [
      'category_name' => ['required', 'string', 'max:255', new Unique('categories', 'category_name')],
      'tags'          => ['required', 'array'],
      'status'        => ['required', 'string', 'in:active,inactive'],
      'description'   => ['required', 'string', 'max:255'],
    ])
      ->message([
        'category_name.required' => 'Category name is required',
        'category_name.string'   => 'Category name must be a string',
        'category_name.unique'   => 'Category name already exists',
        'category_name.max'      => 'Category name must be less than 255 characters',
        'tags.required'          => 'At least one tag is required',
        'status.required'        => 'Status is required',
        'description.required'   => 'Description is required',
      ])
      ->failed();

    DataSafe::guard(function () use ($request) {
      $category = new Category([
        'category_name' => $request->post('category_name'),
        'slug'          => StringUtils::slugify($request->post('category_name')),
        'status'        => $request->post('status'),
        'description'   => $request->post('description'),
      ]);
      $category->save();

      $category->relation('tags')->attach($request->post('tags'));
    });

    flash('success', 'Category created successfully');

    return Response::redirect(route('admin.categories.index'));
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
    // QueryEngine::enableQueryLog();
    $category = QueryEngine::for(Category::class)
      ->include([
        'posts' => fn(QueryEngine $e) => $e->where('status', '=', 'published'),
        'tags:id,tag_name,status'
      ])
      ->findOrFail($id);
    // $log = QueryEngine::getQueryLog();

    // dd($log, $category);

    return Response::view('admin.categories.show', compact('category'));
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
    $category = (new QueryEngine(Category::class))
      ->include(['tags'])
      ->find($id);


    return Response::view('admin.categories.edit', [
      'category' => $category,
      'tags'     => (new QueryEngine(Tag::class))->get()
    ]);
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
    $category = new Category([
      'id'            => $id,
      'category_name' => $request->post('category_name'),
      'status'        => $request->post('status'),
      'description'   => $request->post('description'),
    ]);
    $category->save();
    $category->tags()->sync($request->post('tags'));

    return Response::redirect(route('admin.categories.index'));
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
    $category = new Category([
      'id' => $id
    ]);
    $category->trash();

    return Response::redirect(route('admin.categories.index'));
  }

  public function export(Request $request)
  {
    return Excel::export(CategoryExporter::class)->download('categories.xlsx');
  }

  public function import(Request $request)
  {
    $path = $request->file('file');

    Excel::import(CategoryImporter::class, $path);
    return Response::redirect(route('admin.categories.index'));
  }
}
