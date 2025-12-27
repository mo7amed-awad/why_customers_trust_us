@extends('Client.layouts.layout')
@section('content')

    <section class="py-5 section-background" style="background-image: url('{{ asset('assets/images/section-bg.png') }}')">
        <div class="row justify-content-center align-items-center d-flex">
            <div class="col-md-12 section-content justify-content-center align-items-center d-flex flex-column mt-5">
                <h1 data-aos="fade-up" data-aos-duration="1000" data-aos-delay="300">
                    @if(lang('ar'))
                        {{ 'العميد لتأجير السيارات' }}
                    @elseif(lang('en'))
                        {{ 'Al Ameed Car Bidding' }}
                    @endif
                </h1>

                <p class="text-white col-xl-7 col-lg-10" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="400">
                    @if(lang('ar'))
                        {{ 'اختر من بين مجموعة واسعة من السيارات التي تلبي كل احتياجاتك - مريحة وموثوقة وجاهزة في أي وقت.' }}
                    @elseif(lang('en'))
                        {{ 'Choose from a wide range of cars for every need — convenient, reliable, and ready whenever you are.' }}
                    @endif
                </p>
            </div>
        </div>
    </section>


    <section class="py-5">
        <div class="container py-3">

            <!-- Filters + Count -->
            <div class="row">
                <div class="col-md-8">
                    <h6 class="text-success">
                        {{ __('trans.result') }} <span class="text-info">({{ $Biddings->total() }})</span>
                    </h6>
                </div>

                <div class="col-md-4">
                    <form action="" method="GET">
                        <div class="row">

                            <!-- Brand -->
                            <div class="col-6 mb-3">
                                <select class="form-select select2" name="brand_id" onchange="this.form.submit()">
                                    <option {{ request('brand_id') ? '' : 'selected' }} value="">{{ __('trans.brand') }} ({{ __('trans.all') }})</option>
                                    @foreach ($Brands as $Brand)
                                        <option value="{{ $Brand->id }}" {{ request('brand_id') == $Brand->id ? 'selected':'' }}>
                                            {{ $Brand->title() }}
                                        </option>
                                    @endforeach
                                </select>

                            </div>


                        </div>
                    </form>
                </div>
            </div>


            <!-- Bidding List -->
            <div class="row py-4">
                @if($Biddings->count() > 0)
                    @foreach ($Biddings as $Bidding)
                        <div class="col-lg-4 col-md-6 col-11 mb-5 mx-auto">
                            @include('Client.layouts.bidding-card', ['Bidding' => $Bidding])
                        </div>
                    @endforeach
                @else
                    <div class="col-12 text-center py-5">
                        <img src="{{ asset('empty-state.png') }}" alt="No Biddings" class="mb-3" style="max-width: 150px;">
                        <h5 class="text-dark">
                            @if(lang('ar'))
                                {{ 'عذرًا، لا توجد سيارات متاحة حاليًا.' }}
                            @elseif(lang('en'))
                                {{ 'Sorry, no Bidding available at the moment.' }}
                            @endif
                        </h5>
                        <p class="text-dark-50">
                            @if(lang('ar'))
                                {{ 'حاول تعديل الفلاتر للعثور على المزيد من السيارات.' }}
                            @elseif(lang('en'))
                                {{ 'Try adjusting the filters to find more cars.' }}
                            @endif
                        </p>
                    </div>
                @endif
            </div>



            <!-- Pagination -->
            <div class="mt-5">
                {{ $Biddings->appends(request()->query())->links() }}
            </div>

        </div>
    </section>

    @include('select2')
@endsection

@push('js')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script>
        $(document).ready(function() {
            $('.select2').select2({
                allowClear: true
            });
        });
    </script>
@endpush