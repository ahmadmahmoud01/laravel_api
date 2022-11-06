<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\Traits\ApiResTrait;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    use ApiResTrait;
    // index() to get all data
    // store() to store new data
    // show() to show a specific instance of data (category)
    // update() to update a specific instance of data (category)
    // destroy() to delete a specific instance of data (category)


    public function index()
    {
        $categories = Category::all();
        return $this->apiResponse(true, 'All Categories', $categories);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'  => 'required|string|min:3',
            'description'  => 'required|string|min:3',
        ]);

        if($validator->fails()) {
            return $this->apiResponse(false, 'Validation Errors', $validator->errors());
        } else {
            $category = Category::create($request->all());
            return $this->apiResponse(true, 'Category Saved Successfully', $category);
        }
    }

    public function show($id)
    {
        $category = Category::find($id);

        if($category) {
            return $this->apiResponse(true, 'Show Category', $category);
        } else {
            return $this->apiResponse(false, 'Not Found!', null);
        }
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name'  => 'required|string|min:3',
            'description'  => 'required|string|min:3',
        ]);

        $category = Category::find($id);

        if(!$category) {
            return response()->json([
                'success'   => false,
                'message'   => 'Category Is not exist!',
                'data'      => null
            ], 200);
        }

        if($validator->fails()) {
            return response()->json([
                'success'   => false,
                'message'   => 'Validation Errors',
                'data'      => $validator->errors(),
            ], 200);
        } else {

            $category->update($request->all());

            return response()->json([
                'success'   => true,
                'message'   => 'Category Updated Successfully!',
                'data'      => $category
            ], 200);
        }
    }

    public function destroy($id)
    {
        $category = Category::find($id);

        if($category) {
            $category->delete();
            return response()->json([
                'success'   => true,
                'message'   => 'Category Deleted Successfully!',
                'data'      => null
            ], 200);
        } else {
            return response()->json([
                'success'   => false,
                'message'   => 'Category Does not exist',
                'data'      => null,
            ], 200);
        }
    }
}
