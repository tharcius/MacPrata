@extends('main.main')
@section('content')
    {!! Form::open(array('url' => "/ordens/{{ $order->id }}", 'method'=>'POST')) !!}
        @include('orders._form')
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <div class="row">
            <div class="col text-right">
                <div class="btn-group mr-4" role="group" aria-label="Third group">
                    <a class="btn btn-danger" href="/ordens" role="button">Cancelar</a>
                </div>
                <div class="btn-group mr-4" role="group" aria-label="Third group">
                    <button type="submit" class="btn btn-primary">Atualizar</button>
                </div>
            </div>
        </div>
    </div>

    {!! Form::close() !!}
    @include('orders._js_form')
@endsection
