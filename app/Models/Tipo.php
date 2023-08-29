<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Lancamento;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tipo extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'tipos';
    protected $primaryKery = 'id_tipo';
    protected $daete = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];
    protected $fillable =[
        'tipo'
    ];
    /**
     * --------------------------------
     * | Relacionamentos              |
     * | 
     */

     public function lancamentos(){
        return $this->belongsTo(lancamentos::class, 'id_tipo', 'id_tipo');
     }
}
