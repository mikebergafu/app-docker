<script type="text/javascript">
    $(document).ready(function(){
        $("#subscribeModal").modal('show');
        console.log('Show form');
    });

    $("#frm-verify").submit(function (event) {

        var phoneNo = /^\(?([024|054|24|54]{2,3})\)?[]?([0-9]{7})$/;
        var confirmBtn = $('#btn-verify');
        var spin = $('#spin-animate');
        var msdn = $('#msdn');
        var msdnError = $('#msdn_error');

        if (msdn.val().match(phoneNo)) {
            spin.addClass('glyphicon-refresh-animate ');
            confirmBtn.toggleClass('but-verify');
            document.getElementById("frm-verify").submit();
        }
        if (phoneNo.test(msdn.val()) === false) {
            msdnError.text("Invalid Mobile Number!").show().fadeOut(1000);
            console.log("Not Submitted")
        }
        event.preventDefault();
    });

</script>
