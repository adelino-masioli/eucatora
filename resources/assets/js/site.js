//functions details product
function selectOption(optionid, id, name, price){
    if($('#btn-config-options-'+id).hasClass('active')){
        //minus price
        $('#btn-config-options-'+id).removeClass('active');
        $('#opt_'+optionid).text('');
        if($('#btn-config-options-'+id+' i').hasClass('fa-check-circle')){
            $('#btn-config-options-'+id+' i').removeClass('fa-check-circle');
            $('#btn-config-options-'+id+' i').addClass('fa-circle-thin');
        }

        var product_price = parseFloat($('#product_price').text()) -  parseFloat($('#selectvalueopt-' + optionid).text());

        $('#product_show_price').text(fixMoney(product_price, 2));
        $('#product_price').text(parseFloat(product_price));

        $('#selectvalueopt-' + optionid).text('0.00');
    }else{
        //sum price
        $('.option-btns-'+optionid+ ' .btn').removeClass('active');
        $('#btn-config-options-'+id).addClass('active');
        $('#opt_'+optionid).text(name);

        if($('#btn-config-options-'+id+' i').hasClass('fa-circle-thin') || $('#btn-config-options-'+id+' i').hasClass('fa-check-circle')){
            $('.option-btns-'+optionid+ ' .btn i').removeClass('fa-circle-thin');
            $('.option-btns-'+optionid+ ' .btn i').addClass('fa-circle-thin');
            $('#btn-config-options-'+id+' i').removeClass('fa-circle-thin');
            $('#btn-config-options-'+id+' i').addClass('fa-check-circle');
        }

        //reset values
        var product_price = parseFloat($('#product_price').text()) -  parseFloat($('#selectvalueopt-' + optionid).text());
        $('#product_price').text(product_price);

        var product_price = parseFloat($('#product_price').text()) +  parseFloat(price);


        $('#product_show_price').text(fixMoney(product_price, 2));
        $('#product_price').text(product_price);

        $('#selectvalueopt-' + optionid).text(price);
    }
}

function fixMoney(n, dp) {
    //function convert currence
    var s = '' + (Math.floor(n)), d = n % 1, i = s.length, r = '';
    while ((i -= 3) > 0) {
        //dot
        r = '.' + s.substr(i, 3) + r;
    }
    var rest = Math.round(d * Math.pow(10, dp || 2));
    var rest_len = rest.toString().length;
    if(rest_len < dp) {
        rest = '0'.repeat(dp - rest_len) + rest;
    }
    //replace (,)
    return s.substr(0, i + 3) + r + (rest ? ',' + rest : '');
}

function gotoScrollTop(div) {
    //$(div).scrollTop(1000);
    $('html, body').animate({
        scrollTop: $(div).offset().top - 100
    }, 1000);
    return false;
}


//only number
function onlyNumber(input) {
    $(input).on('keypress input', function() {
        var value = $(this).val();
        value = value.replace(/\D+/, '');
        $(this).val(value);
    });
}

//notify
function notifyAlerts(message, icon, type) {
    $.notify({
        icon: icon,
        message: message,
        animate: {
            enter: 'animated zoomInDown',
            exit: 'animated zoomOutUp'
        }
    },{
        type: type
    });
}

//alerts
function alertExplode(title, msg, type, btntype, btntext) {
    swal({
        title: title,
        text: msg,
        type: type,
        confirmButtonClass: btntype,
        confirmButtonText: btntext,
        closeOnConfirm: false
    });
}