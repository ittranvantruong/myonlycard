<x-input type="hidden" name="route_create_link" :value="route('link.create')"/>
<x-input type="hidden" name="route_show" :value="route('profile.show')"/>
<script>
    var modalId = 'modalOpen', 
    btnOpenModal = $('#btnOpenModal'), 
    modalContent = $('#modalOpen .modal-content'), 
    editReplace;
function copyText(text){
    var input = $('<input>').val(text);
    $('body').append(input);
    input.select();
    document.execCommand('copy');
    input.remove();
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
function msgSuccess(text){
    $.toast({
        heading: 'Thành công',
        text: text,
        position: 'top-right',
        icon: 'success', 
        hideAfter: 10000
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
function callAjaxShow(){
    var url = $('input[name="route_show"]').val(), render = $("#viewDemoProfile .preview-profile");
    $.ajax({
        type: "GET",
        url: url,
        success: function(response){
            render.html(response);
        },
        error: function(response){
            handleAjaxError(response.responseJSON);
        }
    })
}

$(document).ready(function(){
    $("#labelUpload").click(function(e){
        var target = $(this).data('target');
        $(target).click();
    });
    $("input[name='avatar']").change(function (event) {
        var show = $(this).parents('div.form-avatar').find('.wrap-avatar>img');
        previewImage(this, show);
    });
});

$('.copy-text').click(function() {
    var text = $('.link-brower').text();
    copyText(text);
    $(this).find('span').text('Đã copy');
  });

$(document).on('click', '#btnCreateLink', function(e){
    var url = $('input[name="route_create_link"]').val();
    $.ajax({
        type: "GET",
        url: url,
        success: function (response) {
            modalContent.html(response);
            btnOpenModal.click();
        },
        error: function(response){
            handleAjaxError(response.responseJSON);
        }
    });
});
function callAjaxCreateLink(form, render){
    $.ajax({
        type: "POST",
        url: form.attr('action'),
        data: form.serialize(),
        success: function(response){
            render.prepend(response);
            closeModal(modalId)
            form.parsley().reset();
            form.trigger("reset");
            msgSuccess('Thực hiện thành công');
            callAjaxShow();
        },
        error: function(response){
            handleAjaxError(response.responseJSON);
        },
        complete: function(response){
            endAjaxForm(form, 'Tạo link')
        }
    })
}
$(document).on('submit', '#formCreateLink', function(e){
    e.preventDefault();
    var form = $(this), render = $("#listLink");
    callAjaxCreateLink(form, render);
});

$(document).on('click', '.edit-link', function(e){
    e.preventDefault();
    var that = $(this), url = that.data('route');
    $.ajax({
        type: "GET",
        url: url,
        success: function (response) {
            modalContent.html(response);
            btnOpenModal.click();
            editReplace = that.parents('.item-link');
        },
        error: function(response){
            handleAjaxError(response.responseJSON);
        }
    });
});

$(document).on('click', '.ui-sortable-handle .social-item', function(e){
    e.preventDefault();
})

function callAjaxUpdateLink(form){
    $.ajax({
        type: "PUT",
        url: form.attr('action'),
        data: form.serialize(),
        success: function(response){
            editReplace.html(response);
            closeModal(modalId);
            form.parsley().reset();
            form.trigger("reset");
            msgSuccess('Thực hiện thành công');
            callAjaxShow();
        },
        error: function(response){
            handleAjaxError(response.responseJSON);
        },
        complete: function(response){
            endAjaxForm(form, 'Sửa link')
        }
    })
}
$(document).on('submit', '#formUpdateLink', function(e){
    e.preventDefault();
    var form = $(this);
    callAjaxUpdateLink(form);
});
$(document).on('click', '.delete-link', function(e){
    e.preventDefault();
    var that = $(this), url = that.data('route');
    $.ajax({
        type: "DELETE",
        url: url,
        data: { _token: token },
        success: function (response) {
            that.parents('.item-link').remove();
            msgSuccess('Thực hiện thành công');
            callAjaxShow();
        },
        error: function(response){
            handleAjaxError(response.responseJSON);
        }
    });
});
function callAjaxReorderLink(form){
    $.ajax({
        type: "PUT",
        url: form.attr('action'),
        data: form.serialize(),
        success: function(response){
            console.log(response);
            msgSuccess('Thực hiện thành công');
            callAjaxShow();
        },
        error: function(response){
            handleAjaxError(response.responseJSON);
        },
        complete: function(response){
            endAjaxForm(form, '')
        }
    })
}
$(document).on('submit', '#formReorderLink', function(e){
    e.preventDefault();
    var form = $(this);
    callAjaxReorderLink(form);
});

$(document).ready(function(){
  $('div.reorder-link-list').mousedown(function() {
    // set fixed height to prevent scroll jump
    // when dragging from bottom
    $(this).height($(this).height());
  }).mouseup(function () {
      // set height back to auto 
      // when user just clicked on item
      $(this).height('auto');
  }).sortable({
        connectWith: 'div.reorder-link-list',
        placeholder: "portlet-placeholder",
        tolerance: 'pointer',
        start: function() {
            // dragging is happening
            // and scroll jump was prevented,
            // we can set it back to auto
            $(this).height('auto');
        },
        stop: function(event, ui) {
            // Thực hiện các thao tác sau khi hoàn tất sắp xếp
            $("#formReorderLink").submit();
        }
  });
});
</script>