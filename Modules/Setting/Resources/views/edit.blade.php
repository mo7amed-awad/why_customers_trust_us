@extends(ucfirst(activeGuard()) . '.layout')
@section('pagetitle', __('trans.' . $Models->first()->type))
@section('content')
    <style>
        .preview_image {
            max-width: 150px;
            margin: 10px;
        }
    </style>


    @push('js')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
            integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/resumable.js/1.1.0/resumable.min.js"
            integrity="sha512-UWMGINgjUq/2sNur/d2LbiAX6IHmZkkCivoKSdoX+smfB+wB8f96/6Sp8ediwzXBXMXaAqymp6S55SALBk5tNQ=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    @endpush

    <form method="POST" action="{{ route(activeGuard() . '.settings.update', ['setting' => 1, 'type' => $type]) }}"
        enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            @foreach ($Models as $Setting)
                @if (str_contains($Setting['key'], 'images'))
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="{{ $Setting['key'] }}">@lang('trans.images')</label>
                            <input multiple accept="image/*" type="file" name="{{ $Setting['key'] }}[]"
                                id="{{ $Setting['key'] }}" class="form-control">
                            <div class="text-center preview_images" style="height: 200px">
                                @foreach ((array) json_decode($Setting['value'], true) as $image)
                                    <img src="{{ asset($image) }}" class=" preview_image" alt="image"
                                        style="max-height: 200px">
                                @endforeach
                            </div>
                        </div>
                        @push('js')
                            <script>
                                $(document).on('change', '#{{ $Setting['key'] }}', function() {
                                    var Preview = $(this).parent().find('.preview_images');
                                    Preview.empty();
                                    if (this.files && this.files.length > 0) {
                                        for (var i = 0; i < this.files.length; i++) {
                                            var reader = new FileReader();
                                            reader.onload = function(e) {
                                                var image = $("<img>").attr("src", e.target.result);
                                                image.addClass("preview_image");
                                                Preview.append(image);
                                            };
                                            reader.readAsDataURL(this.files[i]);
                                        }
                                    }
                                });
                            </script>
                        @endpush
                    </div>
                @elseif (str_contains($Setting['key'], 'image') || (str_contains($Setting['key'], 'logo') || $Setting['type'] == 'image'))
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="{{ $Setting['key'] }}">@lang('trans.' . $Setting['key'])</label>
                            <input accept="image/*" type="file" name="{{ $Setting['key'] }}" id="{{ $Setting['key'] }}"
                                class="form-control"
                                onchange="document.getElementById('image-{{ $Setting['key'] }}').src = window.URL.createObjectURL(this.files[0])">
                            <div class="text-center" style="height: 200px">
                                <img id="image-{{ $Setting['key'] }}" src="{{ asset($Setting['value']) }}"
                                    class=" mx-auto" alt="image" style="height: 200px">
                            </div>
                        </div>
                    </div>
                @elseif (str_contains($Setting['key'], 'video') || $Setting['type'] == 'video')
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="{{ $Setting['key'] }}">@lang('trans.' . $Setting['key'])</label>
                            <input type="hidden" name="{{ $Setting['key'] }}" value="{{ $Setting['value'] }}">
                            <input accept="video/*" type="file" id="{{ $Setting['key'] }}" class="form-control">
                            <div class="progress mt-3" style="height: 25px">
                                <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar"
                                    aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"
                                    style="width: 75%; height: 100%">75%</div>
                            </div>
                            <div class="text-center my-2" style="max-height: 500px">
                                <video controls src="{{ asset($Setting['value']) }}" style="max-height: 500px"
                                    class=" mx-auto"></video>
                            </div>
                        </div>
                    </div>

                    @push('js')
                        <script>
                            let video = $("#{{ $Setting['key'] }}");
                            let resumable = new Resumable({
                                target: '{{ route('files.upload.large') }}',
                                query: {
                                    _token: '{{ csrf_token() }}'
                                }, // CSRF token
                                fileType: ['mp4'],
                                headers: {
                                    'Accept': 'application/json'
                                },
                                testChunks: false,
                                throttleProgressCallbacks: 1,
                            });
                            resumable.assignBrowse(video[0]);


                            resumable.on('fileAdded', function(file) { // trigger when file picked
                                showProgress();
                                resumable.upload() // to actually start uploading.
                                $('#type option:not(:selected)').attr('disabled', true);
                            });

                            resumable.on('fileProgress', function(file) { // trigger when file progress update
                                updateProgress(Math.floor(file.progress() * 100));
                                $("#submit").attr("disabled", true);
                            });

                            resumable.on('fileSuccess', function(file, response) { // trigger when file upload complete
                                response = JSON.parse(response)
                                console.log(response.filename)
                                $("input[name={{ $Setting['key'] }}]").val(response.filename);
                                $('.card-footer').show();
                                $('.progress-bar').css({
                                    'background-color': '#008528'
                                });
                                $("#submit").attr("disabled", false);
                            });

                            resumable.on('fileError', function(file, response) { // trigger when there is any error
                                alert('file uploading error.')
                            });


                            let progress = $('.progress');

                            function showProgress() {
                                progress.find('.progress-bar').css('width', '0%');
                                progress.find('.progress-bar').html('0%');
                                progress.find('.progress-bar').removeClass('bg-success');
                                progress.show();
                            }

                            function updateProgress(value) {
                                progress.find('.progress-bar').css('width', `${value}%`)
                                progress.find('.progress-bar').html(`${value}%`)
                            }

                            function hideProgress() {
                                progress.hide();
                            }
                        </script>
                    @endpush
                @elseif(in_array($Setting['key'], ['DefaultLang']))
                    <div class="col-sm-6">
                        <div class="col-md-12">
                            <label for="{{ $Setting['key'] }}">@lang('trans.' . $Setting['key'])</label>
                            <select id="{{ $Setting['key'] }}" name="{{ $Setting['key'] }}" required class="form-control">
                                <option {{ $Setting['value'] == 'en' ? 'selected' : '' }} value="en">En</option>
                                <option {{ $Setting['value'] == 'ar' ? 'selected' : '' }} value="ar">Ar</option>
                            </select>
                        </div>
                    </div>
                @elseif(in_array($Setting['key'], ['theme']))
                    <div class="col-sm-6">
                        <div class="col-md-12">
                            <label for="{{ $Setting['key'] }}">@lang('trans.chooseTheme')</label>
                            <select id="{{ $Setting['key'] }}" name="{{ $Setting['key'] }}" required class="form-control">
                                <option {{ $Setting['value'] == 1 ? 'selected' : '' }} value="1">
                                    {{ __('trans.theme') }} 1</option>
                                <option {{ $Setting['value'] == 2 ? 'selected' : '' }} value="2">
                                    {{ __('trans.theme') }} 2</option>
                            </select>
                        </div>
                    </div>
                @elseif(in_array($Setting['key'], ['login', 'register', 'show_sizes', 'branches_status', 'order_notifications']) ||
                        str_contains($Setting['key'], 'display'))
                    <div class="col-sm-6">
                        <div class="col-md-12">
                            @if (str_contains($Setting['key'], 'display'))
                                <label for="{{ $Setting['key'] }}">@lang('trans.status')</label>
                            @else
                                <label for="{{ $Setting['key'] }}">@lang('trans.' . $Setting['key'])</label>
                            @endif
                            <select id="{{ $Setting['key'] }}" name="{{ $Setting['key'] }}" required class="form-control">
                                <option {{ $Setting['value'] == 0 ? 'selected' : '' }} value="0">@lang('trans.hidden')
                                </option>
                                <option {{ $Setting['value'] == 1 ? 'selected' : '' }} value="1">@lang('trans.visible')
                                </option>
                            </select>
                        </div>
                    </div>
                @elseif(in_array($Setting['key'], ['accept_order']))
                    <div class="col-sm-6">
                        <div class="col-md-12">
                            <label for="{{ $Setting['key'] }}">@lang('trans.' . $Setting['key'])</label>
                            <select id="{{ $Setting['key'] }}" name="{{ $Setting['key'] }}" required class="form-control">
                                <option {{ $Setting['value'] == 0 ? 'selected' : '' }} value="0">@lang('trans.no')
                                </option>
                                <option {{ $Setting['value'] == 1 ? 'selected' : '' }} value="1">@lang('trans.yes')
                                </option>
                            </select>
                        </div>
                    </div>
                @elseif (str_contains($Setting['key'], '_services') ||
                        ((str_contains($Setting['key'], 'ar') || str_contains($Setting['key'], 'en') || $Setting['type'] == 'meta') &&
                            !str_contains($Setting['key'], 'title_')))
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="{{ $Setting['key'] }}">@lang('trans.' . $Setting['key'])</label>
                            <textarea style="min-height: 300px" class="form-control editor mceNoEditor" id="{{ $Setting['key'] }}"
                                name="{{ $Setting['key'] }}" required placeholder="@lang('trans.' . $Setting['key'])">{!! $Setting['value'] !!}</textarea>
                        </div>
                    </div>
                @elseif ($Setting['type'] == 'mainpage_products')
                    @foreach ($products as $product)
                        <div class="col-sm-6">
                            <div class="form-group">
                                <input id="{{ $product['id'] }}" type="checkbox" name="products[]" required
                                    value="{{ $product['id'] }}" @if (in_array($product['id'], array_filter(explode('"', setting('mainpage_products')), 'is_numeric'))) checked @endif>
                                <label for="{{ $product['id'] }}">{{ $product->title() }}</label>
                            </div>
                        </div>
                    @endforeach
                @elseif(str_contains($Setting['key'], 'color'))
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="{{ $Setting['key'] }}">@lang('trans.' . $Setting['key'])</label>
                            <input id="{{ $Setting['key'] }}" type="color" name="{{ $Setting['key'] }}" required
                                placeholder="@lang('trans.' . $Setting['key'])" class="form-control" value="{{ $Setting['value'] }}">
                        </div>
                    </div>
                @else
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="{{ $Setting['key'] }}">@lang('trans.' . $Setting['key'])</label>
                            <input id="{{ $Setting['key'] }}" type="text" name="{{ $Setting['key'] }}" required
                                placeholder="@lang('trans.' . $Setting['key'])" class="form-control" value="{{ $Setting['value'] }}">
                        </div>
                    </div>
                @endif
            @endforeach
        </div>

        @if (hasPermission('edit_settings'))
            <div class="col-12 my-4">
                <div class="button-group my-4 text-center">
                    <button type="submit" class="main-btn btn-hover w-100 text-center">
                        {{ __('trans.Submit') }}
                    </button>
                </div>
            </div>
        @endif
    </form>

    @include('texteditor')
@endsection



@push('css')
    <style>
        .card-footer,
        .progress {
            display: none;
        }

        input[type="checkbox"] {
            height: 25px;
            width: 25px;
        }
    </style>
@endpush
