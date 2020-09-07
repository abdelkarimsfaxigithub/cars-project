<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Car;
use App\Mark;
use App\CarModel;
use App\Http\Controllers\Controller;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $cars = Car::select('cars.id','cars.name as name','car_models.name as model','marks.name as mark')
            ->join('marks','marks.id', 'cars.mark_id')
            ->join('car_models', 'car_models.id', 'cars.id')
            ->get();  
        return view('cars.index', compact('cars'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $marks = Mark::all();
        $models = CarModel::all();
        return view('cars.create', compact('marks', 'models'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
            $request->validate([
                'name'=>'required',
                'mark_id'=>'required',
                'model_id'=>'required'
            ]);
    
            $contact = new Car([
                'name' => $request->get('name'),
                'mark_id' => intval($request->get('mark_id')),
                'model_id' => intval($request->get('model_id'))
            ]);
            $contact->save();
            return redirect('/cars')->with('success', 'Car saved!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $car = Car::find($id);
        return view('cars.show', array('car' => $car));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $car = Car::find($id);
        $marks = Mark::all();
        $models = CarModel::all();
        return view('cars.edit', compact('car', 'marks', 'models')); 
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
            'name'=>'required',
            'mark_id'=>'required',
            'model_id'=>'required'
        ]);

        $car = Car::find($id);
        $car->name =  $request->get('name');
        $car->mark_id = $request->get('mark_id');
        $car->model_id = $request->get('model_id');
        $car->save();

        return redirect('/cars')->with('success', 'Car updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $contact = Car::find($id);
        $contact->delete();

        return redirect('/cars')->with('success', 'Car deleted!');
    }
}