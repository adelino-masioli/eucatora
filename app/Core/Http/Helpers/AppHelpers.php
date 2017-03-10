<?php
/**
 * Created by PhpStorm.
 * User: alfjuniorbh
 * Date: 02/11/16
 * Time: 19:35
 */

namespace App\Core\Http\Helpers;

use App\Domains\Categories\CategoriesRepository;
use App\Domains\ProductCategories\ProductCategoriesRepository;
use App\Domains\ProductOptions\ProductOptionsRepository;
use DateTime;

class AppHelpers {
    public static function site_title(){
        return "EUCATORA - Eucalipto tratado e in natura";
    }
    public static function site_address(){
        return "RUA DOS TIMBIRAS, 2500 - 1141 - (31) 9809-5410";
    }
    public static function site_city(){
        return "BELO HORIZONTE - MINAS GERAIS";
    }
    public static function gem_btn_datatable($module=null, $id=null, $remove_duplicate_btn=null){
        $btns = null;
        $btns .= '<div class="btn-group btn-group-xs" role="group" aria-label="'.$id.'">';
            $btns .= '<a title="Editar" href="'.url("dashboard/".$module."/edit/".$id).'" class="btn btn-info"><i class="fa fa-edit"></i></a>';
            $btns .= '<a title="Excluir" href="javascript:void(0);" class="btn btn-danger" onclick=confirmActionDestroy(\''.$id.'\');><i class="fa fa-trash"></i></a>';
            if($remove_duplicate_btn == null) {
                $btns .= '<a title="Duplicar" href="javascript:void(0);" class="btn btn-warning" data_url="' . url("dashboard/" . $module . "/duplicate") . '" id="' . $id . '" onclick="functionDuplicate(\'' . $id . '\');" ><i class="fa fa-clone"></i></a>';
            }else{
                $btns .= '<a href="javascript:void(0);" class="btn btn-default disabled"><i class="fa fa-clone"></i></a>';
            }
        $btns .= '</div>';
        return $btns;
    }

    public static function gem_btn_datatable_order($module=null, $id=null, $order_status_id=null){
        $btns = null;
        $btns .= '<div class="btn-group btn-group-xs" role="group" aria-label="'.$id.'">';
        if($order_status_id > 2){
            $btns .= '<a data-toggle="tooltip" data-placement="bottom" title="Impossível Editar" href="javascript:void(0);" class="btn btn-default"><i class="fa fa-meh-o"></i></a>';
            $btns .= '<a data-toggle="tooltip" data-placement="bottom" title="Impossível Cancelar" href="javascript:void(0);" class="btn btn-default"><i class="fa fa-meh-o"></i></a>';
        }else{
            $btns .= '<a data-toggle="tooltip" data-placement="bottom" title="Editar" href="'.url("dashboard/".$module."/edit/".$id).'" class="btn btn-info"><i class="fa fa-edit"></i></a>';
            $btns .= '<a data-toggle="tooltip" data-placement="bottom" title="Cancelar" href="javascript:void(0);" class="btn btn-warning" onclick=confirmActionDestroy(\''.$id.'\');><i class="fa fa-ban"></i></a>';
        }
        $btns .= '</div>';
        return $btns;
    }

    //helper convert date
    public static function  date_br($date)
    {
        if (!$date instanceof \DateTime) {
            $date = new \DateTime($date);
        }
        return $date->format('d-m-Y H:i');
    }
    public static function  date_universal($date)
    {
        if($date != NULL):
            $array=explode("/",$date);
            $rev=array_reverse($array);
            $date=implode("-",$rev);
            return $date;
        else:
            return null;
        endif;
    }

    //helper format date time
    public static function  format_date($data = NULL)
    {
        if($data):
            $d = new DateTime($data);
            return $d->format('d/m/Y \à\s H:i:s');
        else:
            return date('Y-m-d H:i:s');
        endif;
    }
    //helper format inverse date time
    public static function  format_inversedate($data = NULL)
    {
        if($data != NULL):
            $array=explode("/",$data);
            $rev=array_reverse($array);
            $date=implode("-",$rev);
            return $date . ' '. date('H:i:s');
        else:
            return date('Y-m-d H:i:s');
        endif;
    }
    public static function  format_inversedateonly($data = NULL)
    {
        if($data != NULL):
            $array=explode("/",$data);
            $rev=array_reverse($array);
            $date=implode("-",$rev);
            return $date;
        else:
            return date('Y-m-d');
        endif;
    }

    public static function date_only_br($date)
    {
        if (!$date instanceof \DateTime) {
            $date = new \DateTime($date);
        }
        return $date->format('d/m/Y');
    }

    public static function date_mouth_day($date)
    {
        if (!$date instanceof \DateTime) {
            $date = new \DateTime($date);
        }
        return $date->format('d-m');
    }

    //helper generate token application
    public static function  gen_token() {
        return substr(md5(uniqid(rand(), true)), 0, 10);
    }

    //helper convert money_br
    public static function  money_br($date)
    {
        return number_format($date, 2, ',', '.');
    }
    //helper convert money_reverse
    public static function  money_reverse($date)
    {
        $price = str_replace('.', '', $date);
        return  str_replace(',', '.', $price);
    }
    //helper convert decial
    public static function  decial($date)
    {
        $price = str_replace('.', '.', $date);
        return  floatval($price);
    }
    //helper define size midia
    public static function  size_midia()
    {
        return  [100, 200, 400, 500];
    }
    //helper category depht
    public static function  category_depht($depht=null)
    {
        $dp = $depht * 10;
        if($depht > 0) {
            return '<span style="padding-left: ' . $dp . 'px;"> <i class="fa fa-long-arrow-right" aria-hidden="true"></i>';
        }else{
            return '<i class="fa fa-caret-right" aria-hidden="true"></i>';
        }
    }
    //helper subcategory
    public static function  sub_category($parent=null, $product_id=null)
    {
        $li = null;
        foreach (CategoriesRepository::filter_category($parent) as $subcategory){
            $li .= '<li id="list_'.$subcategory->id.'" onclick="functionDefineCategory(\''.url('dashboard/productcategories/add').'\', \''.$subcategory->id.'\', \'#list_'.$subcategory->id.'\', \''.$product_id.'\');" class="list-group-item '.AppHelpers::product_categories($subcategory->id, $product_id).'"><span class="badge">'.$subcategory->id.'</span>'.AppHelpers::category_depht($subcategory->depht).' '.$subcategory->name.'</li>';
        }
        return $li;
    }
    public static function product_categories($category_id=null, $product_id=null){
        $product_categories = ProductCategoriesRepository::product_categories($category_id, $product_id);
        if(array_pluck($product_categories, $category_id)){
            return 'list-group-item-info';
        }
    }
    public static function combo_yes_no(){
        return [1=>'Sim', 2=>'Não'];
    }
    public static function combo_shipping_type(){
        return [1=>'Entregável', 2=>'Não Entregável(Ex. Serviços, Download)'];
    }

    public static function modal($modalid=null, $title=null, $content=null, $btn=null){
        $modal = null;
        $modal .='<div id="'.$modalid.'" class="modal" data-easein=""  tabindex="-1" role="dialog" aria-labelledby="costumModalLabel" aria-hidden="true">';
            $modal .='<div class="modal-dialog">';
                $modal .='<div class="modal-content">';
                    $modal .='<div class="modal-header">';
                        if($btn != null):
                          $modal .='<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>';
                        endif;
                        $modal .='<h4 class="modal-title">'.$title.'</h4>';
                    $modal .='</div>';
                    $modal .='<div class="modal-body">'.$content.'</div>';
                    if($btn != null):
                        $modal .='   <div class="modal-footer">';
                            $modal .='<button class="btn btn-default" data-dismiss="modal" aria-hidden="true">Fechar</button>';
                            if($btn != 'onlyclose'):
                                $modal .= $btn;
                            endif;
                        $modal .='   </div>';
                    endif;
                $modal .=' </div>';
            $modal .=' </div>';
        $modal .=' </div>';
        return $modal;
    }

    //content shipping modal
    public static function shipping_modal($shipping=NULL, $orders){
        $address = $shipping !=null ? $shipping->address : $orders->customer->address.', '.$orders->customer->number.' - '.$orders->customer->neighborhood.' - '.$orders->customer->zipcode.' - '.$orders->customer->complement;
        $value   = $shipping !=null ? AppHelpers::money_br($shipping->value) : '0,00';
        $date    = $shipping !=null ? AppHelpers::date_only_br($shipping->date) : date('d/m/Y');
        $time    = $shipping !=null ? $shipping->time : date('H:i');

        $content = '<div class="row">
                      <div class="form-group col-lg-12">
                          <select name="shipping_description" id="shipping_description" class="form-control">
                             <option value="Retirada na loja">Retirada na loja</option>
                             <option value="Envio Correios Sedex">Envio Correios Sedex</option>
                             <option value="Envio Correios Sedex 10">Envio Correios Sedex 10</option>
                             <option value="Envio Correios PAC">Envio Correios PAC</option>
                          </select>
                      </div>
                      <div class="form-group col-lg-12">
                          <input type="text" class="form-control" placeholder="Informe o endereço de entrega" name="shipping_address" id="shipping_address" value="'.$address.'"/>
                      </div>
                      <div class="form-group col-lg-4">
                          <input type="text" class="form-control" placeholder="Valor" name="shipping_value" id="shipping_value" value="'.$value.'"/>
                      </div>
                      <div class="form-group col-lg-4">
                          <input type="text" class="form-control input_datapicker" placeholder="Data" name="shipping_date" id="shipping_date" value="'.$date.'"/>
                      </div>
                      <div class="form-group col-lg-4">
                          <input type="text" class="form-control" placeholder="Horas" name="shipping_time" id="shipping_time" value="'.$time.'"/>
                      </div>
                    </div>';
        return $content;
    }


    //content payment modal
    public static function payment_modal($payment=NULL){
        $value   = $payment !=null ? AppHelpers::money_br($payment->total) : null;
        $content = '<div class="row">
                      <div class="form-group col-lg-8">
                          <select name="payment_description" id="payment_description" class="form-control">
                             <option value="Dinheiro">Dinheiro</option>
                             <option value="Cheque">Cheque</option>
                             <option value="Cartão de Crédito">Cartão de Crédito</option>
                             <option value="Cartão de Débito">Cartão de Débito</option>
                             <option value="Depósito/Transferência Bancária">Depósito/Transferência Bancária</option>
                          </select>
                      </div>
                      <div class="form-group col-lg-4">
                          <input type="text" class="form-control" placeholder="Valor" name="payment_value" id="payment_value" value="'.$value.'" readonly/>
                      </div>
                    </div>';
        return $content;
    }

    //content payment modal
    public static function finish_modal($orders=null){
        $adddisabled    = $orders->order_status_id == 3 ? 'disabled' : null;
        $removedisabled = $orders->order_status_id == 2 ? 'disabled' : null;
        $addfuncion     = $orders->order_status_id < 3 ? 'onclick="functionFinishOrder(\''.url('dashboard/order/update').'\');"' : null;

        $content = '<div class="row">
                      <div class="form-group col-lg-12">
                          <div class="btn-group btn-group-justified" role="group" aria-label="btnsfinish">
                              <div class="btn-group" role="group">
                                <button type="button" class="btn btn-lg btn-default '.$adddisabled.'" data-dismiss="modal" id="btnconfirmclose"><i class="fa fa-times-circle" aria-hidden="true"></i> Voltar</button>
                              </div>
                              <div class="btn-group" role="group">
                                <button type="button" class="btn btn-lg btn-success '.$adddisabled.'"  '.$addfuncion.' id="btnconfirmorder"><i class="fa fa-check-circle" aria-hidden="true"></i> Salvar</button>
                              </div>
                              <div class="btn-group" role="group">
                                <a  href="'.url('dashboard/order/create').'/'.AppHelpers::gen_token().'" type="button" class="btn btn-lg btn-default '.$removedisabled.'" id="btnneworder"><i class="fa fa-plus-circle" aria-hidden="true"></i> Novo</a>
                              </div>
                              <div class="btn-group" role="group">
                                <a href="'.url('dashboard/orders').'" type="button" class="btn btn-lg btn-default '.$removedisabled.'" id="btnorders"><i class="fa fa-bandcamp" aria-hidden="true"></i> Listar</a>
                              </div>
                          </div>
                      </div>
                      <div class="form-group col-lg-12 text-center text-primary" id="msgsucces"><p></p></div>
                    </div>';
        return $content;
    }
    public static function disable_btns($status=null, $val=null)
    {
        if($status == $val){
            return 'disabled';
        }else{
            return null;
        }
    }

    public static function combo_option_variations($option_id)
    {
        return ProductOptionsRepository::listOptionsVariations($option_id);
    }

    //activate_menu
    public static function activate_menu($arrays){
        $activate = NULL;
        foreach($arrays as $array) {
            $activate .= \Request::is($array) == 1 ? 'active' : '';
        }
        return $activate;
    }

    //financial_type
    public static function financial_type($type){
       if($type == 1){
           return 'ENTRADA';
       }else{
           return 'SAÍDA';
       }
    }
    //financial_status
    public static function financial_status($status){
        if($status == 1){
            return 'ABERTO';
        }else{
            return 'PAGO';
        }
    }
    //financial_combo_type
    public static function financial_combo_type(){
        $combo = [];

        $combo['']  = 'Selecione o tipo de lançamento';
        $combo[1] = 'ENTRADA';
        $combo[2] = 'SAÍDA';


        return $combo;
    }
    //financial_combo_status
    public static function financial_combo_status(){
        $combo = array();


        $combo['']  = 'Selecione';
        $combo[1] = 'ABERTO';
        $combo[2] = 'PAGO';
        $combo[3] = 'CANCELADO';

        return $combo;

    }
    //financial_combo_destination
    public static function financial_combo_destination(){
        $combo = array();


        $combo['']                        = 'Selecione o destino do lançamento';
        $combo['CAMINHÃO']                = 'CAMINHÃO';
        $combo['DESPESAS DIVERSAS']       = 'DESPESAS DIVERSAS';
        $combo['PAGAMENTO FUNCIONÁRIOS']  = 'PAGAMENTO FUNCIONÁRIOS';
        $combo['RECEBIMENTO']             = 'RECEBIMENTO';

        return $combo;

    }

    //
    public static function financial_export_type_1($type, $price){
        if($type==1){
            return $price;
        }
    }
    public static function financial_export_type_2($type, $price){
        if($type==2){
            return $price;
        }
    }

    //financial_combo_type_meters
    public static function financial_combo_type_meters(){
        $combo = array();

        $combo['QUADRADO'] = 'QUADRADO';
        $combo['LINEAR']   = 'LINEAR';
        $combo['PEÇA']     = 'PEÇA';
        $combo['POSTE']    = 'POSTE';
        $combo['CUBICO']   = 'CÚBICO';

        return $combo;

    }

    

    public static function row_color($status=NULL){
        if($status == 1):
            return 'alert-warning';
        elseif($status == 2):
            return 'alert-success';
        else:
            return 'alert-danger';
        endif;
    }
}