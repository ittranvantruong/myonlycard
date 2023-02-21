<x-input type="hidden" name="route_create_link" :value="route('link.create')"/>
<x-input type="hidden" name="route_show" :value="route('profile.show')"/>
<x-input type="hidden" name="route_render_input_link" :value="route('link.render_input.show')"/>
<script>
    var modalId = 'modalOpen', 
    btnOpenModal = $('#btnOpenModal'), 
    modalContent = $('#modalOpen .modal-content'), 
    editReplace;

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

// render input của từng loại link

$(document).on('change', '#selectTypeLink', function(e){
    var that = $(this), url = $('input[name="route_render_input_link"]').val();
    
    $.ajax({
        type: "GET",
        url: url + '/' + that.val(),
        success: function (response) {
            $("#inputRender").html(response);
        },
        error: function(response){
            handleAjaxError(response.responseJSON);
        }
    });
});


// Tạo và render form links
$(document).on('click', '#btnCreateLink', function(e){
    var url = $('input[name="route_create_link"]').val();
    $.ajax({
        type: "GET",
        url: url,
        success: function (response) {
            modalContent.html(response);
            beautySelectImage("selectTypeLink");
            $('form').parsley();
            btnOpenModal.click();
        },
        error: function(response){
            handleAjaxError(response.responseJSON);
        }
    });
});
function callAjaxCreateLink(form, render){
    var formData = new FormData(form), elm = $(form);
    $.ajax({
        type: "POST",
        url: elm.attr('action'),
        data: formData,
        processData: false,
        contentType: false,
        success: function(response){
            render.prepend(response);
            closeModal(modalId)
            elm.parsley().reset();
            elm.trigger("reset");
            msgSuccess('Thực hiện thành công');
            callAjaxShow();
        },
        error: function(response){
            handleAjaxError(response.responseJSON);
        },
        complete: function(response){
            endAjaxForm(elm, 'Tạo link')
        }
    })
}
$(document).on('submit', '#formCreateLink', function(e){
    e.preventDefault();
    var render = $("#listLink");
    callAjaxCreateLink(this, render);
    
});
// Tạo và render form links tạo-----------


// Cập nhật và render form links sửa
function callAjaxUpdateLink(form){
    var formData = new FormData(form), elm = $(form);
    $.ajax({
        type: "POST",
        headers: {
            "X-HTTP-Method-Override": "PUT"
        },
        url: elm.attr('action'),
        data: formData,
        processData: false,
        contentType: false,
        success: function(response){
            editReplace.html(response);
            closeModal(modalId);
            elm.parsley().reset();
            elm.trigger("reset");
            msgSuccess('Thực hiện thành công');
            callAjaxShow();
        },
        error: function(response){
            handleAjaxError(response.responseJSON);
        },
        complete: function(response){
            endAjaxForm(elm, 'Sửa link')
        }
    })
}
$(document).on('click', '.edit-link', function(e){
    e.preventDefault();
    var that = $(this), url = that.data('route');
    $.ajax({
        type: "GET",
        url: url,
        success: function (response) {
            modalContent.html(response);
            btnOpenModal.click();
            beautySelectImage("selectTypeLink");
            $('form').parsley();
            editReplace = that.parents('.item-link');
        },
        error: function(response){
            handleAjaxError(response.responseJSON);
        }
    });
});

$(document).on('submit', '#formUpdateLink', function(e){
    e.preventDefault();
    callAjaxUpdateLink(this);
});
// Cập nhật và render form links sửa -----

// Xóa link
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
//Sắp xếp link
$(document).on('click', '.ui-sortable-handle .social-item', function(e){
    e.preventDefault();
})
$(document).on('submit', '#formReorderLink', function(e){
    e.preventDefault();
    var form = $(this);
    callAjaxReorderLink(form);
});
//Sắp xếp link ---------


// preview file
$(document).on('change', '.file-change-preview', function(e){
    var preview = $(this).data('preview');
    previewImage(this, $(preview));
});

$(document).ready(function(){

    // delete file preview
    $("#clearImagePreview").click(function(e){
        var preview = $(this).data('preview'), input = $(this).data('input');
        $(preview).attr('src', domain + '/public/assets/images/default-image.png');
        $(input).val('');
    })

    //reorder links
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