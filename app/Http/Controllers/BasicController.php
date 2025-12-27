<?php

namespace App\Http\Controllers;

use App\Functions\ResponseHelper;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller;

class BasicController extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public $Client;

    public $Brand;

    public function __construct()
    {
        app()->setLocale(request()->lang ?? 'en');

        if (auth('sanctum')->check()) {
            $user = auth('sanctum')->user();
            if ($user->lang !== app()->getLocale()) {
                $user->lang = app()->getLocale();
                $user->save();
            }
        }
    }

    public function CheckAuth()
    {
        if (! auth('sanctum')->check()) {
            return ResponseHelper::make([], __('trans.You not auth'), false, 404);
        }

        $user = auth('sanctum')->user();
        $class = get_class($user);

        if ($class === 'Modules\Client\Entities\Model') {
            $this->Client = $user;
            $this->Brand = null;
        } elseif ($class === 'Modules\Brand\Entities\Model') {
            $this->Brand = $user;
            $this->Client = null;
        } else {
            return ResponseHelper::make([], __('trans.Invalid user type'), false, 403);
        }

        return $user; // optional
    }

    public function CheckCount($Data)
    {
        if ($Data->count() < 1) {
            return ResponseHelper::make([], __('trans.Data not found'), true, 404);
        }
    }

    public function CheckExist($Model)
    {
        if (! $Model) {
            return ResponseHelper::make((object) [], __('trans.Data not found'), true, 404);
        }
    }
}
