<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Project extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name',
        'description', 
        'deadline',
        'status',
        'user_id',
        'client_id',
    ];

    public const STATUS = ['Abierto', 'En progreso', 'Cancelado', 'Completado'];

    // relaciones
    public function user()
    {
        return $this->belongsTo(User::class)->withDefault();
    }

    public function client()
    {
        return $this->belongsTo(Client::class)->withDefault();
    }

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }

    // Mutators
    /**
     * Interact with the project's deadline.
     *
     * @return \Illuminate\Database\Eloquent\Casts\Attribute
     */
    protected function deadline(): Attribute
    {
        return Attribute::make(
            // Con el get muestro la información al usuario
            get: fn ($value) => Carbon::createFromFormat('Y-m-d', $value)->format('d/m/Y'),
            // Con el set formateo antes de que el dato se mande a la bd y mando 
            // la información a la bd ya formateada como lo requiere
            set: fn ($value) => Carbon::createFromFormat('d/m/Y', $value)->format('Y-m-d'),
        );
    }
}
