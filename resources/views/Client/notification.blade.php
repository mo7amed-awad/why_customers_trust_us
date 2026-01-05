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
        @foreach($notifications as $notification)
            <div class="col-12 d-flex justify-content-between py-2 bg-Secondary-color item opectity rounded-2"
                 data-id="{{ $notification->id }}"
                 data-url="{{ route('client.notifications.read', ['lang' => app()->getLocale(), 'id' => $notification->id]) }}">
                <div class="py-2 w-100">
                    <div class="d-flex gap-3 align-items-center ">
                        <div
                                class="bg-white img rounded-circle border img-card overflow-hidden d-flex justify-content-center align-items-center"
                                style="width:60px; height:60px;">
                            <!-- svg هنا -->
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
        @endforeach
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
