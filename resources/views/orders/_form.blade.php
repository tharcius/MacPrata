<div class="container">
    <div class="row">
        <div class="form-group col col-sm-12 col-md-2 ">
            {!! Form::label('date', 'Data') !!}
            {!! Form::text('date', (isset($order) ? $order->date : old('date')), ['class'=>'form-control', 'maxlength'=>'10', 'autofocus']) !!}
        </div>
        <div class="form-group col">
            {!! Form::label('person_id', 'Cliente') !!}
            {!! Form::select('person_id', $people, (isset($order) ? $order->person_id : old('person_id')), ['placeholder' => 'Selecione um cliente...', 'class'=>'form-control select2', 'required']) !!}
        </div>
        <div class="form-group col">
            {!! Form::label('equipment_id', 'Equipamento') !!}
            {!! Form::select('equipment_id', $equipments, (isset($order) ? $order->equipment_id : old('equipment_id')), ['placeholder' => 'Selecione um equipamento...', 'class'=>'form-control select2', 'required']) !!}
        </div>
    </div>
    <div class="row">
        <div class="form-group col">
            {!! Form::label('obs', 'Observações', ['class'=>'control-label']) !!}
            {!! Form::textarea('obs', (isset($order) ? $order->obs : old('obs')), ['class'=>'form-control', 'placeholder'=>'Digite aqui quaisquer observações a respeito da ordem de serviços', 'rows'=>"3"]) !!}
        </div>
    </div>
    <div class="row">
        <fieldset class="col">
            <legend>Produtos / Serviços</legend>
            <div class="col col-sm-12" id="itens">
                <input type="button" id="add_field" value="Adicionar">
                <div class="row">
                    @if(isset($order))
                        @include('orders._form_services_edit')
                    @else
                        @include('orders._form_services_create')
                    @endif
                </div>
            </div>
        </fieldset>

    </div>
