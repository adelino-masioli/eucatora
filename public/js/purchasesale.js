function functionSavePurchase(e){return $(e).ajaxForm({success:function(e){1==e.status?(notifyAlerts(e.response,"fa fa-check","success"),e.url&&window.location.replace(e.url)):notifyAlerts(e.response,"fa fa-exclamation-circle","danger")},error:function(e){return notifyAlerts(formatErrors(e.responseJSON),"fa fa-exclamation-circle","info"),!1},type:"post",dataType:"json",url:$(e).attr("action")}).submit(),!1}function addItemPurchase(e){return $.ajax({type:"POST",url:e,data:{product_id:$("#product_id").val(),price:$("#price").val(),area:$("#area").val(),meters_square:$("#meters_square").val(),meters_stereo:$("#meters_stereo").val(),purchase_id:$("#purchase_id").val(),_token:$("#_token").val()},success:function(e){return obj=JSON.parse(e),1==obj.status?(obj.result&&updatePurchaseItensTable(obj),resetForm("#frmPurchase"),$("select").selectpicker("refresh"),notifyAlerts(obj.response,"fa fa-check","success")):notifyAlerts(obj.response,"fa fa-exclamation-circle","danger"),!1},error:function(e){return notifyAlerts(formatErrors(e.responseJSON),"fa fa-exclamation-circle","info"),!1}}),!1}function destroyItemPurchase(e,t){return $.ajax({type:"POST",url:e,data:{id:t,_token:$("#_token").val()},success:function(e){return obj=JSON.parse(e),1==obj.status?(obj.result&&updatePurchaseItensTable(obj),notifyAlerts(obj.response,"fa fa-check","success")):notifyAlerts(obj.response,"fa fa-exclamation-circle","danger"),!1},error:function(e){return notifyAlerts(formatErrors(e.responseJSON),"fa fa-exclamation-circle","info"),!1}}),!1}function updatePurchaseItensTable(e){$("#showResult").html("");var t="";$.each(e.result,function(e,a){t+="<tr>",t+='<td class="col-md-1 text-center"><a href="javascript:void(0);" onclick="destroyItemPurchase(\''+$("#pathdestroy").val()+"', '"+a.id+'\');" class="btn btn-danger btn-xs"><i class="fa fa-trash" aria-hidden="true"></i></a></td>',t+='<td class="col-md-1 text-center">'+a.id+"</td>",t+='<td class="col-md-6 text-left">'+a.name+"</td>",t+='<td class="col-md-1 text-center">'+a.area+"</td>",t+='<td class="col-md-1 text-center">'+a.meters_square+"</td>",t+='<td class="col-md-1 text-center">'+a.meters_stereo+"</td>",t+='<td class="col-md-1 text-center">'+a.price+"</td>",t+="</tr>"}),$("#showResult").append(t)}function addTaxePurchase(e){return $.ajax({type:"POST",url:e,data:{description:$("#description_tax").val(),price:$("#price_tax").val(),purchase_id:$("#purchase_id").val(),_token:$("#_token").val()},success:function(e){return obj=JSON.parse(e),1==obj.status?(obj.result&&updatePurchaseTaxesTable(obj),resetForm("#frmPurchase"),notifyAlerts(obj.response,"fa fa-check","success")):notifyAlerts(obj.response,"fa fa-exclamation-circle","danger"),!1},error:function(e){return notifyAlerts(formatErrors(e.responseJSON),"fa fa-exclamation-circle","info"),!1}}),!1}function destroyTaxePurchase(e,t){return $.ajax({type:"POST",url:e,data:{id:t,_token:$("#_token").val()},success:function(e){return obj=JSON.parse(e),1==obj.status?(obj.result&&updatePurchaseTaxesTable(obj),notifyAlerts(obj.response,"fa fa-check","success")):notifyAlerts(obj.response,"fa fa-exclamation-circle","danger"),!1},error:function(e){return notifyAlerts(formatErrors(e.responseJSON),"fa fa-exclamation-circle","info"),!1}}),!1}function updatePurchaseTaxesTable(e){$("#showResultTax").html("");var t="";$.each(e.result,function(e,a){t+="<tr>",t+='<td class="col-md-1 text-center"><a href="javascript:void(0);" onclick="destroyTaxePurchase(\''+$("#pathdestroytaxe").val()+"', '"+a.id+'\');" class="btn btn-danger btn-xs"><i class="fa fa-trash" aria-hidden="true"></i></a></td>',t+='<td class="col-md-8 text-left">'+a.description+"</td>",t+='<td class="col-md-1 text-center">'+a.price+"</td>",t+="</tr>"}),$("#showResultTax").append(t)}function addItemSale(e){return $.ajax({type:"POST",url:e,data:{product_id:$("#product_id").val(),radial:$("#radial").val(),amount_item:$("#amount_item").val(),meters:$("#meters").val(),meters_type:$("#meters_type").val(),price_unit:$("#price_unit").val(),price_total:$("#price_total").val(),purchase_id:$("#purchase_id").val(),sale_id:$("#sale_id").val(),_token:$("#_token").val()},success:function(e){return obj=JSON.parse(e),1==obj.status?(obj.result&&updateSaleItensTable(obj),resetForm("#frmPurchase"),$("select").selectpicker("refresh"),notifyAlerts(obj.response,"fa fa-check","success")):notifyAlerts(obj.response,"fa fa-exclamation-circle","danger"),!1},error:function(e){return notifyAlerts(formatErrors(e.responseJSON),"fa fa-exclamation-circle","info"),!1}}),!1}function destroyItemSale(e,t){return $.ajax({type:"POST",url:e,data:{id:t,_token:$("#_token").val()},success:function(e){return obj=JSON.parse(e),1==obj.status?(obj.result&&updateSaleItensTable(obj),notifyAlerts(obj.response,"fa fa-check","success")):notifyAlerts(obj.response,"fa fa-exclamation-circle","danger"),!1},error:function(e){return notifyAlerts(formatErrors(e.responseJSON),"fa fa-exclamation-circle","info"),!1}}),!1}function addShipping(e){return $.ajax({type:"POST",url:e,data:{product_id:$("#product_id").val(),price_shipp:$("#price_shipp").val(),sale_id:$("#sale_id").val(),_token:$("#_token").val()},success:function(e){return obj=JSON.parse(e),1==obj.status?($("#tbl_subtotal").html(obj.subtotal),$("#tbl_total").html(obj.total),notifyAlerts(obj.response,"fa fa-check","success")):notifyAlerts(obj.response,"fa fa-exclamation-circle","danger"),!1},error:function(e){return notifyAlerts(formatErrors(e.responseJSON),"fa fa-exclamation-circle","info"),!1}}),!1}function addDiscount(e){return $.ajax({type:"POST",url:e,data:{product_id:$("#product_id").val(),discount:$("#discount").val(),sale_id:$("#sale_id").val(),_token:$("#_token").val()},success:function(e){return obj=JSON.parse(e),1==obj.status?($("#tbl_subtotal").html(obj.subtotal),$("#tbl_total").html(obj.total),notifyAlerts(obj.response,"fa fa-check","success")):notifyAlerts(obj.response,"fa fa-exclamation-circle","danger"),!1},error:function(e){return notifyAlerts(formatErrors(e.responseJSON),"fa fa-exclamation-circle","info"),!1}}),!1}function updateSaleItensTable(e){$("#tbl_subtotal").html(e.subtotal),$("#tbl_total").html(e.total),$("#showResult").html("");var t="";$.each(e.result,function(e,a){t+="<tr>",t+='<td class="col-md-1 text-center"><a href="javascript:void(0);" onclick="destroyItemSale(\''+$("#pathdestroy").val()+"', '"+a.id+'\');" class="btn btn-danger btn-xs"><i class="fa fa-trash" aria-hidden="true"></i></a></td>',t+='<td class="col-md-1 text-center">'+a.id+"</td>",t+='<td class="col-md-1 text-center">'+a.amount_item+"</td>",t+='<td class="col-md-6 text-left">'+a.name+"</td>",t+='<td class="col-md-1 text-center">'+a.meters+"</td>",t+='<td class="col-md-1 text-center">'+a.meters_type+"</td>",t+='<td class="col-md-1 text-center">'+a.price_unit+"</td>",t+='<td class="col-md-1 text-center">'+a.price_total+"</td>",t+="</tr>"}),$("#showResult").append(t)}