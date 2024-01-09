<?php

namespace App\Http\Controllers\portfolio;

use App\Http\Controllers\Controller;
use App\Models\Portfolio\Header;
use Illuminate\Http\Request;

class HeaderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $data= Header::all();

        return view('dashboardA.portfolioHeader.all',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

               $data=Header::find($id);
               return view('dashboardA.portfolioHeader.edit', compact('data'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name'=>'required',
            'text'=>'required',
            'img'=>'required|mimes:png,jpg,jpeg',
        ]);

        $request_except=$request->except('_token');
        // dd($request->img);
        if ($request->img) {
            // $imageName = uniqid() . $request->file('img')->getClientOriginalName();
            $filName=$request->file('img');

            // $stor=$filName->store('public/images');=
            $stor=$filName->store('/images','public');
            $request_except['img']=$stor;
        }

        $data=Header::find($id);
        $data->update($request_except);

        toast('user edited', 'info');

        return redirect()->route('dashboard.portfolioHeader.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
