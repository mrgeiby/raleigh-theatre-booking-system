<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductionType extends Model {

    use SoftDeletes;

    protected $table = 'productiontypes';

    protected $fillable = ['prodType'];
    protected $dates = ['deleted_at'];

    public function production()
    {
        return $this->hasMany('App\Production', 'prodTypeID');
    }

}
