<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Performance extends Model {

    use SoftDeletes;

    protected $table = 'performances';

    protected $fillable = ['perfName', 'perfDate', 'prodID'];
    protected $dates = ['deleted_at'];

    public function production()
    {
        return $this->belongsTo('App\Production', 'prodID', 'id');
    }

}
