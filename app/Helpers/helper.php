<?php

use App\Models\TipoFinanza;
use App\Models\Finanza;
use Illuminate\Support\Facades\DB;


/************FORMATO FECHA */
/**
     * Formatos posibles.
     * d 01 02 03 ..
     * D Lunes, Martes, Miércoles ..
     *
     * m 01 02 03 ..
     * M Enero, Febrero, Marzo ..
     * n Ene, Feb, Mar
     *
     * y 20
     * Y 2020
     *
     * H 01,02,..21,22,23 ..
     *
     * i minutos 01,02,03..58,59
     *
     * ********************************************************
     *
     *  11:01 AM | June 9 ::>   H:i AM | M d
     *  Viernes, 24Feb2012 (17:20hrs)  ::>  D, dnY (H:ihrs)
     *
     * @return \Illuminate\Http\View
     */

    if (! function_exists('escribeFecha')) {
        function escribeFecha($fecha, $formato="D, dnY (H:ihrs)"){
            if (empty($fecha)) {
                return '';
            }
            $dias = array("Domingo", "Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado");
            $meses = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
    
            $conv = array(
                "d"=>date('d', strtotime($fecha)),                           // d
                "m"=>date('m', strtotime($fecha)),                           // m
                "y"=>date('y', strtotime($fecha)),                           // y
                "Y"=>date('Y', strtotime($fecha)),                           // Y
                "H"=>date('H', strtotime($fecha)),                           // H
                "i"=>date('i', strtotime($fecha)),                           // i
                "D"=>$dias[date('w', strtotime($fecha))],                    // D
                "M"=>$meses[date('n', strtotime($fecha)) - 1],               // M
                "n"=>substr($meses[date('n', strtotime($fecha)) - 1], 0, 3)
            );
            return strtr($formato, $conv);
        }
    }

    /****
     * obtiene detalles de TipoFinanza
     * parametros: 
     * tipo_id :: id en TipoFinanza  
     * str: columna de TipoFinanza  id, tipo, created_at
     */

    if (! function_exists('getTipoFinanza')) {
        function getTipoFinanza($tipo_id,$str){
            $TipoFinanza = TipoFinanza::where("id",$tipo_id)->first();
            if($TipoFinanza){
                return (string) $TipoFinanza->$str;
            }
            return 'nook';
        }
    }

    /****
     * Formato moneda
     * Pesos chilenos: CPL 
     * separador de miles (.)
     * separador de decimales (,)
     * 
     */

    if(! function_exists('formato_moneda') ){
        function formato_moneda($precio){
            if($precio != '-'){
                return '$'.number_format(floatval($precio), 2, ',', '.');
            }
    
            return $precio;
        }
    }

/*****
 * 
 */
    if (! function_exists('finanzasMensual')) {
        function finanzasMensual(){
            $inicio = date('Y-m-1 00:00:00');
            $fin = date('Y-m-d H:i:s'); 
            $finanzas = Finanza::select(DB::raw('tipo_id, SUM(valor) as total'))->whereBetween('fecha_ingreso',[$inicio,$fin])->groupBy('tipo_id')->get()->toArray();
            $arrayFinanzas = ['ingreso'=>0, 'egreso'=>0];
            foreach( $finanzas as $val){
                if($val['tipo_id'] == 1 ){
                    $arrayFinanzas['ingreso'] = $val['total'];
                }else{
                    $arrayFinanzas['egreso'] = $val['total'];
                }
            }
            $arrayFinanzas['total'] = $arrayFinanzas['ingreso'] - $arrayFinanzas['egreso'];
            return $arrayFinanzas;
        }
    }