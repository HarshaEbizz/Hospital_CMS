<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Floor;
use App\Models\Wing;
use App\Models\Section;

class FloorPlan extends Model
{
    use HasFactory;
    protected $table ="floor_plans";
    protected $fillable = [
        "id",
        "floor_id",
        "wing_id",
        "section_ids",
    ];
    public function floor()
    {
        return $this->belongsTo(Floor::class,"floor_id","id");
    }
    public function wing()
    {
        return $this->belongsTo(Wing::class,"wing_id","id");
    }
}
