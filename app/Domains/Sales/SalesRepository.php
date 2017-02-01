<?php
/**
 * Created by PhpStorm.
 * User: alfjuniorbh
 * Date: 16/10/16
 * Time: 20:01
 */

namespace App\Domains\Sales;
use App\Domains\Customers\Customer;
use AppHelper;
use Image;
use Yajra\Datatables\Datatables;


class SalesRepository implements SalesRepositoryInterface
{

    public function index()
    {
        return view('sales::home');
    }
    //create data_table
    public function data_table()
    {
        $data = Sale::select(['sales.id', 'date', 'amount',  'total_price',  'total_meters_square', 'total_meters_stereo', 'sales.status_id', 'customers.name'])
        ->leftJoin('customers', 'customers.id', '=', 'sales.customer_id');
        $data_tables =  Datatables::of($data)
            ->addColumn('buttons',function($data){return AppHelper::gem_btn_datatable('sale', $data->id, true);})
            ->editColumn('status_id',function($data){return $data->status->status;})
            ->editColumn('date',function($data){return AppHelper::date_only_br($data->date);})
            ->editColumn('square',function($data){return AppHelper::money_br($data->total_meters_square);})
            ->editColumn('stereo',function($data){return AppHelper::money_br($data->total_meters_stereo);})
            ->editColumn('total',function($data){return AppHelper::money_br($data->total_price);});
        $this->filter($data_tables);
        return $data_tables->make(true);
    }

    public function filter($data_tables)
    {
        if ($name = \Request::get('name')) {
            $data_tables->where('customers.name', 'like', "%".$name."%");
        }
        if (\Request::get('date_initial') && \Request::get('date_end')) {
            $data_tables->whereBetween('date', array(AppHelper::date_universal(\Request::get('date_initial')), AppHelper::date_universal(\Request::get('date_end'))));
        }
        if ($amount = \Request::get('amount')) {
            $data_tables->where('amount', '=', ".$amount.");
        }
        if ($total_price = \Request::get('total_price')) {
            $data_tables->where('total_price', '=', ".$total_price.");
        }
        if ($total_meters_square = \Request::get('total_meters_square')) {
            $data_tables->where('total_meters_square', '=', ".$total_meters_square.");
        }
        if ($total_meters_stereo = \Request::get('total_meters_stereo')) {
            $data_tables->where('total_meters_stereo', '=', ".$total_meters_stereo.");
        }
        if ($status_id = \Request::get('status_id')) {
            $data_tables->where('sales.status_id', '=', intval($status_id));
        }
    }
    public function all()
    {
        return Sale::get();
    }


    public function create($compact=[])
    {
        $customers        = $compact['customers'];
        return view('sales::create', compact('customers'));
    }
    public function store($request)
    {
        try{
            $array = new Sale([
                'transaction'           => AppHelper::gen_token(),
                'date'                  => date('Y-m-d'),
                'time'                  => date('H:i:s'),
                'amount'                => 0,
                'total_price'           => 0.00,
                'total_meters_square'   => 0.00,
                'total_meters_stereo'   => 0.00,
                'description'           => '',
                'customer_id'           => $request->customer_id,
                'status_id'             => 1
            ]);
            if ($array->save()):
                $msg = ['status'=>1, 'response'=>\Lang::get('messages.successsave'), 'url'=>url('dashboard/sale/edit/'.$array->id)];
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
        $sale          = Sale::find($compact['id']);
        $customers     = $compact['customers'];
        $customer      = Customer::where('id', $sale->customer_id)->first();
        $products      = $compact['products'];
        $sales_itens   = SaleItem::where('sale_id', $compact['id'])->get();

        return view('sales::edit', compact('sale', 'customer', 'customers', 'products', 'sales_itens'));
    }
    public function update($request)
    {


        try{
            $sale = Sale::findOrFail($request->sale_id);
            $sale_itens = SaleItem::where('sale_id', $request->sale_id);

            $amount               = $sale_itens->sum('amount');
            $total_price          = $sale_itens->sum('price');
            $total_meters_square  = $sale_itens->sum('meters_square');
            $total_meters_stereo  = $sale_itens->sum('meters_stereo');

            $array = [
                'date'                  => $sale->date,
                'time'                  => $sale->time,
                'amount'                => $amount,
                'total_price'           => $total_price,
                'total_meters_square'   => $total_meters_square,
                'total_meters_stereo'   => $total_meters_stereo,
                'description'           => $request->description,
                'customer_id'           => $request->customer_id,
                'status_id'             => 2,
            ];
            if($sale->fill($array)->save()):
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
            $sale = Sale::findOrFail($id);

            $sale->delete();

            $msg = ['status'=>1, 'response'=>\Lang::get('messages.successdestroy')];
            return json_encode($msg);
        }catch(\Exception $e){
            $msg = ['status'=>2, 'response'=>\Lang::get('messages.errordestroy')];
            return json_encode($msg);
        }
    }
    public function findRegister($id)
    {
        return Sale::findOrFail($id);
    }

    //additem on purchases
    public function addItem($request)
    {
        try{
            $array = new SaleItem([
                'amount'          => $request->amount,
                'price'           => AppHelper::money_reverse($request->price),
                'meters_square'   => AppHelper::money_reverse($request->meters_square),
                'meters_stereo'   => AppHelper::money_reverse($request->meters_stereo),
                'product_id'      => $request->product_id,
                'sale_id'         => $request->sale_id,
            ]);
            if ($array->save()):
                $sale_itens = SalesRepository::listItens($request->sale_id);
                $msg = ['status'=>1, 'response'=>\Lang::get('messages.successsave'), 'result'=>$sale_itens];
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
            $saleitem = SaleItem::findOrFail($id);
            $saleitem->delete();

            $sale_itens = SalesRepository::listItens($saleitem->sale_id);
            $msg = ['status'=>1, 'response'=>\Lang::get('messages.successdestroy'), 'result'=>$sale_itens];
            return json_encode($msg);
        }catch(\Exception $e){
            $msg = ['status'=>2, 'response'=>\Lang::get('messages.errordestroy')];
            return json_encode($msg);
        }
    }

    public function listItens($sale_id)
    {
        $sale_itens   = SaleItem::select('sale_itens.id', 'amount', 'meters_square', 'meters_stereo', 'price', 'name')
            ->leftJoin('products', 'products.id', '=', 'sale_itens.product_id')
            ->where('sale_id', $sale_id)
            ->orderBy('id')
            ->get();

        return $sale_itens;
    }

}