<script>
    $(function () {
        $('#is_subscribed').on('click', function () {
            window.location = '/unsub-me/'+ uuid();
            bergLOG('Subscribe Click', 'sdfds');
        });
    });

    var uuid = function generateUUID() {
        return Math.random().toString(36).substring(7);

    }
</script>
