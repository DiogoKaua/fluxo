<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\{Tipo, CentroCusto, User};
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Casts\Attribute;


class Lancamento extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'lancamentos';
    protected $primaryKer= 'id_lancamento';

    protected $date = [
        'create-at',
        'update_at',
        'delete_at',
        'vencimento'
    ];
    protected $fillable = [
        'id_user',
        'id_tipo',
        'id_centro_custo',
        'valor',
        'vencimento',
        'descricao',
        'anexo'
    ];

    protected $cat = [
        'vencimento' =>'date',
        'valor' => 'decimal'
    ];

 /**
     * --------------------------------
     * | Relacionamentos              |
     * | https://laravel.com/docs/10.x/eloquent-relationships
     * @return BelongsTo
     */

    public function tipo(){
        return $this->belongsTo(
            tipo::class,
            'id_tipo',
            'id_tipo'

        );
    }
    
    public function centroCusto(){
    return $this->belongsTo(
        CentroCusto::class,
        'id_centro_custo',
        'id_centro_custo'
    );
    }


    public function usuario()
    {
       return $this->belongsTo(
        User::class,
        'id',
        'id_user'
       );
    }



    

    /**
     * --------------------------------
     * | MUTATOR                      |
     * | https://laravel.com/docs/10.x/eloquent-mutators
     */

     protected function descricao():Attribute {
       
        
            return Attribute::make(
                get: fn (string $value) => ucfirst($value),
                set: fn (string $value) => strtolower(trim($value)),
            );
        }
     

      /**
     * --------------------------------
     * | Ostros metodos               |
     * | 
     */

}
