<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contato extends Model
{
    //protected $fillable = array('id', 'nome', 'email','telefone','posicao');
    protected $fillable = array('id', 'nome', 'email','telefone','posicao','pass','crm','dataNascimento','medicamento','codigoProfissional','uf');
}
