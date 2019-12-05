<script type="text/javascript">
   /*   $(document).on('click', '.btn-fav', function (event) {
          $("#addToFavModal").modal('show');
      });
*/
    let categoryDetails = '';
    let serveRes = '';

    $(document).on('click', '#no', function (event) {
        $("#addToFavModal").modal('hide');
    });

    $(document).on('click', '#yes', function (event) {
        //Get Data
        //outputIt();
        //Do Ajax

        //On success

        $("#hide_on_completed").css("display", "none");

        $("#show_on_completed").css("display", "block");

        $("#addToFavModal").fadeOut("slow", function () {
            // Animation complete.

        });
    });

    function addToFav(id, type) {
        $.ajax(
            {
                url: '/add-to-favourite/' + id,
                type: "get",
                // beforeSend: function()
                // {
                //     you can show your loader
                // }
            })
            .done(function (data) {
                //$("#jobs-grid-data").empty().html(data);
                //location.hash = page;
                console.log('hERENDCSMD');
            })
            .fail(function (jqXHR, ajaxOptions, thrownError) {
                alert('No response from server');
            });
    }
    /*================Store Items In Local Store==================*/
    var favs =
        {
            queue: []
        };

    localStorage.setItem('favs', JSON.stringify(favs));

    outputIt();

    function outputIt() {
        var restoredFavs = JSON.parse(localStorage.getItem('favs'));
        var outputs = "";
        for (var i = 0; i < restoredFavs.queue.length; i++) {
            outputs += '<div id="' + restoredFavs.queue[i].id + '">'
                + restoredFavs.queue[i].id + ':'
                + restoredFavs.queue[i].itemId +
                ':' + restoredFavs.queue[i].itemName +
                ':' + restoredFavs.queue[i].itemType +
                '</div>';
        }
        console.log('Item Out', outputs);

    }

    function popIt() {
        var restoredFavs = JSON.parse(localStorage.getItem('favs'));
        restoredFavs.queue.shift();
        localStorage.setItem('favs', JSON.stringify(restoredFavs));
        outputIt();
    }

    function pushIt(item_id, item_name, item_type) {
        var restoredFavs = JSON.parse(localStorage.getItem('favs'));
        restoredFavs.queue.push({
            id: Math.floor(Math.random() * (100 - 1 + 1)) + 1,
            itemId: item_id,
            itemName: item_name,
            itemType: item_type
        });
        localStorage.setItem('favs', JSON.stringify(restoredFavs));

        //outputIt();
    }

    $('.berg-btn1').on('click', function () {
        var itemId = $(this).parents('div.features-content').find('#cat_id').val();
        var favType = $(this).parents('div.features-content').find('#fav_type').val();

        var is_exits = '';

        const url = '/add-to-favourite/'+itemId+'/'+favType;
        const data = { username: 'example' };
        fetch(url)
            .then(res => res.json())//response type
            .then(function(response) {
                is_exits = response['status'];
                console.log('data', is_exits);
                execTask();
            }); //

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



    });

    function urlGetCaller(url) {
        return new Promise((resolve, reject) => {
            $.ajax({
                url: url,
                type: 'GET',
                success: function(data) {
                    serveRes = data;
                    resolve(data)
                },
                error: function(error) {
                    reject(error)
                },
            })
        })
    }
    function add_fav_store(url, i_class){
        urlGetCaller(url, i_class)
            .then(data => {
                console.log(data);
                if (i_class === 'fa fa-check') {
                    pushIt(data['id'], data['name'], 1);
                    categoryDetails = JSON.parse(localStorage.getItem('favs')).queue[0];

                    Swal.fire({
                        title: 'Are you sure?',
                        text: 'Do you want '+categoryDetails.itemName+" to be part of your pre-defined Category list",
                        type: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, Add as Favourite!'
                    }).then((result) => {
                        if (result.value) {
                            var url = '/add-to-favourite/'+categoryDetails.itemId+'/'+categoryDetails.itemType;
                            console.log('url',url );
                            add_update_fav(url);
                        }
                    });
                } else {
                    popIt();
                }

            })
            .catch(error => {
                console.log(error)
            });
    }
    function add_update_fav(url){
        urlGetCaller(url)
            .then(data => {
                if(data['status']=== 'success'){
                    popIt();
                    Swal.fire(
                        'Added!',
                        categoryDetails.itemName + ' has been Add as Favourite!',
                        'success'
                    )
                }else{
                    Swal.fire({
                        title: 'Added to Favourite?',
                        text: "We can\'t verify your Subscription!",
                        type: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#ffc606',
                        cancelButtonColor: '#1ecaff',
                        confirmButtonText: 'I am new? , Subscribe now!',
                        cancelButtonText: 'Already a Subscriber?, Confirm!'
                    }).then((result) => {
                        if (result.value) {
                            Swal.fire(
                                'Deleted!',
                                'Your file has been deleted.',
                                'success'
                            )
                        }

                        $('#subscribeModal').modal('show');

                    })
                }

            })
            .catch(error => {

            });

    }




</script>
