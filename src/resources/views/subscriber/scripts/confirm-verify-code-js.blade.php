<script type="text/javascript">
    $(document).ready(function(){
        $("#verifyCodeModal").modal('show');
        console.log('Subscribe Form');
    });

    $("#frm-subscribe").submit(function (event) {

        var phoneNo = /^\(?([024|054|24|54]{2,3})\)?[]?([0-9]{7})$/;
        var confirmBtn = $('#btn-subscribe-submit');
        var spin = $('#spin-animate');
        var msdn = $('#msdn');
        var msdnError = $('#msdn_error');


        if (msdn.val().match(phoneNo)) {
            spin.addClass('glyphicon-refresh-animate ');
            confirmBtn.toggleClass('but-verify');
            document.getElementById("frm-subscribe").submit();
        }
        if (phoneNo.test(msdn.val()) === false) {
            msdnError.text("Invalid Mobile Number!").show().fadeOut(1000);
            console.log("Not Submitted")
        }

        event.preventDefault();
    });
    //Payment status checker


</script>


{{--<script type="text/javascript">
    $(document).ready(function(){
        $("#subscribeModal").modal('show');
        console.log('Show SUBS form');
    });

    $("#frm-subscribe").submit(function (event) {
        var phoneNo = /^\(?([024|054|24|54]{2,3})\)?[]?([0-9]{7})$/;
        var confirmBtn = $('#btn-subscribe-submit');
        var spin = $('#spin-animate');
        var msdn = $('#msdn');
        var msdnError = $('#msdn_error');

        var headers = {
            "Content-Type": "application/json",
            "Access-Control-Origin": "*",
        };
        var data = {
            "msdn": msdn.val(),
            _token: '{{csrf_token()}}'
        };
        console.log('data', data);

        if (msdn.val().match(phoneNo)) {
            spin.addClass('glyphicon-refresh-animate ');
            //confirmBtn.toggleClass('but-subscribe');

            try {
                fetch("{{route('subscribe-msdn',\App\Helpers\BergyUtils::uuid())}}", {
                    method: "POST",
                    headers: headers,
                    body:  JSON.stringify(data)
                })
                    .then(function(response){
                        return response.json();
                    })
                    .then(function(data){
                        console.log(data['code']);
                        if(data['message'] === 'success'){
                            document.getElementById("frm-subscribe").submit();
                            window.location = "{{route('subscriber-home', \App\Helpers\BergyUtils::uuid())}}";
                        }else{
                            msdnError.text("Sorry! we could n'\t subscribe you. Try again").show().fadeOut(2000);
                            spin.removeClass('glyphicon-refresh-animate');
                            //confirmBtn.toggleClass('but-subscribe');
                        }

                    });
            } catch (error) {
                console.error('Error:', error);
            }
        }

        if (phoneNo.test(msdn.val()) === false) {
            msdnError.text("Invalid Mobile Number!").show().fadeOut(1000);
            console.log("Not Submitted")
        }

        event.preventDefault();
    });
    //Payment status checker


</script>--}}
