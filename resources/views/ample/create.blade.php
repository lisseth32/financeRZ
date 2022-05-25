@extends('ample.default')



@section('content')
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="white-box">
            <h3 class="box-title">Nueva transacción</h3>
                <form action="{{ route('guardar') }}" method="POST">
                {{csrf_field()}}
                    <div class="form-row">
                        <div class="form-group col-md-5">
                            <label for="inputTingreso"></label>
                            <label for="inputTingreso">Tipo de ingreso</label> 
                            <select id="inputTingreso" name="tipo_id" class="form-control">
                                <option disabled selected>-- Selecciona Tipo de ingreso --</option>
                                @foreach($TipoFinanza as $k => $val)
                                <option value="{{$val->id}}" @if(isset($old) && $old->tipo_id == $val->id) selected @endif > {{ ucfirst($val->tipo) }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-5">
                            <label for="inputValor">Valor</label>
                            <input type="text" class="form-control" name="valor" value="@if(isset($old)){{ $old->valor }}@endif" id="inputValor" placeholder="Valor" />
                        </div>
                        <div class="form-group col-md-5">
                        <label for="inputFecha">Fecha de transacción</label>
                        <input type="date" name="fecha_ingreso" class="form-control" id="inputFecha"  value="@if(isset($old)){{escribeFecha($old->fecha_ingreso,'Y-m-d')}}@endif" placeholder="" />
                    </div>
                    </div>
                    
                    <input type="hidden" class="form-control" name="id" value="@if(isset($old)){{ $old->id }} @endif" />
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </form>

                
            </div>
        </div>
    </div>
</div>


            @endsection