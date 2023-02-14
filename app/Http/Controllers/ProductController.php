<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Models\User;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = Product::get();
        $NumOfUser = User::count();
        $NumOfCoffee = Product::count();

        
        // return $data;
        return view('/dashboard', compact('data', 'NumOfUser','NumOfCoffee'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProductRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $plat_image = $request->file('image');
        $name_gen = hexdec(uniqid());
        $img_ext = strtolower($plat_image->getClientOriginalExtension());
        $img_name = $name_gen . '.' . $img_ext;
        $location = 'images/';
        $last_img = $location . $img_name;
        $plat_image->move($location, $img_name);

        DB::table('products')->insert([
            'title' => $request->title,
            'image' => $last_img,
            'description' => $request->description,
            'price' => $request->price,
        ]);

        return redirect()
            ->back()
            ->with('success', 'Product added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
        $data = Product::get();
        // return $data;
        return view('welcome', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $data = Product::where('id', '=', $id)->first();
        return view('edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProductRequest  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $plat_image = $request->file('image');
        $name_gen = hexdec(uniqid());
        $img_ext = strtolower($plat_image->getClientOriginalExtension());
        $img_name = $name_gen . '.' . $img_ext;
        $location = 'images/';
        $last_img = $location . $img_name;
        $plat_image->move($location, $img_name);

        DB::table('products')->where('id', $id)->update([
            'title' => $request->name,
            'image' => $last_img,
            'description' => $request->description,
            'price' => $request->price,
        ]);

        return to_route('dashboard')
            ->with('success', 'Product updated successfully');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        DB::table('products')->delete($id);
        return to_route('dashboard')
            ->with('success', 'Product deleted successfully');
    }
}
