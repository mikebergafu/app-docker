<script type="application/javascript">
    function bergLOG(tag, msg) {

        @if(env('APP_DEBUG')==true)
        console.log(tag, ':', msg);
        @endif

    }

    $(function () {
        $('#btn-admin-link').on('click', function () {
            window.location = '/admin/login';
            bergLOG('Admin Click', 'sdfds');
        });

        $('#btn-go-to-main-link').on('click', function () {
            window.location = '/';
            bergLOG('Admin Click', 'sdfds');
        });

        $('#btn-cm-link').on('click', function () {
            window.location = '/content-manager/login';
            bergLOG('CM Click', 'sdfds');
        });

        $('#btn-sub-link').on('click', function () {
            window.location = '/';
            bergLOG('Subscriber Click', 'sdfds');
        });

        $('#btn-cm-welcome-link').on('click', function () {
            window.location = '/content-manager/welcome';
            bergLOG('CM Click', 'sdfds');
        });
    });
</script>
