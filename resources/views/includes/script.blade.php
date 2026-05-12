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


        $(document).ready( function() {
            $('.doctor_select').on('change', function() {
                let doctor_select = $(this).val();

                doctor_select ? loadDoctorFee(doctor_select) : null;

                //ajax
            //   $('#available_time').load({!! json_encode(url('/days/')) !!}+'/'+id);


            });

            function loadDoctorFee(id){
                callApi('get', `{{ route('get.getDoctorFee', '') }}?id=${id}`, null, (response) => {
                    $('#doctor_fee').val(response.fee);
                });
            }
                
            let doctor_select = $('.doctor_select').val();
            
            doctor_select ? loadDoctorFee(doctor_select) : null;
        
        });

        $('.changeStatus').on('change', function() {
            let status = $(this).val();
            let id = $(this).data('id');
            let model = $(this).data('model');

            callApi('post', `{{ route('app_action.changeStatus') }}?id=${id}&status=${status}&model=${model}`, null, (response) => {
                responseToast(response.message, 'bg-success');
                location.reload();
            });
        });
        
        $('input[name="phone"]').on('input', function () {

            let value = $(this).val();

            value = value
                .replace(/\D/g, '') // only numbers
                .slice(0, 10); // max 10 digits

            $(this).val(value);

        });

        $('.apply_discount').on('change', function() {
            if($(this).is(':checked')){
                $('.discount_section').show();
            } else{
                $('.discount_section').hide();
            }
        });

        $(document).ready(function () {
            $('.selectpicker').selectpicker({
                liveSearch: true
            });
        });
</script>