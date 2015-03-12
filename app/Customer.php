<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model {

    protected $table = 'customers';

    protected $fillable = ['firstName', 'lastName', 'address', 'town', 'postCode', 'phoneNumber', 'userID'];

    public function user() {
        return $this->belongsTo('App\User', 'id');
    }





}
