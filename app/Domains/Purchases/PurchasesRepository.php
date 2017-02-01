<?php
/**
 * Created by PhpStorm.
 * User: alfjuniorbh
 * Date: 16/10/16
 * Time: 20:01
 */

namespace App\Domains\Purchases;
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
        $data = Purchase::select(['purchases.id', 'date',  'total_price', 'total_area', 'total_meters_square', 'total_meters_stereo', 'purchases.status_id', 'providers.name'])
        ->leftJoin('providers', 'providers.id', '=', 'purchases.provider_id');
        $data_tables =  Datatables::of($data)
            ->addColumn('buttons',function($data){return AppHelper::gem_btn_datatable('purchase', $data->id, true);})
            ->editColumn('status_id',function($data){return $data->status->status;})
            ->editColumn('date',function($data){return AppHelper::date_only_br($data->date);})
            ->editColumn('area',function($data){return AppHelper::money_br($data->total_area);})
            ->editColumn('square',function($data){return AppHelper::money_br($data->total_meters_square);})
            ->editColumn('stereo',function($data){return AppHelper::money_br($data->total_meters_stereo);})
            ->editColumn('total',function($data){return AppHelper::money_br($data->total_price);});
        $this->filter($data_tables);
        return $data_tables->make(true);
    }

    public function filter($data_tables)
    {
        if ($name = \Request::get('name')) {
            $data_tables->where('providers.name', 'like', "%".$name."%");
        }
        if (\Request::get('date_initial') && \Request::get('date_end')) {
            $data_tables->whereBetween('date', array(AppHelper::date_universal(\Request::get('date_initial')), AppHelper::date_universal(\Request::get('date_end'))));
        }
        if ($total_price = \Request::get('total_price')) {
            $data_tables->where('total_price', '=', ".$total_price.");
        }
        if ($total_area = \Request::get('total_area')) {
            $data_tables->where('total_area', '=', ".$total_area.");
        }
        if ($total_meters_square = \Request::get('total_meters_square')) {
            $data_tables->where('total_meters_square', '=', ".$total_meters_square.");
        }
        if ($total_meters_stereo = \Request::get('total_meters_stereo')) {
            $data_tables->where('total_meters_stereo', '=', ".$total_meters_stereo.");
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
        $providers        = $compact['providers'];
        return view('purchases::create', compact('providers'));
    }
    public function store($request)
    {
        try{
            $array = new Purchase([
                'transaction'           => AppHelper::gen_token(),
                'date'                  => date('Y-m-d'),
                'time'                  => date('H:i:s'),
                'total_price'           => 0.00,
                'total_area'            => 0.00,
                'total_meters_square'   => 0.00,
                'total_meters_stereo'   => 0.00,
                'provider_id'           => $request->provider_id,
                'status_id'             => 1
            ]);
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
        $providers        = $compact['providers'];
        $provider         = Provider::where('id', $purchase->provider_id)->first();
        $products         = $compact['products'];
        $purchase_itens   = PurchaseItem::where('purchase_id', $compact['id'])->get();
        $purchase_taxes   = PurchaseTax::where('purchase_id', $compact['id'])->get();

        return view('purchases::edit', compact('purchase',  'status', 'provider', 'providers', 'products', 'purchase_itens', 'purchase_taxes'));
    }
    public function update($request)
    {


        try{
            $purchase = Purchase::findOrFail($request->purchase_id);
            $purchase_itens = PurchaseItem::where('purchase_id', $request->purchase_id);

            $total_price          = $purchase_itens->sum('price');
            $total_area           = $purchase_itens->sum('area');
            $total_meters_square  = $purchase_itens->sum('meters_square');
            $total_meters_stereo  = $purchase_itens->sum('meters_stereo');

            $array = [
                'date'                  => $purchase->date,
                'time'                  => $purchase->time,
                'total_price'           => $total_price,
                'total_area'            => $total_area,
                'total_meters_square'   => $total_meters_square,
                'total_meters_stereo'   => $total_meters_stereo,
                'description'           => $request->description,
                'provider_id'           => $request->provider_id,
                'status_id'             => 2,
            ];
            if($purchase->fill($array)->save()):
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

    //additem on purchases
    public function addItem($request)
    {
        try{
            $array = new PurchaseItem([
                'price'           => AppHelper::money_reverse($request->price),
                'area'            => AppHelper::money_reverse($request->area),
                'meters_square'   => AppHelper::money_reverse($request->meters_square),
                'meters_stereo'   => AppHelper::money_reverse($request->meters_stereo),
                'product_id'      => $request->product_id,
                'purchase_id'     => $request->purchase_id,
            ]);
            if ($array->save()):
                $purchase_itens = PurchasesRepository::listItens($request->purchase_id);
                $msg = ['status'=>1, 'response'=>\Lang::get('messages.successsave'), 'result'=>$purchase_itens];
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
    //destroyitem on purchases
    public function destroyItem()
    {
        $id = \Request::input('id');
        try{
            $purchase = PurchaseItem::findOrFail($id);
            $purchase->delete();

            $purchase_itens = PurchasesRepository::listItens($purchase->purchase_id);
            $msg = ['status'=>1, 'response'=>\Lang::get('messages.successdestroy'), 'result'=>$purchase_itens];
            return json_encode($msg);
        }catch(\Exception $e){
            $msg = ['status'=>2, 'response'=>\Lang::get('messages.errordestroy')];
            return json_encode($msg);
        }
    }

    public function listItens($purchase_id)
    {
        $purchase_itens   = PurchaseItem::select('purchase_itens.id', 'area', 'meters_square', 'meters_stereo', 'price', 'name')
            ->leftJoin('products', 'products.id', '=', 'purchase_itens.product_id')
            ->where('purchase_id', $purchase_id)
            ->orderBy('id')
            ->get();

        return $purchase_itens;
    }



    public function addTax($request)
    {
        try{
            $array = new PurchaseTax([
                'description'     => $request->description,
                'price'           => AppHelper::money_reverse($request->price),
                'purchase_id'     => $request->purchase_id,
            ]);
            if ($array->save()):
                $purchase_taxes = PurchasesRepository::listTaxes($request->purchase_id);
                $msg = ['status'=>1, 'response'=>\Lang::get('messages.successsave'), 'result'=>$purchase_taxes];
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
    //destroyitem on purchases
    public function destroyTax()
    {
        $id = \Request::input('id');
        try{
            $purchase = PurchaseTax::findOrFail($id);
            $purchase->delete();

            $purchase_taxes = PurchasesRepository::listTaxes($purchase->purchase_id);
            $msg = ['status'=>1, 'response'=>\Lang::get('messages.successdestroy'), 'result'=>$purchase_taxes];
            return json_encode($msg);
        }catch(\Exception $e){
            $msg = ['status'=>2, 'response'=>\Lang::get('messages.errordestroy')];
            return json_encode($msg);
        }
    }

    public function listTaxes($purchase_id)
    {
        $purchase_itens   = PurchaseTax::select('id', 'description', 'price')
            ->where('purchase_id', $purchase_id)
            ->orderBy('id')
            ->get();

        return $purchase_itens;
    }

}