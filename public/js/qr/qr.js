function read(a)
{
    //$("#qr-value").text(a);
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

    // Audio Experiment
    var audio = $('#audioBeep').attr('src','/audio/beep.mp3')[0];
    audio.play();

    var customer_photo = $('#customer_photo');
    var thc = $('#thc');
    var account_balance = $('#account_balance');
    var firstname = $('#firstname');
    var lastname = $('#lastname');
    var email = $('#email');
    var phone = $('#phone');
    var hostel_address = $('#hostel_address');
    var formattedNumber = numeral(data.payment.account_balance).format('0,0');

    var custId = $('#customerId');

    customer_photo.html('<img src="' + data.profile.photo_path + '" alt="Customer Photo" height="150">');
    thc.html('<strong>' + data.thc + '</strong>');
    account_balance.html('<strong>&#8358; ' + formattedNumber + '</strong>');
    firstname.html('<strong>' + data.firstname + '</strong>');
    lastname.html('<strong>' + data.lastname + '</strong>');
    email.html('<strong>' + data.email + '</strong>');
    phone.html('<strong>' + data.phone + '</strong>');
    hostel_address.html('<strong>' + data.profile.hostel_address + '</strong>');
    custId.val(data.id);

    //console.log(orderAmount);

}

qrcode.callback = read;