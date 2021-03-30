@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-12">
            
            <form>
                <div class="mb-3">
                    <label for="title" class="form-label">Titolo</label>
                    <input name="title" type="text" class="form-control" id="title" aria-describedby="title">
                    
                </div>
                <div class="mb-3">
                    <label for="descrizione" class="form-label">Descrizione</label>
                    <textarea class="form-control" name="body" id="descrizione" cols="30" rows="10"></textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="categoria">Categoria</label>
                    <select class="form-control" name="category_id" id="categoria">
                        <option value=""></option>
                    </select>
                    
                </div>
                <button type="submit" class="btn btn-primary">Crea</button>
            </form>
            
        </div>
    </div>
</div>

@endsection