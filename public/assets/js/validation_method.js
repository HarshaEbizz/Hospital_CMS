$.validator.addMethod("customemail",
    function (value, element) {
        return /^\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/.test(value);
    }, "Please enter a valid email address."
);

$.validator.addMethod("validname", function (value, element) {
    return /^(\u00a9|\u00ae|[\u2000-\u3300]|\ud83c[\ud000-\udfff]|\ud83d[\ud000-\udfff]|\ud83e[\ud000-\udfff])*?[a-zA-Z]+(([',. -][a-zA-Z ])?[a-zA-Z]?[0-9]*?[a-zA-Z]*?(\u00a9|\u00ae|[\u2000-\u3300]|\ud83c[\ud000-\udfff]|\ud83d[\ud000-\udfff]|\ud83e[\ud000-\udfff])*?[a-zA-Z]?[0-9]*)?(\u00a9|\u00ae|[\u2000-\u3300]|\ud83c[\ud000-\udfff]|\ud83d[\ud000-\udfff]|\ud83e[\ud000-\udfff]|[a-zA-Z]|[0-9])*$/
        .test(value);
}, "Please enter valid name");

$.validator.addMethod("extension", function (value, element, param) {
    param = typeof param === "string" ? param.replace(/,/g, '|') : "png|jpe?g|gif";
    return this.optional(element) || value.match(new RegExp(".(" + param + ")$", "i"));
}, "Select valied input file format");

$.validator.addMethod("video_url", function (value, element) {
    regExp =
        /^((?:https?:)?\/\/)?((?:www|m)\.)?((?:youtube\.com|youtu.be))(\/(?:[\w\-]+\?v=|embed\/|v\/)?)([\w\-]+)(\S+)?$/;
    return this.optional(element) || regExp.test(value);
}, "Enter Valid url")

$.validator.addMethod("noSpace", function (value, element) {
    return value == '' || value.trim().length != 0;
}, "No space please and don't leave it empty");

// $.validator.addMethod("nospecialchar", function (value, element) {
//     regExp = /^[A-Za-z0-9\s]*$/;
//     return this.optional(element) || regExp.test(value);
// }, "letters and digits only");

// $.validator.addMethod("nospecialcharnumber", function (value, element) {
//     regExp = /^[A-Za-z]+,?[A-Za-z]+$/;
//     return this.optional(element) || regExp.test(value);
// }, "letter and comma only");

$.validator.addMethod("nospecialcharnumber", function (value, element) {
    regExp = /^[A-Za-z-/_ ,.()'&]*$/;
    return this.optional(element) || regExp.test(value);
}, "Special characters and number not allowed.");

$.validator.addMethod("nospecialchar", function (value, element) {
    regExp = /^[A-Za-z0-9-/_ ,.()'&]*$/;
    return this.optional(element) || regExp.test(value);
}, "Special characters not allowed.");