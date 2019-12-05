<script type="application/javascript">

    var job_id = $('#job_id').val();

    function bergLOG(tag, msg) {

        @if(env('APP_DEBUG')==true)
        console.log(tag, ':', msg);
        @endif

    }

    $(function () {
        var clickViewCount = 0;
        $('#btn-subscribe').on('click', function () {
            window.location = '/subscribe-msdn-form/' + job_id + '/' + uuid();
            bergLOG('Subscribe Click', 'sdfds');
        });

        $(".verify_box #msdn").keydown(function(e) {
            var oldvalue=$(this).val();
            var field=this;
            setTimeout(function () {
                if(field.value.indexOf('233') !== 0) {
                    $(field).val(oldvalue);
                }
            }, 1);
        });

        $('#btn-confirm-subscription').on('click', function () {
            window.location = '/send-msdn/' + job_id + '/' + uuid();
            bergLOG('Confirm Click', 'sdfds');
        });

        $('.all-categories').on('click', function () {
            window.location = '{{route('subscriber-all-categories')}}';
            bergLOG('Confirm Click', 'sdfds');
        });

        //Show add skills modal
        $('#btn-add-skill').on('click', function () {
            $("#updateSkillModal").modal('show');
        });

        $('#btn-subscribe-by-choice').on('click', function () {
            $("#subscribeAcceptModal").modal('show');
        });

        $('#btn-subscribe-by-verification').on('click', function () {
            $("#subscribeVerifyModal").modal('show');
            $('#sub-btn-div').css('display','none');
        });

        $('#view-more').on('click', function () {
            var subTermBut = $("#view-more");
            var subTermDiv = $("#view-subscription-terms");
            if (clickViewCount < 1) {
                subTermDiv.css('display', 'block');
                subTermBut.text('Read less...');
                clickViewCount++;
            } else {
                subTermDiv.css('display', 'NONE');
                subTermBut.text('Read more...');
                clickViewCount = 0;
            }

        });


        $('#accept-subscribe').on('click', function () {
            @if(env('TEST_MSISDN')!== null)
            window.location='{{route('subscriber-do-subscribe',env('TEST_MSISDN'))}}';
            @endif
        });

        $('#confirm-accept-subscribe').on('click', function () {
            @if(session()->get('isdn')!== null)
                window.location='{{route('subscriber-do-subscribe',session()->get('isdn'))}}';
            @endif
        });

        $('#btn-apply').on('click', function () {
            $("#submitJobApplicationModal").modal('show');
        });

        $('#read-more-about-job-desc').on('click', function () {
            $("#viewMoreModal").modal('show');
        });

        $('#unsub-link').on('click', function () {
            $("#unsubscribeAcceptModal").modal('show');
        });

        $('#accept-unsubscribe').on('click', function () {
            window.location ='{{route('subscriber-unsubscribe',\App\Helpers\BergyUtils::getActualMsisdn())}}'
        });

        //Add to favourite
        var fav_button = $('.btn-add-cat-2-fav');

        fav_button.on('click', function () {
            const itemId = $(this).find('#id_cat').val();
            const catName = $(this).find('#name_cat').val();

            console.log('Name ', catName);

            const url = '/add-to-favourite/'+itemId+'/'+ 1;
            const data = { username: 'example' };
            fetch(url)
                .then(res => res.json())//response type
                .then(function(response) {
                    is_exits = response['status'];
                    if(is_exits === 'failed') {
                        $("#remove_category_name").text(catName);
                        $("#removeFromFavAcceptModal").modal('show');
                    }else{
                        console.log('Cat ', $(this).find('#id_cat').val());
                        $('#fav_category_id').val($(this).find('#id_cat').val());
                        $("#category_name").text($(this).find('#name_cat').val());

                        $("#addToFavAcceptModal").modal('show');
                    }
                });


        });

    });

    function execTask() {
        if(is_exits === 'failed') {
            Swal.fire({
                title: 'Are you sure?',
                text: "This Category has already been added to Favourite!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#ffc62e',
                cancelButtonColor: '#1ecaff',
                confirmButtonText: 'Yes, to remove it from favourite!',
                cancelButtonText: 'No!'
            }).then((result) => {
                if (result.value) {
                    Swal.fire(
                        'Removed!',
                        'Your favourite list has been updated.',
                        'success'
                    )
                }
            })
        }else{
            $(this).find('i').toggleClass('fa-heart fa-check');
            $(this).find('i.fa-check').css('color', '#ffc606');
            let i_class_name = $(this).find('i').attr('class');
            add_fav_store('/get-job-category/' + itemId, i_class_name);
            /*var url = '/add-to-favourite/'+itemId+'/'+favType;*/
            add_update_fav(url);
        }
    }

    var uuid = function generateUUID() {
        return Math.random().toString(36).substring(7);
    };


    $(document).ready(function () {
        $('#example').DataTable();
    });

</script>
