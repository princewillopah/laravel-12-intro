<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coder extends Model
{
    /** @use HasFactory<\Database\Factories\CoderFactory> */
    use HasFactory;


    protected $fillable = [
        'name',
        'age',
        'sex',
        'programming_skills',
        'main_programming_language',
        'framework',
        'database',
        'years_of_experience',
        'company_id',
    ];

    protected $casts = [
        'programming_skills' => 'array', // Ensures JSON is cast as an array
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
