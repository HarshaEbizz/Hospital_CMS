function image_crop(image_element_name) {
    let cropper = '';
    var image = document.getElementById('sample_image');
    var $modal = $('#ImageCropmodal');
    var files = event.target.files;
    var done = function (url) {
        image.src = url;
        $modal.modal('show');
    };

    if (files && files.length > 0) {
        reader = new FileReader();
        reader.onload = function (event) {
            done(reader.result);
        };
        reader.readAsDataURL(files[0]);
    }

    $('#img_tag').val(image_element_name)
    $modal.on('shown.bs.modal', function () {
        cropper = new Cropper(image, {
            // aspectRatio: 1,
            // viewMode: 3,
            preview: '.preview',
        });
    }).on('hidden.bs.modal', function () {
        cropper.destroy();
        cropper = null;
        // $modal.find("#crop").off();
    });
    $modal.find("#crop").on("click", function () {
        canvas = cropper.getCroppedCanvas({
            width: 400,
            height: 400
        });
        $modal.modal('hide');
        if (canvas) {
            const dataURL = canvas.toDataURL();
            var url_tag = $('#img_tag').val().replace('#', '')
            $('#' + url_tag + '_url').val(dataURL);
        }
    });
    $modal.find("#close_crop_img_modal").on("click", function () {
        var url_tag = $('#img_tag').val().replace('#', '')
        $('#' + url_tag).val('');
    });
}

function openCertModal(cert_id) {
    $.ajax({
        type: 'GET',
        url: base_url + '/get/certificate/' + cert_id,
        success: function (response) {
            if (response.success) {
                $(".modal-body").html('');
                var title = "Certificate of " + response.data.certificate_title;
                 if(response.data.detail){
                    var details = response.data.detail
                }else{
                    var details = ''
                }
                var photo_url = base_url.replace("/public", "") + "/storage/" + response.data.image_path + response.data.image_name;
                var data = '<div class="row"><div class="col-lg-6"><img src="'+photo_url+'" class="img-fluid cert_img" alt=""></div><div class="col-lg-6"><div class="mod_content"><h4 class="cert_title">'+title+'</h4><p class="mod_details">'+details+'</p></div></div></div>';
                $(".modal-body").append(data);
                $("#certifi_mod").modal('show');
            } else if (!response.success) {
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
function OpenPlanImg(plan_id) {
    $.ajax({
        type: 'GET',
        url: base_url + '/get/checkup_plan/' + plan_id,
        success: function (response) {
            if (response.success) {
                $(".modal-body").html('');
                var image,img,img1,img2,data='';
                image = unserialize(response.data.file_name);
                var img,img1,img2,data='';
                if (image.length == 1) {
                    $('.modal-dialog').removeClass('modal-dialog-centered');
                    $('.modal-dialog').removeClass('custom-modal-dialog');
                    $('.modal-dialog').addClass('modal-dialog-centered custom-modal-dialog');
                    img = base_url.replace("/public", "") + "/storage/" + response.data.file_path + image
                    data = '<div><img class="img-fluid w-100" id="plan_img" alt="" src="' + img + '" ></div>'
                    $(".modal-body").append(data);
                } else {
                    $('.modal-dialog').removeClass('modal-dialog-centered');
                    $('.modal-dialog').removeClass('custom-modal-dialog');
                    $('.modal-dialog').addClass('modal-dialog-centered ');
                    img1 = base_url.replace("/public", "") + "/storage/" + response.data.file_path + image[0]
                    img2 = base_url.replace("/public", "") + "/storage/" + response.data.file_path + image[1]
                    data = '<div class="row"><div class="col-lg-6"><img src="' + img1 + '" class="img-fluid w-100" alt=""></div><div class="col-lg-6"><img src="' + img2 + '" class="img-fluid w-100" alt=""></div></div>'
                    $(".modal-body").append(data);
                }
                $("#helth_mod").modal('show');
            } else if (!response.success) {
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
function OpenDoctorModel(doc_id) {
    $.ajax({
        type: 'GET',
        url: base_url + '/get_doctor_data/' + doc_id,
        success: function (response) {
            if (response.success) {
                var prefix = '';
                if(response.data[0].prefix != null){
                    prefix = response.data[0].prefix;
                }else{
                    prefix = '';
                }
                img = base_url.replace("/public", "") + "/storage/" + response.data[0].image_path + response.data[0].profile_photo
                $("#DoctorDataModel .img-fluid").attr('src',img)
                $("#DoctorDataModel .img-fluid").attr('title',prefix+" "+response.data[0].full_name)
                $("#DoctorDataModel .our_dr_name").html(prefix+" "+response.data[0].full_name)
                $("#DoctorDataModel .qualification").html(response.data[0].qualification)
                $("#DoctorDataModel .experience_tab").addClass('active');
                $("#DoctorDataModel .experience").addClass('active show');
                $("#DoctorDataModel .highlight_tab").removeClass('active');
                $("#DoctorDataModel .highlight").removeClass('active show');
                $("#DoctorDataModel .experience_tab").attr('data-bs-target',"#experience_"+response.data[0].id)
                $("#DoctorDataModel .highlight_tab").attr('data-bs-target',"#highlight_"+response.data[0].id)
                $("#DoctorDataModel .experience").attr('id',"#experience_"+response.data[0].id)
                $("#DoctorDataModel .highlight").attr('id',"#highlight_"+response.data[0].id)
                $("#DoctorDataModel .experience").html(response.data[0].experience)
                $("#DoctorDataModel .highlight").html(response.data[0].professional_highlight)
                $("#DoctorDataModel .morning_timeing").html("Morning Timing <br>" +response.data[1])
                $("#DoctorDataModel .evening_timeing").html("Evening Timing <br>" +response.data[2])
                $("#DoctorDataModel").modal('show');
            } else if (!response.success) {
                $.notify(response.message, {
                    type: 'danger'
                });
            } else {
                $.notify('Something went wrong', {
                    type: 'danger'
                });
            }
        }
    })
}


function openJobOpeningModal(opening_id) {
    $.ajax({
        type: 'GET',
        url: base_url + '/get/job_opening/' + opening_id,
        success: function (response) {
            if (response.success) {
                $("#job_details_model #job_id").attr('data-id', response.data.id)
                $("#job_details_model #department_name").html(response.data.department_name)
                $("#job_details_model #designation").html(response.data.designation)
                $("#job_details_model #location").html(response.data.location)
                $("#job_details_model #opening").html(response.data.opening)
                $("#job_details_model #experience").html(response.data.experience)
                $("#job_details_model #qualification").html(response.data.qualification)
                $("#job_details_model #description").html(response.data.description)
                $("#job_details_model").modal('show');
            } else if (!response.success) {
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
function openJobFormModal(opening_id) {
    $("#job_form_model").modal('show');
    $("#job_form_model #job_openning_id").val(opening_id);
}
function unserialize(data) {
    var that = this,
        utf8Overhead = function (chr) {
            // http://phpjs.org/functions/unserialize:571#comment_95906
            var code = chr.charCodeAt(0);
            if (code < 0x0080) {
                return 0;
            }
            if (code < 0x0800) {
                return 1;
            }
            return 2;
        };
    error = function (type, msg, filename, line) {
        throw new that.window[type](msg, filename, line);
    };
    read_until = function (data, offset, stopchr) {
        var i = 2,
            buf = [],
            chr = data.slice(offset, offset + 1);

        while (chr != stopchr) {
            if ((i + offset) > data.length) {
                error('Error', 'Invalid');
            }
            buf.push(chr);
            chr = data.slice(offset + (i - 1), offset + i);
            i += 1;
        }
        return [buf.length, buf.join('')];
    };
    read_chrs = function (data, offset, length) {
        var i, chr, buf;

        buf = [];
        for (i = 0; i < length; i++) {
            chr = data.slice(offset + (i - 1), offset + i);
            buf.push(chr);
            length -= utf8Overhead(chr);
        }
        return [buf.length, buf.join('')];
    };
    _unserialize = function (data, offset) {
        var dtype, dataoffset, keyandchrs, keys, contig,
            length, array, readdata, readData, ccount,
            stringlength, i, key, kprops, kchrs, vprops,
            vchrs, value, chrs = 0,
            typeconvert = function (x) {
                return x;
            };

        if (!offset) {
            offset = 0;
        }
        dtype = (data.slice(offset, offset + 1))
            .toLowerCase();

        dataoffset = offset + 2;

        switch (dtype) {
            case 'i':
                typeconvert = function (x) {
                    return parseInt(x, 10);
                };
                readData = read_until(data, dataoffset, ';');
                chrs = readData[0];
                readdata = readData[1];
                dataoffset += chrs + 1;
                break;
            case 'b':
                typeconvert = function (x) {
                    return parseInt(x, 10) !== 0;
                };
                readData = read_until(data, dataoffset, ';');
                chrs = readData[0];
                readdata = readData[1];
                dataoffset += chrs + 1;
                break;
            case 'd':
                typeconvert = function (x) {
                    return parseFloat(x);
                };
                readData = read_until(data, dataoffset, ';');
                chrs = readData[0];
                readdata = readData[1];
                dataoffset += chrs + 1;
                break;
            case 'n':
                readdata = null;
                break;
            case 's':
                ccount = read_until(data, dataoffset, ':');
                chrs = ccount[0];
                stringlength = ccount[1];
                dataoffset += chrs + 2;

                readData = read_chrs(data, dataoffset + 1, parseInt(stringlength, 10));
                chrs = readData[0];
                readdata = readData[1];
                dataoffset += chrs + 2;
                if (chrs != parseInt(stringlength, 10) && chrs != readdata.length) {
                    error('SyntaxError', 'String length mismatch');
                }
                break;
            case 'a':
                readdata = {};

                keyandchrs = read_until(data, dataoffset, ':');
                chrs = keyandchrs[0];
                keys = keyandchrs[1];
                dataoffset += chrs + 2;

                length = parseInt(keys, 10);
                contig = true;

                for (i = 0; i < length; i++) {
                    kprops = _unserialize(data, dataoffset);
                    kchrs = kprops[1];
                    key = kprops[2];
                    dataoffset += kchrs;

                    vprops = _unserialize(data, dataoffset);
                    vchrs = vprops[1];
                    value = vprops[2];
                    dataoffset += vchrs;

                    if (key !== i)
                        contig = false;

                    readdata[key] = value;
                }

                if (contig) {
                    array = new Array(length);
                    for (i = 0; i < length; i++)
                        array[i] = readdata[i];
                    readdata = array;
                }

                dataoffset += 1;
                break;
            default:
                error('SyntaxError', 'Unknown / Unhandled data type(s): ' + dtype);
                break;
        }
        return [dtype, dataoffset - offset, typeconvert(readdata)];
    };

    return _unserialize((data + ''), 0)[2];
}

function openRegisterModel(event_id){
    $.ajax({
        type: 'GET',
        url: base_url + '/get/event/' + event_id,
        success: function (response) {
            if (response.success) {
                $("#reg_form_content").html(response.html);
                var formData = response.fields;
                var formRenderOptions = {formData};
                $('#form_fields').formRender(formRenderOptions);

            } else if (!response.success) {
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

var otp = '';
$(document).on('submit','form.event_form_submit',function(e){
    // code
    e.preventDefault();
    otp =  Math.floor(100000 + Math.random() * 900000);
    //console.log(otp);
    //return false;
    if ($('#event_form_submit').find('input[name="mobile"]').length > 0) {
        $('#registerModal').modal('hide');
        var mobile =  $("#event_form_submit input[name='mobile']").val();
        // send OTP
        /*var settings = {
            "url": "https://sms.mobileadz.in/api/push.json?apikey=5c076a2097ddc&route=transactional&sender=Kiranh&mobileno="+ mobile +"&text=Your Registration No is "+ otp +" for Phase 2 Opening Ceremony of Kiran Hospital",
            "method": "POST",
            "timeout": 0,
        };

        $.ajax(settings).done(function (response) {
            $('#otp_model').modal('show');
            $.notify('OTP sent successfully.', {
                type: 'success'
            });
        });*/

        var xhr = new XMLHttpRequest();
        xhr.withCredentials = true;

        xhr.addEventListener("readystatechange", function() {
            if(this.readyState === 4) {
                $('#otp_model').modal('show');
                $.notify('OTP sent successfully.', {
                    type: 'success'
                });
            }
        });

        xhr.open("POST", "http://sms.mobileadz.in/api/push.json?apikey=5c076a2097ddc&route=transactional&sender=Kiranh&mobileno="+ mobile +"&text=Your%20Registration%20No%20is%20"+ otp +"%20for%20Phase%202%20Opening%20Ceremony%20of%20Kiran%20Hospital");
        xhr.send();

    } else {
        //form submits
        $.ajax({
            type: 'POST', // we will post something
            dataType: 'json', // and we want to catch the server response as json
            url: base_url + '/save/event', // write your post url here
            data: $('#event_form_submit').serialize(), // give an id to your form and serialize it. this will prepeare the form fields to post like &field1=lol&field2=lollol ...
            success: function(response) { // data will give you server request as json
                if (response.success) {
                    $('#registerModal').modal('hide');
                    $.notify('Form submited successfully', {
                        type: 'success'
                    });
                }else{
                    $.notify('Failed Please try after some time', {
                        type: 'danger'
                    });
                }
            },
            failure: function (response) {
                // handle your Ajax request's failure in here
                $.notify('Failed Please try after some time', {
                    type: 'danger'
                });
            }
        });
    }
});

$(document).on('submit','form.otp_form_submit',function(e){
    e.preventDefault();
    $('#show_error_otp').hide();
    //var entered_otp =  $("#otp_form_submit input[name='otp_number']").val();

    var x = document.getElementsByClassName("otp");
    var digits = $.map(x, function(element) {
        return element.value;
    });

    var entered_otp = digits.join('');

    if(otp == entered_otp){
        $.ajax({
            type: 'POST', // we will post something
            dataType: 'json', // and we want to catch the server response as json
            url: base_url + '/save/event', // write your post url here
            data: $('#event_form_submit').serialize(), // give an id to your form and serialize it. this will prepeare the form fields to post like &field1=lol&field2=lollol ...
            success: function(response) { // data will give you server request as json
                if (response.success) {
                    $('#otp_model').modal('hide');
                    $('#registerModal').modal('hide');

                    $.notify('Form submited successfully', {
                        type: 'success'
                    });
                }else{
                    $.notify('Failed Please try after some time', {
                        type: 'danger'
                    });
                }
            },
            failure: function (response) {
                // handle your Ajax request's failure in here
                $.notify('Failed Please try after some time', {
                    type: 'danger'
                });
            }
        });
    }else{
        $('#show_error_otp').show();
    }
});
