<?php


use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FolderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
      $user = DB::table('users')->first();

      $title = ['private','work','trip'];

      foreach ($title as $title){
        DB::table('folders')->insert([
            'title'       =>  $title,
            'user_id'     =>  $user->id,
            'created_at'  =>  Carbon::now(),
            'updated_at'  =>  Carbon::now()
          ]);
        }
    }
}
