<?php
/**
 * Created by PhpStorm.
 * User: alfjuniorbh
 * Date: 22/05/16
 * Time: 11:12
 */

namespace App\Applications\Administration\Cities\Http\Controllers;
use App\Applications\Administration\Base\Http\Controllers\BaseController;

use Canducci\ZipCode\Facades\ZipCode;

class CitiesController extends BaseController
{
    protected $cities;

    public function __construct() {
        $this->cities     = \App::make('App\Domains\Cities\CitiesRepositoryInterface');
    }

    public function get_by_state_id($id)
    {
        $cities = $this->cities->get_by_state_id($id);
        return $cities;
    }
    public function get_zipcode($zip)
    {
        $zipCodeInfo = ZipCode::find($zip);
        if ($zipCodeInfo)
        {
            return $zipCodeInfo->getJson();
        }
    }
}