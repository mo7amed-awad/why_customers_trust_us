function whatsappDropdown(seletor) {
  var Selected = $(seletor);
  var Drop = $(seletor + "-drop");
  var DropItem = Drop.find("li");

  Selected.click(function () {
    Selected.toggleClass("open");
    Drop.toggle();
  });

  Drop.find("li").click(function () {
    Selected.removeClass("open");
    Drop.hide();
    $('#whatsapp_code').val($(this).find('span').html());
    $('#country_code').val($(this).attr('data-code'));
    var item = $(this);
    Selected.html(item.html());
  });
  DropItem.each(function () {
    var code = $(this).attr("data-code");
    if (code != undefined) {
      var whatsappCode = code.toLowerCase();
      $(this).find("i").addClass("flagstrap-" + whatsappCode);
    }
  });
}

whatsappDropdown("#whatsapp");


function AllowOnlyNumbers(e) {
  e = (e) ? e : window.event;

  var clipboardData = e.clipboardData ? e.clipboardData : window.clipboardData;
  var key = e.keyCode ? e.keyCode : e.which ? e.which : e.charCode;
  var str = (e.type && e.type == "paste") ? clipboardData.getData('Text') : String.fromCharCode(key);

  return (/^\d+$/.test(str));
}