<?php
/**
 * Created by PhpStorm.
 * User: alfjuniorbh
 * Date: 16/10/16
 * Time: 19:51
 */

namespace App\Applications\Administration\Sales\Http\Controllers;
use App\Applications\Administration\Base\Http\Controllers\BaseController;
use App\Applications\Administration\Sales\Requests\SalesFormRequest;
use App\Applications\Administration\Sales\Requests\SalesItemFormRequest;

class SalesController extends BaseController
{
    protected $sales;
    protected $customers;
    protected $products;
    protected $status;

    public function __construct() {
        $this->sales       = \App::make('App\Domains\Sales\SalesRepositoryInterface');
        $this->customers   = \App::make('App\Domains\Customers\CustomersRepositoryInterface');
        $this->products    = \App::make('App\Domains\Products\ProductsRepositoryInterface');
        $this->status      = \App::make('App\Domains\Status\StatusRepositoryInterface');
    }

    public function index()
    {
        return $this->sales->index();
    }
    
    public function data_table() {
        $data = $this->sales->data_table();
        return $data;
    }
    
    public function create()
    {
        return $this->sales->create(['customers'=>$this->customers->combo()]);
    }
    public function store(SalesFormRequest $request)
    {
        return $this->sales->store($request);
    }
    public function edit($id)
    {
        return $this->sales->edit(['status'=>$this->status->comboStatus(), 'id'=>$id, 'customers'=>$this->customers->combo(), 'products'=>$this->products->comboProducts()]);
    }
    public function update(SalesFormRequest $request)
    {
        return $this->sales->update($request);
    }
    public function destroy()
    {
        return $this->sales->destroy();
    }
    public function auto_complete(){
        return $this->sales->auto_complete();
    }

    public function addItem(SalesItemFormRequest $request){
        return $this->sales->addItem($request);
    }
    public function destroyItem(){
        return $this->sales->destroyItem();
    }
}