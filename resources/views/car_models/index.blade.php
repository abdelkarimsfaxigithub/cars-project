@extends('base')

@section('main')
<div class="row">
    <div class="col-sm-12">
        <h1 class="display-3">Models</h1>
       
            <form action="{{ route('models.create')}}" method="get">
                <button id="add-button" class="btn btn-success float-right" type="submit">Add model</button>
            </form>
        <table class="table table-striped">
            <thead>
                <tr>
                    <td>ID</td>
                    <td>Name</td>
                    <td colspan=2>Actions</td>
                </tr>
            </thead>
            <tbody>
                @foreach($models as $model)

                <tr>
                    <td>{{$model->id}}</td>
                    <td>{{$model->name}}</td>
                    <td id="edit-button">
                        <a href="{{ route('models.edit',$model->id)}}" class="btn btn-primary">Edit</a>
                    </td>
                    <td id="delete-button">
                        <form action="{{ route('models.destroy', $model->id)}}" method="post">
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