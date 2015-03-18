<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Seat extends Model {

    protected $table = 'seats';

    protected $fillable = ['seatRow', 'seatNumber', 'seatPrice'];
}
