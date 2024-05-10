@extends('layouts.admin.app')
@section('title','Modifier marque')
@section('content')
<form action="{{route('marques.update',$marque->id)}}" method="Post" enctype="multipart/form-data">
    @csrf
    @method('put')
    <div class="card-header">
        <h4>Modifier la marque {{$marque->marque}}</h4>
    </div>
    <div class="card-body">
        <div class="form-group">
            <label>Nom de marque </label>
            <input type="text" value="{{$marque->marque}}" name="marque" class="form-control">
            @error('marque')
            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label>Logo</label>
            <input type="file" name="image" value="$marque->image" class="form-control">
            <br>
            <div class="custom-control custom-checkbox">
                <input type="checkbox" name="active" value="{{$marque->active}}" class="custom-control-input" id="active" @if ($marque->active == 1) checked @endif>
                <label class="custom-control-label" for="active">Afficher la marque dans la page d'accueil</label>
            </div>
            @error('image')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>
    </div>
    <div class="card-footer text-right">
        <button type="submit" class="btn btn-primary">Enrégistre</button>
        <a href="/marques" class="btn btn-danger">annuler</a>
    </div>
</form>
@endsection