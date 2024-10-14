<?php

namespace App\Models\Administration\App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DefinedSkill extends Model
{
    use HasFactory;

    protected $table = "defined_skills";
    protected $primaryKey = "id";
    protected $timestamp = true;
    protected $fillable = ["name", "description"];
}