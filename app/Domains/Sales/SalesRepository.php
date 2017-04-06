<?php
/**
 * Created by PhpStorm.
 * User: alfjuniorbh
 * Date: 16/10/16
 * Time: 20:01
 */

namespace App\Domains\Sales;
use App\Core\Http\Helpers\AppHelpers;
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
        $data = Sale::select(['sales.id', 'date', 'amount',  'total_price',  'total_meters', 'price_shipp', 'sales.status_id', 'customers.name'])
        ->leftJoin('customers', 'customers.id', '=', 'sales.customer_id');
        $data_tables =  Datatables::of($data)
            ->addColumn('buttons',function($data){return AppHelper::gem_btn_datatable('sale', $data->id, false);})
            ->editColumn('status_id',function($data){return $data->status->status;})
            ->editColumn('date',function($data){return AppHelper::date_only_br($data->date);})
            ->editColumn('price_shipp',function($data){return AppHelper::money_br($data->price_shipp);})
            ->editColumn('total',function($data){return AppHelper::money_br($data->total_price);})
            ->setRowClass(function ($data) {return AppHelper::row_color($data->status_id); });
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
                'total_meters'          => 0.00,
                'price_shipp'           => 0.00,
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

            $amount               = $sale_itens ? $sale_itens->sum('amount_item') : '0.00';
            $total_price          = $sale_itens ? $sale_itens->sum('price_total') : '0.00';
            $total_meters         = $sale_itens ? $sale_itens->sum('meters') : '0.00';

            $array = [
                'date'                  => $sale->date,
                'time'                  => $sale->time,
                'amount'                => $amount,
                'total_price'           => $total_price,
                'total_meters'          => $total_meters,
                'price_shipp'           => $sale->price_shipp,
                'description'           => $request->description ? $request->description : '',
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
    public function updateShipp($request)
    {
        try{
            $sale = Sale::findOrFail($request->sale_id);

            $array = [
                'price_shipp'  => AppHelpers::money_reverse($request->price_shipp)
            ];
            if($sale->fill($array)->save()):
                $sale_itens_subtotal = SalesRepository::subtotal($request->sale_id);
                $sale_itens_total    = SalesRepository::total($request->sale_id);
                $msg = ['status'=>1, 'response'=>\Lang::get('messages.successsave'), 'subtotal'=>$sale_itens_subtotal, 'total'=>$sale_itens_total];
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
    public function updatediscount($request)
    {
        try{
            $sale = Sale::findOrFail($request->sale_id);

            $array = [
                'discount'  => AppHelpers::money_reverse($request->discount)
            ];
            if($sale->fill($array)->save()):
                $sale_itens_subtotal = SalesRepository::subtotal($request->sale_id);
                $sale_itens_total    = SalesRepository::total($request->sale_id);
                $msg = ['status'=>1, 'response'=>\Lang::get('messages.successsave'), 'subtotal'=>$sale_itens_subtotal, 'total'=>$sale_itens_total];
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
        $row = Sale::findOrFail($id);

        $data                      = $row;
        $data['transaction']       = AppHelper::gen_token();
        $data['amount']            = 0;
        $data['total_price']       = 0.00;
        $data['total_meters']      = 0.00;
        $data['price_shipp']       = 0.00;
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
                'amount_item'     => $request->amount_item,
                'radial'          => $request->radial,
                'meters'          => AppHelper::money_reverse($request->meters),
                'meters_type'     => $request->meters_type,
                'price_unit'      => AppHelper::money_reverse($request->price_unit),
                'price_total'     => AppHelper::money_reverse($request->price_total),
                'product_id'      => $request->product_id,
                'sale_id'         => $request->sale_id,
            ]);
            if ($array->save()):
                $sale_itens = SalesRepository::listItens($request->sale_id);
                $sale_itens_subtotal = SalesRepository::subtotal($request->sale_id);
                $sale_itens_total    = SalesRepository::total($request->sale_id);
                $msg = ['status'=>1, 'response'=>\Lang::get('messages.successsave'), 'result'=>$sale_itens, 'subtotal'=>$sale_itens_subtotal, 'total'=>$sale_itens_total];
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
            $sale_itens_subtotal = SalesRepository::subtotal($saleitem->sale_id);
            $sale_itens_total    = SalesRepository::total($saleitem->sale_id);
            $msg = ['status'=>1, 'response'=>\Lang::get('messages.successdestroy'), 'result'=>$sale_itens, 'subtotal'=>$sale_itens_subtotal, 'total'=>$sale_itens_total];
            return json_encode($msg);
        }catch(\Exception $e){
            $msg = ['status'=>2, 'response'=>\Lang::get('messages.errordestroy')];
            return json_encode($msg);
        }
    }

    public function listItens($sale_id)
    {
        $sale_itens   = SaleItem::select('sale_itens.id', 'amount_item', 'meters', 'meters_type',  'price_unit',  'price_total', 'name')
            ->leftJoin('products', 'products.id', '=', 'sale_itens.product_id')
            ->where('sale_id', $sale_id)
            ->orderBy('id')
            ->get();

        return $sale_itens;
    }

    public function subtotal($sale_id){
        $sale_itens_subtotal   = SaleItem::select('price_total')
            ->where('sale_id', $sale_id)
            ->orderBy('id')
            ->sum('price_total');

        return AppHelper::money_br($sale_itens_subtotal);
    }

    public function total($sale_id){
        $sale_sale_shipp   = Sale::select('price_shipp')
            ->where('id', $sale_id)
            ->sum('price_shipp');

        $sale_sale_discount  = Sale::select('discount')
            ->where('id', $sale_id)
            ->sum('discount');

        $sale_itens_subtotal   = SaleItem::select('price_total')
            ->where('sale_id', $sale_id)
            ->sum('price_total');

        return AppHelper::money_br($sale_itens_subtotal - $sale_sale_shipp - $sale_sale_discount);
    }



    //export pdf
    public function exportpdf($id)
    {
        $sale = Sale::select('*')->where('id', $id)->first();
        $item = SaleItem::select('*')->where('sale_id', $sale->id)->get();

        $pdf = \PDF::loadView('sales::export.pdf', compact('sale', 'item'))->setPaper('a4', 'portrait');
        return $pdf->download(date('Y-m-d H:i:s').'.pdf');
    }

}