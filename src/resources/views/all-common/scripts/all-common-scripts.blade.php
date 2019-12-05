<script>
    $(document).on("click", ".open-category-desc", function () {
        var categoryTitle = $(this).data('title');
        var categaryDesc = $(this).data('desc');
        $(".modal-header #title").text(categoryTitle);
        $(".modal-body #main-desc").text(categaryDesc);
    });

    $(document).on("click", ".open-job-desc", function () {
        var categoryTitle = $(this).data('title');
        var categaryDesc = $(this).data('desc');
        $(".modal-header #title").text(categoryTitle);
        $(".modal-body #main-desc").text(categaryDesc);
    });

</script>
