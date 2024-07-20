<?php

namespace App\Http\Controllers;

use App\Http\Requests\Product\CreateProductRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Product;
use App\Models\User;
use App\Notifications\MyFirstNotification;
class ProductController extends Controller
{
    public function index()
    {
        $products = Product::paginate(10);
        $routes = collect(Route::getRoutes())->map(function ($route){
            return [
                'uri'=> $route->uri,
                'methods'=> $route->methods(),
                'action'=> $route->getActionName(),
                'name' => $route->getName(),
            ];
        });
        return view('product.index', ['products' => $products, 'routes' => $routes]);
    }
    public function create()
    {
        return view('product.create');
    }
    public function view($id)
    {
        $product = Product::where('id', $id)->first();
        return view('product.view', ['product' => $product]);
    }
    public  function edit($id)
    {
        $product = Product::where('id', $id)->first();
        return view('product.edit', ['product' => $product]);
    }
    public  function store(createProductRequest $request){
        $validated = $request->validated();
        $product = new Product();
        $product->product_name = $request->input('product_name');
        $product->description = $request->input('description');
        $product->status = 1;
        $product->save();
        return back()->withSuccess('Product Added Successfully');
    }
    public  function update(createProductRequest $request, $id){
        $request->validated();
        $product = Product::where('id', $id)->first();
        $product->product_name = $request->input('product_name');
        $product->description = $request->input('description');
        $product->status = 1;
        $product->save();
        return back()->withSuccess('Product Updated Successfully');
    }
    public  function delete($id)
    {
        $product = Product::where('id', $id)->first();
        $product->delete();
        return back()->withSuccess('Product Deleted Successfully');
    }
    public function dataTableLogic(Request $request)
    {
        if ($request->ajax()) {
            $Product = Product::select('*');
            return datatables()->of($Product)
                ->make(true);
        }

        return view('y-dataTables');
    }
    public  function sendNotification()
    {
        $user = User::all();
        dd($user);
    }
}
