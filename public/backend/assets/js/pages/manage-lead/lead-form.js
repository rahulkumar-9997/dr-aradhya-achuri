$(document).ready(function () {
    $(document).on("click", 'a[data-ajax-lead-add-popup="true"]', function () {
        var title = $(this).data("title");
        var size = $(this).data("size") == "" ? "md" : $(this).data("size");
        var action = $(this).data("action") == "" ? "" : $(this).data("action");
        var url = $(this).data("url");
        var data = {
            size: size,
            url: url,
            action: action,
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

    let fieldCounter = 0;

    function generateFieldHtml(counter) {
        return `
        <div class="field-row row mb-4 border-bottom pb-3" data-index="${counter}">
            <div class="col-md-12 col-12">
                <div class="mb-3">                                                
                    <h6>Field ${counter} <span class="text-danger">*</span></h6>
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="mb-3">
                    <label class="form-label">Label <span class="text-danger">*</span></label>
                    <input type="text" name="field_label[]" class="form-control field-label" placeholder="e.g., First Name">
                    <div class="invalid-feedback field_label_error"></div>
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="mb-3">
                    <label class="form-label">Type <span class="text-danger">*</span></label>
                    <select name="field_type[]" class="form-control field-type-select">
                        <option value="">-- Select Field Type --</option>
                        <option value="text">Text</option>
                        <option value="email">Email</option>
                        <option value="textarea">Textarea</option>
                        <option value="select">Select</option>
                        <option value="radio">Radio</option>
                        <option value="checkbox">Checkbox</option>
                        <option value="number">Number</option>
                        <option value="date">Date</option>
                        <option value="file">File Upload</option>
                    </select>
                    <div class="invalid-feedback field_type_error"></div>
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="mb-3">
                    <label class="form-label">Order</label>
                    <input type="number" name="field_order[]" class="form-control" value="${counter}" min="1">
                </div>
            </div>            
            <div class="col-md-12 col-12 field-options-container" style="display: none;">
                <div class="mb-3">
                    <label class="form-label">Options (comma separated) <span class="text-danger">*</span></label>
                    <textarea class="form-control field-options" name="field_options[]" rows="2" placeholder="e.g., Option 1, Option 2, Option 3"></textarea>
                    <small class="form-text text-muted">Enter options separated by commas (for Select, Radio, Checkbox)</small>
                    <div class="invalid-feedback field_options_error"></div>
                </div>
            </div>            
            <div class="col-md-6 col-12">
                <div class="mb-3">
                    <div class="form-check">
                        <input type="checkbox" name="field_required[]" value="true" class="form-check-input required-checkbox" id="field_required_${counter}">
                        <label class="form-check-label" for="field_required_${counter}">Required Field</label>
                    </div>
                </div>
            </div>            
            <div class="col-md-6 col-12">
                <div class="d-flex justify-content-end">
                    <button type="button" class="btn btn-danger btn-sm remove-field-btn" ${
                        fieldCounter === 1 ? "disabled" : ""
                    }>
                        <i class="ti ti-trash me-1"></i> Remove Field
                    </button>
                </div>
            </div>
        </div>`;
    }

    function addField() {
        fieldCounter++;
        const fieldHtml = generateFieldHtml(fieldCounter);
        $(".field_name_append_here").append(fieldHtml);
        if (fieldCounter > 1) {
            $(".remove-field-btn").prop("disabled", false);
        }
    }

    $(document).on("click", "#addFieldBtn", function () {
        addField();
    });

    $(document).on("click", ".remove-field-btn", function () {
        if (fieldCounter > 1) {
            $(this).closest(".field-row").remove();
            fieldCounter--;
            $(".field-row").each(function (index) {
                $(this)
                    .find("h6")
                    .html(
                        `Field ${index + 1} <span class="text-danger">*</span>`
                    );
                $(this).data("index", index + 1);
                $(this)
                    .find('input[name="field_order[]"]')
                    .val(index + 1);
            });
            if (fieldCounter === 1) {
                $(".remove-field-btn").prop("disabled", true);
            }
        }
    });

    $(document).on("change", ".field-type-select", function () {
        const $fieldRow = $(this).closest(".field-row");
        const fieldType = $(this).val();
        const $optionsContainer = $fieldRow.find(".field-options-container");
        const $optionsTextarea = $fieldRow.find(".field-options");

        if (
            fieldType === "select" ||
            fieldType === "radio" ||
            fieldType === "checkbox"
        ) {
            $optionsContainer.show();
            $optionsTextarea.prop("required", true);
        } else {
            $optionsContainer.hide();
            $optionsTextarea.prop("required", false);
            $optionsTextarea.val("");
        }
    });

    /* Add first field automatically when modal opens */
    $(document).on("shown.bs.modal", "#commanModel", function () {
        if ($(".field_name_append_here").children().length === 0) {
            fieldCounter = 0;
            addField();
        }
    });
});

/* Form submit */
/* Form submit */
$(document)
    .off("submit", "#addLeadForm")
    .on("submit", "#addLeadForm", function (event) {
        event.preventDefault();
        var form = $(this);
        var submitButton = form.find('button[type="submit"]');
        $(".form-control").removeClass("is-invalid");
        $(".invalid-feedback").empty();
        submitButton
            .prop("disabled", true)
            .html(
                '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Saving...'
            );
        var formData = new FormData(this);
        var fieldOptions = [];
        $(".field-row").each(function (index) {
            var $row = $(this);
            var $type = $row.find(".field-type-select");
            var $options = $row.find(".field-options");
            if (
                $type.val() === "select" ||
                $type.val() === "radio" ||
                $type.val() === "checkbox"
            ) {
                fieldOptions[index] = $options.val();
            } else {
                fieldOptions[index] = "";
            }
        });
        fieldOptions.forEach(function (value, index) {
            formData.append("field_options[]", value);
        });

        $.ajax({
            url: form.attr("action"),
            type: "POST",
            data: formData,
            processData: false,
            contentType: false,
            success: function (response) {
                submitButton.prop("disabled", false);
                submitButton.html("Submit");

                if (response.status === "success") {
                    if (response.formsListData) {
                        $(".display-forms-list-html").html(
                            response.formsListData
                        );
                        feather.replace();
                    }

                    var apiResponse = response.api_response;
                    var successMessage = response.message;

                    if (apiResponse && apiResponse.form) {
                        var formTitle = apiResponse.form.title || "Form";
                        var formsId = apiResponse.form.formsId || "N/A";
                        var fieldCount = apiResponse.form.fields
                            ? apiResponse.form.fields.length
                            : 0;

                        successMessage = `✅ ${formTitle} created successfully!<br>
                                     Form ID: ${formsId}<br>
                                     Total Fields: ${fieldCount}`;
                    }

                    form[0].reset();
                    $("#commanModel").modal("hide");
                    $(".field_name_append_here").empty();
                    fieldCounter = 0;

                    Toastify({
                        text: successMessage,
                        duration: 10000,
                        gravity: "top",
                        position: "right",
                        className: "bg-success",
                        escapeMarkup: false,
                        close: true,
                        onClick: function () {},
                    }).showToast();

                    if (typeof loadFormList === "function") {
                        loadFormList();
                    }
                }
            },
            error: function (xhr, status, error) {
                submitButton.prop("disabled", false);
                submitButton.html("Submit");

                // Show error toast
                if (xhr.responseJSON && xhr.responseJSON.message) {
                    Toastify({
                        text: xhr.responseJSON.message,
                        duration: 10000,
                        gravity: "top",
                        position: "right",
                        className: "bg-danger",
                        escapeMarkup: false,
                        close: true,
                    }).showToast();
                }

                // Clear previous errors
                $(".form-control").removeClass("is-invalid");
                $(".invalid-feedback").empty();

                // Display validation errors
                var errors = xhr.responseJSON.errors;
                if (errors) {
                    $.each(errors, function (key, value) {
                        // Handle array field errors (e.g., field_label.0, field_options.1)
                        if (key.includes(".")) {
                            var parts = key.split(".");
                            var fieldName = parts[0];
                            var index = parts[1];

                            // Find the specific field row
                            var $fieldRow = $(".field-row").eq(index);
                            if ($fieldRow.length) {
                                // Find the appropriate input and error container
                                if (fieldName === "field_options") {
                                    $fieldRow
                                        .find(".field-options")
                                        .addClass("is-invalid");
                                    $fieldRow
                                        .find(".field_options_error")
                                        .text(value[0]);
                                } else if (fieldName === "field_label") {
                                    $fieldRow
                                        .find(".field-label")
                                        .addClass("is-invalid");
                                    $fieldRow
                                        .find(".field_label_error")
                                        .text(value[0]);
                                } else if (fieldName === "field_type") {
                                    $fieldRow
                                        .find(".field-type-select")
                                        .addClass("is-invalid");
                                    $fieldRow
                                        .find(".field_type_error")
                                        .text(value[0]);
                                }
                            }
                        } else {
                            var $input = $("#" + key);
                            var $errorElement = $("#" + key + "_error");

                            if ($input.length && $errorElement.length) {
                                $input.addClass("is-invalid");
                                $errorElement.text(value[0]);
                            }
                        }
                    });
                }
            },
        });
    });
