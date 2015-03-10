<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model {

    protected $table = 'tickets';

    protected $fillable = ['custID', 'prodID', 'perfID', 'seatID', 'printed', 'paid'];




}
