<script src="{{ asset('public/lib/Tabler/dist/js/tabler.min.js') }}"></script>

<script src="{{ asset('public/lib/jquery/jquery.min.js') }}"></script>

<script src="{{ asset('public/lib/jquery-toast-plugin/jquery.toast.min.js') }}"></script>
<script src="{{ asset('public/lib/Parsley.js-2.9.2/parsley.min.js') }}"></script>
@stack('js-lib')

<script src="{{ asset('public/assets/js/setup.js') }}"></script>
<script>
    $(document).ready(function () {
    $("#deleteAccount").click(function(e){
        e.preventDefault();
        if(!confirm('Hãy cân nhắc trước khi xóa. Nếu bạn đồng ý xóa hãy ấn nút Ok!')){
            return;
        }
        $("#formDeleteAccount").submit();
    })
});
</script>

@stack('js')

