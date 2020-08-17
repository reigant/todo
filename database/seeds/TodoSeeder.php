<?php

use Illuminate\Database\Seeder;
use App\Model\Todo;

class TodoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        Todo::truncate();
        $len = 4;
        $date = date('Y-m-d');
        for ($len; $len >= 0; $len--) {
            $rand = rand(2, 6);
            for ($i = 0; $i < $rand; $i++) {
                $args = [
                    'task' => $faker->text(rand(5, 24)),
                    'note' => $faker->sentence(rand(2, 8)),
                    'status' => $faker->numberBetween(0, 2),
                    'do_at' => date('Y-m-d', strtotime($date. ' - '.$len.' days'))
                ];
                Todo::create($args);
            }
        }
    }
}
