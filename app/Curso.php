<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Curso extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
    protected $fillable = [
        'codigo',
        'nome',
        'cadastradoPorUsuario',
        'alteradoPorUsuario',
        'inativadoPorUsuario',
        'dataInativado',
        'motivoInativado',
        'ativo'
    ];

    protected $guarded = [
        'id',
        'created_at',
        'updated_at'
    ];

    const ATIVO = 1;
    const INATIVO = 0;

    protected $table = 'cursos';

    public function cad_usuario()
    {
        return $this->belongsTo(User::class, 'cadastradoPorUsuario');
    }
}


