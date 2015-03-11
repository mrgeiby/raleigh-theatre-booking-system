<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Performance extends Model {

    protected $table = 'performances';

    protected $fillable = ['perfName', 'perfDate', 'prodID'];

    public function production()
    {
        return $this->belongsTo('App\Production', 'prodID', 'id');
    }

}
