<?php

namespace App\Models\fin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LavModel extends Model
{
    use HasFactory;
    public $table = 'fin_lav';

    protected $fillable = ['vendor_no' , 'vendor_name','address', 'contact_person', 'contact_number', 'email'];

}
