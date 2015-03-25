<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Seat;

class SeatsTableSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('seats')->truncate();
        $letters = range('A', 'O');
        foreach ($letters as $letter) {
            for ($x = 1; $x <= 10; $x++) {
                if(($letter >= 'A') && ($letter <= 'E')) {
                    Seat::create(['seatRow' => $letter, 'seatNumber' => $x]);
                } else if(($letter >= 'F') && ($letter <= 'J')) {
                    Seat::create(['seatRow' => $letter, 'seatNumber' => $x]);
                } else if(($letter >= 'K') && ($letter <= 'O')) {
                    Seat::create(['seatRow' => $letter, 'seatNumber' => $x]);
                }
            }
        }
    }


}
