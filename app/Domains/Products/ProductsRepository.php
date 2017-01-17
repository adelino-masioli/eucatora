<?php
/**
 * Created by PhpStorm.
 * User: alfjuniorbh
 * Date: 16/10/16
 * Time: 20:01
 */

namespace App\Domains\Products;
use AppHelper;
use Yajra\Datatables\Datatables;


class ProductsRepository implements ProductsRepositoryInterface
{

    public function index()
    {
        return view('products::home');
    }
    //create datatable
    public function datatable()
    {
        $data = Product::select(['id', 'name', 'order', 'status_id', 'updated_at']);
        $datatables =  Datatables::of($data)
            ->addColumn('buttons',function($data){return AppHelper::gem_btn_datatable('product', $data->id);})
            ->editColumn('updated_at',function($data){return AppHelper::format_date($data->updated_at);})
            ->editColumn('status_id',function($data){return $data->status->status;});
        $this->filter($datatables);
        return $datatables->make(true);
    }

    public function filter($datatables)
    {
        if ($name = \Request::get('name')) {
            $datatables->where('name', 'like', "%".$name."%");
        }
        if ($order = \Request::get('s_order')) {
            $datatables->where('order', '=', intval($order));
        }
        if ($status_id = \Request::get('status_id')) {
            $datatables->where('status_id', '=', intval($status_id));
        }
        if ($updated_at = \Request::get('updated_at')) {
            $formatdate = AppHelper::date_universal($updated_at);
            $datatables->where('updated_at', 'like', "%".$formatdate."%");
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
    public function comboProducts()
    {
        $lists = Product::all();
        $data = array();
        $data[''] = 'Selecione';
        foreach ($lists as $list):
            $data[$list->id] = '-> '.$list->name;
        endforeach;
        return $data;
    }

    public function create($status)
    {
        return view('products::create', compact('status'));
    }
    public function store($request)
    {

        $array = new Product([
            'name'            => $request->name,
            'description'     => $request->description,
            'order'           => $request->order ? $request->order : 0,
            'status_id'       => $request->status_id
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
        $product    = Product::find($compact['id']);
        $status     = $compact['status'];
        return view('products::edit', compact('product', 'status'));
    }
    public function update($request)
    {
        $row = Product::findOrFail($request->id);

        $array = [
            'name'            => $request->name,
            'description'     => $request->description,
            'order'           => $request->order ? $request->order : 0,
            'status_id'       => $request->status_id
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
            $row = Product::findOrFail($id);

            $row->delete();
            $msg = ['status'=>1, 'response'=>\Lang::get('messages.successdestroy')];
            return json_encode($msg);
        }catch(\Exception $e){
            $msg = ['status'=>2, 'response'=>\Lang::get('messages.errordestroy')];
            return json_encode($msg);
        }
    }
    public function duplicate()
    {
        $id = \Request::input('id');
        $row = Product::findOrFail($id);
        $newname = $row->name . '-Copy'.date('Y-m-d H:m:s');

        $array = new Product([
            'name'            => $newname,
            'description'     => $row->description,
            'order'           => $row->order,
            'status_id'       => 2
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