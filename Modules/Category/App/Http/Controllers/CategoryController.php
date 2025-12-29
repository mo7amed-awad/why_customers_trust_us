<?php

namespace Modules\Category\App\Http\Controllers;

use App\Functions\Upload;
use App\Http\Controllers\BasicController;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Modules\Category\Entities\Model;
use Modules\Category\Entities\Subcategory;
use Yajra\DataTables\DataTables;

class CategoryController extends BasicController
{

    public function index()
    {
        return view('category::index');
    }

    public function datatable()
    {
        $query = Model::query();


        return DataTables::of($query)
            ->addColumn('actions', function ($Model) {
                return view('category::layouts.actions', ['Model' => $Model]);
            })
            ->editColumn('title_ar', function ($Model) {
                return view('category::layouts.title_ar', ['Model' => $Model]);
            })
            ->editColumn('title_en', function ($Model) {
                return view('category::layouts.title_en', ['Model' => $Model]);
            })
            ->addColumn('status', function ($Model) {
                return view('category::layouts.status', ['Model' => $Model]);
            })
            ->editColumn('created_at', function ($Model) {
                return $Model->created_at->format('F j, Y, g:i a');
            })
            ->addIndexColumn()
            ->rawColumns(['status', 'actions'])
            ->make(true);
    }

    public function create()
    {
        return view('category::create');
    }

    public function store(Request $request)
    {
        $category = Model::create([
            'title_ar' => $request->title_ar,
            'title_en' => $request->title_en,
            'slug'     => Str::slug($request->title_en),
        ]);


        if ($request->hasFile('image')) {
            $category->image = Upload::UploadFile($request->image, 'Categories');
        }

        if ($request->hasFile('icon')) {
            $category->icon = Upload::UploadFile($request->image, 'Categories');
        }

        $category->save();

        if ($request->has('subcategories')) {
            foreach ($request->subcategories as $sub) {
                Subcategory::create([
                    'category_id' => $category->id,
                    'title_ar'    => $sub['title_ar'],
                    'title_en'    => $sub['title_en'],
                    'desc_ar'     => $sub['desc_ar'] ?? '',
                    'desc_en'     => $sub['desc_en'] ?? '',
                    'slug'        => Str::slug($sub['title_en']),
                ]);
            }
        }

        alert()->success(__('trans.addedSuccessfully'));

        return redirect()->back();
    }

    public function show($id)
    {
        $Model = Model::where('id', $id)->firstorfail();

        return view('category::show', compact('Model'));
    }

    public function edit($id)
    {
        $category = Model::findOrFail($id);
        return view('category::edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $category = Model::findOrFail($id);
        $category->update($request->only(['title_ar', 'title_en', 'status']));

        if ($request->hasFile('image')) {
            Upload::deleteImage($category->image);
            $category->image = Upload::UploadFile($request->image, 'Categories');
        }

        if ($request->hasFile('icon')) {
            Upload::deleteImage($category->icon);
            $category->icon = Upload::UploadFile($request->icon, 'Categories');
        }

        $category->save();

        // Handle deleted subcategories
        if($request->deleted_subcategories) {
            $deletedIds = explode(',', $request->deleted_subcategories);
            Subcategory::whereIn('id', $deletedIds)
                ->where('category_id', $category->id)
                ->delete();
        }

        if($request->existing_subcategories) {
            foreach($request->existing_subcategories as $id => $data) {
                Subcategory::where('id', $id)->update($data);
            }
        }

        if($request->new_subcategories) {
            foreach($request->new_subcategories as $data) {
                $category->subcategories()->create($data);
            }
        }

        alert()->success(__('trans.updatedSuccessfully'));

        return redirect()->back();
    }

    public function destroy($id)
    {
        $Model = Model::with('images')->findOrFail($id);

        if ($Model->image) {
            Upload::deleteImage($Model->image);
        }

        if ($Model->icon) {
            Upload::deleteImage($Model->icon);
        }

        $Model->delete();
    }

}

