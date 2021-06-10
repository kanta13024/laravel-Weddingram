<?php

use Illuminate\Database\Seeder;
use App\Place;

class PlacesSeeder extends Seeder
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
            'アメイジングレイス前橋', 'グローバルウェディングディアーデ', 'ティアラガーデズ伊勢崎',
            'ザ・リーブスプレミアムテラス前橋', 'アーセンティア迎賓館 高崎', 'ロイヤルチェスター前橋'
        ];

        $place_address = '群馬県太田市＿＿＿';

        foreach ($places as $place) {
            Place::create([
                'name' => $place,
                'address' => $place_address,
                'description' => $place,
            ]);
        }
    }
}
