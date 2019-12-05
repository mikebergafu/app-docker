<script>
    $(function () {
        $.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
        $('#file').fileupload({
            dataType: 'json', progressall: function (e, data) {
                var progress = parseInt(data.loaded / data.total * 100, 10);
                $('#progress').css('width', progress + '%');
            }, done: function (e, data) {
                $.each(data.result.files, function (index, file) {
                    $.notify({message: 'Uploaded ' + file.name}, {type: 'success'});
                });
                $('#progress').css('width', '0%');
            }, error: function (data) {
                $.each(data.responseJSON.errors.file, function (index, message) {
                    $.notify({message: message}, {type: 'danger'})
                });
                $('#progress').css('width', '0%');
            }
        });
    });</script>
