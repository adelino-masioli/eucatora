<?php
/**
 * Created by PhpStorm.
 * User: alfjuniorbh
 * Date: 16/10/16
 * Time: 19:51
 */

namespace App\Applications\Administration\Financials\Http\Controllers;
use App\Applications\Administration\Base\Http\Controllers\BaseController;
use App\Applications\Administration\Financials\Requests\CheckFormRequest;
use App\Applications\Administration\Financials\Requests\FinancialFormRequest;

class FinancialChecksController extends BaseController
{
    protected $financials;

    public function __construct() {
        $this->financials     = \App::make('App\Domains\Financials\FinancialChecksRepositoryInterface');
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
    public function editCheck($transaction)
    {
        return $this->financials->edit(['transaction'=>$transaction, 'code'=>0]);
    }
    public function edit($id)
    {
        return $this->financials->edit(['code'=>$id]);
    }
    public function add(CheckFormRequest $request)
    {
        return $this->financials->add($request);
    }
    public function update(CheckFormRequest $request)
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
    public function report()
    {
        return $this->financials->report();
    }
    public function reportFilter()
    {
        return $this->financials->reportFilter();
    }
    public function reportXls()
    {
        return $this->financials->reportXls();
    }
    public function reportPdf()
    {
        return $this->financials->reportPdf();
    }
}