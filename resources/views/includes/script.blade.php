<script>
    
    // toast js start
        
        function responseToast(msg,background='bg-light'){
            $('.app_toast .toast-body').html(msg);
            $('.app_toast').addClass(background);
            $('.app_toast').show();
            $('.app_toast').css('right','1%');
            setTimeout(() => {
                $('.app_toast').css('right','-100%');
                $('.app_toast').removeClass(background);
                $('.app_toast').hide();
            }, 2000);
        }
        
    // toast js end

</script>