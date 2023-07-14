$(function () {
    $("#autocompleteInput").on("input", function () {
        var term = $(this).val();
        $.ajax({
            url: "/autocomplete",
            dataType: "json",
            data: {
                term: term
            },
            success: function (data) {
                var listContainer = $("#list");
                listContainer.empty();

                $.each(data, function (index, item) {
                    var listItem = $("<li>")
                        .text(item.label)
                        .attr("data-value", item.value)
                        .appendTo(listContainer);
                });

                listContainer.show();
            }
        });
    });

    $("#list").on("click", "li", function () {
        var selectedValue = $(this).data("value");
        var selectedLabel = $(this).text();

        $("#autocompleteInput").val(selectedLabel);
        $("#autocompleteId").val(selectedValue);

        $("#list").hide();
    });

    $(document).on("click", function (event) {
        if (!$(event.target).closest("#list").length && !$(event.target).closest("#autocompleteInput").length) {
            $("#list").hide();
        }
    });
});