<?php
/**
 * Created by PhpStorm.
 * User: alfjuniorbh
 * Date: 16/10/16
 * Time: 20:01
 */

namespace App\Domains\Financials;
use AppHelper;
use Yajra\Datatables\Datatables;


class FinancialsRepository implements FinancialsRepositoryInterface
{

    public function index()
    {
        return view('financials::home');
    }
    //create datatable
    public function datatable()
    {
        $data = Financial::select(['id', 'title', 'date_initial', 'date_final', 'date_alert', 'price', 'type', 'destination', 'status']);
        $datatables =  Datatables::of($data)
            ->addColumn('buttons',function($data){return AppHelper::gem_btn_datatable('financial', $data->id);})
            ->editColumn('date_initial',function($data){return AppHelper::date_only_br($data->date_initial);})
            ->editColumn('date_final',function($data){return AppHelper::date_only_br($data->date_final);})
            ->editColumn('date_alert',function($data){return AppHelper::date_only_br($data->date_alert);})
            ->editColumn('price',function($data){return AppHelper::money_br($data->price);})
            ->editColumn('type',function($data){return AppHelper::financial_type($data->type);})
            ->editColumn('status',function($data){return AppHelper::financial_status($data->status);});
        $this->filter($datatables);
        return $datatables->make(true);
    }

    public function filter($datatables)
    {
        if ($title = \Request::get('title')) {
            $datatables->where('title', 'like', "%".$title."%");
        }
        if ($date_initial1  = \Request::get('date_initial') && $date_end1 = \Request::get('date_final')) {
            $date_initial   = AppHelper::format_inversedateonly($date_initial1);
            $date_final     = AppHelper::format_inversedateonly($date_end1);
            $datatables->whereBetween('date_initial', array($date_initial, $date_final));
        }
        if ($date_alert = \Request::get('date_alert')) {
            $datatables->where('date_alert', '=', AppHelper::format_inversedateonly($date_alert));
        }
        if ($type = \Request::get('type')) {
            $datatables->where('type', '=', intval($type));
        }
        if ($destination = \Request::get('destination')) {
            $datatables->where('destination', '=', intval($destination));
        }
        if ($status = \Request::get('status')) {
            $datatables->where('status', '=', intval($status));
        }
    }

    public function all()
    {
        return Product::get();
    }

    public function autocomplete()
    {
        $query = \Request::get('query');
        $data = Product::select('name')->where('name', 'like', "%".$query."%")->get();

        $resArray = [];
        foreach($data as $index=>$res ){
            $resArray[$index] = [
                'name' => $res->name
            ];
        }
        return response()->json($resArray);
    }

    public function create()
    {
        return view('financials::create');
    }
    public function store($request)
    {

        $array = new Financial([
            'transaction' => AppHelper::gen_token(),
            'title'       => $request->title,
            'date_initial'=> AppHelper::format_inversedateonly($request->date_initial),
            'date_final'  => AppHelper::format_inversedateonly($request->date_final),
            'date_alert'  => AppHelper::format_inversedateonly($request->date_alert),
            'time'        => date('H:i:s'),
            'amount'      => $request->amount,
            'price'       => AppHelper::money_reverse($request->price),
            'provider'    => $request->provider,
            'description' => $request->description,
            'type'        => $request->type,
            'destination' => $request->destination,
            'status'      => $request->status
        ]);
        if ($array->save()):
            $msg = ['status'=>1, 'response'=>\Lang::get('messages.successsave')];
            return json_encode($msg);
        else:
            $msg = ['status'=>2, 'response'=>\Lang::get('messages.errorsave')];
            return json_encode($msg);
        endif;
    }
    public function edit($compact=[])
    {
        $financial  = Financial::find($compact['id']);
        return view('financials::edit', compact('financial'));
    }
    public function update($request)
    {
        $row = Financial::findOrFail($request->id);

        $array = [
            'transaction' => $row->transaction,
            'title'       => $request->title,
            'date_initial'=> AppHelper::format_inversedateonly($request->date_initial),
            'date_final'  => AppHelper::format_inversedateonly($request->date_final),
            'date_alert'  => AppHelper::format_inversedateonly($request->date_alert),
            'time'        => date('H:i:s'),
            'amount'      => $request->amount,
            'price'       => AppHelper::money_reverse($request->price),
            'provider'    => $request->provider,
            'description' => $request->description,
            'type'        => $request->type,
            'destination' => $request->destination,
            'status'      => $request->status
        ];
        if ($row->fill($array)->save()):
            $msg = ['status'=>1, 'response'=>\Lang::get('messages.successsave')];
            return json_encode($msg);
        else:
            $msg = ['status'=>2, 'response'=>\Lang::get('messages.errorsave')];
            return json_encode($msg);
        endif;
    }

    public function destroy()
    {
        $id = \Request::input('id');
        try{
            $row = Financial::findOrFail($id);
            if($row->status == 2){
                $msg = ['status'=>2, 'response'=>\Lang::get('messages.errordestroy')];
                return json_encode($msg);
            }else{
                $row->delete();
                $msg = ['status'=>1, 'response'=>\Lang::get('messages.successdestroy')];
                return json_encode($msg);
            }
        }catch(\Exception $e){
            $msg = ['status'=>2, 'response'=>\Lang::get('messages.errordestroy')];
            return json_encode($msg);
        }
    }
    public function duplicate()
    {
        $id = \Request::input('id');
        $row = Financial::findOrFail($id);
        $newname = $row->title . '- Copy - '.date('Y-m-d H:m:s');

        $array = new Financial([
            'transaction' => AppHelper::gen_token(),
            'title'       => $newname,
            'date_initial'=> $row->date_initial,
            'date_final'  => $row->date_final,
            'date_alert'  => $row->date_alert,
            'time'        => date('H:i:s'),
            'amount'      => $row->amount,
            'price'       => $row->price,
            'provider'    => $row->provider,
            'description' => $row->description,
            'type'        => $row->type,
            'destination' => $row->destination,
            'status'      => 1
        ]);
        if ($array->save()):
            $msg = ['status'=>1, 'response'=>\Lang::get('messages.successduplicate')];
            return json_encode($msg);
        else:
            $msg = ['status'=>2, 'response'=>\Lang::get('messages.errorduplicate')];
            return json_encode($msg);
        endif;
    }
}