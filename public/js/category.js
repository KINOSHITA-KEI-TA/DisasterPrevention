$(document).ready(function() {
    $("#inputTag").change(function() {
        var selectedCategoryId = $(this).val();
        $(".blog-entry").each(function() {
            var categoryId = $(this).data("category-id");
            if (selectedCategoryId === "" || categoryId == selectedCategoryId) {
                $(this).show();
            } else {
                $(this).hide();
            }
        });
    });
});
