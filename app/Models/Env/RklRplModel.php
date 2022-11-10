<?php

namespace App\Models\env;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RklRplModel extends Model
{
    use HasFactory;
    public $table = 'env_rkl_rpl';

    protected $fillable = ['user_id', 'name_tenant', 'cat_doc', 'doc_type','sk_no', 'submit_date','sender',
                            'receiver', 'remark', 'document'];
    
}
