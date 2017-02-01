<?php
/**
 * Created by PhpStorm.
 * User: alfjuniorbh
 * Date: 16/10/16
 * Time: 19:51
 */

namespace App\Applications\Administration\Financials\Http\Controllers;
use App\Applications\Administration\Base\Http\Controllers\BaseController;
use App\Applications\Administration\Financials\Requests\FinancialFormRequest;

class FinancialsController extends BaseController
{
    protected $financials;

    public function __construct() {
        $this->financials     = \App::make('App\Domains\Financials\FinancialsRepositoryInterface');
    }

    public function index()
    {
        return $this->financials->index();
    }
    //gera o datatable
    public function datatable() {
        $data = $this->financials->datatable();
        return $data;
    }

    public function create()
    {
        return $this->financials->create();
    }
    public function store(FinancialFormRequest $request)
    {
        return $this->financials->store($request);
    }
    public function edit($id)
    {
        return $this->financials->edit(['id'=>$id]);
    }
    public function update(FinancialFormRequest $request)
    {
        return $this->financials->update($request);
    }
    public function destroy()
    {
        return $this->financials->destroy();
    }
    public function duplicate()
    {
        return $this->financials->duplicate();
    }

    public function autocomplete(){
        return $this->financials->autocomplete();
    }
}