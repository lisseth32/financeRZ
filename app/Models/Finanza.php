<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Finanza extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = 'finanzas';
    protected $primaryKey = 'id';

    public $incrementing = true;
    protected $keyType = 'integer';   
    
    
    protected $guarded = [];
        
    protected $fillable = [
        'user_id',
        'tipo_id',
        'valor',
        'fecha_ingreso',
    ];
    
    protected $dates = [
        'created_at',
        'updated_at',
    ];
}
