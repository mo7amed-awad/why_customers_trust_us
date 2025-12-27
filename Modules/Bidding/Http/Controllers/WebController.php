<?php

namespace Modules\Bidding\Http\Controllers;

use App\Functions\Upload;
use App\Http\Controllers\BasicController;
use Illuminate\Http\Request;
use Modules\Bidding\Entities\Model;
use Modules\Bidding\Entities\ModelImage;
use Modules\Brand\Entities\Model as Brand;
use Modules\Specification\Entities\Model as Specification;
use Yajra\DataTables\DataTables;

class WebController extends BasicController
{
    public function index(Request $request)
    {
        return view('bidding::index');
    }

    public function datatable(Request $request)
    {
        $query = Model::query()->with('Brand', 'Model');

        if (request()->sort_column && request()->sort_direction) {
            $query->orderBy(request()->sort_column, request()->sort_direction);
        }

        return DataTables::of($query)
            ->addColumn('actions', function ($Model) {
                return view('bidding::layouts.actions', ['Model' => $Model]);
            })
            ->editColumn('title_ar', function ($Model) {
                return view('bidding::layouts.title_ar', ['Model' => $Model]);
            })
            ->editColumn('title_en', function ($Model) {
                return view('bidding::layouts.title_en', ['Model' => $Model]);
            })
            ->editColumn('model', function ($Model) {
                return $Model->Model->title();
            })
            ->editColumn('brand', function ($Model) {
                return $Model->Brand->title();
            })
            ->addColumn('status', function ($Model) {
                return view('bidding::layouts.status', ['Model' => $Model]);
            })
            ->addColumn('image', function ($Model) {
                return view('bidding::layouts.image', ['Model' => $Model]);
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
        $Specifications = Specification::get();
        $Brands = Brand::with('Models')->get();

        return view('bidding::create', compact('Specifications', 'Brands'));
    }

    public function store(Request $request)
    {
        $Model = Model::create($request->only(['brand_id', 'model_id','bid_time', 'title_ar', 'title_en', 'desc_ar', 'desc_en', 'status']));
        if ($request->hasFile('images')) {
            foreach (Upload::UploadFiles($request->images, 'Biddings') as $image) {
                $Model->Images()->create([
                    'image' => $image,
                ]);
            }
        }

        $specs = [];
        if ($request->has('specifications')) {
            foreach ($request->specifications as $spec) {
                if (isset($spec['id']) && $spec['id']) {
                    $specs[$spec['id']] = [
                        'title_ar' => $spec['title_ar'] ?? '',
                        'title_en' => $spec['title_en'] ?? '',
                    ];
                }
            }
        }

        $Model->Specifications()->sync($specs);

        alert()->success(__('trans.addedSuccessfully'));

        return redirect()->back();
    }

    public function show($id)
    {
        $Model = Model::where('id', $id)->firstorfail();

        return view('bidding::show', compact('Model'));
    }

    public function edit($id)
    {
        $Model = Model::findOrFail($id);
        $Specifications = Specification::get();
        $Brands = Brand::with('Models')->get();

        return view('bidding::edit', compact('Model', 'Specifications', 'Brands'));
    }

    public function update(Request $request, $id)
    {
        $Model = Model::where('id', $id)->firstorfail();
        $Model->update($request->only(['brand_id', 'model_id','bid_time', 'title_ar', 'title_en', 'desc_ar', 'desc_en', 'status']));
        if ($request->hasFile('images')) {
            foreach (Upload::UploadFiles($request->images, 'Biddings') as $image) {
                $Model->Images()->create([
                    'image' => $image,
                ]);
            }
        }

        $specs = [];
        if ($request->has('specifications')) {
            foreach ($request->specifications as $spec) {
                if (isset($spec['id']) && $spec['id']) {
                    $specs[$spec['id']] = [
                        'title_ar' => $spec['title_ar'] ?? '',
                        'title_en' => $spec['title_en'] ?? '',
                    ];
                }
            }
        }
        $Model->Specifications()->sync($specs);

        alert()->success(__('trans.updatedSuccessfully'));

        return redirect()->back();
    }

    public function destroy($id)
    {
        $Model = Model::where('id', $id)->delete();
    }

    public function sortImages(Request $request, $id)
    {
        $order = $request->input('order');

        if (! is_array($order)) {
            return response()->json(['status' => 'error', 'message' => 'Invalid order format.'], 422);
        }

        foreach ($order as $index => $imageId) {
            ModelImage::where('id', $imageId)->where('bidding_id', $id)->update(['arrangement' => $index]);
        }

        return response()->json(['status' => 'success']);
    }
}
