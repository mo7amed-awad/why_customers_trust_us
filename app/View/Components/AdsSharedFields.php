<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class AdsSharedFields extends Component
{
    public $category;
    public $subcategory;

    public function __construct($category = null, $subcategory = null)
    {
        $this->category = $category;
        $this->subcategory = $subcategory;
    }

    public function render(): View|Closure|string
    {
        return view('components.ads-shared-fields');
    }
}
