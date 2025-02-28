<?php

namespace App\Models;

use Exception;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class Token extends Model
{
    protected $fillable = ["login", "senha", "_token"];
    private $login;
    private $senha;

    public function setLoginAttribute($login)
    {
        $this->login = $login;
    }

    public function setSenhaAttribute($senha)
    {
        $credencial = Credencial::where("login", $this->login)->first();
        if (!$credencial) {
            throw new Exception("Credenciais não salvas.");
        }
        if (!Hash::check($senha, $credencial->senha)) {
            throw new Exception("Login ou senha incorretos.");
        }
    }

    public function setTokenAttribute($token)
    {
        $this->attributes["valor"] = Hash::make($token);
        $this->attributes["valido"] = true;
    }
}
