<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.view.categories.list', [
            'tittle' => 'Category List',
            'categories' => Category::orderBy('id')->paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (Gate::allows('isAdmin')) {
            return view('admin.view.categories.create', [
                'tittle' => 'Create Category',
            ]);
        }
        return redirect()->back()->with('warning', 'No permission');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $request)
    {
        try {
            Category::create($request->all());
            session()->flash('success', 'Success');
            return redirect()->route('categories.index');
        } catch (Exception $exception) {
            return redirect()->back()->with('failed', $exception->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        return view('admin.view.categories.detail', [
            'tittle' => "Detail Category",
            'category' => $category,
            'packages' => $category->packages()->paginate(10)

        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        if (Gate::allows('isAdmin')) {
            return view('admin.view.categories.edit', [
                'tittle' => "Update Category",
                'category' => $category
            ]);
        }
        return redirect()->back()->with('warning', 'No permission');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryRequest $request, Category $Category)
    {
        try {
            $Category->fill($request->all());
            $Category->save();
            session()->flash('success', 'Success');
            return redirect()->route('categories.index');
        } catch (Exception $exception) {
            return redirect()->back()->with('failed', $exception->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        if (Gate::allows('isAdmin')) {
            try {
                $category->delete();
                session()->flash('success', 'Success');
                return redirect()->route('categories.index');
            } catch (Exception $exception) {
                return redirect()->back()->with('failed', $exception->getMessage());
            }
        }
        return redirect()->back()->with('warning', 'No permission');
    }
    public function showPackage(Category $category)
    {
        return view(
            'admin.view.categories.listPackages',
            [
                'tittle2' => "MemberList",
                'tittle' => "$category->name",
                'packages' => $category->packages()->paginate(10)
            ]
        );
    }
}