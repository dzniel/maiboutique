<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    /**
     * View the home page.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::paginate(8);

        return view('pages.home', [
            'products' => $products
        ]);
    }

    /**
     * View the specified product details page.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function detail($product_id)
    {
        $product = Product::find($product_id);

        return view('pages.detail', [
            'product' => $product
        ]);
    }

    /**
     * View the add item page.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.add.item');
    }

    /**
     * Store a newly added product.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $credentials = $request->validate([
            'image' => ['required', 'mimes:jpg,png,jpeg', 'max:5000'],
            'name' => ['required', 'unique:products', 'min:5', 'max:20'],
            'description' => ['required', 'min:5'],
            'price' => ['required', 'numeric', 'min:1000'],
            'stock' => ['required', 'numeric', 'min:1']
        ]);

        $extension = $request->file('image')->getClientOriginalExtension();
        $filename = $credentials['name'].'.'.$extension;
        $path = $request->file('image')->move('images/products', $filename);
        $credentials['image'] = $path;

        Product::create($credentials);

        return redirect(route('home'));
    }

    /**
     * View the search page.
     *
     * @return \Illuminate\Http\Response
     */
    public function search()
    {
        $products = Product::paginate(8);

        return view('pages.search', [
            'products' => $products
        ]);
    }

    /**
     * View the specified product details page.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $products = Product::where('name', 'like', '%'.$request->name.'%')->first();

        if (!$products)
        {
            return view('pages.search', [
               'products' => null
            ]);
        }

        $products = Product::where('name', 'like', '%'.$request->name.'%')->paginate(8);

        return view('pages.search', [
            'products' => $products
        ]);
    }

    /**
     * Deletes the specified product.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        File::delete(public_path($product->image));
        Product::where('id', $product->id)->delete();

        return redirect(route('home'));
    }
}
