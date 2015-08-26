function read(a)
{
    $("#qr-value").text(a);
    // Retrieve Customer Details
    $.ajax({
        url: '/admin/user/customerforcashier',
        type: "get",
        data: {thc: a},
        success: customer_details,
        dataType: 'json'
    });
}

// Customer Details Callback
function customer_details(data){
    var customer_photo = $('#customer_photo');
    var thc = $('#thc');
    var firstname = $('#firstname');
    var lastname = $('#lastname');
    var email = $('#email');
    var phone = $('#phone');
    var hostel_address = $('#hostel_address');

    customer_photo.html('<img src="' + data.profile.photo_path + '" alt="Customer Photo" height="150">');
    thc.html('<strong>' + data.thc + '</strong>');
    firstname.html('<strong>' + data.firstname + '</strong>');
    lastname.html('<strong>' + data.lastname + '</strong>');
    email.html('<strong>' + data.email + '</strong>');
    phone.html('<strong>' + data.phone + '</strong>');
    hostel_address.html('<strong>' + data.profile.hostel_address + '</strong>');

    //console.log(data);

}

qrcode.callback = read;