<?php

use Illuminate\Database\Seeder;
use App\WeddingAlbum;
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
        $places = [
            'ラ・フォンテーヌ前橋', 'エテルナ高崎', 'ロイヤルチェスター太田',
        ];

        $names = [
            'Takuma&Miyuki', 'Nagato&Miyu', 'Takumi&Mimi',
        ];

        $start = Carbon::create('2021', '1', '1');
        $end = Carbon::create('2021', '12', '31');

        $min = strtotime($start);
        $max = strtotime($end);

        foreach ($places as $place) {
            if ($place == 'ラ・フォンテーヌ前橋') {
                foreach ($names as $name) {
                    $date = rand($min, $max);
                    $date = date('Y-m-d', $date);
                    WeddingAlbum::create([
                        'name' => $name,
                        'event_date' => $date,
                        'place' => $place
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
                        'place' => $place
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
                        'place' => $place
                    ]);
                }
            }
        }
    }
}
