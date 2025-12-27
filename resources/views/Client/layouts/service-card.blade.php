@if($Service->id == 1)
    @php($href = route('client.rental'))
@elseif($Service->id == 2)
    @php($href = route('client.limousine'))
@elseif($Service->id == 3)
    @php($href = route('client.bidding'))
@else
    @php($href = '')
@endif
<a href="{{ $href }}" class="text-decoration-none text-dark">
    <div class="card-overlay rounded-3" style="background-image: url('{{ asset($Service->image) }}');">
        <div class="card-content col-lg-8">
            <h5 class="fw-semibold lh-140 border-bottom d-inline-block border-primary-bottom py-2">{{ $Service->title() }}</h5>
        </div>
    </div>
</a>