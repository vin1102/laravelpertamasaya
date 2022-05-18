<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member_groups extends Model
{
    use HasFactory;
    
    protected $table = 'member_groups';
    public function groups()
    {
        return $this->belongsTo('App\Models\Groups');
    }
    public function friends()
    {
        return $this->belongsTo('App\Models\Friends');
    }
}
