<div class="card border-0 car-card" data-aos="zoom-in">
    <div class="card-body p-0">
        <div class="car-img-height image-container rounded-2">
            <img src="{{ asset($Bidding->Image?->image ?? setting('logo')) }}" class="img-fluid w-100 h-100 object-fit-cover rounded-2" alt="{{ $Bidding->title() }}">
        </div>
        <div class="mt-4">
            <div>
                <h5 class="text-success fw-semibold">{{ $Bidding->title() }}</h5>
                <div class="d-flex flex-wrap justify-content-between mb-3">
                    @foreach ($Bidding->Specifications->take(4) as $Specification)
                        <div class="d-flex flex-column text-center gap-1">
                            <span style="background: red;border-radius: 50%;width: min-content;margin: auto;padding: 6px 10px;" >
                                <img width="25px" src="{{ asset($Specification->image) }}">
                            </span>
                            <span class="text-info fw-500 fs-14">{{ $Specification->title() }}</span>
                            <span class="text-info fw-500 fs-14">{{ $Specification->pivot->{'title_'.lang()} }}</span>
                        </div>
                    @endforeach
                </div>
            </div>
            <div>
                <a href="{{ route('client.bidding.checkout',$Bidding) }}" class="btn btn-primary rounded-3 w-100">{{ __('trans.Bid Now') }}</a>
            </div>
        </div>
    </div>
</div>