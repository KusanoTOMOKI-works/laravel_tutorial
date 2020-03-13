<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class TasksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = DB::table('user')->first();

        foreach (range(1, 3) as $num) {
            DB::table('tasks')->insert([
                'folder_id'  => 1,
                'user_id'    => user->id;
                'title'      => "サンプルタスク {$num}",
                'status'     => $num,
                'due_date'   => Carbon::now()->addDay($num),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
             ]);
        }
    }
}
