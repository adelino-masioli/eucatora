<?php
/**
 * Created by PhpStorm.
 * User: alfjuniorbh
 * Date: 16/10/16
 * Time: 20:01
 */

namespace App\Domains\Customers;
use App\Domains\Users\UsersRepository;
use AppHelper;
use Image;
use Yajra\Datatables\Datatables;


class CustomersRepository implements CustomersRepositoryInterface
{

    public function index()
    {
        return view('customers::home');
    }
    //create data_table
    public function data_table()
    {
        $data = Customer::select(['id', 'name', 'document', 'phone', 'celullar', 'status_id']);
        $data_tables =  Datatables::of($data)
            ->addColumn('buttons',function($data){return AppHelper::gem_btn_datatable('customer', $data->id, true);})
            ->editColumn('status_id',function($data){return $data->status->status;});
        $this->filter($data_tables);
        return $data_tables->make(true);
    }

    public function filter($data_tables)
    {
        if ($name = \Request::get('name')) {
            $data_tables->where('name', 'like', "%".$name."%");
        }
        if ($document = \Request::get('document')) {
            $data_tables->where('document', '=', ".$document.");
        }
        if ($phone = \Request::get('phone')) {
            $data_tables->where('phone', '=', ".$phone.");
        }
        if ($celullar = \Request::get('celullar')) {
            $data_tables->where('celullar', '=', ".$celullar.");
        }
        if ($order = \Request::get('s_order')) {
            $data_tables->where('order', '=', intval($order));
        }
        if ($status_id = \Request::get('status_id')) {
            $data_tables->where('status_id', '=', intval($status_id));
        }
    }

    public function all()
    {
        return Customer::get();
    }
    public function selectCustomers()
    {
        return Customer::select('id', 'name')->get();
    }
    public function search()
    {
        $search  = \Request::get('search');
        $data = Customer::select('id', 'name', 'zipcode', 'address', 'neighborhood', 'number', 'complement');
        if($search!=''){
            $data  = $data->where('name', 'like', '%'.$search.'%');
        }else{
            $data= $data;
        }
        $count = $data->count();
        if($count > 0){
            $rows = $data->get();
            $msg = ['status'=>1, 'result'=>$rows];
            return json_encode($msg);
        }else{
            $msg = ['status'=>2, 'response'=>\Lang::get('messages.errorsearch')];
            return json_encode($msg);
        }
    }

    public function auto_complete()
    {
        $query = \Request::get('query');
        $data = Customer::select('name')->where('name', 'like', "%".$query."%")->get();

        $resArray = [];
        foreach($data as $index=>$res ){
            $resArray[$index] = [
                'name' => $res->name
            ];
        }
        return response()->json($resArray);
    }
    public function combo()
    {
        $colections = Customer::all();
        $data = array();
        $data[''] = 'Selecione';
        foreach ($colections as $colection):
            $data[$colection->id] = $colection->name;
        endforeach;
        return $data;
    }

    public function create($compact=[])
    {
        $status           = $compact['status'];
        $states           = $compact['states'];
        return view('customers::create', compact('status',  'states'));
    }
    public function store($request)
    {
        try{
            $array = new Customer([
                'name'              => $request->name,
                'document_type'     => $request->document_type,
                'document'          => $request->document,
                'site'              => $request->site,
                'email'             => $request->email,
                'phone'             => $request->phone,
                'celullar'          => $request->celullar,
                'zipcode'           => $request->zipcode,
                'neighborhood'      => $request->neighborhood,
                'address'           => $request->address,
                'number'            => $request->number,
                'complement'        => $request->complement,
                'state_id'          => $request->state_id,
                'city_id'           => $request->city_id,
                'status_id'         => $request->status_id
            ]);
            if ($array->save()):
                $msg = ['status'=>1, 'response'=>\Lang::get('messages.successsave')];
                return json_encode($msg);
            else:
                $msg = ['status'=>2, 'response'=>\Lang::get('messages.errorsave')];
                return json_encode($msg);
            endif;
        }catch(\Exception $e){
            $msg = ['status'=>2, 'response'=>\Lang::get('messages.errorsave')];
            return json_encode($msg);
        }
    }
    public function edit($compact=[])
    {
        $customer         = Customer::find($compact['id']);
        $status           = $compact['status'];
        $states           = $compact['states'];
        $cities           = $compact['cities'];
        return view('customers::edit', compact('customer',  'states', 'cities', 'status'));
    }
    public function update($request)
    {
        try{
            $customer = Customer::findOrFail($request->id);

            $array = [
                'name'              => $request->name,
                'document_type'     => $request->document_type,
                'document'          => $request->document,
                'site'              => $request->site,
                'email'             => $request->email,
                'phone'             => $request->phone,
                'celullar'          => $request->celullar,
                'zipcode'           => $request->zipcode,
                'neighborhood'      => $request->neighborhood,
                'address'           => $request->address,
                'number'            => $request->number,
                'complement'        => $request->complement,
                'state_id'          => $request->state_id,
                'city_id'           => $request->city_id,
                'status_id'         => $request->status_id
            ];
            if($customer->fill($array)->save()):
                $msg = ['status'=>1, 'response'=>\Lang::get('messages.successsave')];
                return json_encode($msg);
            else:
                $msg = ['status'=>2, 'response'=>\Lang::get('messages.errorsave')];
                return json_encode($msg);
            endif;
        }catch(\Exception $e){
            $msg = ['status'=>2, 'response'=>\Lang::get('messages.errorsave')];
            return json_encode($msg);
        }
    }
    public function destroy()
    {
        $id = \Request::input('id');
        try{
            $customer = Customer::findOrFail($id);

            $customer->delete();

            $msg = ['status'=>1, 'response'=>\Lang::get('messages.successdestroy')];
            return json_encode($msg);
        }catch(\Exception $e){
            $msg = ['status'=>2, 'response'=>\Lang::get('messages.errordestroy')];
            return json_encode($msg);
        }
    }
    public function findRegister($id)
    {
        return Customer::findOrFail($id);
    }

    public function searchById()
    {
        $search  = \Request::get('id');
        if(empty($search)){
            $msg = ['status'=>2, 'response'=>\Lang::get('messages.errorsearch')];
            return json_encode($msg);
            exit();
        }
        $data = Customer::select('customers.id', 'phone', 'celullar', 'zipcode', 'address', 'neighborhood',  'states.name as uf', 'cities.name as city')
            ->join('states', 'states.id', '=', 'customers.state_id')
            ->join('cities', 'cities.id', '=', 'customers.city_id');
        if($search!=''){
            $data  = $data->where('customers.id', $search);
        }else{
            $data= $data;
        }
        $count = $data->count();
        if($count > 0){
            $rows = $data->get();
            $msg = ['status'=>1, 'result'=>$rows];
            return json_encode($msg);
        }else{
            $msg = ['status'=>2, 'response'=>\Lang::get('messages.errorsearch')];
            return json_encode($msg);
        }
    }

}