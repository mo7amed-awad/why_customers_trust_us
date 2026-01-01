@extends('Client.layouts.layout')

@section('content')

    <div class="" id="navBar">

    </div>
    <div class="container py-lg-5 py-3">
        <div class="row">
            <div class="col-12 d-flex justify-content-between border-bottom align-items-center">
                <h2>{{ __('front.publish_your_ad') }}</h2>

                <a class="navbar-brand overflow-hidden text-center m-0" href="{{route('client.home')}}">
                    <img class="img-fluid w-auto" src="{{asset(setting('logo'))}}">
                </a>
            </div>
        </div>

        <div class="row justify-content-between gap-lg-0 gap-3 py-4">
            <div class="col-12">
                <h3 class="primary-color fw-bold py-2">{{ __('front.choose_category') }}</h3>
            </div>
            <div class="col-lg-4">

                <nav class="navbar navbar-expand-lg py-0">
                    <div class="nav-container">
                        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar2"
                                aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                            <i class="fa-solid fa-bars text-black"></i>
                        </button>
                        <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar2"
                             aria-labelledby="offcanvasNavbarLabel2">
                            <div class="offcanvas-header">
                                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                            </div>
                            <div class="offcanvas-body header">
                                <ul class="nav flex-column flex-grow-1 rounded-2 nav-pills profile"
                                    id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                    @foreach($categories as $cat)
                                        <li class="nav-item my-1">
                                            <a class="nav-link {{ $cat->id == $category->id ? 'active' : '' }}"
                                               href="{{ route('client.category.show', ['lang' => app()->getLocale(), 'slug' => $cat->slug]) }}">
                                                <div class="d-flex gap-3 align-items-center justify-content-between">
                                                    <div class="d-flex gap-2 align-items-center">
                                                        <div class="overflow-hidden p-1 rounded-2 bg-Secondary-color" style="height: 40px;width: 40px;">
                                                            <img class="w-100" src="{{asset($cat->icon)}}" alt="{{$cat->trans('title')}}">
                                                        </div>
                                                        <div class="d-flex flex-column">
                                                            {{$cat->trans('title')}}
                                                        </div>
                                                    </div>
                                                    <div class="d-flex"><i class="fa-solid fa-arrow-right arrow"></i></div>
                                                </div>
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </nav>

            </div>
            <div class="col-lg-8">
                <div class="subcategories-list">
                    @foreach($category->subcategories as $subcategory)
                        <a href="{{ route('client.ads.create', ['lang' => app()->getLocale(), 'subcategorySlug' => $subcategory->slug]) }}" class="text-decoration-none">
                            <div class="row">
                                <div class="col-12 border-top py-2">
                                    <h3 class="fs-24 primary-color fw-bold">{{ $subcategory->trans('title') }}</h3>
                                    <p class="text-black-50">{{ $subcategory->trans('desc') }}</p>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <div id="footer">

    </div>

@endsection