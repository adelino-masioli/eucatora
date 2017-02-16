<?php
/**
 * Created by PhpStorm.
 * User: alfjuniorbh
 * Date: 16/10/16
 * Time: 20:01
 */

namespace App\Domains\Purchases;
use App\Core\Http\Helpers\AppHelpers;
use App\Domains\Providers\Provider;
use AppHelper;
use Image;
use Yajra\Datatables\Datatables;


class PurchasesRepository implements PurchasesRepositoryInterface
{

    public function index()
    {
        return view('purchases::home');
    }
    //create data_table
    public function data_table()
    {
        $data = Purchase::select(['id','denomination', 'owner_name',  'total_area',  'date',  'status_id']);
        $data_tables =  Datatables::of($data)
            ->addColumn('buttons',function($data){return AppHelper::gem_btn_datatable('purchase', $data->id, false);})
            ->editColumn('status_id',function($data){return $data->status->status;})
            ->editColumn('date',function($data){return AppHelper::date_only_br($data->date);});
        $this->filter($data_tables);
        return $data_tables->make(true);
    }

    public function filter($data_tables)
    {
        if ($id = \Request::get('id')) {
            $data_tables->where('id',  $id);
        }
        if ($name = \Request::get('denomination')) {
            $data_tables->where('denomination', 'like', "%".$name."%");
        }
        if ($owner_name = \Request::get('owner_name')) {
            $data_tables->where('owner_name', 'like', "%".$owner_name."%");
        }
        if (\Request::get('date_initial') && \Request::get('date_end')) {
            $data_tables->whereBetween('date', array(AppHelper::date_universal(\Request::get('date_initial')), AppHelper::date_universal(\Request::get('date_end'))));
        }
        if ($status_id = \Request::get('status_id')) {
            $data_tables->where('purchases.status_id', '=', intval($status_id));
        }
    }
    public function all()
    {
        return Purchase::get();
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
        $colections = Purchase::all();
        $data = array();
        $data[''] = 'Selecione';
        foreach ($colections as $colection):
            $data[$colection] = $colection->name;
        endforeach;
        return $data;
    }

    public function create($compact=[])
    {
        return view('purchases::create');
    }
    public function store($request)
    {
        try{
            $data                      = $request->all();
            $data['transaction']       = AppHelper::gen_token();
            $data['status_id']         = 1;
            $array                     = Purchase::create($data);

            if ($array->save()):
                $msg = ['status'=>1, 'response'=>\Lang::get('messages.successsave'), 'url'=>url('dashboard/purchase/edit/'.$array->id)];
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
        $purchase         = Purchase::find($compact['id']);
        $status           = $compact['status'];

        return view('purchases::edit', compact('purchase',  'status'));
    }
    public function update($request)
    {
        try{
            $purchase = Purchase::findOrFail($request->purchase_id);

            $data                      = $request->all();
            $data['transaction']       = $purchase->transaction;
            $data['status_id']         = 2;

            if($purchase->fill($data)->save()):
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
    public function duplicate()
    {
        $id = \Request::input('id');
        $row = Purchase::findOrFail($id);
        $newname = $row->denomination . '-Copy'.date('Y-m-d H:m:s');

        $data                      = $row;
        $data['transaction']       = AppHelper::gen_token();
        $data['denomination']      = $newname;
        $data['status_id']         = 1;

        $array = $data->replicate();

        if ($array->save()):
            $msg = ['status'=>1, 'response'=>\Lang::get('messages.successduplicate')];
            return json_encode($msg);
        else:
            $msg = ['status'=>2, 'response'=>\Lang::get('messages.errorduplicate')];
            return json_encode($msg);
        endif;
    }


    public function destroy()
    {
        $id = \Request::input('id');
        try{
            $purchase = Purchase::findOrFail($id);

            $purchase->delete();

            $msg = ['status'=>1, 'response'=>\Lang::get('messages.successdestroy')];
            return json_encode($msg);
        }catch(\Exception $e){
            $msg = ['status'=>2, 'response'=>\Lang::get('messages.errordestroy')];
            return json_encode($msg);
        }
    }
    public function findRegister($id)
    {
        return Purchase::findOrFail($id);
    }

}