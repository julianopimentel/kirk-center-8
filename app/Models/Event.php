<?php
  
namespace App\Models;
  
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
  
class Event extends Model
{
    use HasFactory;

    protected $connection = 'tenant';

    protected $fillable = [
        'title', 'start', 'end', 'status', 'requer_aprovacao', 'hora_inicio', 'hora_fim'
    ];
}