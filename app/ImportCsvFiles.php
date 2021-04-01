<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ImportCsvFiles extends Model
{
    protected $table = 'importcsvfile';
    protected $fillable = ["name" , "phone" , "address"];
}
