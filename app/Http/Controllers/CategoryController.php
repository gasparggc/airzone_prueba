<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Services\CategoryService;

class CategoryController extends Controller
{
    protected $categoryService;

    public function __construct(CategoryService $categoryService){
        $this->categoryService = $categoryService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(){
        $response = $this->categoryService->index();

        return response()->json($response);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request){

        $response = $this->categoryService->store($request);

        return response()->json($response);
    }

    /**
     * Display the specified resource.
     */
    public function show($id){

        $response = $this->categoryService->show($id);;

        return response()->json($response);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id){

        $response = $this->categoryService->update($request, $id); 

        return response()->json($response);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id){
                
        $response = $this->categoryService->destroy($id); 

        return response()->json($response);
    }
}
