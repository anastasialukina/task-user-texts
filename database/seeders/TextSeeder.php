<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TextSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dir = 'database/texts';
        $files = scandir($dir);
        //dd($files);

        $users = DB::table('users')->pluck('id');
        //dd($users);
        foreach ($users as $user) {
            foreach ($files as $file) {
                //print_r($user);
                print_r($file);
                if (str_starts_with($file, '.')) {
                    continue;
                }
                $filePath = $dir . '/' . $file;
                print_r($file);
                $content = file_get_contents($filePath);
                print_r($content);
                if (str_starts_with($file, $user)) {
                    DB::insert('insert into texts (user_id, text) values (?, ?)', [$user, $content]);
                }
            }
        }
    }
}
