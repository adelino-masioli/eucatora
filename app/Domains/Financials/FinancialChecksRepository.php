<?php
/**
 * Created by PhpStorm.
 * User: alfjuniorbh
 * Date: 16/10/16
 * Time: 20:01
 */

namespace App\Domains\Financials;
use App\Core\Http\Helpers\AppHelpers;
use AppHelper;
use Yajra\Datatables\Datatables;


class FinancialChecksRepository implements FinancialChecksRepositoryInterface
{

    public function index()
    {
        return view('financials::checks.home');
    }
    //create datatable
    public function datatable()
    {
        $data = CheckRelease::select(['id', 'description', 'accountant', 'check_number', 'bank', 'date_final', 'value', 'parcel', 'status']);
        $datatables =  Datatables::of($data)
            ->addColumn('buttons',function($data){return AppHelper::gem_btn_datatable('financial/check', $data->id);})
            ->editColumn('date_final',function($data){return AppHelper::date_only_br($data->date_final);})
            ->editColumn('value',function($data){return AppHelper::money_br($data->price);})
            ->editColumn('status',function($data){return AppHelper::financial_status($data->status);});
        $this->filter($datatables);
        return $datatables->make(true);
    }

    public function filter($datatables)
    {
        if ($title = \Request::get('description')) {
            $datatables->where('description', 'like', "%".$title."%");
        }
        if ($accountant = \Request::get('accountant')) {
            $datatables->where('accountant', 'like', "%".$accountant."%");
        }
        if ($date = \Request::get('date_final')) {
            $date_initial   = AppHelper::format_inversedateonly($date);
            $datatables->where('date_final', '=', $date_initial);
        }
        if ($value = \Request::get('value')) {
            $datatables->where('value', '=', AppHelper::money_reverse($value));
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
        $array = new Check([
            'transaction'  => AppHelper::gen_token()
        ]);
        $array->save();
        return redirect(url('dashboard/financial/check/edit-check/'.$array->transaction));
    }
    public function edit($compact=[])
    {
        $id = $compact['code'];
        if($id == 0) {
            $check = Check::where('transaction', $compact['transaction'])->first();
            $checks = CheckRelease::where('transaction', $compact['transaction'])->get();
            return view('financials::.checks.create', compact('check', 'checks'));
        }else{
            $check = CheckRelease::find($id);
            return view('financials::.checks.edit', compact('check'));
        }
    }
    public function add($request)
    {
        try{

           if($request->parcel == 1){
               $array = new CheckRelease([
                   'transaction'  => $request->transaction,
                   'description'  => $request->description,
                   'destination'  => $request->destination,
                   'bank'         => $request->bank,
                   'agency'       => $request->agency,
                   'account'      => $request->account,
                   'check_number' => $request->check_number,
                   'value'        => AppHelper::money_reverse($request->value),
                   'date_final'   => AppHelper::format_inversedateonly($request->date_final),
                   'time'         => date('H:i:s'),
                   'parcel'       => 1,
                   'accountant'   => $request->accountant,
                   'document'     => $request->document,
                   'status'       => $request->status
               ]);
               $array->save();
           }else{
               for($i=0;$i<$request->parcel;$i++){
                   $getcheck = CheckRelease::where('transaction', $request->transaction)->orderBy('id', 'desc');
                   if($getcheck->count() > 0) {
                       $datesum = date('Y-m-d', strtotime($getcheck->first()->date_final. ' + 30 days'));
                   }else{
                       $datesum = $i==0 ? AppHelper::format_inversedateonly($request->date_final) : date('Y-m-d', strtotime(AppHelper::format_inversedateonly($request->date_final) . ' + 30 days'));
                   }
                   $array = new CheckRelease([
                       'transaction'  => $request->transaction,
                       'description'  => $request->description,
                       'destination'  => $request->destination,
                       'bank'         => $request->bank,
                       'agency'       => $request->agency,
                       'account'      => $request->account,
                       'check_number' => $request->check_number,
                       'value'        => AppHelper::money_reverse($request->value),
                       'date_final'   => $datesum,
                       'time'         => date('H:i:s'),
                       'parcel'       => $i+1,
                       'accountant'   => $request->accountant,
                       'document'     => $request->document,
                       'status'       => $request->status
                   ]);
                   $array->save();
               }
           }
            if ($array->save()):

                $msg = ['status'=>1, 'response'=>\Lang::get('messages.successsave'), 'result'=>FinancialChecksRepository::listChecks($request->transaction)];
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
    public function listChecks($transaction)
    {
        $checks   = CheckRelease::select('id', 'bank', 'agency', 'account', 'check_number', 'value', 'date_final', 'parcel', 'status')
            ->where('transaction', $transaction)
            ->orderBy('id')
            ->get();
        foreach($checks as $key => $value){
            $results[$key]['id']           = $value->id;
            $results[$key]['bank']         = $value->bank;
            $results[$key]['agency']       = $value->agency;
            $results[$key]['account']      = $value->account;
            $results[$key]['check_number'] = $value->check_number;
            $results[$key]['value']        = AppHelpers::money_br($value->value);
            $results[$key]['date_final']   = AppHelpers::date_only_br($value->date_final);
            $results[$key]['parcel']       = $value->parcel;
            $results[$key]['status']       = AppHelpers::financial_status($value->status);
        }

        return $results;
    }
    public function update($request)
    {
        $row = CheckRelease::findOrFail($request->id);

        $array = [
            'transaction'  => $row->transaction,
            'description'  => $row->description,
            'destination'  => $row->destination,
            'bank'         => $request->bank,
            'agency'       => $request->agency,
            'account'      => $request->account,
            'check_number' => $request->check_number,
            'value'        => AppHelper::money_reverse($request->value),
            'date_final'   => AppHelper::format_inversedateonly($request->date_final),
            'time'         => $row->time,
            'parcel'       => $row->parcel,
            'accountant'   => $row->accountant,
            'document'     => $row->document,
            'status'       => $row->status
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
        $returnlist = \Request::input('returnlist');
        try{
            $row = CheckRelease::findOrFail($id);
            $transaction  = $row->transaction;
            $row->delete();
            if(isset($returnlist) && $returnlist==1) {
                $msg = ['status' => 1, 'response' => \Lang::get('messages.successdestroy'), 'result' => FinancialChecksRepository::listChecks($transaction)];
            }else{
                $msg = ['status' => 1, 'response' => \Lang::get('messages.successdestroy')];
            }
            return json_encode($msg);
        }catch(\Exception $e){
            $msg = ['status'=>2, 'response'=>\Lang::get('messages.errordestroy')];
            return json_encode($msg);
        }
    }
    public function duplicate()
    {
        $id = \Request::input('id');
        $row = CheckRelease::findOrFail($id);
        $newname = $row->description . '- Copy - '.date('Y-m-d H:m:s');

        $data                      = $row;
        $data['transaction']       = AppHelper::gen_token();
        $data['description']       = $newname;

        $array = $data->replicate();

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
        return view('financials::checks.report');
    }
    public function reportFilter()
    {

        try{
            $data = CheckRelease::select('id', 'description', 'bank', 'agency', 'account', 'check_number', 'value', 'date_final', 'parcel', 'status');


            if ($title = \Request::get('description')) {
                $filter = $data->where('description', 'like', "%".$title."%");
            }
            if ($date_initial1  = \Request::get('date_initial') && $date_end1 = \Request::get('date_final')) {
                $date_initial   = AppHelper::format_inversedateonly($date_initial1);
                $date_final     = AppHelper::format_inversedateonly($date_end1);
                $filter =  $data->whereBetween('date_final', array($date_initial, $date_final));
            }
            if ($price = \Request::get('value')) {
                $value    = AppHelper::money_reverse($price);
                $valueint = intval($value);
                $filter =  $data->where('value', 'like', "%{$valueint}%");
            }
            if ($check_number = \Request::get('check_number')) {
                $filter =  $data->where('check_number', '=', $check_number);
            }
            if ($bank = \Request::get('bank')) {
                $filter = $data->where('bank', 'like', "%".$bank."%");
            }
            if ($status = \Request::get('status')) {
                $filter = $data->where('status', '=', intval($status));
            }

            if ($data->count() > 0):

                session()->forget('report-checks');
                session(['report-checks' => $filter->get()]);

                $data_array = array();
                foreach ($filter->get() as $rows){
                    $data_array[$rows->id]['description']    =  $rows->description;
                    $data_array[$rows->id]['bank']           =  $rows->bank;
                    $data_array[$rows->id]['account']        =  $rows->account;
                    $data_array[$rows->id]['agency']         =  $rows->agency;
                    $data_array[$rows->id]['check_number']   =  $rows->check_number;
                    $data_array[$rows->id]['value']          =  AppHelper::money_br($rows->value);
                    $data_array[$rows->id]['date_final']     =  AppHelper::date_only_br($rows->date_final);
                    $data_array[$rows->id]['parcel']         =  $rows->parcel;
                    $data_array[$rows->id]['status']         =  AppHelper::financial_status($rows->status);
                }

                $msg = ['status'=>1, 'data'=>$data_array];
                return json_encode($msg);
            else:
                session()->forget('report-checks');
                $msg = ['status'=>2, 'response'=>\Lang::get('messages.errorsearch')];
                return json_encode($msg);
            endif;
        }catch(\Exception $e){
            session()->forget('report-checks');
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
                    $data = Financial::select('id', 'description', 'bank', 'agency', 'account', 'check_number', 'value', 'date_final', 'parcel', 'status')->get();
                }

                $sheet->loadView('financials::partial.export.xls', array('data' =>$data));
                $sheet->setOrientation('landscape');
            });
        })->export('xls');

    }
    //export pdfs
    public function reportPdf()
    {
        if(session()->get('report-checks') && session()->get('report-checks') != ''){
            $data = session()->get('report-checks');
        }else{
            $data = CheckRelease::select('id', 'description', 'bank', 'agency', 'account', 'check_number', 'value', 'date_final', 'parcel', 'status')->get();
        }

        $pdf = \PDF::loadView('financials::checks.partial.export.pdf', compact('data'))->setPaper('a4', 'landscape');
        return $pdf->download(date('Y-m-d H:i:s').'.pdf');
    }
}