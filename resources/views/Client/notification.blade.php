@extends('Client.layouts.layout')
@section('content')

<div class="" id="navBar">

</div>
<div class="container py-lg-5 py-3 pt-50">
    <div class="row">
        <h2 class="fw-semibold">
            {{ __('front.notifications') }}
        </h2>

    </div>
    <div class="row gap-2">
        @forelse($notifications as $notification)
            <div class="col-12 d-flex justify-content-between py-2 bg-Secondary-color item opectity rounded-2"
                 data-id="{{ $notification->id }}"
                 data-url="{{ route('client.notifications.read', ['lang' => app()->getLocale(), 'id' => $notification->id]) }}">
                <div class="py-2 w-100">
                    <div class="d-flex gap-3 align-items-center ">
                        <div
                                class="bg-white img rounded-circle border img-card overflow-hidden d-flex justify-content-center align-items-center"
                                style="width:60px; height:60px;">
                            <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M19.375 22.5C19.375 24.9162 17.4162 26.875 15 26.875C12.5838 26.875 10.625 24.9162 10.625 22.5" stroke="#2240E7" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M24.0389 22.5H5.96109C4.73994 22.5 3.75 21.51 3.75 20.2889C3.75 19.7025 3.98295 19.1401 4.39761 18.7254L5.15165 17.9714C5.85491 17.2681 6.25 16.3143 6.25 15.3198V11.875C6.25 7.04251 10.1675 3.125 15 3.125C19.8325 3.125 23.75 7.0425 23.75 11.875V15.3198C23.75 16.3143 24.1451 17.2681 24.8484 17.9714L25.6024 18.7254C26.017 19.1401 26.25 19.7025 26.25 20.2889C26.25 21.51 25.26 22.5 24.0389 22.5Z" stroke="#2240E7" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </div>
                        <div class="fw-medium d-flex flex-column w-100">
                            <span class="fs-16 fw-semibold">{{ $notification->data['title'][app()->getLocale()] }}</span>
                            <small class="text-black-50 ">{{ $notification->data['body'][app()->getLocale()] }}</small>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end">
                        <small class="text-black-50">
                            {{ \Carbon\Carbon::parse($notification->created_at)->locale(app()->getLocale())->calendar() }}
                        </small>
                    </div>
                </div>
                <div class="d-flex gap-2 fs-16 text-black-50 p-2">
                    <a class="delete text-black-50 fs-6"><span><i class="fa-solid fa-xmark"></i></span></a>
                </div>
            </div>
        @empty
            @include('components.empty-state')
        @endforelse
    </div>

</div>



<div id="footer">


</div>

@push('scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function(){

            $('.delete').click(function(e){
                e.preventDefault();

                var $notificationDiv = $(this).closest('.item');
                var url = $notificationDiv.data('url');

                $.ajax({
                    url: url,
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    success: function(response){
                        $notificationDiv.fadeOut(300, function(){ $(this).remove(); });
                    },
                    error: function(err){
                        console.log(err);
                        alert('حدث خطأ، حاول مرة أخرى.');
                    }
                });
            });


        });
    </script>

@endpush
@endsection
