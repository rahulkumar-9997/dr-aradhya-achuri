$(document).ready(function () {
    $(document).on(
        "click",
        'a[data-ajax-lead-add-response-popup="true"]',
        function () {
            var title = $(this).data("title");
            var size = $(this).data("size") == "" ? "md" : $(this).data("size");
            var action =
                $(this).data("action") == "" ? "" : $(this).data("action");
            var url = $(this).data("url");
            var formId = $(this).data("formid") || "";
            var data = {
                size: size,
                url: url,
                action: action,
                formId: formId,
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
                    $("#selectedUserId").select2({
                        placeholder: "Select Users",
                        allowClear: true,
                    });

                    // if (typeof flatpickr !== "undefined") {
                    //     setTimeout(function () {
                    //         let el = document.getElementById(
                    //             "next_followup_date",
                    //         );
                    //         if (el && !el._flatpickr) {
                    //             flatpickr(el, {
                    //                 dateFormat: "Y-m-d",
                    //             });
                    //         }
                    //     }, 200);
                    // } else {
                    //     console.warn("Flatpickr library not loaded");
                    // }
                },
                error: function (data) {
                    data = data.responseJSON;
                },
            });
        },
    );

    $(document).on("change", "#nextAction", function () {
        let status = $(this).find(":selected").data("status");
        let $actionCol = $(this).closest('[class*="col-lg-"]');
        let $dateCol = $("#nextFollowUpDate").closest('[class*="col-lg-"]');
        if (status === "COMPLETED" || status === "CANCELLED") {
            $dateCol.hide();
            $actionCol.removeClass("col-lg-6").addClass("col-lg-12");
        } else {
            $dateCol.show();
            $actionCol.removeClass("col-lg-12").addClass("col-lg-6");
        }
    });

    /*response form submission handling */
    $(document)
        .off("submit", "#addResponseForm")
        .on("submit", "#addResponseForm", function (e) {
            e.preventDefault();
            var form = $(this);
            var submitButton = form.find('button[type="submit"]');
            $(".is-invalid").removeClass("is-invalid");
            $(".invalid-feedback").remove();
            submitButton
                .prop("disabled", true)
                .html(
                    '<span class="spinner-border spinner-border-sm"></span> Updating...',
                );
            $.ajax({
                url: form.attr("action"),
                type: "POST",
                data: new FormData(this),
                processData: false,
                contentType: false,
                success: function (response) {
                    submitButton.prop("disabled", false).html("Submit");
                    if (response.status === true) {
                        $("#commanModel").modal("hide");
                        feather.replace();
                        Toastify({
                            text: response.message,
                            duration: 5000,
                            gravity: "top",
                            position: "right",
                            className: "bg-success",
                            close: true,
                        }).showToast();
                    }
                },
                error: function (xhr) {
                    submitButton.prop("disabled", false).html("Submit");
                    if (xhr.status === 422) {
                        $.each(xhr.responseJSON.errors, function (key, value) {
                            $("#" + key)
                                .addClass("is-invalid")
                                .after(
                                    '<div class="invalid-feedback">' +
                                        value[0] +
                                        "</div>",
                                );
                        });
                    }
                },
            });
        });
    /* response form submission handling */
});
