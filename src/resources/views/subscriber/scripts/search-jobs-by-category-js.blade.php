<script type="text/javascript">
    $("#frm-search-job-by-category").submit(function (event) {

        var confirmBtn = $('#btn-search-job');
        var categoryID = $('#category_id');

        if (categoryID.val() !== null) {
            document.getElementById("frm-search-job-by-category").submit();
        }
        if (categoryID.val() === null) {
            $("h5.title").text('Category (Keyword) Error!');
            $("p.message").text('Sorry! Please select a Job Category/Keyword to search.');
            $("#errorModal").modal('show');
            console.log("Not Submitted")
        }

        event.preventDefault();
    });

</script>
