
<script>

    var element         = $("#sub-content");
    var topOfElement    = element.offset().top;
    var bottomOfElement = element.offset().top + element.outerHeight(true);
    var $window         = $(window);
    var job_id         = $('#job_id').val();

    $window.bind('scroll', function() {
        var scrollTopPosition   = $window.scrollTop()+$window.height();
        var windowScrollTop     = $window.scrollTop();

        if( windowScrollTop > topOfElement && windowScrollTop < bottomOfElement) {
            // Element is partially visible (above viewable area)
            //console.log("Element is partially visible (above viewable area)");
           hideSubscribableContent();

        }else if( windowScrollTop > bottomOfElement && windowScrollTop > topOfElement ) {
            // Element is hidden (above viewable area)
            //console.log("Element is hidden (above viewable area)");
            hideSubscribableContent();

        }else if( scrollTopPosition < topOfElement && scrollTopPosition < bottomOfElement ) {
            // Element is hidden (below viewable area)
            //console.log("Element is hidden (below viewable area)");
            hideSubscribableContent();

        }else if( scrollTopPosition < bottomOfElement && scrollTopPosition > topOfElement ) {
            // Element is partially visible (below viewable area)
            //console.log("Element is partially visible (below viewable area)");
            hideSubscribableContent();

        }else{
            // Element is completely visible
            //console.log("Element is completely visible");
            hideSubscribableContent();
        }
    });


    var hideSubscribableContent = function setHide(){
        $('#sub-content').css('display','none');
        window.location = '{{route('verify-subscribe-form',\App\Helpers\BergyUtils::uuid())}}';
    };

    var do_nothing = function do_n(){
    };
    var uuid = function generateUUID() {
        return Math.random().toString(36).substring(7);

    }


</script>
