// (function ($) {
//     $.fn.miv = function (options) {
//         var elemRef = $.extend({
//             image: '.cam',
//             video: '.vid'
//         }, options);
//         var i = 0;
//         var j = 0;
//         $(document).on('click', elemRef.image, function () {
//             $(elemRef.image).after("<input type='file' id='imgupload" + i + "' style='display:none;' name='image[" + i + "]'/>");
//             $('#imgupload' + i).trigger('click');
//             $(document).on('change', '#imgupload' + i, function () {
//                 var file = $(this).get(0);
//                 var preview = window.URL.createObjectURL(file.files[0]);
//                 $('.gallery').append("<div class='apnd-img col-md-3  col-6' ><img src='" + preview + "'   id='img" + i + "' class='img-responsive'><i class='fa-solid fa-circle-xmark delfile'></i></div>");
//                 i++
//             })
//         });
//         $(document).on('click', elemRef.video, function () {
//             $(elemRef.video).after(
//                 "<input type='file' style='display:none;' id='vidupload" + j + "' name='video[" + j + "]'/>"
//             );
        
//             $('#vidupload' + j).trigger('click');
        
//             $(document).on('change', '#vidupload' + j, function () {
//                 var file = $(this).get(0);
//                 var preview = window.URL.createObjectURL(file.files[0]);
        
//                 $('.gallery').append(
//                     "<div class='apnd-img' >" +
//                         "<iframe width='120' data-fancybox='gallary-imgs' src='" + preview + "'  data-src='" + preview + " ' id='vid" + j + "' frameborder='0' allowfullscreen></iframe>" +
//                         "<i class='fa-solid fa-circle-xmark delfile1'></i>" +
//                     "</div>"
//                 );
        
//                 j++;
//             });
//         });
        
//         $(document).on('click', '.delfile', function () {
//             var elem = $(this).prev().attr('id').substr(3, 4);
//             $(this).parent().remove();
//             $('#imgupload' + elem).remove()
//         });
//         $(document).on('click', '.delfile1', function () {
//             var elem = $(this).prev().attr('id').substr(3, 4);
//             $(this).parent().remove();
//             $('#vidupload' + elem).remove()
//         })
//     }
// }(jQuery))


(function ($) {
    $.fn.miv = function (options) {
        var elemRef = $.extend({
            image: '.cam',
            video: '.vid'
        }, options);
        var i = 0;
        var j = 0;

        // 🟢 الصور
        $(document).on('click', elemRef.image, function () {
            $(elemRef.image).after("<input type='file' id='imgupload" + i + "' style='display:none;' name='image[" + i + "]'/>");
            $('#imgupload' + i).trigger('click');

            $(document).on('change', '#imgupload' + i, function () {
                var file = this.files[0];
                if (!file) return;

                var preview = window.URL.createObjectURL(file);

                var firstEmpty = $(".gallery .img-picture").first();
                if (firstEmpty.length) {
                    firstEmpty.parent().replaceWith(
                        "<div class='apnd-img col-md-3  col-6' ><img src='" + preview + "'   id='img" + i + "' class='img-responsive'><i class='fa-solid fa-circle-xmark delfile'></i></div>"
                    );
                }

                i++;
            });
        });

        // 🟢 الفيديو
        $(document).on('click', elemRef.video, function () {
            $(elemRef.video).after("<input type='file' style='display:none;' id='vidupload" + j + "' name='video[" + j + "]'/>");
            $('#vidupload' + j).trigger('click');

            $(document).on('change', '#vidupload' + j, function () {
                var file = this.files[0];
                if (!file) return;

                var preview = window.URL.createObjectURL(file);

                // استبدال أول div فيه img-picture
                var firstEmpty = $(".gallery .img-picture").first();
                if (firstEmpty.length) {
                    firstEmpty.parent().replaceWith(
                        "<div class='apnd-img col-md-3  col-6' ><img src='" + preview + "'   id='img" + i + "' class='img-responsive'><i class='fa-solid fa-circle-xmark delfile'></i></div>"
                    );
                }

                j++;
            });
        });

        // 🟢 حذف صورة
        $(document).on('click', '.delfile', function () {
            var elem = $(this).prev().attr('id').substr(3, 4);
            $(this).parent().replaceWith(
                "<div class='col-lg-2'><div class='img-picture border rounded-2'></div></div>"
            );
            $('#imgupload' + elem).remove();
        });

        // 🟢 حذف فيديو
        $(document).on('click', '.delfile1', function () {
            var elem = $(this).prev().attr('id').substr(3, 4);
            $(this).parent().replaceWith(
                "<div class='col-lg-2'><div class='img-picture border rounded-2'></div></div>"
            );
            $('#vidupload' + elem).remove();
        });
    }
}(jQuery));
