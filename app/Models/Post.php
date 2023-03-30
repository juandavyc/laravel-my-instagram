<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'titulo',
        'descripcion',
        'imagen',
        'user_id',
    ];


    public function user()
    {
        // un post pertenece a un usuario
        // return $this->belongsTo(User::class);
        // return $this->belongsTo(User::class, 'user_id')->select(['name', 'username']);
        return $this->belongsTo(User::class, 'user_id')->select(['name', 'username']);
    }

    public function comentarios()
    {
        // post puede tener varios comentarios
        return $this->hasMany(Comentario::class);
    }


    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function checkLike(User $user)
    {
        // contains revisar columnas
        return $this->likes->contains('user_id', $user->id);
    }
}
