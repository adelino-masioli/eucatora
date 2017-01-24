<?php
/**
 * Created by PhpStorm.
 * User: alfjuniorbh
 * Date: 16/10/16
 * Time: 19:51
 */

namespace App\Applications\Administration\Products\Http\Controllers;
use App\Applications\Administration\Base\Http\Controllers\BaseController;
use App\Applications\Administration\Products\Requests\ProductFormRequest;

class ProductsController extends BaseController
{
    protected $products;
    protected $status;

    public function __construct() {
        $this->products     = \App::make('App\Domains\Products\ProductsRepositoryInterface');
        $this->status       = \App::make('App\Domains\Status\StatusRepositoryInterface');
    }

    public function index()
    {
        return $this->products->index();
    }
    //gera o datatable
    public function datatable() {
        $data = $this->products->datatable();
        return $data;
    }

    public function create()
    {
        return $this->products->create($this->status->comboStatus());
    }
    public function store(ProductFormRequest $request)
    {
        return $this->products->store($request);
    }
    public function edit($id)
    {
        return $this->products->edit(['status'=>$this->status->comboStatus(), 'id'=>$id]);
    }
    public function update(ProductFormRequest $request)
    {
        return $this->products->update($request);
    }
    public function destroy()
    {
        return $this->products->destroy();
    }
    public function duplicate()
    {
        return $this->products->duplicate();
    }

    public function autocomplete(){
        return $this->products->autocomplete();
    }
    public function filterById($id)
    {
        return $this->products->filterById($id);
    }
}