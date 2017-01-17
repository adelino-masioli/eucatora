<?php
/**
 * Created by PhpStorm.
 * User: alfjuniorbh
 * Date: 02/11/16
 * Time: 19:35
 */

namespace App\Core\Http\Helpers;

class HelperJs {
    public static function data_table_translation() {
        $data_table_translation = '
                language: {
                    "sEmptyTable": "Nenhum registro encontrado",
                    "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
                    "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
                    "sInfoFiltered": "(Filtrados de _MAX_ registros)",
                    "sInfoPostFix": "",
                    "sInfoThousands": ".",
                    "sLengthMenu": "_MENU_",
                    "sLoadingRecords": "Carregando...",
                    "sProcessing": "Processando...",
                    "sZeroRecords": "Nenhum registro encontrado",
                    "sSearch": "Pesquisar",
                    "oPaginate": {
                        "sNext": "Próximo",
                        "sPrevious": "Anterior",
                        "sFirst": "Primeiro",
                        "sLast": "Último"
                    },
                    "oAria": {
                        "sSortAscending": ": Ordenar colunas de forma ascendente",
                        "sSortDescending": ": Ordenar colunas de forma descendente"
                    }
                }
        ';

        echo $data_table_translation;
    }

    public static function select_drowdown($select = NULL, $btn = NULL, $size = NULL) {
        $select_drowdown = '
                <script>$(document).ready(function() {
                    $("' . $select . '").selectpicker({
                        style: "' . $btn . '",
                        size: ' . $size . ',
                        liveSearch:true
                    });
                    });
                </script>
        ';
        echo $select_drowdown;
    }

    public static function autocomplete() {
        $autocoplete = '
                <script>
                        function autoComplete(path, field, minlength) {
                            var path = path;
                            $(field).typeahead({
                                source: function(query, process){
                                    return $.get(path, {query:query}, function(data){
                                        return process(data);
                                    });
                                },
                                minLength: minlength
                            }); 
                        }
                </script>
        ';
        echo $autocoplete;
    }

    public static function tags_input($input = NULL, $placeholder=NULL) {
        $tags = '
                <script>$(document).ready(function() {
                        $("'.$input.' input").tagsinput({
                            freeInput: true
                        });
                   
                        $("'.$input.' input").keyup(function() {
                            $("'.$input.' input").attr("placeholder","");
                        });
                        
                        $(function () {
                            $("'.$input.' input").focus(function () {
                                $(this).data("placeholder", $(this).attr("placeholder")).attr("placeholder", "");
                            }).blur(function () {
                                if(!$("'.$input.' .bootstrap-tagsinput span").hasClass("tag")){
                                  $(this).attr("placeholder", "'.$placeholder.'");
                                }
                            });
                        });
                     });
                </script>
        ';
        echo $tags;
    }

    public static function slug($title = NULL, $source=NULL) {
        $slug = '
                <script>
                    $(document).ready(function() {
                        $(function(){
                            $("'.$title.'").friendurl({id : "'.$source.'", transliterate: true});
                        });
                    });
                </script>
        ';
        echo $slug;
    }

    public static function clone_content($origin = NULL, $destination=NULL) {
        $clone = '
                <script>
                    $(document).ready(function() {
                        $("'.$origin.'").on("keyup",function(){
                           $("'.$destination.'").text($("'.$origin.'").val());
                        });
                    });
                </script>
        ';
        echo $clone;
    }

    public static function mask_money($fields = NULL) {
        $clone = '
                <script>
                    $(function($){
                        //mask money
                        $("'.$fields.'").maskMoney({thousands:".",decimal:","});
                    });
                </script>
        ';
        echo $clone;
    }
    public static function combo_cities() {
        $clone = '<script>
               $(document).ready(function(){
                $("select#state_id").change(function(){
                    var selectedCountry = $("#state_id option:selected").val();
                    $.ajax({
                        type: "GET",
                        url: "'.url("dashboard/cities_by_uf").'/"+selectedCountry
                    }).done(function(data){
                        $("#city_id").empty();
                        $.each(data, function(edit, subcatObj){
                            $("#city_id").append("<option value="+subcatObj.id+">"+subcatObj.name+"</option>");
                        });
                        $("#city_id").selectpicker("refresh");
                    });
                });
            });
            </script>
        ';
        echo $clone;
    }
    public static function input_mask_phone_celullar($phone = NULL, $celullar = NULL, $cep=NULL, $timer=NULL) {
        $clone = '
                <script>
                    $(function($){
                        $("'.$phone.'").mask("(999) 9999-9999",{placeholder:" "});
                        $("'.$celullar.'").mask("(999) 9999-9999",{placeholder:" "});
                        $("'.$cep.'").mask("99.999-999",{placeholder:" "});
                        $("'.$timer.'").mask("99:99",{placeholder:" "});
                    });
                </script>
        ';
        echo $clone;
    }

    public static function show_specific_modal($modal = NULL, $status=NULL) {
        if($status == 3) {
            $clone = '
                <script>
                    $(document).ready(function() {
                        $("'.$modal.'").modal({
                            show:true,
                            backdrop: \'static\',
                            keyboard:false
                        });
                    });
                </script>
        ';
            echo $clone;
        }
    }
}