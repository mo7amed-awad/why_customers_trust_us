<?php

namespace App\Http\Controllers;

use App\Functions\Upload;
use App\Functions\WhatsApp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Pion\Laravel\ChunkUpload\Handler\HandlerFactory;
use Pion\Laravel\ChunkUpload\Receiver\FileReceiver;

class webController extends BasicController
{
    public function lang($locale)
    {
        if (isset($locale) && in_array($locale, config('app.locales'))) {
            app()->setLocale($locale);
            session()->put('locale', $locale);
        }

        return redirect()->back();
    }

    public function artisan($command)
    {
        try {
            Artisan::call($command);
        } catch (Exception $e) {
            Artisan::call($command, ['--force' => true]);
        }
        dd(Artisan::output());
    }

    public function SendOTP($number)
    {
        return response()->json([
            'code' => WhatsApp::SendOTP($number),
        ]);
    }

    public function reorder(Request $request)
    {
        $validator = $request->validate([
            'ids' => 'required|array',
            'positions' => 'required|array',
            'table' => 'required|string',
        ]);

        $positions = [];
        foreach ($request->positions as $key => $value) {
            $positions[$key] = (int) ($value);
        }
        sort($positions, SORT_NUMERIC);
        $sql = '';
        foreach ($request->ids as $index => $id) {
            $sql .= "UPDATE `categories` SET `arrangement`={$positions[$index]} WHERE `id`={$id};";
            DB::table($request->table)->where('id', $id)->update([
                'arrangement' => $positions[$index],
            ]);
        }

        return response()->json([]);
    }

    public function switch(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => ['required', 'integer'],
            'column_name' => ['required', 'string'],
            'table' => ['required', 'string'],
            'value' => ['nullable', 'numeric'],
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 406);
        }

        if (Schema::hasTable($request->table, $request->column_name)) {
            if (Schema::hasColumn($request->table, $request->column_name)) {
                $check = $request->value ?? ! DB::table($request->table)->where('id', $request->id)->value($request->column_name);
                DB::table($request->table)->where('id', $request->id)->update([
                    $request->column_name => $check,
                ]);

                return response()->json($check);
            } else {
                return response()->json('Invalid Column');
            }
        } else {
            return response()->json('Invalid Table');
        }
    }

    public function RemoveIds(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'ids' => ['required', 'array'],
            'table' => ['required', 'string'],
        ]);
        if ($validator->fails()) {
            return response()->json();
        }

        if (Schema::hasTable($request->table)) {
            DB::table($request->table)->whereIn('id', $request->ids)->delete();

            return response()->json([
                'msg' => __('trans.DeletedSuccessfully'),
                'isConfirmed' => 1,
            ]);
        } else {
            return response()->json();
        }
    }

    public function uploadLargeFiles(Request $request)
    {
        $receiver = new FileReceiver('file', $request, HandlerFactory::classFromRequest($request));
        if (! $receiver->isUploaded()) {
        }
        $fileReceived = $receiver->receive();
        if ($fileReceived->isFinished()) {
            $file = $fileReceived->getFile();
            $extension = $file->getClientOriginalExtension();
            $fileName = time().'_'.rand(1000, 10000).'.'.$extension;
            $path = Storage::disk(config('filesystems.default'))->putFileAs('public/data/', $file, $fileName);
            unlink($file->getPathname());

            return [
                'path' => asset('storage/'.$path),
                'filename' => 'uploads/data/'.$fileName,
            ];
        }

        $handler = $fileReceived->handler();

        return ['done' => $handler->getPercentageDone(), 'status' => true];
    }

    public function uploadBlob(Request $request)
    {
        return [
            'file' => Upload::UploadFile($request->voice, $request->folder),
        ];
    }
}
