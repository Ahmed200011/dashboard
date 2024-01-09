<?php

namespace App\Http\Controllers\portfolio;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Category::all();
        return view('dashboardA.portfolioCategory.all', compact('data'));
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboardA.portfolioCategory.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        dd($request->text);
        $request->validate([
            'name' => 'required',
            'text' => 'required',
            'img' => 'required',
        ]);

        $request_except = $request->except('_token');
        if ($request->img) {
            $filName = $request->img;
            $stor = $filName->store('/images/category', 'public');
            $request_except['img'] = $stor;
        }
        Category::create($request_except);

        toast('user edited', 'info');

        return redirect()->route('dashboard.portfolioCategory.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category, string $id)
    {
        $category=Category::find($id);
        return view('dashboardA.portfolioCategory.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category , string $id)
    {
        $request->validate([
            'name' => 'required',
            'text' => 'required',
            'img' => 'required',
        ]);

        $request_except = $request->except('_token');
        if ($request->img) {
            $filName = $request->img;
            $stor = $filName->store('/images/category', 'public');
            $request_except['img'] = $stor;
        }
        $category=Category::find($id);
        $category->update($request_except);

        toast('user updated', 'success');

        return redirect()->route('dashboard.portfolioCategory.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category=Category::find($id);
        $category->delete();
        toast('category deleted', 'success');

        return redirect()->route('dashboard.portfolioCategory.index');

    }
}
