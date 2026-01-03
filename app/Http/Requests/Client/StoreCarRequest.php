<?php

namespace App\Http\Requests\Client;

use Illuminate\Foundation\Http\FormRequest;
use Modules\Ads\Entities\Feature;

class StoreCarRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        $rules = [
            'brand_id' => ['required', 'exists:brands,id'],
            'model_id' => ['required', 'exists:models,id'],
            'fuel_type'     => 'required|in:gasoline,diesel,gas,electric,hybrid',
            'transmission'  => 'required|in:manual,automatic,cvt,semi_automatic',
            'mileage'       => 'required|integer|min:0',
            'engine'        => 'required|string|max:50',
            'manufacture_year' => 'required|integer|min:1900|max:' . date('Y'),
        ];

        // Features
        $features = $this->input('features', []);

        foreach ($features as $featureId => $value) {
            $feature = Feature::find($featureId);
            if (!$feature) continue;

            if ($feature->type === 'text') {
                $rules["features.$featureId"] = ['nullable', 'string', 'max:255'];
            } elseif ($feature->type === 'number') {
                $rules["features.$featureId"] = ['nullable', 'numeric'];
            } elseif ($feature->type === 'checkbox') {
                $rules["features.$featureId"] = ['nullable', 'in:0,1'];
            }
        }

        return $rules;
    }
}
