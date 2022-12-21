<?php

namespace App\Models\est\water;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WwtpListModel extends Model
{
    use HasFactory;
    public $table = 'est_wwtp_list_content';
    protected $fillable = ['name','capacity', 'document'];


}
