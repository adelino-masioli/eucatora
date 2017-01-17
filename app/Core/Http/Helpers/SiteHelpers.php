<?php
/**
 * Created by PhpStorm.
 * User: alfjuniorbh
 * Date: 02/11/16
 * Time: 19:35
 */

namespace App\Core\Http\Helpers;

use App\Domains\ProductImages\ProductImagesRepository;
use App\Domains\ProductOptions\ProductOptionsRepository;

class SiteHelpers {

    public static function define_theme_path()
    {
        return 'imprinex';
    }
    public static function get_thumb($product_id=null,$size=null)
    {
        $thumb = ProductImagesRepository::get_thumb($product_id);
        if($thumb == false){

        }else{
            return url($thumb->path.'/thumb/'.$size.'_'.$thumb->image);
        }
    }
    public static function gen_carousel($product_id=null,$size=null)
    {
        $carousel = null;
        $carousel .= '<!--begin carousel!-->';
        $carousel .=    '<div id="carousel-detail" data-interval="5000" class="carousel slide" data-ride="carousel">';
        $carousel .=        '<div class="carousel-inner">';
        $i = 0;
        foreach (ProductImagesRepository::get_caroussel($product_id) as $image):
            $act = $i == 0 ? 'active' : null;
            $carousel .= '<div class="item '.$act.'"><img class="img-responsive" src="'.url($image->path.'/thumb/'.$size.'_'.$image->image).'"></div>';
            $i++;
        endforeach;

        $carousel .=        '</div>';
        $carousel .=        '<a class="left carousel-control" href="#carousel-detail" data-slide="prev"><i class="icon-prev fa fa-angle-left" aria-hidden="true"></i></a>';
        $carousel .=        '<a class="right carousel-control" href="#carousel-detail" data-slide="next"><i class="icon-next fa fa-angle-right" aria-hidden="true"></i></a>';
        $carousel .=    '</div>';
        $carousel .= '<!--/carousel!-->';

        return $carousel;
    }
    public static function options_variations($option_id=null,$product_id=null)
    {
        if($option_id!=null){
            return ProductOptionsRepository::listVariationsByOptionAndProduct($option_id,$product_id);
        }
    }
}