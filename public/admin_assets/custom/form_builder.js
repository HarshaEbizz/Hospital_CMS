
var fbEditor = document.getElementById('form_bulider_data');
var defaultFields = $('#get_form_details').val();

if(fbEditor != null && defaultFields == 0){
    var formBuilder = $(fbEditor).formBuilder();
}else if(fbEditor != null && defaultFields != ''){
    var container = document.getElementById("form_bulider_data");
    var defaultFields = JSON.parse($('#get_form_details').val())

    var options = {
        defaultFields,
    };

    var formBuilder = $(container).formBuilder(options);
}



$(document).ready(function () {
    $("form[name='add_form_builder']").on('submit', function (e) {
        e.preventDefault();
    }).validate({
        debug: false,
        ignore: [],
        rules: {
            form_name: {
                required: true,
                maxlength: 30,
                normalizer: function (value) {
                    return $.trim(value);
                },
            },
        },
        messages: {
            form_name: {
                // required: "First Name is required",
                maxlength: "Form Name is too big",
            },
        },
        submitHandler: function (form) {
            // var form_data = new FormData(form)
            var form_name = $('#form_name').val();

            $.ajax({
                url: $(form).attr("action"),
                type: 'POST',
                data: {
                        'form_name_check': form_name,
                        'form_details': formBuilder.formData
                },
                dataType: 'json',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (response) {
                    if (response.success) {
                        $.notify(response.message, {
                            type: 'success'
                        });
                        window.location.href = base_url + '/admin/form_builder';
                    }else if (!response.success) {
                        $.notify(response.message, {
                            type: 'danger'
                        });
                    } else {
                        $.notify('Something went wrong', {
                            type: 'danger'
                        });
                    }
                }
            });
        }
    });

    $("form[name='edit_form_builder']").on('submit', function (e) {
        e.preventDefault();
    }).validate({
        debug: false,
        ignore: [],
        rules: {
            form_name: {
                required: true,
                maxlength: 30,
                normalizer: function (value) {
                    return $.trim(value);
                },
            },
        },
        messages: {
            form_name: {
                // required: "First Name is required",
                maxlength: "Form Name is too big",
            },
        },
        submitHandler: function (form) {
            // var form_data = new FormData(form)
            var form_name = $('#form_name').val();
            // console.log(formBuilder);
            // return;
            $.ajax({
                url: $(form).attr("action"),
                type: 'PUT',
                data: {
                        'form_name_check': form_name,
                        'form_details': formBuilder.formData
                },
                dataType: 'json',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (response) {
                    if (response.success) {
                        $.notify(response.message, {
                            type: 'success'
                        });
                        window.location.href = base_url + '/admin/form_builder';
                    }else if (!response.success) {
                        $.notify(response.message, {
                            type: 'danger'
                        });
                    } else {
                        $.notify('Something went wrong', {
                            type: 'danger'
                        });
                    }
                }
            });
        }
    });

    let table = $('.form_builder_list');
    /*console.log(table);*/
    document.dataTable = table.DataTable({
        dom: 'Bfrtp',
        processing: true,
        serverSide: true,
        responsive: true,
        destroy: true,
        "order": [],
        ajax: {
            url: base_url + '/admin/form_builder/form_list',
            type: 'post'
        },
        columns: [{
            data: 'DT_RowIndex',
            orderable: false,
            searchable: false
        },
        {
            data: 'form_name',
        },
        {
            data: 'actions',
            orderable: false,
            searchable: false
        },
        ]
    });

});
