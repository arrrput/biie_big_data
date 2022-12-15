<?php

namespace App\Models\est\st;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubstationModel extends Model
{
    use HasFactory;
    public $table = 'est_substation';
    protected$fillable = ['id_user','name', 'merk', 'incoming', 'outgoing', 'factory', 'transformer_capacity',
                        'manual_book', 'document'];

}
