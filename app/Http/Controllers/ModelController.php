<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\CarModel;
use App\Http\Controllers\Controller;

class ModelController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $models = CarModel::all();  
        return view('car_models.index', compact('models'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('car_models.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
            $request->validate([
                'name'=>'required'
            ]);
    
            $contact = new CarModel([
                'name' => $request->get('name')
            ]);
            $contact->save();
            return redirect('/cars')->with('success', 'model saved!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $model = CarModel::find($id);
        return view('models.show', array('model' => $model));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $model = CarModel::find($id);
        return view('car_models.edit', compact('model')); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'=>'required'
        ]);

        $model = CarModel::find($id);
        $model->name =  $request->get('name');
        $model->save();

        return redirect('/models')->with('success', 'model updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $model = CarModel::find($id);
        $model->delete();

        return redirect('/models')->with('success', 'model deleted!');
    }
}