jQuery(function ($) {
    const mainMenu = $(".main-menu").val();
    const subMenu = $(".sub-menu").val();
    // Activate nav links
    $(".list-unstyled li").removeClass("active");
    $(`.${mainMenu}`).addClass("active");
    $(`.${subMenu}`).addClass("active");

    // Prevent duplicate form submissions
    $("form").submit(function () {
        $(this).find("button:submit").attr("disabled", "disabled");
    });

    // Initialize DataTables
    $("#dataTable").DataTable();

    // Show confirm on .delete
    $(".delete").click(function () {
        var r = confirm("Are you sure?");
        if (r == true) {
            $(this).attr("disabled", "disabled");
        } else {
            return false;
        }
    });

    // Show query executor results
    $("#query_run_form").on("submit", (e) => {
        e.preventDefault();
        const form = $("#query_run_form");
        const actionURL = form.attr("action");
        const formData = form.serialize();

        $.post(actionURL, formData, (responseData) => {
            try {
                const resultTable = $("#query_result");
                if ($.fn.DataTable.isDataTable("#query_result")) {
                    resultTable.DataTable().destroy();
                    resultTable.empty();
                }
                resultTable.DataTable($.parseJSON(responseData));
            } catch (error) {
                alert("Error! Your query could not be executed");
            }
            $(":submit").prop("disabled", false);
        });
    });
});
