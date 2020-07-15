<?php

use Illuminate\Database\Seeder;

class PlaylistSeeder extends Seeder
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
                    'songId' => '123456',
                    'playlistId' => 1,
                    'name' => 'Playlist',
                    'type' => 1,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'songId' => '654321',
                    'playlistId' => 2,
                    'name' => 'Playlist2',
                    'type' => 1,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'songId' => '135246',
                    'playlistId' => 3,
                    'name' => 'Playlist3',
                    'type' => 1,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'songId' => '246135',
                    'playlistId' => 3,
                    'name' => 'Playlist3',
                    'type' => 1,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],

            ]);
        }
    }
}
