<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductionType extends Model
{

    protected $table = 'productiontypes';

    protected $fillable = ['prodType'];

    public function production()
    {
        return $this->hasMany('App\Production', 'prodTypeID');
    }

}
