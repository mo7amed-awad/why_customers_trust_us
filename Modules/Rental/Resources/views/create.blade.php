@extends('Admin.layout')
@section('pagetitle', __('trans.rentals'))
@section('content')
    <form method="POST" action="{{ route(activeGuard() . '.rentals.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="text-center">
            <img src="{{ asset(setting('logo')) }}" class="rounded mx-auto text-center" id="image-preview" height="200px">
        </div>

        <div class="row">

            
        <div class="row">
            <div class="form-group col-md-6">
                <label for="brand_id">@lang('trans.brand')</label>
                <select class="form-control select2" required id="brand_id" name="brand_id">
                    <option value="" selected disabled hidden></option>
                    @foreach ($Brands as $brand)
                        <option value="{{ $brand->id }}">
                            {{ $brand->title() }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group col-md-6">
                <label for="model_id">@lang('trans.model')</label>
                <select class="form-control select2" required id="model_id" name="model_id">

                </select>
            </div>

            <div class="form-group col-md-6">
                <label for="title_ar">@lang('trans.title_ar')</label>
                <input type="text" name="title_ar" id="title_ar" class="form-control" required>
            </div>

            <div class="form-group col-md-6">
                <label for="title_en">@lang('trans.title_en')</label>
                <input type="text" name="title_en" id="title_en" class="form-control" required>
            </div>

            <div class="form-group col-md-6">
                <label for="price">@lang('trans.price')</label>
                <input type="text" name="price" id="price" class="form-control" required value="">
            </div>

            <div class="form-group col-md-6">

            </div>



            <div class="form-group col-md-6">
                <label for="visibility">@lang('trans.visibility')</label>
                <select class="form-control" required id="visibility" name="status">
                    <option selected value="1">@lang('trans.visible')</option>
                    <option value="0">@lang('trans.hidden')</option>
                </select>
            </div>


            <div class="col-md-6 col-sm-12">
                <label for="images">{{ __('trans.images') }}</label>
                <input class="form-control w-100" id="images" type="file" multiple name="images[]">
            </div>



            <div class="col-md-6 col-sm-12">
                <label for="desc_ar">@lang('trans.desc_ar')</label>
                <textarea rows="7" name="desc_ar" placeholder="@lang('trans.desc_ar')" class="form-control mceNoEditor"></textarea>
            </div>
            <div class="col-md-6 col-sm-12">
                <label for="desc_en">@lang('trans.desc_en')</label>
                <textarea rows="7" name="desc_en" placeholder="@lang('trans.desc_en')" class="form-control mceNoEditor"></textarea>
            </div>


            <div class="col-12 my-4">
                <div class="specs-card">
                    <label>@lang('trans.specifications')</label>
                    <div id="specifications-wrapper">
                       
                    </div>
                    <button type="button" class="btn mt-3" id="add-specification">
                        <span style="font-size: 18px;">+</span> @lang('trans.add_specification')
                    </button>
                </div>
            </div>


            <div class="col-12 my-4">
                <div class="button-group my-4">
                    <button type="submit" class="main-btn btn-hover w-100 text-center">
                        {{ __('trans.Submit') }}
                    </button>
                </div>
            </div>
        </div>
    </form>

    @include('select2')
@endsection



@push('js')
    <script>
        // Brand and Model Data
        const brandsData = @json($Brands->map(function($brand) {
            return [
                'id' => $brand->id,
                'models' => $brand->Models->map(function($model) {
                    return [
                        'id' => $model->id,
                        'title' => $model->title()
                    ];
                })
            ];
        }));

        // Handle Brand Change
        $('#brand_id').on('change', function() {
            const brandId = $(this).val();
            const modelSelect = $('#model_id');
            
            modelSelect.html('<option value=""></option>');
            
            if (brandId) {
                const brand = brandsData.find(b => b.id == brandId);
                if (brand && brand.models) {
                    brand.models.forEach(model => {
                        modelSelect.append(`<option value="${model.id}">${model.title}</option>`);
                    });
                }
            }
        });

        let specificationOptionsData = [{
                value: '',
                text: ''
            },
            @foreach ($Specifications as $s)
                { value: '{{ $s->id }}',
                    text: '{{ $s->title_en }}'
                },
            @endforeach
        ];

        // Get all selected specification IDs
        function getSelectedSpecIds() {
            const selectedIds = [];
            $('.spec-value').each(function() {
                const val = $(this).val();
                if (val) {
                    selectedIds.push(val);
                }
            });
            return selectedIds;
        }

        // Update dropdown options to hide selected specs
        function updateDropdownOptions(wrapper) {
            const selectedIds = getSelectedSpecIds();
            const currentValue = wrapper.find('.spec-value').val();
            
            wrapper.find('.spec-option').each(function() {
                const optionValue = $(this).data('value');
                // Show if: empty option, current selection, or not selected elsewhere
                if (!optionValue || optionValue == currentValue || !selectedIds.includes(optionValue.toString())) {
                    $(this).show();
                } else {
                    $(this).hide();
                }
            });
        }

        // Initialize existing selects
        $('.custom-select-wrapper').each(function() {
            const wrapper = $(this);
            const selected = wrapper.find('.spec-option[data-selected="true"]');
            if (selected.length) {
                wrapper.find('.spec-search').val(selected.text());
            }
            updateDropdownOptions(wrapper);
        });

        // Handle search input focus
        $(document).on('focus', '.spec-search', function() {
            const wrapper = $(this).closest('.custom-select-wrapper');
            updateDropdownOptions(wrapper);
            wrapper.find('.spec-dropdown').show();
            $(this).select();
        });

        // Handle search input
        $(document).on('input', '.spec-search', function() {
            const searchTerm = $(this).val().toLowerCase();
            const dropdown = $(this).siblings('.spec-dropdown');
            const selectedIds = getSelectedSpecIds();
            const currentValue = $(this).siblings('.spec-value').val();

            dropdown.find('.spec-option').each(function() {
                const text = $(this).text().toLowerCase();
                const optionValue = $(this).data('value');
                const isAvailable = !optionValue || optionValue == currentValue || !selectedIds.includes(optionValue.toString());
                
                if (text.includes(searchTerm) && isAvailable) {
                    $(this).show();
                } else {
                    $(this).hide();
                }
            });
        });

        // Handle option selection
        $(document).on('click', '.spec-option', function() {
            const wrapper = $(this).closest('.custom-select-wrapper');
            const value = $(this).data('value');
            const text = $(this).text();

            wrapper.find('.spec-value').val(value);
            wrapper.find('.spec-search').val(text);
            wrapper.find('.spec-dropdown').hide();

            // Update selected state
            wrapper.find('.spec-option').removeClass('selected');
            $(this).addClass('selected');
            
            // Update all dropdowns to reflect new selection
            $('.custom-select-wrapper').each(function() {
                updateDropdownOptions($(this));
            });
        });

        // Close dropdown when clicking outside
        $(document).on('click', function(e) {
            if (!$(e.target).closest('.custom-select-wrapper').length) {
                $('.spec-dropdown').hide();
            }
        });

        $('#add-specification').on('click', function() {
            let index = Date.now();
            let itemNumber = $('#specifications-wrapper .specification-item').length + 1;
            let optionsHtml = '';
            specificationOptionsData.forEach(opt => {
                optionsHtml += `<div class="spec-option" data-value="${opt.value}">${opt.text}</div>`;
            });

            let html = `
                <div class="specification-item d-flex gap-3 align-items-center">
                    <div class="spec-item-number">#${itemNumber}</div>
                    <div class="spec-controls">
                        <button type="button" class="btn spec-move-up">⬆️</button>
                        <button type="button" class="btn spec-move-down">⬇️</button>
                    </div>
                    <div class="custom-select-wrapper">
                        <input type="text" class="form-control spec-search" placeholder="🔍 @lang('trans.search')..." autocomplete="off">
                        <span class="search-icon">▼</span>
                        <input type="hidden" name="specifications[${index}][id]" class="spec-value">
                        <div class="spec-dropdown" style="display:none;">
                            ${optionsHtml}
                        </div>
                    </div>
                    <div class="spec-inputs-group">
                        <input type="text" name="specifications[${index}][title_ar]" class="form-control" placeholder="📝 @lang('trans.title_ar')">
                        <input type="text" name="specifications[${index}][title_en]" class="form-control" placeholder="📝 @lang('trans.title_en')">
                    </div>
                    <button type="button" class="btn remove-spec">✕</button>
                </div>
            `;
            $('#specifications-wrapper').append(html);
            updateItemNumbers();
            
            // Update dropdowns for the new item
            $('.custom-select-wrapper').each(function() {
                updateDropdownOptions($(this));
            });
        });

        $(document).on('click', '.remove-spec', function() {
            $(this).closest('.specification-item').remove();
            updateItemNumbers();
            
            // Update all dropdowns after removal
            $('.custom-select-wrapper').each(function() {
                updateDropdownOptions($(this));
            });
        });

        // Move specification up
        $(document).on('click', '.spec-move-up', function() {
            const item = $(this).closest('.specification-item');
            const prev = item.prev('.specification-item');
            if (prev.length) {
                item.insertBefore(prev);
                updateItemNumbers();
            }
        });

        // Move specification down
        $(document).on('click', '.spec-move-down', function() {
            const item = $(this).closest('.specification-item');
            const next = item.next('.specification-item');
            if (next.length) {
                item.insertAfter(next);
                updateItemNumbers();
            }
        });

        function updateItemNumbers() {
            $('#specifications-wrapper .specification-item').each(function(index) {
                $(this).find('.spec-item-number').text('#' + (index + 1));
            });
        }

    </script>
@endpush


@push('css')
    <style>
        .specs-card {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border-radius: 16px;
            padding: 24px;
            box-shadow: 0 10px 30px rgba(102, 126, 234, 0.2);
        }

        .specs-card label {
            color: white;
            font-weight: 600;
            font-size: 1.1rem;
            margin-bottom: 20px;
            display: block;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .specification-item {
            background: white;
            border-radius: 12px;
            padding: 16px;
            margin-bottom: 16px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
            transition: all 0.3s ease;
            border-left: 4px solid #667eea;
        }

        .specification-item:hover {
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.12);
        }

        .custom-select-wrapper {
            position: relative;
            flex: 1;
            min-width: 250px;
        }

        .spec-search {
            cursor: pointer;
            border: 2px solid #e0e7ff;
            border-radius: 10px;
            padding: 12px 40px 12px 16px;
            font-size: 14px;
            transition: all 0.3s ease;
            background: #f8faff;
        }

        .spec-search:focus {
            border-color: #667eea;
            background: white;
            box-shadow: 0 0 0 4px rgba(102, 126, 234, 0.1);
            outline: none;
        }

        .spec-search::placeholder {
            color: #94a3b8;
        }

        .search-icon {
            position: absolute;
            right: 12px;
            top: 50%;
            transform: translateY(-50%);
            color: #667eea;
            pointer-events: none;
            font-size: 16px;
        }

        .spec-dropdown {
            position: absolute;
            z-index: 99999;
            background: white;
            border: 2px solid #e0e7ff;
            border-radius: 12px;
            max-height: 280px;
            overflow-y: auto;
            width: 100%;
            margin-top: 8px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.15);
            animation: dropdownSlide 0.2s ease;
        }

        @keyframes dropdownSlide {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .spec-dropdown::-webkit-scrollbar {
            width: 8px;
        }

        .spec-dropdown::-webkit-scrollbar-track {
            background: #f1f5f9;
            border-radius: 10px;
        }

        .spec-dropdown::-webkit-scrollbar-thumb {
            background: #667eea;
            border-radius: 10px;
        }

        .spec-option {
            padding: 12px 16px;
            cursor: pointer;
            transition: all 0.2s ease;
            font-size: 14px;
            color: #334155;
            border-left: 3px solid transparent;
        }

        .spec-option:hover {
            background: linear-gradient(90deg, #f0f4ff 0%, white 100%);
            border-left-color: #667eea;
            padding-left: 20px;
        }

        .spec-option.selected {
            background: linear-gradient(90deg, #667eea 0%, #764ba2 100%);
            color: white;
            font-weight: 600;
            border-left-color: #4c51bf;
        }

        .spec-option:first-child {
            border-radius: 10px 10px 0 0;
        }

        .spec-option:last-child {
            border-radius: 0 0 10px 10px;
        }

        .spec-inputs-group {
            display: flex;
            gap: 12px;
            flex: 2;
        }

        .spec-inputs-group input {
            border: 2px solid #e0e7ff;
            border-radius: 10px;
            padding: 12px 16px;
            font-size: 14px;
            transition: all 0.3s ease;
            background: #f8faff;
        }

        .spec-inputs-group input:focus {
            border-color: #667eea;
            background: white;
            box-shadow: 0 0 0 4px rgba(102, 126, 234, 0.1);
            outline: none;
        }

        .remove-spec {
            border-radius: 10px;
            padding: 12px 20px;
            font-size: 18px;
            font-weight: bold;
            background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
            border: none;
            color: white;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(245, 87, 108, 0.3);
            min-width: 50px;
        }

        .remove-spec:hover {
            transform: scale(1.05);
            box-shadow: 0 6px 20px rgba(245, 87, 108, 0.4);
        }

        #add-specification {
            background: white;
            color: #667eea;
            border: 2px solid white;
            border-radius: 12px;
            padding: 14px 28px;
            font-weight: 600;
            font-size: 15px;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(255, 255, 255, 0.3);
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        #add-specification:hover {
            background: #f8faff;
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(255, 255, 255, 0.4);
        }

        .spec-item-number {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border-radius: 8px;
            padding: 8px 12px;
            font-weight: 700;
            font-size: 14px;
            min-width: 40px;
            text-align: center;
            box-shadow: 0 4px 10px rgba(102, 126, 234, 0.3);
        }

        @media (max-width: 768px) {
            .specification-item {
                flex-direction: column;
            }

            .custom-select-wrapper,
            .spec-inputs-group {
                width: 100%;
            }

            .spec-inputs-group {
                flex-direction: column;
            }
        }
    </style>
@endpush