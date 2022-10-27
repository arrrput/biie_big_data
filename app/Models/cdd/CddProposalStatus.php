<?php

namespace App\Models\cdd;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CddProposalStatus extends Model
{
    use HasFactory;
    public $table = 'cdd_proposal_status';
    protected $fillable = ['name','pic','donation'];

}
