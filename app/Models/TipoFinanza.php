<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoFinanza extends Model
{
    use HasFactory;


    protected $table = 'tipo_finanzas';
    protected $primaryKey = 'id';

    public $incrementing = true;
    protected $keyType = 'integer';   
    
    
    protected $guarded = [];
        
    protected $fillable = [
        'tipo'
    ];
    
    protected $dates = [
        'created_at',
        'updated_at',
    ];
}
