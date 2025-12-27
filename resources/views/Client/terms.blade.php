@extends('Client.layouts.layout')
@section('content')

    <br>
    <br>
    <br>
    <section class="py-5">
        <div class="container">
            
            @foreach ($Term as $TermItem)            
                <div class="row mt-6 my-3">
                    <div class="col-lg-12 d-flex align-items-center">
                        <h3>{{$loop->iteration}}. {{ $TermItem->title() }}</h3>
                    </div>
                    <div class="col-lg-12">
                        <span class="text-secondary">
                            {!! $TermItem->desc() !!}
                        </span>
                    </div>
                </div>
            @endforeach
        </div>
    </section>


@endsection
