@extends('base')

@section('main')
<div class="row">
    <div class="col-sm-12">
        <h1 class="display-3">cars</h1>

        <form action="{{ route('cars.create')}}" method="get">
            <button id="add-button" class="btn btn-success float-right" type="submit">Add car</button>
        </form>

        <table class="table table-striped">
            <thead>
                <tr>
                    <td>ID</td>
                    <td>Name</td>
                    <td>Mark</td>
                    <td>Model</td>
                    <td colspan=2>Actions</td>
                </tr>
            </thead>
            <tbody>
                @foreach($cars as $car)

                <tr>
                    <td>{{$car->id}}</td>
                    <td>{{$car->name}}</td>
                    <td>{{$car->mark}}</td>
                    <td>{{$car->model}}</td>
                    <td id="edit-button">
                        <a href="{{ route('cars.edit',$car->id)}}" class="btn btn-primary">Edit</a>
                    </td>
                    <td id="delete-button">
                        <form action="{{ route('cars.destroy', $car->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div>
        </div>
        @endsection

        <style>
            #add-button {
                margin-left: 2px;
                margin-bottom: 5px;
            }

            #edit-button {
                width: 50px;
            }

            #delete-button {
                width: 50px;
            }
        </style>