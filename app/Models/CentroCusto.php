<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Lancamento;

class CentroCusto extends Model
{
    use HasFactory, SoftDeletes;

    use HasFactory;

    protected $table = 'centro_custos';
    protected $primaryKery = 'centro_custos';
    protected $daete = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];
    protected $fillable =[
        'centro_custos'
    ];
    /**
     * --------------------------------
     * | Relacionamentos              |
     * | 
     */

     public function lancamentos(){
        return $this->belongsTo(lancamentos::class, 'centro_custos', 'centro_custos');
     }
}
