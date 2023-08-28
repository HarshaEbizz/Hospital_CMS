function image_crop(image_element_name) {
    let cropper = "";
    var image = document.getElementById("sample_image");
    var $modal = $("#ImageCropmodal");
    var files = event.target.files;
    var ele_name = image_element_name.replace("#", "");
    var done = function (url) {
        image.src = url;
        image.onload = function () {
            var height = this.height;
            var width = this.width;
        };
        $modal.modal("show");
    };
    if (files && files.length > 0) {
        reader = new FileReader();
        reader.onload = function (event) {
            done(reader.result);
        };
        reader.readAsDataURL(files[0]);
    }

    $("#img_tag").val(image_element_name);
    $modal
        .on("shown.bs.modal", function () {
            if ($("#img_tag").val().replace("#", "").includes("cover_image")) {
                cropper = new Cropper(image, {
                    aspectRatio: 16 / 4.5,
                    preview: ".preview",
                    cropBoxResizable: false,
                    dragMode: "move",
                    cropBoxMovable: false,
                    viewMode: 1,
                    built: function () {
                        image.cropper("setCropBoxData", {
                            width: 1920,
                            height: 540,
                        });
                    },
                });
            } else if (
                $("#img_tag").val().replace("#", "").includes("upload_image")
            ) {
                cropper = new Cropper(image, {
                    aspectRatio: 1 / 1.5,
                    preview: ".preview",
                    cropBoxResizable: false,
                    dragMode: "move",
                    cropBoxMovable: false,
                    viewMode: 1,
                    built: function () {
                        image.cropper("setCropBoxData", {
                            width: 198,
                            height: 273,
                        });
                    },
                });
            } else {
                cropper = new Cropper(image, {
                    preview: ".preview",
                    viewMode: 1,
                });
            }
        })
        .on("hidden.bs.modal", function () {
            cropper.destroy();
            cropper = null;
        });
    $modal.find("#crop").on("click", function () {
        canvas = cropper.getCroppedCanvas({
            minWidth: 256,
            minHeight: 256,
            maxWidth: 4096,
            maxHeight: 4096,
            fillColor: "#fff",
            imageSmoothingEnabled: true,
            imageSmoothingQuality: "high",
        });
        $modal.modal("hide");
        if (canvas) {
            const dataURL = canvas.toDataURL();
            var href = window.location.href;
            if (base_url + "/admin/profile" == href) {
                $(".profilr_pic").attr("src", dataURL);
                var url_tag = $("#img_tag").val().replace("#", "");
                $("#" + url_tag + "_url").val(dataURL);
            } else {
                var div = document.createElement("div");
                var img = document.createElement("img");
                div.className = "crop-image-preview-container";
                img.id = "crop-image";
                img.src = dataURL;
                div.append(img);
                var elem = $("#img_tag").val();
                var url_tag = $("#img_tag").val().replace("#", "");
                var pre_tag_class = document.getElementById(url_tag).parentElement.firstElementChild;
                if (pre_tag_class.className.includes("crop-image-preview-container")) {
                    document.getElementById(url_tag).parentElement.firstElementChild.remove();
                }
                $(elem).parent().prepend(div);
                $("#" + url_tag + "_url").val(dataURL);
            }
        }
    });
    $modal.find("#close_crop_img_modal").on("click", function () {
        var url_tag = $("#img_tag").val().replace("#", "");
        $("#" + url_tag).val("");
        var pre_tag_class =
            document.getElementById(url_tag).parentElement.firstElementChild;
        var tag = pre_tag_class.firstElementChild;
        if (pre_tag_class.className.includes("crop-image-preview-container")) {
            if (tag.src.charAt(0) == "d") {
                document
                    .getElementById(url_tag)
                    .parentElement.firstElementChild.remove();
            }
        }
    });
}
