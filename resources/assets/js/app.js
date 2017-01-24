$(document).ready(function() {
    $(":file").filestyle({
        buttonName: "btn-primary",
        buttonText: "Selecione",
        placeholder: "Selecione um arquivo",
        icon: false
    });
});

//functionSave
function functionSave(formid, divshow, divhide) {
    $(formid).ajaxForm({
        success: function (data) {
            if (data.status == true) {
                //show success
                notifyAlerts(data.response, 'fa fa-check', 'success');
                //reset form
                if ($('#formreset').val() == 'reset') {
                    resetForm(formid);
                    $('input').tagsinput('refresh');
                    $('input').tagsinput('destroy');
                    $('select').selectpicker('refresh');
                }
                if(data.content){
                    if(divshow || divhide){
                        divHideShow(divshow, divhide);
                    }
                    if(data.midias){
                        showContentDataMidia(data.midias);
                    }else{
                        showContentData(data.content);
                    }
                }
                $(":file").filestyle('clear');
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
//confirm action
function confirmActionDestroy(param){
    var urlaction = $('#urlaction').html();
    var msgaction = $('#msgaction').html();
    var sizection = $('#sizection').html();

    bootbox.confirm({
        size: sizection,
        message: msgaction,
        callback: function(result){
            if(result == true){
                if(param!='') {
                    functionDestroy(urlaction, param);
                }else{
                    return false;
                }
            }else{
                console.log('action cancel');
            }
        },
        buttons: {
            confirm: {
                label: "Confirmar"
            },
            cancel: {
                label: "Cancelar",
                className: "btn-danger"
            }
        }

    });
}
//destroy
function functionDestroy(url, id) {
    $.ajax({
        type: 'POST',
        url: url,
        data: {id: id, '_token': $('#_token').val()},
        success: function (data) {
            obj = JSON.parse(data);
            if (obj.status == true) {
                //show alert success
                notifyAlerts(obj.response, 'fa fa-check', 'success');
                funcionRefreshDatatable();
            }else{
                notifyAlerts(obj    .response,'fa fa-exclamation-circle', 'danger');
            }
            return false;
        }
    });
    return false;
}

//duplicate
function functionDuplicate(idrow) {
    var id  = $('.datatable tbody tr td #'+idrow).attr('id');
    var url = $('.datatable tbody tr td #'+idrow).attr('data_url');

    $.ajax({
        type: 'POST',
        url: url,
        data: {id: id, '_token': $('#_token').val()},
        success: function (data) {
            obj = JSON.parse(data);
            if (obj.status == true) {
                //show alert success
                notifyAlerts(obj.response, 'fa fa-check', 'success');
                funcionRefreshDatatable();
            }else{
                notifyAlerts(obj    .response,'fa fa-exclamation-circle', 'danger');
            }
            return false;
        }
    });
    return false;
}

//destroy image
function functionDestroyImage(url, id, divshow, divhide) {
    $.ajax({
        type: 'POST',
        url: url,
        data: {id: id, '_token': $('#_token').val()},
        success: function (data) {
            obj = JSON.parse(data);
            if (obj.status == true) {
                //show alert success
                notifyAlerts(obj.response, 'fa fa-check', 'success');
                divHideShow(divshow, divhide);
                if(obj.count == 0){
                    showNoResult('#showResult');
                }
            }else{
                notifyAlerts(obj    .response,'fa fa-exclamation-circle', 'danger');
            }
            return false;
        }
    });
    return false;
}
//set default image
function functionDefaultImage(url, id, setdiv, transaction) {
    $.ajax({
        type: 'POST',
        url: url,
        data: {id: id, transaction:transaction, '_token': $('#_token').val()},
        success: function (data) {
            obj = JSON.parse(data);
            if (obj.status == true) {
                //show alert success
                notifyAlerts(obj.response, 'fa fa-check', 'success');

                $('.btndefault').removeClass('btn-success');
                $('.btndefault').addClass('btn-default');
                $('.btndefault i').removeClass('fa-thumbs-o-up');
                $('.btndefault i').addClass('fa-thumbs-o-down');

                $(setdiv).removeClass('btn-default');
                $(setdiv).addClass('btn-success');
                $(setdiv+' i').removeClass('fa-thumbs-o-down');
                $(setdiv+' i').addClass('fa-thumbs-o-up');
                return false;
            }else{
                notifyAlerts(obj    .response,'fa fa-exclamation-circle', 'danger');
            }
            return false;
        }
    });
    return false;
}
//set define category
function functionDefineCategory(url, id, setdiv, product_id) {
    $.ajax({
        type: 'POST',
        url: url,
        data: {category_id: id, product_id:product_id, '_token': $('#_token').val()},
        success: function (data) {
            obj = JSON.parse(data);
            if (obj.status == true) {
                //show alert success
                notifyAlerts(obj.response, 'fa fa-check', 'success');
                if(obj.action == false){
                    $(setdiv).removeClass('list-group-item-info');
                }else{
                    $(setdiv).addClass('list-group-item-info');
                }
                return false;
            }else{
                notifyAlerts(obj    .response,'fa fa-exclamation-circle', 'danger');
            }
            return false;
        }
    });
    return false;
}


function showContentDataMidia(midias){
    if(midias != 'false') {
        $('#showResult').html('');
        var div     = '';
        var btntype = '';
        var fatype  = '';
        var divid   = '';
        var btnimg  = '';
        if(midias) {
            $.each(midias, function (i, val) {
                if(val.is_thumb == 'yes'){ btntype = 'btn-success' }else{ btntype = 'btn-default'};
                if(val.is_thumb == 'yes'){ fatype = 'fa-thumbs-o-up'}else{ fatype = 'fa-thumbs-o-down'};
                divid  = '#img_'+val.id;
                btnimg = '#btnimg_'+val.id;

                div += '<div class="col-lg-2" id="img_'+val.id+'">';
                    div += '<div class="thumbnail">';
                        div += '<div class="thumbheight"><img class="img-responsive" src="'+$('#baseurl').val()+'/'+val.path+'/thumb/200_'+val.image+'" alt="'+val.name+'"></div>';
                        div += '<div class="caption">';
                            div +='<div class="btn-group btn-group-justified" role="group" aria-label="btn-midias">';
                                div +='<div class="btn-group" role="group">';
                                    div +='<button type="button" class="btn btndefault '+btntype+'" id="btnimg_'+val.id+'" onclick="functionDefaultImage(\''+$('#pathdefault').val()+'\', \''+val.id+'\', \''+btnimg+'\', \''+$('#transaction').val()+'\');"><i class="fa '+fatype+'" aria-hidden="true"></i> Principal</button>';
                                div += '</div>';
                                div +='<div class="btn-group" role="group">';
                                    div +='<button type="button" class="btn btn-danger" onclick="functionDestroyImage(\''+$('#pathdestroy').val()+'\', \''+val.id+'\', null, \''+divid+'\');"><i class="fa fa-trash" aria-hidden="true"></i> Excluir</button>';
                                div += '</div>';
                            div += '</div>';
                        div += '</div>';
                    div += '</div>';
                div += '</div>';
            });

            $('#showResult').append(div);
        }else{
            showNoResult('#showResult');
        }
        return false;
    }
}
function searchCEP(url, value) {
    $.ajax({
        type: "GET",
        url: url+"/"+$(value).val()
    }).done(function(data){
        if(data) {
            $('#fields_address input').empty();
            obj = JSON.parse(data);
            $('#neighborhood').val(obj.bairro);
            $('#address').val(obj.logradouro);
            $('#complement').val(obj.complemento);
        }
    });
}

//functions orders
//search product
function functionSearchProduct(url) {
    if($('#product_sku').val() != '' || $('#product_name').val() != ''){
        $.ajax({
            type: 'POST',
            url: url,
            data: {sku: $('#product_sku').val(), name: $('#product_name').val(), '_token': $('#_token').val()},
            success: function (data) {
                obj = JSON.parse(data);
                if (obj.status == true) {
                    $('#result-search-product input').empty();
                    $('#product_id').val(obj.id);
                    $('#product_sku').val(obj.sku);
                    $('#product_name').val(obj.name);
                    $('#product_price').val(obj.price);
                    $('#product_amount').val(1);
                    if(obj.image == 2) {
                        $('#thumbnailproduct').fadeOut(1000);
                        setTimeout(function() {
                            $('#thumbnailproduct').removeClass('thumbnail');
                            $('#thumbnailproduct').empty();
                        }, 1200);
                    }else{
                        $('#thumbnailproduct').hide();
                        $('#thumbnailproduct').addClass('thumbnail');
                        $('#thumbnailproduct').html('<img src="'+obj.image+'" class="img-responsive">');
                        $('#thumbnailproduct').fadeIn(1000);
                    }
                    return false;
                }else{
                    notifyAlerts(obj.response,'fa fa-exclamation-circle', 'danger');
                }
                return false;
            }
        });
        return false;
    }else {
        return false;
    }
}
function removeImage(div){
    $(div).empty();
    $(div).removeClass('thumbnail');
}
//add product
function functionAddItem(url) {
    $.ajax({
        type: 'POST',
        url: url,
        data: {
            'product_id': $('#product_id').val(),
            'amount': $('#product_amount').val(),
            'transaction': $('#transaction').val(),
            'order_id': $('#order_id').val(),
            '_token': $('#_token').val()},
        success: function (data) {
            obj = JSON.parse(data);
            if (obj.status == true) {
                notifyAlerts(obj.response,'fa fa-exclamation-circle', 'success');
                if(obj.itens) {
                    var tr = '';
                    var tbl = '#tableitens';
                    $('#tableitens #showitens').html('');
                    $.each(obj.itens, function (i, val) {
                        tr += '<tr id="'+val.id+'">';
                        tr += '<td class="text-center">'+val.sku+'</td>';
                        tr += '<td class="text-left">'+val.name+'</td>';
                        tr += '<td class="text-center">'+val.qtd+'</td>';
                        tr += '<td class="col-lg-1 text-right">'+val.price+'</td>';
                        tr += '<td class="col-lg-1 text-right">'+val.subtotal+'</td>';
                        tr += '<td class="text-center"><button class="btn btn-xs btn-danger" onclick="functionRemoveItem(\''+$('#pathdestroy').val()+'\', \''+val.id+'\', \''+tbl+'\');">Excluir</button></td>';
                        tr += '</tr>';
                    });
                    $('#tableitens #showitens').append(tr);
                    $('#subtotal').html(obj.total);
                    $('#payment_value').val(obj.total);
                    $('#btnorderfootpayment, #btnorderfootshipping, #btnorderfootfinish').removeClass('disabled');
                    return false;
                }else{
                    return false;
                }
            }else{
                notifyAlerts(obj.response,'fa fa-exclamation-circle', 'danger');
            }
            return false;
        },
        error: function (data) {
            //show erro message and validations
            notifyAlerts(formatErrors(data.responseJSON), 'fa fa-exclamation-circle', 'info');
            return false;
        },
    });
    return false;
}
//add product
function functionRemoveItem(url, id, div) {
    $.ajax({
        type: 'POST',
        url: url,
        data: {
            'id': id,
            'order_id':$('#order_id').val(),
            '_token': $('#_token').val()},
        success: function (data) {
            obj = JSON.parse(data);
            if (obj.status == true) {
                notifyAlerts(obj.response,'fa fa-exclamation-circle', 'success');
                $(div+' tbody tr#'+id).fadeOut();
                $('#subtotal').html(obj.total);
                $('#payment_value').val(obj.total);
                if(obj.qtd == 0){
                    $('#btnorderfootpayment, #btnorderfootshipping, #btnorderfootfinish').addClass('disabled');
                }
                return false;
            }else{
                notifyAlerts(obj.response,'fa fa-exclamation-circle', 'danger');
            }
            return false;
        },
        error: function (data) {
            //show erro message and validations
            notifyAlerts(formatErrors(data.responseJSON), 'fa fa-exclamation-circle', 'info');
            return false;
        },
    });
    return false;
}
function functionSearchCustomer(url) {
    $.ajax({
        type: 'POST',
        url: url,
        data: {'search': $('#search').val(), '_token': $('#_token').val()},
        success: function (data) {
            obj = JSON.parse(data);
            if(obj.result) {
                var li = '';
                var tbl = '#listcustomer';
                $('#listcustomer').html('');
                li += '<li class="liheader">';
                li += '<span class="col-lg-2 text-center"><strong>ID</strong></span>';
                li += '<span class="col-lg-10 text-center"><strong>NOME</strong></span>';
                li += '</li>';

                $.each(obj.result, function (i, val) {
                    li += '<li id="licontentactive" class="licontent_'+val.id+'"  onclick="functionSelectCustomer(\''+val.id+'\', \''+val.name+'\', \''+val.address +', '+ val.number +' - '+ val.neighborhood +' - '+ val.zipcode +' - '+ val.complement +'\');">';
                    li += '<span class="col-lg-2 text-center">'+val.id+'</span>';
                    li += '<span class="col-lg-10 text-left">'+val.name+'</span>';
                    li += '</li>';
                });
                $('#listcustomer').append(li);
                return false;
            }else{
                notifyAlerts(obj.response, 'fa fa-exclamation-circle', 'danger');
                return false;
            }
            return false;
        },
        error: function (data) {
            //show erro message and validations
            notifyAlerts(formatErrors(data.responseJSON), 'fa fa-exclamation-circle', 'info');
            return false;
        },
    });
    return false;
}
function functionSelectCustomer(id, name, address) {
    $('#listcustomer li').removeClass('active');
    $('#listcustomer li.licontent_'+ id).addClass('active');
    $('#customer_id').val(id);
    $('#customer_name').val(name);
    $('#shipping_address').val(address);
    return false;
}

//confirm customer
function functionConfirmCustomer(url) {
    $.ajax({
        type: 'POST',
        url: url,
        data: {
            'id': $('#customer_id').val(),
            'name': $('#customer_name').val(),
            'transaction': $('#transaction').val(),
            '_token': $('#_token').val()},
        success: function (data) {
            obj = JSON.parse(data);
            if (obj.status == true) {
                notifyAlerts(obj.response,'fa fa-exclamation-circle', 'success');
                return false;
            }else{
                notifyAlerts(obj.response,'fa fa-exclamation-circle', 'danger');
            }
            return false;
        },
        error: function (data) {
            //show erro message and validations
            notifyAlerts(formatErrors(data.responseJSON), 'fa fa-exclamation-circle', 'info');
            return false;
        },
    });
    return false;
}

function searchProvider(url) {
    var id = $('#provider_id').val();

    $.ajax({
        type: 'POST',
        url: url,
        data: {id: id, '_token': $('#_token').val()},
        success: function (data) {
            obj = JSON.parse(data);
            if (obj.status == true) {
                //show content
                $("#id").empty();
                $("#phone").empty();
                $("#celullar").empty();
                $("#zipcode").empty();
                $("#address").empty();
                $("#neighborhood").empty();
                $("#city").empty();
                $("#uf").empty();

                $.each(obj.result, function (edit, subcatObj) {
                    $("#id").val(subcatObj.id);
                    $("#phone").val(subcatObj.phone);
                    $("#celullar").val(subcatObj.celullar);
                    $("#zipcode").val(subcatObj.zipcode);
                    $("#address").val(subcatObj.address);
                    $("#neighborhood").val(subcatObj.neighborhood);
                    $("#city").val(subcatObj.city);
                    $("#uf").val(subcatObj.uf);
                });
                $("#provider_id").selectpicker("refresh");
            } else {
                resetForm('#frmPurchase');
                notifyAlerts(obj.response, 'fa fa-exclamation-circle', 'danger');
            }
            return false;
        }
    });
    return false;
}


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







//add shipping
function functionAddShipping(url) {
    $.ajax({
        type: 'POST',
        url: url,
        data: {
            'order_id'   : $('#order_id').val(),
            'transaction': $('#transaction').val(),
            'description': $('#shipping_description').val(),
            'address'    : $('#shipping_address').val(),
            'value'      : $('#shipping_value').val(),
            'date'       : $('#shipping_date').val(),
            'time'       : $('#shipping_time').val(),
            '_token'     : $('#_token').val()},
        success: function (data) {
            obj = JSON.parse(data);
            if (obj.status == true) {
                notifyAlerts(obj.response,'fa fa-exclamation-circle', 'success');
                return false;
            }else{
                notifyAlerts(obj.response,'fa fa-exclamation-circle', 'danger');
            }
            return false;
        },
        error: function (data) {
            //show erro message and validations
            notifyAlerts(formatErrors(data.responseJSON), 'fa fa-exclamation-circle', 'info');
            return false;
        },
    });
    return false;
}
//add payment
function functionAddPayment(url) {
    $.ajax({
        type: 'POST',
        url: url,
        data: {
            'order_id'   : $('#order_id').val(),
            'transaction': $('#transaction').val(),
            'description': $('#payment_description').val(),
            'value'      : $('#payment_value').val(),
            '_token'     : $('#_token').val()},
        success: function (data) {
            obj = JSON.parse(data);
            if (obj.status == true) {
                notifyAlerts(obj.response,'fa fa-exclamation-circle', 'success');
                return false;
            }else{
                notifyAlerts(obj.response,'fa fa-exclamation-circle', 'danger');
            }
            return false;
        },
        error: function (data) {
            //show erro message and validations
            notifyAlerts(formatErrors(data.responseJSON), 'fa fa-exclamation-circle', 'info');
            return false;
        },
    });
    return false;
}

//finish order
function functionFinishOrder(url) {
    $.ajax({
        type: 'POST',
        url: url,
        data: {
            'order_id'   : $('#order_id').val(),
            'transaction': $('#transaction').val(),
            '_token'     : $('#_token').val()},
        success: function (data) {
            obj = JSON.parse(data);
            if (obj.status == true) {
                notifyAlerts(obj.response,'fa fa-exclamation-circle', 'success');
                $('#btnneworder').removeClass('disabled').removeClass('btn-default').addClass('btn-primary');
                $('#btnorders').removeClass('disabled').removeClass('btn-default').addClass('btn-info');
                $('#btnconfirmorder').addClass('disabled').removeClass('btn-success').addClass('btn-default').removeAttr('onclick');
                $('#btnconfirmclose').addClass('disabled').removeAttr('data-dismiss');
                $('.blockorder').fadeIn();
                $('#msgsucces').fadeIn();
                $('#msgsucces p').html('<i class="fa fa-check-circle" aria-hidden="true"></i> '+obj.response);
                return false;
            }else{
                notifyAlerts(obj.response,'fa fa-exclamation-circle', 'danger');
            }
            return false;
        },
        error: function (data) {
            //show erro message and validations
            notifyAlerts(formatErrors(data.responseJSON), 'fa fa-exclamation-circle', 'info');
            return false;
        },
    });
    return false;
}

$('.modal').modal({
    show:false,
    backdrop: 'static',
    keyboard:false
});








function showNoResult(div){
    $(div).html('<div class="col-lg-12 text-center" id="noresult"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Nenhum registro cadastrado.</div>');
}

//show and hide div
function divHideShow(divshow, divhide){
    $(divhide).hide();
    $(divshow).show();
    $(divshow).removeClass('hidden');
    $(divhide+' img').remove();
}
//show content data image
function showContentData(content){
    $('.btn-trash-image').removeClass('hidden');
    $('.divdatacontent').html('<img src="'+content+'" width="100%"/>');
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
//reset form
function resetForm(form) {
    $(form).each(function () {
        this.reset();
    });
}
//format error
function formatErrors(errorMsg) {
    var errors = errorMsg;
    //show messages
    for (var e in errors) {
        return errors[e][0];
    }
}
//only number
function onlyNumber(input) {
    $(input).on('keypress input', function() {
        var value = $(this).val();
        value = value.replace(/\D+/, '');
        $(this).val(value);
    });
}
//show hidden div
function showHiden(id) {
    if($(id).hasClass('show')){
        $(id).fadeOut();
        $(id).removeClass('show');
    }else{
        $(id).fadeIn();
        $(id).addClass('show');
    }
}
$('.input_datapicker').datepicker({
    format: 'dd/mm/yyyy',
});


function changeMask(num) {
    if(num == 1){
        $('#document').mask('999.999.999-99', {reverse: true});
        $('#document').removeAttr('disabled');
    }else{
        $('#document').mask('99.999.999/9999-99', {reverse: true});
        $('#document').removeAttr('disabled');
    }
}
function changeMaskInput() {
    if ($('input[name=document_type]:checked').val() == 'cpf') {
        $('#document').mask('999.999.999-99', {reverse: true});
    } else {
        $('#document').mask('99.999.999/9999-99', {reverse: true});
    }
}

$(function () {
    $('[data-toggle="tooltip"]').tooltip({container: 'body'})
    $('[data-title="tooltip"]').tooltip({container: 'body'})
})


//resize vertical
$('input').attr('autocomplete', 'off');
$(window).resize(function() {
    $('#resize-pdv-products, #resize-pdv-itens').height($(window).height() - 90);
});
$(window).trigger('resize');

//modals
$(".modal").each(function(l){$(this).on("show.bs.modal",function(l){var o=$(this).attr("data-easein");"shake"==o?$(".modal-dialog").velocity("callout."+o):"pulse"==o?$(".modal-dialog").velocity("callout."+o):"tada"==o?$(".modal-dialog").velocity("callout."+o):"flash"==o?$(".modal-dialog").velocity("callout."+o):"bounce"==o?$(".modal-dialog").velocity("callout."+o):"swing"==o?$(".modal-dialog").velocity("callout."+o):$(".modal-dialog").velocity("transition."+o)})});