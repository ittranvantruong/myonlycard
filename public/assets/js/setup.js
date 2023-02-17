$(document).ready(function(){
    $("form").submit(function(){
        $(this).prepend('<div style="position: absolute;width: 100%;height: 100%;background: #ffffff91;z-index: 10;"></div>')
        $(this).find("button[type='submit']").css("opacity", "0.5");
        $(this).find("button[type='submit']").html('<span class="spinner-grow spinner-grow-sm"></span> Đang xử lý..');
    });
});