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
    $(document).on("click", ".delete", () => {
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
                location.reload();
            }
            $(":submit").prop("disabled", false);
        });
    });

    // Load Charts
    $(document).ready(() => {
        $.each($(".dashboard-chart"), (i, v) => {
            const chartId = v.id;
            const chartConfig = $(v).data("api-resource");
            buildChart(chartId, chartConfig);
        });
    });

    // Chart builder
    function buildChart(chartId, chartConfig) {
        const data = {
            labels: chartConfig.labels,
            datasets: chartConfig.datasets,
        };
        const config = {
            type: chartConfig.type,
            data: data,
            options: {
                responsive: true,
                maintainAspectRatio: false,
                legend: {
                    display: true,
                },
                title: {
                    display: true,
                    text: chartConfig.title,
                    fontSize: 18,
                },
                scales: {
                    yAxes: [
                        {
                            ticks: {
                                beginAtZero: true,
                            },
                        },
                    ],
                },
            },
        };
        return new Chart(chartId, config);
    }

    // Add Dashboard Filter
    addDashboardFilter();

    function addDashboardFilter() {
        var start = moment($("#filter_start").val());
        var end = moment($("#filter_end").val());

        function cb(start, end) {
            $("#periodrange span").html(
                start.format("MMMM D, YYYY") +
                    " - " +
                    end.format("MMMM D, YYYY")
            );
        }

        $("#periodrange").daterangepicker(
            {
                startDate: start,
                endDate: end,
                ranges: {
                    Today: [moment(), moment()],
                    Yesterday: [
                        moment().subtract(1, "days"),
                        moment().subtract(1, "days"),
                    ],
                    "Last 7 Days": [moment().subtract(7, "days"), moment()],
                    "Last 30 Days": [moment().subtract(30, "days"), moment()],
                    "This Month": [
                        moment().startOf("month"),
                        moment().endOf("month"),
                    ],
                    "Last Month": [
                        moment().subtract(1, "month").startOf("month"),
                        moment().subtract(1, "month").endOf("month"),
                    ],
                },
            },
            cb
        );

        cb(start, end);
    }

    // Set period from and to dates
    $("#periodrange").on("apply.daterangepicker", function (ev, picker) {
        var startDate = picker.startDate.format("YYYY-MM-DD");
        var endDate = picker.endDate.format("YYYY-MM-DD");

        $("#filter_start").val(startDate);
        $("#filter_end").val(endDate);
    });

    // Add searchable multiselect
    $(".filter-select").select2({
        placeholder: " Select an option ",
        maximumSelectionLength: 10,
        allowClear: true,
        tags: true,
        tokenSeparators: [",", " "],
    });

    // Add filter data
    addFilteredData();

    function addFilteredData() {
        const facilityData = $.parseJSON($("#filter_facility").val());
        const subCountyData = $.parseJSON($("#filter_subcounty").val());

        $("select#facility").val(facilityData);
        $("select#subcounty").val(subCountyData);

        $(".filter-select").trigger("change");
    }
});
