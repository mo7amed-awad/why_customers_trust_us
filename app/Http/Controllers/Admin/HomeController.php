<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BasicController;
use Illuminate\Http\Request;

class HomeController extends BasicController
{
    public function home(Request $request)
    {
        $modules = [
            'About' => 'abouts',
            'Admin' => 'admins',
            'Bidding' => 'biddings',
            'Limousine' => 'limousines',
            'Brand' => 'brands',
            'City' => 'cities',
            'Contact' => 'contacts',
            'Country' => 'countries',
            'FAQ' => 'faqs',
            'Model' => 'models',
            'Payment' => 'payments',
            'Privacy' => 'privacies',
            'Region' => 'regions',
            'Rental' => 'rentals',
            'Setting' => 'settings',
            'Service' => 'services',
            'Specification' => 'specifications',
            'Term' => 'terms',
            'Testimonial' => 'testimonials',
        ];

        $Modules = [];
        foreach ($modules as $model => $plural) {
            $class = "\\Modules\\$model\\Entities\\Model";
            if ($model == 'Kit') {
                $Modules[] = [
                    'route' => $plural,
                    'trans' => $plural,
                    'count' => $class::query()
                        ->whereHas('subscription', function ($query) {
                            $query
                                ->where('paid', 1)
                                ->where('approved', 1);
                        })
                        ->count(),
                ];
            } else {
                $Modules[] = [
                    'route' => $plural,
                    'trans' => $plural,
                    'count' => $class::count(),
                ];
            }
        }

        $data = [
            [
                'bg' => 'bg-goldenrod',
                'border' => 'border-goldenrod',
                'text' => 'text-black',
            ],
            [
                'bg' => 'bg-rosy',
                'border' => 'border-rosy',
                'text' => 'text-white',
            ],
            [
                'bg' => 'bg-lavender',
                'border' => 'border-lavender',
                'text' => 'text-white',
            ],
            [
                'bg' => 'bg-skyblue',
                'border' => 'border-skyblue',
                'text' => 'text-white',
            ],
            [
                'bg' => 'bg-mint',
                'border' => 'border-mint',
                'text' => 'text-black',
            ],
            [
                'bg' => 'bg-purple',
                'border' => 'border-purple',
                'text' => 'text-white',
            ],
            [
                'bg' => 'bg-coral',
                'border' => 'border-coral',
                'text' => 'text-white',
            ],
        ];

        return view('Admin.home')->with(get_defined_vars());

    }
}
