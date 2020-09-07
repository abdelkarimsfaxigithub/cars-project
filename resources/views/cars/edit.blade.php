@extends('base') 
@section('main')
<div class="row">
    <div class="col-sm-8 offset-sm-2">
        <h1 class="display-3">Update a contact</h1>

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        <br /> 
        @endif
        <form method="post" action="{{ route('cars.update', $car->id) }}">
            @method('PATCH') 
            @csrf
            <div class="form-group">

                <label for="name">Name:</label>
                <input type="text" class="form-control" name="name" value={{ $car->name }} />
            </div>

            <div class="form-group">
                    <label for="mark">Mark:</label>
                    <select class="custom-select custom-select-lg" id="mark-id" name="mark_id">
                        @foreach($marks as $mark)
                        <option value="{{ $mark->id }}">{{$mark->name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="model">Model:</label>
                    <select class="custom-select custom-select-lg" id="model-id" name="model_id">
                        @foreach($models as $model)
                        <option value="{{ $model->id }}">{{$model->name}}</option>
                        @endforeach
                    </select>   
                </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>
@endsection