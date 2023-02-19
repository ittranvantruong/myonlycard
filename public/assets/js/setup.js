var token = $("meta[name='X-TOKEN']").attr('content');
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