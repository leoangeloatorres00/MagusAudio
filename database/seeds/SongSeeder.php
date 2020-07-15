<?php

use Illuminate\Database\Seeder;

class SongSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        if(DB::table('songs')->get()->count() == 0){
            DB::table('songs')->insert([
                [
                    'songId' => '123456',
                    'title' => 'Title of Songs',
                    'file' => 'sample.flac',
                    'description' => 'This is sample description of Title Songs',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'songId' => '654321',
                    'title' => 'Title of Songs1',
                    'file' => 'sample1.flac',
                    'description' => 'This is sample description of Title Songs1',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'songId' => '135246',
                    'title' => 'Title of Songs2',
                    'file' => 'sample2.flac',
                    'description' => 'This is sample description of Title Songs2',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'songId' => '246135',
                    'title' => 'Title of Songs3',
                    'file' => 'sample3.flac',
                    'description' => 'This is sample description of Title Songs3',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'songId' => '146235',
                    'title' => 'Title of Songs4',
                    'file' => 'sample4.flac',
                    'description' => 'This is sample description of Title Songs4',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ]
            ]);
        }
    }
}