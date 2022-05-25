@extends('ample.default')

@section('content')
<div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="white-box">
                            <h3 class="box-title">Lista de transacciones</h3>
                            <div class="table-responsive">
                                <table class="table text-nowrap">
                                <caption>Lista de transacciones</caption>    
                                <thead>
                                        <tr>
                                            <th class="border-top-0">#</th>
                                            <th class="border-top-0">Tipo</th>
                                            <th class="border-top-0">Valor</th>
                                            <th class="border-top-0">Fecha de transacción</th>
                                            <th class="border-top-0">Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach( $Finanza as $k => $val)
                                        <tr>
                                            <td>{{ $val->id }}</td>
                                            <td>{{ ucfirst(getTipoFinanza($val->tipo_id,'tipo')) }}</td>
                                            <td class="@if($val->tipo_id == 1) text-info @else  text-danger  @endif">
                                            @if($val->tipo_id != 1)  -  @endif{{ formato_moneda($val->valor) }}</td>
                                            <td>{{ escribeFecha($val->fecha_ingreso,'d-m-Y') }}</td>
                                            <td>
                                            <button id = "editar" data-id="{{ $val->id }}" class = "btn btn-xs btn-info editar" style="margin: 0 4px;">Editar</button>
                                            <button id = "eliminar" data-id="{{ $val->id }}" class = "btn btn-xs btn-danger eliminar" style="margin: 0 4px; 0 0">Eiminar</button>
                                            </td>

                                        </tr>
                                        @endforeach
                                       
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
              
            </div>


            @endsection