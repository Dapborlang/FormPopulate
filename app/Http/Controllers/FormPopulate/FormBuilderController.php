<?php
/*
    Created by RDMarwein
*/
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FormPopulate;
use App\FormPopulateIndex;

class FormBuilderController extends Controller
{
    public function __construct(Request $request)
    {
        $role=FormPopulate::findOrFail($request->id);
        $this->middleware('auth');
        $this->middleware('formAuth:'.$role->role);
    }

    public function index($id,Request $request)
    {
        $dataString=$request->search;
        $model=FormPopulate::findOrFail($id);
        $values='App\\'.$model->model;
        $foreign=json_decode($model->index->foreign_keys, true);
        $table=$values::orderBy('id', 'desc');
        if ($request->isMethod('post')) {
            if(sizeof((array)$foreign)>0)
            {
                foreach (array_keys($foreign) as $key) {
                    $param=$foreign[$key][2];
                    $table=$table->orWhereHas($key, function ($query) use($param,$dataString) {
                        $query->where($param,'like','%'.$dataString.'%');
                    });
                }
            }
        }

        $exclude=json_decode($model->index->exclude);
        $columns = \DB::connection()->getSchemaBuilder()->getColumnListing($model->table_name);
        foreach($columns as $data)
        {
            $table=$table->orWhere($data,'like','%'.$dataString.'%');
        }
        $table=$table->limit(50)->get();
        $select=array();
        if(sizeof((array)$foreign)>0)
        {
            foreach (array_keys($foreign) as $key) {
                $select[$foreign[$key][0]]=array($key,$foreign[$key][2]);
            }
        }

        return view('formview.index', compact('columns','model','exclude','table','select'));
    }

    public function create($id)
    {
        $model=FormPopulate::findOrFail($id);
        $masterKey=json_decode($model->index->master_keys, true);
        $foreign=json_decode($model->index->foreign_keys, true);
        $class=json_decode($model->index->class, true);
        $attribute=json_decode($model->index->attribute, true);
        $type=json_decode($model->index->type, true);
        $scriptKey=json_decode($model->index->script, true);
        $select=array();
        $inputType=array();
        $master=array();
        $key=array();
        $notes=json_decode($model->index->cnotes, true);
        if(sizeof((array)$masterKey)>0)
        {
            foreach (array_keys($masterKey) as $item) {
                $values='App\\'.$item;
                $data=$values::all();
                $master[$masterKey[$item][2]]=array($data,$masterKey[$item][0],$masterKey[$item][1],$masterKey[$item][3]);
            }
        }

        if(sizeof((array)$foreign)>0)
        {
            foreach (array_keys($foreign) as $key) {
                $values='App\\'.$key;
                $data=$values::all();
                $select[$foreign[$key][0]]=array($data,$foreign[$key][1],$foreign[$key][2]);
            }
        }

        if(sizeof((array)$type)>0)
        {
            foreach (array_keys($type) as $key) {
                $inputType[$key]=$type[$key];
            }
        }

        $columns = \DB::connection()->getSchemaBuilder()->getColumnListing($model->table_name);

        return view('formview.create', compact('columns','model','select','master','scriptKey','class','attribute','notes','inputType'));
    }


    public function store(Request $request, $id)
    {
        $model=FormPopulate::findOrFail($id);
        $values='App\\'.$model->model;
        $data=$values::create($request->all());
        return redirect()->back()->with('message', 'Added Successfully');
    }


    public function show($id,$cid)
    {

    }


    public function edit($id,$cid)
    {
        $model=FormPopulate::findOrFail($id);
        $masterKey=json_decode($model->index->master_keys, true);
        $foreign=json_decode($model->index->foreign_keys, true);
        $class=json_decode($model->index->class, true);
        $attribute=json_decode($model->index->attribute, true);
        $type=json_decode($model->index->type, true);
        $scriptKey=json_decode($model->index->script, true);
        $select=array();
        $inputType=array();
        $master=array();
        $key=array();

        if(sizeof((array)$masterKey)>0)
        {
            foreach (array_keys($masterKey) as $item) {
                $values='App\\'.$item;
                $data=$values::all();
                $master[$masterKey[$item][2]]=array($data,$masterKey[$item][0],$masterKey[$item][1],$masterKey[$item][3]);
            }
        }

        if(sizeof((array)$foreign)>0)
        {
            foreach (array_keys($foreign) as $key) {
                $values='App\\'.$key;
                $data=$values::all();
                $select[$foreign[$key][0]]=array($data,$foreign[$key][1],$foreign[$key][2]);
            }
        }

        if(sizeof((array)$type)>0)
        {
            foreach (array_keys($type) as $key) {
                $inputType[$key]=$type[$key];
            }
        }

        $columns = \DB::connection()->getSchemaBuilder()->getColumnListing($model->table_name);

        $values='App\\'.$model->model;
        $content=$values::findOrFail($cid);
        return view('formview.edit', compact('columns','model','select','master','scriptKey','class','content','attribute','inputType'));
    }


    public function update(Request $request, $id,$cid)
    {
        $model=FormPopulate::findOrFail($id);
        $values='App\\'.$model->model;
        $data=$values::findOrFail($cid);
        $except=array('_token','_method');
        foreach ($request->all() as $key => $value) {
            if(!in_array($key, $except))
            {
                $data-> $key = $value;
            }
        }
        $data->save();
        return redirect()->back()->with('message', 'Updated Successfully');
    }


    public function destroy($id,$cid)
    {
        try {
            $model=FormPopulate::findOrFail($id);
            $values='App\\'.$model->model;
            $data=$values::findOrFail($cid);
            $data->delete();
            return redirect()->back()->with('message', 'Deleted Successfully');        
         } catch ( \Exception $e) {
            return redirect()->back()->with('fail-message', 'Cannot delete or update a parent row: a foreign key constraint fails');      
         }
    }
}
