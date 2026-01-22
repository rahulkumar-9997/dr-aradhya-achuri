$(document).ready(function() {
    $(document).on("click", 'a[data-ajax-lead-add-response-popup="true"]', function () {
        var title = $(this).data("title");
        var size = $(this).data("size") == "" ? "md" : $(this).data("size");
        var action = $(this).data("action") == "" ? "" : $(this).data("action");
        var url = $(this).data("url");
        var formId = $(this).data("formid") || "";
        var data = {
            size: size,
            url: url,
            action: action,
            formId: formId
        };
        $("#commanModel .modal-title").html(title);
        $("#commanModel .modal-dialog").addClass("modal-" + size);

        $.ajax({
            url: url,
            type: "GET",
            data: data,
            success: function (data) {
                $("#commanModel .render-data").html(data.form);
                $("#commanModel").modal("show");
            },
            error: function (data) {
                data = data.responseJSON;
            },
        });
    });
});