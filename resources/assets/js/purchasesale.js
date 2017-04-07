//purchase
function functionSavePurchase(formid) {
    $(formid).ajaxForm({
        success: function (data) {
            if (data.status == true) {
                //show success
                notifyAlerts(data.response, 'fa fa-check', 'success');
                if(data.url){
                    window.location.replace(data.url);
                }
            } else {
                //show alert fail
                notifyAlerts(data.response,'fa fa-exclamation-circle', 'danger');
            }
        },
        error: function (data) {
            //show erro message and validations
            notifyAlerts(formatErrors(data.responseJSON), 'fa fa-exclamation-circle', 'info');
            return false;
        },
        type: 'post',
        dataType: 'json',
        url: $(formid).attr('action')
    }).submit();
    return false;
}


function addItemPurchase(url) {
    $.ajax({
        type: 'POST',
        url: url,
        data: {product_id: $('#product_id').val(),
            price        : $('#price').val(),
            area         : $('#area').val(),
            meters_square: $('#meters_square').val(),
            meters_stereo: $('#meters_stereo').val(),
            purchase_id  : $('#purchase_id').val(),
            '_token'     : $('#_token').val()},
        success: function (data) {
            obj = JSON.parse(data);
            if (obj.status == true) {
                if(obj.result){
                    updatePurchaseItensTable(obj);
                }
                resetForm('#frmPurchase');
                $('select').selectpicker('refresh');
                //show alert success
                notifyAlerts(obj.response, 'fa fa-check', 'success');
            }else{
                notifyAlerts(obj.response,'fa fa-exclamation-circle', 'danger');
            }
            return false;
        },
        error: function (data) {
            //show erro message and validations
            notifyAlerts(formatErrors(data.responseJSON), 'fa fa-exclamation-circle', 'info');
            return false;
        }
    });
    return false;
}

function destroyItemPurchase(url, id) {
    $.ajax({
        type: 'POST',
        url: url,
        data: {id: id, '_token' : $('#_token').val()},
        success: function (data) {
            obj = JSON.parse(data);
            if (obj.status == true) {
                if(obj.result){
                    updatePurchaseItensTable(obj);
                }
                //show alert success
                notifyAlerts(obj.response, 'fa fa-check', 'success');
            }else{
                notifyAlerts(obj.response,'fa fa-exclamation-circle', 'danger');
            }
            return false;
        },
        error: function (data) {
            //show erro message and validations
            notifyAlerts(formatErrors(data.responseJSON), 'fa fa-exclamation-circle', 'info');
            return false;
        }
    });
    return false;
}

function updatePurchaseItensTable(obj) {
    $('#showResult').html('');
    var div     = '';
    $.each(obj.result, function (i, val) {
        div += '<tr>';
        div += '<td class="col-md-1 text-center"><a href="javascript:void(0);" onclick="destroyItemPurchase(\''+$('#pathdestroy').val()+'\', \''+val.id+'\');" class="btn btn-danger btn-xs"><i class="fa fa-trash" aria-hidden="true"></i></a></td>';
        div += '<td class="col-md-1 text-center">'+val.id+'</td>';
        div += '<td class="col-md-6 text-left">'+val.name+'</td>';
        div += '<td class="col-md-1 text-center">'+val.area+'</td>';
        div += '<td class="col-md-1 text-center">'+val.meters_square+'</td>';
        div += '<td class="col-md-1 text-center">'+val.meters_stereo+'</td>';
        div += '<td class="col-md-1 text-center">'+val.price+'</td>';
        div += '</tr>';
    });
    $('#showResult').append(div);
}


function addTaxePurchase(url) {
    $.ajax({
        type: 'POST',
        url: url,
        data: {
            description     : $('#description_tax').val(),
            price           : $('#price_tax').val(),
            purchase_id     : $('#purchase_id').val(),
            '_token'        : $('#_token').val()},
        success: function (data) {
            obj = JSON.parse(data);
            if (obj.status == true) {
                if(obj.result){
                    updatePurchaseTaxesTable(obj);
                }
                resetForm('#frmPurchase');
                //show alert success
                notifyAlerts(obj.response, 'fa fa-check', 'success');
            }else{
                notifyAlerts(obj.response,'fa fa-exclamation-circle', 'danger');
            }
            return false;
        },
        error: function (data) {
            //show erro message and validations
            notifyAlerts(formatErrors(data.responseJSON), 'fa fa-exclamation-circle', 'info');
            return false;
        }
    });
    return false;
}

function destroyTaxePurchase(url, id) {
    $.ajax({
        type: 'POST',
        url: url,
        data: {id: id, '_token' : $('#_token').val()},
        success: function (data) {
            obj = JSON.parse(data);
            if (obj.status == true) {
                if(obj.result){
                    updatePurchaseTaxesTable(obj);
                }
                //show alert success
                notifyAlerts(obj.response, 'fa fa-check', 'success');
            }else{
                notifyAlerts(obj.response,'fa fa-exclamation-circle', 'danger');
            }
            return false;
        },
        error: function (data) {
            //show erro message and validations
            notifyAlerts(formatErrors(data.responseJSON), 'fa fa-exclamation-circle', 'info');
            return false;
        }
    });
    return false;
}

function updatePurchaseTaxesTable(obj) {
    $('#showResultTax').html('');
    var div     = '';
    $.each(obj.result, function (i, val) {
        div += '<tr>';
        div += '<td class="col-md-1 text-center"><a href="javascript:void(0);" onclick="destroyTaxePurchase(\''+$('#pathdestroytaxe').val()+'\', \''+val.id+'\');" class="btn btn-danger btn-xs"><i class="fa fa-trash" aria-hidden="true"></i></a></td>';
        div += '<td class="col-md-8 text-left">'+val.description+'</td>';
        div += '<td class="col-md-1 text-center">'+val.price+'</td>';
        div += '</tr>';
    });
    $('#showResultTax').append(div);
}





function addItemSale(url) {
    $.ajax({
        type: 'POST',
        url: url,
        data: {product_id: $('#product_id').val(),
            radial       : $('#radial').val(),
            amount_item  : $('#amount_item').val(),
            meters       : $('#meters').val(),
            meters_type  : $('#meters_type').val(),
            price_unit   : $('#price_unit').val(),
            price_total  : $('#price_total').val(),
            purchase_id  : $('#purchase_id').val(),
            sale_id      : $('#sale_id').val(),
            '_token'     : $('#_token').val()},
        success: function (data) {
            obj = JSON.parse(data);
            if (obj.status == true) {
                if(obj.result){
                    updateSaleItensTable(obj);
                }
                resetForm('#frmPurchase');
                $('select').selectpicker('refresh');
                //show alert success
                notifyAlerts(obj.response, 'fa fa-check', 'success');
            }else{
                notifyAlerts(obj.response,'fa fa-exclamation-circle', 'danger');
            }
            return false;
        },
        error: function (data) {
            //show erro message and validations
            notifyAlerts(formatErrors(data.responseJSON), 'fa fa-exclamation-circle', 'info');
            return false;
        }
    });
    return false;
}

function destroyItemSale(url, id) {
    $.ajax({
        type: 'POST',
        url: url,
        data: {id: id, '_token' : $('#_token').val()},
        success: function (data) {
            obj = JSON.parse(data);
            if (obj.status == true) {
                if(obj.result){
                    updateSaleItensTable(obj);
                }
                //show alert success
                notifyAlerts(obj.response, 'fa fa-check', 'success');
            }else{
                notifyAlerts(obj.response,'fa fa-exclamation-circle', 'danger');
            }
            return false;
        },
        error: function (data) {
            //show erro message and validations
            notifyAlerts(formatErrors(data.responseJSON), 'fa fa-exclamation-circle', 'info');
            return false;
        }
    });
    return false;
}


function addShipping(url) {
    $.ajax({
        type: 'POST',
        url: url,
        data: {product_id: $('#product_id').val(),
            price_shipp  : $('#price_shipp').val(),
            sale_id      : $('#sale_id').val(),
            '_token'     : $('#_token').val()},
        success: function (data) {
            obj = JSON.parse(data);
            if (obj.status == true) {
                $('#tbl_subtotal').html(obj.subtotal);
                $('#tbl_total').html(obj.total);

                //show alert success
                notifyAlerts(obj.response, 'fa fa-check', 'success');
            }else{
                notifyAlerts(obj.response,'fa fa-exclamation-circle', 'danger');
            }
            return false;
        },
        error: function (data) {
            //show erro message and validations
            notifyAlerts(formatErrors(data.responseJSON), 'fa fa-exclamation-circle', 'info');
            return false;
        }
    });
    return false;
}


function addDiscount(url) {
    $.ajax({
        type: 'POST',
        url: url,
        data: {product_id: $('#product_id').val(),
            discount  : $('#discount').val(),
            sale_id      : $('#sale_id').val(),
            '_token'     : $('#_token').val()},
        success: function (data) {
            obj = JSON.parse(data);
            if (obj.status == true) {
                $('#tbl_subtotal').html(obj.subtotal);
                $('#tbl_total').html(obj.total);

                //show alert success
                notifyAlerts(obj.response, 'fa fa-check', 'success');
            }else{
                notifyAlerts(obj.response,'fa fa-exclamation-circle', 'danger');
            }
            return false;
        },
        error: function (data) {
            //show erro message and validations
            notifyAlerts(formatErrors(data.responseJSON), 'fa fa-exclamation-circle', 'info');
            return false;
        }
    });
    return false;
}


function updateSaleItensTable(obj) {
    $('#tbl_subtotal').html(obj.subtotal);
    $('#tbl_total').html(obj.total);
    $('#showResult').html('');
    var div     = '';
    $.each(obj.result, function (i, val) {
        div += '<tr>';
        div += '<td class="col-md-1 text-center"><a href="javascript:void(0);" onclick="destroyItemSale(\''+$('#pathdestroy').val()+'\', \''+val.id+'\');" class="btn btn-danger btn-xs"><i class="fa fa-trash" aria-hidden="true"></i></a></td>';
        div += '<td class="col-md-1 text-center">'+val.id+'</td>';
        div += '<td class="col-md-1 text-center">'+val.amount_item+'</td>';
        div += '<td class="col-md-6 text-left">'+val.name+'</td>';
        div += '<td class="col-md-1 text-center">'+val.meters+'</td>';
        div += '<td class="col-md-1 text-center">'+val.meters_type+'</td>';
        div += '<td class="col-md-1 text-center">'+val.price_unit+'</td>';
        div += '<td class="col-md-1 text-center">'+val.price_total+'</td>';
        div += '</tr>';
    });
    $('#showResult').append(div);
}



function addPaymentSale(url) {
    $.ajax({
        type: 'POST',
        url: url,
        data: {
            sale_pay_type    : $('#sale_pay_type').val(),
            sale_pay_number  : $('#sale_pay_number').val(),
            sale_pay_value   : $('#sale_pay_value').val(),
            sale_pay_date    : $('#sale_pay_date').val(),
            sale_id          : $('#sale_id').val(),
            '_token'         : $('#_token').val()},
        success: function (data) {
            obj = JSON.parse(data);
            if (obj.status == true) {
                if(obj.result){
                    updateSalePaymentsTable(obj);
                }
                //show alert success
                notifyAlerts(obj.response, 'fa fa-check', 'success');
            }else{
                notifyAlerts(obj.response,'fa fa-exclamation-circle', 'danger');
            }
            return false;
        },
        error: function (data) {
            //show erro message and validations
            notifyAlerts(formatErrors(data.responseJSON), 'fa fa-exclamation-circle', 'info');
            return false;
        }
    });
    return false;
}

function destroySalePayment(url, id) {
    $.ajax({
        type: 'POST',
        url: url,
        data: {id: id, '_token' : $('#_token').val()},
        success: function (data) {
            obj = JSON.parse(data);
            if (obj.status == true) {
                if(obj.result){
                    updateSalePaymentsTable(obj);
                }
                //show alert success
                notifyAlerts(obj.response, 'fa fa-check', 'success');
            }else{
                notifyAlerts(obj.response,'fa fa-exclamation-circle', 'danger');
            }
            return false;
        },
        error: function (data) {
            //show erro message and validations
            notifyAlerts(formatErrors(data.responseJSON), 'fa fa-exclamation-circle', 'info');
            return false;
        }
    });
    return false;
}


function updateSalePaymentsTable(obj) {
    $('#showResultPayments').html('');
    var div     = '';
    $.each(obj.result, function (i, val) {
        div += '<tr>';
        div += '<td class="col-md-1 text-center"><a href="javascript:void(0);" onclick="destroySalePayment(\''+$('#pathdestroypayment').val()+'\', \''+val.id+'\');" class="btn btn-danger btn-xs"><i class="fa fa-trash" aria-hidden="true"></i></a></td>';
        div += '<td class="col-md-1 text-center">'+val.id+'</td>';
        div += '<td class="col-md-6 text-center">'+val.sale_pay_type+'</td>';
        div += '<td class="col-md-1 text-left">'+val.sale_pay_number+'</td>';
        div += '<td class="col-md-2 text-center">'+val.sale_pay_value+'</td>';
        div += '<td class="col-md-1 text-center">'+val.sale_pay_date+'</td>';
        div += '</tr>';
    });
    $('#showResultPayments').append(div);
}