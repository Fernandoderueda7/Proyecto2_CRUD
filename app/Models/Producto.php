<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Producto extends Model
{
    use HasFactory;
    use SoftDeletes; 
    
    protected $fillable = ['nombre_producto', 'marca', 'descripcion', 'precio', 'categoria', 'deporte', 'estado', 'tienda', 'user_id'];

    public function user()
    {
        return $this -> belongsTo(User::class);
    }

    public function archivos()
    {
        return $this->hasMany(Archivo::class);
    }
}
