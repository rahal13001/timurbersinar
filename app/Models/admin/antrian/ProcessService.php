<?php

namespace App\Models\admin\antrian;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class ProcessService extends Pivot
{
    use HasFactory;
    protected $table = 'process_service';
    protected $fillable = [ 'process_id', 'service_id'];
}
