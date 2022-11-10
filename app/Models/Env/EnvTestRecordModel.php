<?php

namespace App\Models\env;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EnvTestRecordModel extends Model
{
    use HasFactory;
    public $table = 'env_test_record';

    protected $fillable = ['user_id', 'name_test', 'semester', 'year' ,'set_location', 'coordinate_point', 'relate_regulation',
                            'quality_standart', 'sample_date', 'labor_name', 'remark', 'document'];

}
