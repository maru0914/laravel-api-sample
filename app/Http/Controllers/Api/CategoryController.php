<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryIndexResource;
use App\Http\Resources\CategoryShowResource;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        return CategoryIndexResource::collection(Category::all());
    }

    public function show(Category $category)
    {
        return new CategoryShowResource($category);
    }

    public function store(Request $request)
    {
        $category = Category::create($request->all());

        return new CategoryShowResource($category);
    }

    public function list()
    {
        return CategoryIndexResource::collection(Category::all());
    }
}
