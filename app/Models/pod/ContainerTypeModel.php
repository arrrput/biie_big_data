<?php

namespace App\Models\pod;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContainerTypeModel extends Model
{
    use HasFactory;
    public $table = 'pod_container_type';
    protected $fillable = ['name'];
}
