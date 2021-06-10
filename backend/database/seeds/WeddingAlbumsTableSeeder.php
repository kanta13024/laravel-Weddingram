<?php

use Illuminate\Database\Seeder;
use App\WeddingAlbum;
use App\Place;
use Carbon\Carbon;

class WeddingAlbumsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $places = Place::pluck('name', 'id');

        $names = [
            'Takuma&Miyuki', 'Nagato&Miyu', 'Takumi&Mimi',
        ];

        $start = Carbon::create('2021', '1', '1');
        $end = Carbon::create('2021', '12', '31');

        $min = strtotime($start);
        $max = strtotime($end);

        foreach ($places as $place_id => $place_name) {
            if ($place == 'ラ・フォンテーヌ前橋') {
                foreach ($names as $name) {
                    $date = rand($min, $max);
                    $date = date('Y-m-d', $date);
                    WeddingAlbum::create([
                        'name' => $name,
                        'event_date' => $date,
                        'place' => $place_name,
                        'place_id' => $place_id,
                    ]);
                }
            }
        }

        foreach ($places as $place) {
            if ($place == 'エテルナ高崎') {
                foreach ($names as $name) {
                    $date = rand($min, $max);
                    $date = date('Y-m-d', $date);
                    WeddingAlbum::create([
                        'name' => $name,
                        'event_date' => $date,
                        'place' => $place_name,
                        'place_id' => $place_id,
                    ]);
                }
            }
        }

        foreach ($places as $place) {
            if ($place == 'ロイヤルチェスター太田') {
                foreach ($names as $name) {
                    $date = rand($min, $max);
                    $date = date('Y-m-d', $date);
                    WeddingAlbum::create([
                        'name' => $name,
                        'event_date' => $date,
                        'place' => $place_name,
                        'place_id' => $place_id,
                    ]);
                }
            }
        }
    }
}
