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
        if ($price = \Request::get('price')) {
            $datatables->where('price', '=', AppHelper::money_reverse($price));
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

    //reports
    public function report()
    {
        return view('financials::report');
    }
    public function reportFilter()
    {

        try{
            $data = Financial::select('id', 'title', 'date_initial', 'date_final' , 'date_alert', 'amount', 'price', 'type', 'status');


            if ($title = \Request::get('title')) {
                $filter = $data->where('title', 'like', "%".$title."%");
            }
            if ($date_initial1  = \Request::get('date_initial') && $date_end1 = \Request::get('date_final')) {
                $date_initial   = AppHelper::format_inversedateonly($date_initial1);
                $date_final     = AppHelper::format_inversedateonly($date_end1);
                $filter =  $data->whereBetween('date_initial', array($date_initial, $date_final));
            }
            if ($price = \Request::get('price')) {
                $value    = AppHelper::money_reverse($price);
                $valueint = intval($value);
                $filter =  $data->where('price', 'like', "%{$valueint}%");
            }
            if ($type = \Request::get('type')) {
                $filter =  $data->where('type', '=', intval($type));
            }
            if ($destination = \Request::get('destination')) {
                $filter = $data->where('destination', '=', $destination);
            }
            if ($status = \Request::get('status')) {
                $filter = $data->where('status', '=', intval($status));
            }

            if ($data->count() > 0):

                session()->forget('report');
                session(['report' => $filter->get()]);

                $data_array = array();
                foreach ($filter->get() as $rows){
                    $data_array[$rows->id]['title']        =  $rows->title;
                    $data_array[$rows->id]['date_initial'] =  AppHelper::date_only_br($rows->date_initial);
                    $data_array[$rows->id]['date_final']   =  AppHelper::date_only_br($rows->date_final);
                    $data_array[$rows->id]['date_alert']   =  AppHelper::date_only_br($rows->date_alert);
                    $data_array[$rows->id]['price']        =  AppHelper::money_br($rows->price);
                    $data_array[$rows->id]['type']         =  AppHelper::financial_type($rows->type);
                    $data_array[$rows->id]['status']       =  AppHelper::financial_status($rows->status);
                }

                $msg = ['status'=>1, 'data'=>$data_array];
                return json_encode($msg);
            else:
                session()->forget('report');
                $msg = ['status'=>2, 'response'=>\Lang::get('messages.errorsearch')];
                return json_encode($msg);
            endif;
        }catch(\Exception $e){
            session()->forget('report');
            $msg = ['status'=>2, 'response'=>\Lang::get('messages.errorsearch')];
            return json_encode($msg);
        }
    }
    //export xls
    public function reportXls()
    {
        \Excel::create('Financeiro - '.date('d-m-Y'), function($excel) {
            $excel->sheet('Financeiro - '.date('d-m-Y'), function($sheet) {
                $sheet->setPageMargin(0.25);
                $sheet->setStyle(array(
                    'font' => array(
                        'name'      =>  'Arial'
                    )
                ));

                if(session()->get('report') && session()->get('report') != ''){
                    $data = session()->get('report');
                }else{
                    $data = Financial::select('id', 'title', 'date_initial', 'date_final' , 'date_alert', 'amount', 'price', 'type', 'status')->get();
                }

                $sheet->loadView('financials::partial.export.xls', array('data' =>$data));
                $sheet->setOrientation('landscape');
            });
        })->export('xls');

    }
    //export pdfs
    public function reportPdf()
    {
        if(session()->get('report') && session()->get('report') != ''){
            $data = session()->get('report');
        }else{
            $data = Financial::select('id', 'title', 'date_initial', 'date_final' , 'date_alert', 'amount', 'price', 'type', 'status')->get();
        }

        $pdf = \PDF::loadView('financials::partial.export.pdf', compact('data'))->setPaper('a4', 'portrait');
        return $pdf->download(date('Y-m-d H:i:s').'.pdf');
    }
}