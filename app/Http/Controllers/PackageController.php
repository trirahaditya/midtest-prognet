<?php

namespace App\Http\Controllers;

use App\Models\Package;
use App\Models\Product;
use App\Models\DetailPackage;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Request;

class PackageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function home()
    {
        $packages = Package::all();
        return view('package.home',compact('packages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $packages = Package::all();
        return view('package.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){

        $validatedData = $request->validate([
            'name' => 'required',
            'normal_price' => 'required|numeric',
            'end_price' => 'required|numeric',
        ]);
        
        $producted = Package::create($validatedData);

        // foreach ($request->products as $product) {
        //     DetailPackage::create([
        //         'id_packages' => $producted->id,
        //         'id_product' => $product,
        //         'quantity' => $request->quantity
        //     ]);
        // }
     
        return redirect('/package')->with('success','Data package berhasil ditambah.');

        // $this->validate($request, [
        //     'name' => 'required',
        //     'quantity' => 'required|numeric',
        //     'normal_price' => 'required|numeric',
        //     'end_price' => 'required|numeric' 
        // ]);

        // Package::create([
        //     'name' => $request->name,
        //     'quantity' => $request->quantity,
        //     'normal_price' => $request->normal_price,
        //     'end_price' => $request->end_price
        // ]);
     
        // return redirect('/package')->with('success','Data package berhasil ditambah.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $packages = Package::find($id);
        return view('package.detail', compact('packages'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $package = Package::find($id);
        $product = Product::all();
        return view('package.edit',compact('package','product'));
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
        $validatedData = $request->validate([
            'name' => 'required',
            'normal_price' => 'required|numeric',
            'end_price' => 'required|numeric',
        ]);

        Package::where('id',$id)->update($validatedData, [
            'name' => $request->name,
            'normal_price' => $request->normal_price,
            'end_price' => $request->end_price
        ]);
     
        return redirect('/package')->with('success','Data package berhasil diupdate.');
    }

    public function destroyProducts($id)
    {
        $product = DetailPackage::find($id);
        $product->delete();
        return redirect()->back()->with('success','Data product pada packages telah dihapus');
    }

}
