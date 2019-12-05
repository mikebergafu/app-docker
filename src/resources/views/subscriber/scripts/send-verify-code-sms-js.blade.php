<script type="text/javascript">
    let code_status = 0;
    $(document).on('click', '.btn-try-send', function (event) {
        $("#modalPush").modal('show');
        //send_sms_ajax('246102372');
    });

    function textLength(value){
        var maxLength = 5;
        return value.length <= maxLength;
    }

    function charcountupdate(str) {
        return  str.length;
    }

    $(document).ready(function () {
        var verify_btn = $('#btn-verify-code');
        verify_btn.attr("disabled", true);
        var verify_code = $('input#verify_code');

        verify_code.on('keyup', function () {
            if ((charcountupdate(this.value) !== 6)) {
                verify_btn.prop('disabled', true);
                return false;
            } else {
                verify_btn.prop('disabled', false);
                return true;
            }
        });

        verify_btn.on('click',function () {
            //Do verification
            var verify_btn = $('#btn-verify-code');
            var veri_code = document.getElementById('verify_code');
            console.log('mmmmm ', veri_code.value);
            verify_code_fn(veri_code.value, verify_btn);
        });
    });


    let msisdn = '';
    $(document).on('click', '#btn-send-sms', function (event) {
        var phoneNo = /^\(?([024|054|24|54]{2,3})\)?[]?([0-9]{7})$/;
        var spin = $('#spin-animate');

        var msdn = $('#msdn');
        var phone_no = extractPhone(msdn.val());

        var msdnError = $('#msdn_error');
        if (phone_no.match(phoneNo)) {
            console.log('number', phone_no);
            msisdn = phone_no;
            spin.addClass('glyphicon-refresh-animate ');
            send_sms_ajax(msisdn);
            $(this).text('Resend');
            $(this).find('i').toggleClass('fa-send fa-send');
            //document.getElementById("frm-subscribe").submit();
        }
        if (phoneNo.test(phone_no) === false) {
            msdnError.text("Invalid Mobile Number!").show().fadeOut(1000);
            console.log("Not Submitted")
        }

        event.preventDefault();
    });

    function urlGetCaller(url) {
        return new Promise((resolve, reject) => {
            $.ajax({
                url: url,
                type: 'GET',
                success: function (data) {
                    resolve(data)
                },
                error: function (error) {
                    reject(error)
                },
            })
        })
    }

    function convertToIn(phone) {
        return parseInt(phone, 10);
    }


    function saveSms(url) {
        urlGetCaller(url)
            .then(data => {
                console.log('sms sent', data);
            })
            .catch(error => {
                console.log(error)
            });
    }

    function do_ajax(url) {
        fetch(url)
            .then(res => res.json())
            .then(data => {
                console.log(data) // Prints result from `response.json()` in getRequest
            });
    }

    function send_sms_ajax(sender_msisdn) {
        fetch('/get-verify-token')
            .then(res => res.json())
            .then( function (response) {
                console.log('sss', convertToIn(sender_msisdn));
                console.log('cold', response);
                msg = 'Your Verification code is ' + response['code'] + '. Please Enter it into the verified code field.';
                do_ajax('/send-sms/' + convertToIn(sender_msisdn) + '/' + msg);
                saveSms('/save-verify-sms/' + response['code']  + '/' + '233'+convertToIn(sender_msisdn));
            });
    }

    function send_sms_ajax222(sender_msisdn) {
        fetch('/get-verify-token')
            .then(data => {
                console.log('sms sent', data);
            })
            .catch(error => {
                console.log(error)
            });
    }

    function verify_code_fn(code, btn) {
        fetch('/verify-new-code/'+ code)
            .then(res => res.json())
            .then( function (res) {
                console.log('Response ', res['data']);
                if(res['data'] === 1){
                    $('#sub-btn-div').css('display','block');
                    btn.css('display','none');
                    $('#verify_code').css('display','none');
                    $('#confirm_code_error').css('display','none');
                    $('#msdn').css('display','none');
                    $('#btn-send-sms').css('display','none');
                }else{
                    $('#confirm_code_error').text('Invalid Code! Please check and try again');
                }
             })
            .catch(error => {
                return JSON.stringify(error);
            });

    }

    function extractPhone(p_num){
        return  p_num.substring(3)
    }

    function testFetch() {
        fetch('https://jsonplaceholder.typicode.com/users/1')
            .then(function(response) {
                console.log(`status: ${response.status}`);
                console.dir(response.body);
                return response.json() // the important line
            })
            .then(function(myJson) {
                 console.log('output ',myJson)
            })
            .then(console.log)
    }



</script>


