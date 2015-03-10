<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Production extends Model {

    use SoftDeletes;

    protected $table = 'productions';

    protected $fillable = ['prodName', 'prodDescription', 'prodTypeID'];
    protected $dates = ['deleted_at'];

    public function productionType()
    {
        return $this->belongsTo('App\ProductionType');
    }

}
