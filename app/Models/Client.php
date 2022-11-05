<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Client extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'contact_name',
        'contact_phone_number',
        'contact_email',
        'company_adress',
        'company_name',
        'company_phone_number',
    ];

    //relaciones
    public function projects()
    {
        return $this->hasMany(Project::class);
    }
    
    public function tasks()
    {
        return $this->hasMany(Task::class);
    }
}
