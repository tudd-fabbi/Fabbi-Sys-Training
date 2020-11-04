<?php

use Illuminate\Database\Seeder;

class User_TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i < 10; $i++) { 
            # code...
            DB::table('user_task')->insert(
                [
                    'user_id'=>random_int(1,10),
                    'task_id'=>random_int(1,10),
                    'status'=>Str::random(10),
                    'report'=>Str::random(1,10),
                    'comment'=>Str::random(1,10),
                ]
            );
        }
    }
}
