var token = $("meta[name='X-TOKEN']").attr('content'), 
domain = window.location.origin + '/myonlycard';
$(document).ready(function(){
    
});
$(document).on('submit', 'form', function(){
    $(this).prepend('<div class="overlay-form" style="position: absolute;width: 100%;height: 100%;background: #ffffff91;z-index: 10;"></div>')
    $(this).find("button[type='submit']").css("opacity", "0.5");
    $(this).find("button[type='submit']").html('<span class="spinner-grow spinner-grow-sm"></span> Đang xử lý..');
});
function endAjaxForm(element, text){
    element.find('.overlay-form').remove();
    element = element.find('button[type="submit"]');
    element.removeAttr('style');
    element.html(text);
}
function closeModal(modalId){
    $("#" + modalId).find('.btn-close').click();
}
function beautySelectImage(elmID){
    new TomSelect("#" + elmID, {
        // create: true,
        copyClassesToDropdown: false,
        dropdownClass: 'dropdown-menu',
        optionClass:'dropdown-item',
        controlInput: '<input>',
        render:{
            item: function(data,escape) {
                if( data.customProperties ){
                    return '<div><span class="dropdown-item-indicator">' + data.customProperties + '</span>' + escape(data.text) + '</div>';
                }
                return '<div>' + escape(data.text) + '</div>';
            },
            option: function(data,escape){
                if( data.customProperties ){
                    return '<div><span class="dropdown-item-indicator">' + data.customProperties + '</span>' + escape(data.text) + '</div>';
                }
                return '<div>' + escape(data.text) + '</div>';
            },
        },
    });
}

function msgSuccess(text){
    $.toast({
        heading: 'Thành công',
        text: text,
        position: 'top-right',
        icon: 'success', 
        hideAfter: 5000
    });
}
function msgError(text){
    $.toast({
        heading: 'Thất bại',
        text: text,
        position: 'top-right',
        icon: 'error', 
        hideAfter: 10000
    });
}
function handleAjaxError(errors){
    if(errors.status == 416){
        $.map(errors.errors, function(value) {
            value.forEach(element => {
                msgError(element);
            })
        })
    }else{
        msgError('Vui lòng tải lại trang');
    }
    
}
function previewImage(file, show){
    if (file.files && file.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            show.attr('src', e.target.result);
        }
        reader.readAsDataURL(file.files[0]); // convert to base64 string
    }
}
function copyText(text){
    var input = $('<input>').val(text);
    $('body').append(input);
    input.select();
    document.execCommand('copy');
    input.remove();
}

function createQRcode(link, elm){
    const qrCode = new QRCodeStyling({
        width: 200,
        height: 200,
        type: "png",
        data: link
    });
    qrCode.append(document.getElementById(elm));
    return qrCode;
}
function downloadQRcode(qrCode){
    qrCode.download({ name: "qrcode-tcasevn", extension: "png" });
}

$(document).on('click', '.collapse-item-link', function(e) {
    e.preventDefault();
    var element = $(this).attr('href');
    if ($(element).hasClass("flipInX")) {
        $(element).removeClass("flipInX").addClass("flipOutX");
        setTimeout(function() {
          $(element).addClass("d-none");
        }, 600);

      } else {
        $(element).removeClass("flipOutX d-none").addClass("flipInX");
      }
});
$('.copy-text').click(function() {
    var text = $($(this).data('target')).text();
    copyText(text);
    $(this).find('span').text('Đã copy');
});
