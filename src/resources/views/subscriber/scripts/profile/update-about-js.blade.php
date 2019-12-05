<script>
    $(document).ready(function () { /// Wait till page is loaded

        $(document).on('click', '#btn-update-about', function (event) {
            $("#updateAboutModal").modal('show');
        });

        $(function () {
            $("#not-in-list").click(function () {
                if ($(this).is(":checked")) {
                    $("#job_title").show();
                    $("#job_title_id_div").hide();
                    $("#job_title_id_div").val('');
                } else {
                    $("#job_title").hide();
                    $("#job_title").val('');
                    $("#job_title_id_div").show();
                }
            });
        });


        $(document).on('click', '#submit-update-about', function (event) {

            var job_title_id = $('#job_title_id').val();
            var job_title = $('#job_title').val();
            var about = $('#about').val();

            var job_title_id_error = $('#job_title_id_error');
            var job_title_error = $('#job_title_error');
            var about_error = $('#about_error');


            if (job_title_id.length < 1) {
                job_title_id_error.text("Please Select a Job Title!").show().fadeOut(2000);
            }
            if (job_title.length < 1) {
                job_title_error.text("Please Enter a Job Title!").show().fadeOut(2000);
            }
            if (about.length < 1) {
                about_error.text("About you can not be blank!").show().fadeOut(2000);
            }
            //event.preventDefault();
            var data = $('#frm-submit-update-about').serializeArray();
            //console.log('data',$('#frm-submit-update-about').serializeArray() )
            urlPostCaller('{{route('subscriber-profile-update-about')}}', data)
                .then(data => {
                    console.log(data['code'])
                    if (data['code'] === 200) {
                        Swal.fire(
                            'Added!',
                            'A brief Description about you has been saved!',
                            'success'
                        );
                        $('#frm-submit-update-about').trigger("reset");
                        $("#updateAboutModal").modal('hide');
                        $("#about-content").html(data['about']);
                    }
                })
                .catch(error => {
                    console.log(error)
                });


        });

    });

    function urlPostCaller(url, data) {
        return new Promise((resolve, reject) => {
            $.ajax({
                url: url,
                type: 'POST',
                data: data,
                success: function (data) {
                    resolve(data)
                },
                error: function (error) {
                    reject(error)
                },
            })
        })
    }
</script>
