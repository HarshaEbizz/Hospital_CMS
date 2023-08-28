$(document).ready(function () {
    let inquirys_list = $('#inquirys_list');
    /*console.log(table);*/
    document.dataTable = inquirys_list.DataTable({
        dom: 'Bfrtp',
        processing: true,
        serverSide: true,
        responsive: true,
        destroy: true,
        "order": [],
        ajax: {
            url: base_url + '/admin/contact/inquirys_list',
            type: 'post'
        },
        columns: [{
            data: 'DT_RowIndex',
            orderable: false,
            searchable: false
        },
        {
            data: 'full_name',
        },
        {
            data: 'email',
            name: 'email'
        },
        {
            data: 'mobile_no',
        },
        {
            data: 'country_name',
            name: 'country'
        },
        {
            data: 'state_name',
            name: 'state'
        },
        {
            data: 'speciality',
            name: 'speciality'
        },
        {
            data: 'actions',
            orderable: false,
            searchable: false
        },
        ]
    });

    inquirys_list.on('click', '.edit-link', function (e) {
        e.preventDefault();
        let link = this;

        $.ajax({
            url: link.href,
            type: 'get',
            dataType: 'json',
            success: function (response) {
                console.log(response.state.name)
                let elem = document.getElementById('show_inquiry_form');
                elem.setAttribute("action", base_url + '/admin/contact_us/' + response.id)

                $('#show_inquiry_popup').modal('show');

                $('#edit_first_name').val(response.first_name);
                $('#edit_last_name').val(response.last_name);
                $('#edit_email').val(response.email);
                // $('#edit_country_code').val(response.country_code);
                $('#edit_contact').val('+' + response.country_code + ' ' + response.mobile_no);
                $('#edit_address').val(response.address);
                $('#edit_country').val(response.country.name);
                $('#edit_state').val(response.state.name);
                $('#edit_questions').val(response.your_question);
                $('#edit_speciality').val(response.speciality.name);

                var file_link = base_url.replace('/public', '') + '/storage/app/public/uploads/contact_us/' + response.reports_file;
                // $('#edit_report_view').attr('src', source);
                document.getElementById("edit_report_view").href = file_link
            },
            error: function (response) {
                let errors = response.responseJSON.errors;

                if (errors) {
                    $.notify(Object.values(errors)[0], { type: 'danger' });
                }
            }
        })

    });

    let contact_form_contain = $('#contact_form_contain');
    /*console.log(table);*/
    document.dataTable = contact_form_contain.DataTable({
        dom: 'Bfrtp',
        processing: true,
        serverSide: true,
        responsive: true,
        destroy: true,
        "order": [],
        ajax: {
            url: base_url + '/admin/contain/list',
            type: 'post'
        },
        columns: [{
            data: 'DT_RowIndex',
            orderable: false,
            searchable: false
        },
        {
            data: 'address',
            name: 'address'
        },
        {
            data: 'phone_number',
            name: 'phone_number'
        },
        {
            data: 'opening_timing',
            name: 'opening_timing'
        },
        {
            data: 'actions',
            orderable: false,
            searchable: false
        },
        ]
    });

    contact_form_contain.on('click', '.edit-link', function (e) {
        e.preventDefault();
        let link = this;

        $.ajax({
            url: link.href,
            type: 'get',
            dataType: 'json',
            success: function (response) {
                let elem = document.getElementById('update_contact_form_contain');
                elem.setAttribute("action", base_url + '/admin/contact_us/' + response.id)

                $('#update_contact_model').modal('show');
                $('#address').val(response.address);
                $('#phone_number').val(response.phone_number);

                if (response.opening_timing == 12) {
                    $('#12').prop('checked', true);
                } else {
                    $('#24').prop('checked', true);
                }
            },
            error: function (response) {
                let errors = response.responseJSON.errors;

                if (errors) {
                    $.notify(Object.values(errors)[0], { type: 'danger' });
                }
            }
        })

    });
});

$(document).ajaxComplete(function () {
    $('input[type=checkbox][data-toggle^=toggle]').bootstrapToggle();

    $("form[name='update_contact_form_contain']").on('submit', function (e) {
        e.preventDefault();
    }).validate({
        rules: {
            address: {
                required: true,
                maxlength: 500,
            },
            phone_number: {
                required: true,
                // number: true,
            },
            opening_timing: {
                required: true,
            },
        },
        messages: {
            address: {
                required: "Address required",
                maxlength: "Address is too big",
            },
            phone_number: {
                required: "Phone number required",
                // number: "Please enter Phone number in digits",
            },
            opening_timing: {
                required: "Opening time required",
            },
        },
        submitHandler: function (form) {
            // var form_data = new FormData(form)
            $("#update_contact_form_contain button[type='submit']").attr('disabled', true);
            $.ajax({
                url: $(form).attr("action"),
                type: 'POST',
                data: $('#update_contact_form_contain').serialize(),
                beforeSend: function () {
                    $(".loader").show();
                },
                complete: function () {
                    $(".loader").hide();
                },
                success: function (response) {
                    if (response.success) {
                        $.notify(response.message, {
                            type: 'success'
                        });

                        $("#update_contact_model").modal('hide');
                        $('#contact_form_contain').DataTable().ajax.reload(null, false)
                    } else {
                        $.notify('Something went wrong', {
                            type: 'danger'
                        });
                    }
                }
            });
            $("#update_contact_form_contain button[type='submit']").attr('disabled', false);
        }
    });
});
