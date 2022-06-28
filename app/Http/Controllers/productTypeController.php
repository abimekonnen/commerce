<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\productTyp;
use App\Models\Category;

class productTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $types= ProductTyp::all();
        $categories= Category::all();
        return view('productTyp.view',[
            'types'=>$types,
            'categories'=>$categories,
        ]);
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required','unique:product_typs', 'regex:/^[a-zA-Z]+$/u', 'max:255'],
            'category' => ['required', 
            function ($attribute, $value, $fail) {
                if ($value === 'Select Category') {
                    $fail('The '.$attribute.'  not selected.');
                }
            },],

        ]);
      
        $productTyp = ProductTyp::create(
            [
                'name' =>  ucwords($request->input('name')),
                'category' => $request->input('category'),
            ]
            );
        return redirect(route('productTyp.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $productTyp = ProductTyp::where('id', $id)->first();
        $productTyp->Delete();
        return redirect(route('productTyp.index'));
    }
}
