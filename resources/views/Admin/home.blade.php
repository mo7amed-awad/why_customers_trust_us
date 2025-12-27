@extends('Admin.layout')
@section('pagetitle',__('trans.dashboardTitle'))

@section('content')

    <div class="text-center">
        <img src="{{ asset(setting('logo')) }}" alt="logo" style="max-height: 200px;max-width: 200px" />
    </div>
    <div class="">
    	<div class="row">
    	    @php($i = 0)
    	    @foreach($Modules as $Item)
                @if(hasPermission('show_' . $Item['trans']))
                    @php($css = $data[$i])
    
            		<div class="col-xxl-2 col-xl-3 col-md-4 col-sm-6" style="margin-top: 20px">
            			<div class="card {{ $css['border'] }}">
            				<div class="card-body {{ $css['bg'] }} {{ $css['text'] }}">
            					<div class="row">
            						<div class="col-3 justify-content-center align-items-center d-flex">
            							<i class="fa-regular fa-circle-dot fa-2x"></i>
            						</div>
            						<div class="col-9 text-right {{ $css['text'] }}">
            							<h1>{{ $Item['count'] }}</h1>
            							<h5>@lang('trans.'. $Item['trans'])</h5>
            						</div>
            					</div>
            				</div>
            				<a href="{{ isset($Item['params']) ? route(activeGuard() . '.' . $Item['route'] . '.index', $Item['params']) : route(activeGuard() . '.' . $Item['route'] . '.index') }}">
            					<div class="card-footer bg-light text-dark">
            						<span class="float-left">@lang('trans.View Details')</span>
            						<span class="float-right"><i class="fa fa-arrow-circle-{{ lang('en') ? 'right' : 'left' }}"></i></span>
            					</div>
            				</a>
            			</div>
            		</div>
        		@endif
    	        @php($i++)
    	        @if($i == 6)
    	            @php($i = 0)
    	        @endif
    		@endforeach
    	</div>
    </div>
        

@endsection



@push('css')
    <style>
        .text-white h1,
        .text-white h5{
            color: white;
        }
        
        .border-rosy{
            border-color: #cc5e77 !important;
            height: 100%;
        }
        .bg-rosy {
            background-color: #cc5e77 !important;
        }
        
        .border-goldenrod{
            border-color: #f3e662 !important;
            height: 100%;
        }
        .bg-goldenrod {
            background-color: #f3e662 !important;
        }
        
        .border-skyblue{
            border-color: #60c3cd !important;
            height: 100%;
        }
        .bg-skyblue {
            background-color: #60c3cd !important;
        }
        .border-lavender{
            border-color: #b497bd !important;
            height: 100%;
        }
        .bg-lavender {
            background-color: #b497bd !important;
        }
        .border-mint {
            border-color: #98ff98 !important;
            height: 100%;
        }
        .bg-mint {
            background-color: #98ff98 !important;
        }

        .border-coral {
            border-color: #ff7f50 !important;
            height: 100%;
        }
        .bg-coral {
            background-color: #ff7f50 !important;
        }
        .border-purple {
            border-color: #7e5bef !important;
            height: 100%;
        }
        .bg-purple {
            background-color: #7e5bef !important;
        }
        .text-purple {
            color: white;
        }
    </style>
@endpush




