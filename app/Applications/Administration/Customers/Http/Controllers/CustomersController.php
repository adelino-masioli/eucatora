<?php
/**
 * Created by PhpStorm.
 * User: alfjuniorbh
 * Date: 16/10/16
 * Time: 19:51
 */

namespace App\Applications\Administration\Customers\Http\Controllers;
use App\Applications\Administration\Base\Http\Controllers\BaseController;
use App\Applications\Administration\Customers\Requests\CustomerFormRequest;
use App\Domains\Customers\Customer;

class CustomersController extends BaseController
{
    protected $customers;
    protected $states;
    protected $cities;
    protected $status;

    public function __construct() {
        $this->customers       = \App::make('App\Domains\Customers\CustomersRepositoryInterface');
        $this->states          = \App::make('App\Domains\States\StatesRepositoryInterface');
        $this->cities          = \App::make('App\Domains\Cities\CitiesRepositoryInterface');
        $this->status          = \App::make('App\Domains\Status\StatusRepositoryInterface');
    }

    public function index()
    {
        return $this->customers->index();
    }
    
    public function data_table() {
        $data = $this->customers->data_table();
        return $data;
    }
    
    public function create()
    {
        return $this->customers->create(['status'=>$this->status->comboStatus(),  'states'=>$this->states->getAll()]);
    }
    public function store(CustomerFormRequest $request)
    {
        return $this->customers->store($request);
    }
    public function edit($id)
    {
        return $this->customers->edit(['status'=>$this->status->comboStatus(),  'states'=>$this->states->getAll(), 'cities' =>$this->cities->combo_cities_by_state_id($this->customers->findRegister($id)->state_id), 'id'=>$id]);
    }
    public function update(CustomerFormRequest $request)
    {
        return $this->customers->update($request);
    }
    public function destroy()
    {
        return $this->customers->destroy();
    }
    public function auto_complete(){
        return $this->customers->auto_complete();
    }
    public function search(){
        return $this->customers->search();
    }

    public function campos(){
        return Customer::getTableColumns();
    }
}