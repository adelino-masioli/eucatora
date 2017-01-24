<?php
/**
 * Created by PhpStorm.
 * User: alfjuniorbh
 * Date: 16/10/16
 * Time: 19:51
 */

namespace App\Applications\Administration\Purchases\Http\Controllers;
use App\Applications\Administration\Base\Http\Controllers\BaseController;
use App\Applications\Administration\Purchases\Requests\PurchaseFormRequest;
use App\Applications\Administration\Purchases\Requests\PurchaseItemFormRequest;
use App\Applications\Administration\Purchases\Requests\PurchaseTaxFormRequest;

class PurchasesController extends BaseController
{
    protected $purchases;
    protected $providers;
    protected $products;
    protected $status;

    public function __construct() {
        $this->purchases   = \App::make('App\Domains\Purchases\PurchasesRepositoryInterface');
        $this->providers   = \App::make('App\Domains\Providers\ProvidersRepositoryInterface');
        $this->products    = \App::make('App\Domains\Products\ProductsRepositoryInterface');
        $this->status      = \App::make('App\Domains\Status\StatusRepositoryInterface');
    }

    public function index()
    {
        return $this->purchases->index();
    }
    
    public function data_table() {
        $data = $this->purchases->data_table();
        return $data;
    }
    
    public function create()
    {
        return $this->purchases->create(['providers'=>$this->providers->combo()]);
    }
    public function store(PurchaseFormRequest $request)
    {
        return $this->purchases->store($request);
    }
    public function edit($id)
    {
        return $this->purchases->edit(['status'=>$this->status->comboStatus(), 'id'=>$id, 'providers'=>$this->providers->combo(), 'products'=>$this->products->comboProducts()]);
    }
    public function update(PurchaseFormRequest $request)
    {
        return $this->purchases->update($request);
    }
    public function destroy()
    {
        return $this->purchases->destroy();
    }
    public function auto_complete(){
        return $this->purchases->auto_complete();
    }

    public function addItem(PurchaseItemFormRequest $request){
        return $this->purchases->addItem($request);
    }
    public function destroyItem(){
        return $this->purchases->destroyItem();
    }

    public function addTax(PurchaseTaxFormRequest $request){
        return $this->purchases->addTax($request);
    }
    public function destroyTax(){
        return $this->purchases->destroyTax();
    }
}