<?php
/**
 * Created by PhpStorm.
 * User: alfjuniorbh
 * Date: 16/10/16
 * Time: 19:51
 */

namespace App\Applications\Administration\Providers\Http\Controllers;
use App\Applications\Administration\Base\Http\Controllers\BaseController;
use App\Applications\Administration\Providers\Requests\ProviderFormRequest;
use App\Domains\Providers\Customer;

class ProvidersController extends BaseController
{
    protected $providers;
    protected $states;
    protected $cities;
    protected $status;

    public function __construct() {
        $this->providers       = \App::make('App\Domains\Providers\ProvidersRepositoryInterface');
        $this->states          = \App::make('App\Domains\States\StatesRepositoryInterface');
        $this->cities          = \App::make('App\Domains\Cities\CitiesRepositoryInterface');
        $this->status          = \App::make('App\Domains\Status\StatusRepositoryInterface');
    }

    public function index()
    {
        return $this->providers->index();
    }
    
    public function data_table() {
        $data = $this->providers->data_table();
        return $data;
    }
    
    public function create()
    {
        return $this->providers->create(['status'=>$this->status->comboStatus(),  'states'=>$this->states->getAll()]);
    }
    public function store(ProviderFormRequest $request)
    {
        return $this->providers->store($request);
    }
    public function edit($id)
    {
        return $this->providers->edit(['status'=>$this->status->comboStatus(),  'states'=>$this->states->getAll(), 'cities' =>$this->cities->combo_cities_by_state_id($this->providers->findRegister($id)->state_id), 'id'=>$id]);
    }
    public function update(ProviderFormRequest $request)
    {
        return $this->providers->update($request);
    }
    public function destroy()
    {
        return $this->providers->destroy();
    }
    public function auto_complete(){
        return $this->providers->auto_complete();
    }
    public function search(){
        return $this->providers->search();
    }

    public function campos(){
        return Customer::getTableColumns();
    }

    public function searchById(){
        return $this->providers->searchById();
    }
}