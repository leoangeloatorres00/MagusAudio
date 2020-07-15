<?php

use Illuminate\Database\Seeder;

class PlaylistTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(DB::table('playlists')->get()->count() == 0){
            DB::table('playlists')->insert([
                [
                    'name' => 'Featured Content'
                ],
                [
                    'name' => 'Discover'
                ]
            ]);
        }
    }
}
