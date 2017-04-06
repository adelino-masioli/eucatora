<?php
/**
 * Created by PhpStorm.
 * User: alfjuniorbh
 * Date: 16/10/16
 * Time: 19:51
 */

namespace App\Applications\Administration\Sales\Http\Controllers;
use App\Applications\Administration\Base\Http\Controllers\BaseController;
use App\Applications\Administration\Sales\Requests\SaleDiscountFormRequest;
use App\Applications\Administration\Sales\Requests\SaleFormRequest;
use App\Applications\Administration\Sales\Requests\SaleItemFormRequest;
use App\Applications\Administration\Sales\Requests\SaleShippFormRequest;


class SalesController extends BaseController
{
    protected $sales;
    protected $customers;
    protected $products;

    public function __construct() {
        $this->sales       = \App::make('App\Domains\Sales\SalesRepositoryInterface');
        $this->customers   = \App::make('App\Domains\Customers\CustomersRepositoryInterface');
        $this->products    = \App::make('App\Domains\Products\ProductsRepositoryInterface');
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
    public function store(SaleFormRequest $request)
    {
        return $this->sales->store($request);
    }
    public function edit($id)
    {
        return $this->sales->edit(['id'=>$id, 'customers'=>$this->customers->combo(), 'products'=>$this->products->comboProducts()]);
    }
    public function update(SaleFormRequest $request)
    {
        return $this->sales->update($request);
    }
    public function updateShipp(SaleShippFormRequest $request)
    {
        return $this->sales->updateShipp($request);
    }
    public function updatediscount(SaleDiscountFormRequest $request)
    {
        return $this->sales->updatediscount($request);
    }
    public function destroy()
    {
        return $this->sales->destroy();
    }
    public function duplicate()
    {
        return $this->sales->duplicate();
    }
    public function auto_complete(){
        return $this->sales->auto_complete();
    }

    public function addItem(SaleItemFormRequest $request){
        return $this->sales->addItem($request);
    }
    public function destroyItem(){
        return $this->sales->destroyItem();
    }

    public function exportpdf($id)
    {
        return $this->sales->exportpdf($id);
    }
}