<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Traits\ApiResponser;
use Illuminate\Http\Response;

class CategoryController extends Controller
{
    use ApiResponser;
    /**
     * Lista de elementos
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->httpOkResponse(Category::whereNull('category_id')->get());
    }

    /**
     * Crea un registro del recurso
     *
     * @param  App\Http\Requests\StoreCategoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategoryRequest $request)
    {
        $category = Category::create($request->all());
        return $this->generateResponse($category, Response::HTTP_CREATED);
    }

    /**
     * Obtiene el recurso especificado
     *
     * @param  App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        return $this->httpOkResponse($category);
    }

    /**
     * Actualiza un recurso especifico
     *
     * @param  App\Http\Requests\UpdateCategoryRequest  $request
     * @param  App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $category->update($request->all());
        return $this->httpOkResponse($category);
    }

    /**
     * Elimina un recurso especifico
     *
     * @param  App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return $this->httpOkResponse();
    }
}
