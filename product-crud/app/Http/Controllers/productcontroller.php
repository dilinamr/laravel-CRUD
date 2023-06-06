<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\product;

class productcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('products.index', ['products' => product::get()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validate
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'image' => 'required'
        ]);
        // dd($request->all());
        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('products'), $imageName);
        // dd($imageName);
        $product = new product;
        $product->image = $imageName;
        $product->name = $request->name;
        $product->description = $request->description;
        $product->save();
        return back()->withSuccess('product created');
        // return view('products.index')->withSuccess('product created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = product::where('id', $id)->first();
        return view('products.show',['product'=>$product]); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //dd('$id');
        $product = product::where('id', $id)->first();
        return view('products.edit', ['product' => $product]); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'image' => 'nullable'
        ]);
        // dd($request->all());
        $product = product::where('id', $id)->first();
        if (isset($request->image)) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('products'), $imageName);
            $product->image = $imageName;
        }
        // dd($imageName);
        //$product = new product;
        
        $product->name = $request->name;
        $product->description = $request->description;
        $product->save();
        return back()->withSuccess('product updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = product::where('id', $id)->first();
        $product->delete();
        return back()->withsuccess('product deleted');
    }
}
