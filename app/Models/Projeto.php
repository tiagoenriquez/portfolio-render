<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class Projeto extends Model
{
    protected $fillable = ["nome", "descricao", "url", "repositorio", "imagem"];

    public function setImagemAttribute(UploadedFile $imagem)
    {
        $extensao = $imagem->getClientOriginalExtension();
        $nomeDaImagem = md5($imagem->getClientOriginalName() . strtotime("now")) . "." . $extensao;
        $imagem->move(public_path("images"), $nomeDaImagem);
        $this->attributes["url_da_imagem"] = $nomeDaImagem;
    }
}
