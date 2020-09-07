<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Car;
use App\Http\Controllers\Controller;
use Facade\FlareClient\Http\Response;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function getCars()
    {
        $cars = Car::select('cars.id','cars.name as name','car_models.name as model','marks.name as mark')
            ->join('marks','marks.id', 'cars.mark_id')
            ->join('car_models', 'car_models.id', 'cars.id')
            ->get();  
        return response()->json($cars,200);
    }
    /**
     * Update a listing of the resource.
     *
     * @return Response
     */
    public function updateCar(Request $request)
    {
        $request->validate([
            'id' => 'required',
            'name' => 'required',
            'mark_id' => 'required',
            'model_id' => 'required'
        ]);

        $car = Car::find($request->get('name'));
        $car->name =  $request->get('name');
        $car->mark_id = $request->get('mark_id');
        $car->model_id = $request->get('model_id');
        $car->save();

        return response()->json(['response' => 'success'], 200);
    }

   
}