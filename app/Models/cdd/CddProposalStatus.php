<?php

namespace App\Models\cdd;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CddProposalStatus extends Model
{
    use HasFactory;
    use SoftDeletes;
    public $table = 'cdd_proposal_status';
    protected $fillable = ['name','pic','donation', 'tgl','address','contact_person'];

}
