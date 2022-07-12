<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SettingInformation extends Model
{
    use HasFactory;

    protected $table = 'setting_informations';
    
    public $timestamps = false;

}
