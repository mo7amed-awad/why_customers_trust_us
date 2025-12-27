@push('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" integrity="sha512-nMNlpuaDPrqlEls3IX/Q56H36qvBASwb3ipuo3MxeWbsQB1881ox0cRv7UPTgBlriqoynt35KjEwgGUeUXIPnw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        .select2-results__options[aria-multiselectable="true"] li {
            padding-{{ lang('ar') ? 'right' : 'left' }}: 30px;
            position: relative
        }
        .select2-results__options[aria-multiselectable="true"] li:before {
            position: absolute;
            {{ lang('ar') ? 'right' : 'left' }}: 8px;
            opacity: .6;
            top: 6px;
            font-family: "FontAwesome";
            content: "\f0c8";
        }
        .select2-results__options[aria-multiselectable="true"] li[aria-selected="true"]:before {
            content: "\f14a";
            color: green;
        }
    </style>
@endpush
@push('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js" integrity="sha512-2ImtlRlf2VVmiGZsjm9bEyhjGW4dU7B6TNwh/hx/iSByxNENtj3WVE6o/9Lj4TJeVXPi4bnOIMXFIJJAeufa0A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    
    <script>
        function custom_template(obj){
            var data = $(obj.element).data();
            var text = $(obj.element).text();
            if(data && data['img']){
                template = $("<div><img src="+ data['img'] +" style='margin: 0px 5px;width:auto;max-height:25px;' />" + text + "</div>");
            }else{
                template = $("<div>" + text + "</div>");
            }
            return template;
        }
        $(".select2").each(function() {
            var isMultiple = $(this).attr('multiple') !== undefined;
            var options = {
                'templateSelection': custom_template,
                'templateResult': custom_template,
                'language': "{{ lang() }}",
                'dir': "{{ lang('ar') ? 'rtl' : 'ltr' }}",
                'closeOnSelect': !isMultiple,
            }
            $(this).select2(options);
        });
    </script>
@endpush
