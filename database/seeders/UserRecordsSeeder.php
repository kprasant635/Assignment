<?php

namespace Database\Seeders;

use App\Models\UserRecored;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserRecordsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_recoreds')->insert([
            [
            'name' => 'prasant',
            'email' => 'kprasant@gmail.com',
            'joindate' => '2021-07-02',
            'leavedate' => '2022-11-01',
            'vch_working_status' => NULL,
            'image' => '7610482838.jpg',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ],
        [
            'name' => 'abinash',
            'email' => 'abinash889@gmail.com',
            'joindate' => '2021-09-01',
            'leavedate' => NULL,
            'vch_working_status' => '1',
            'image' => '4298395827.jpg',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]]);
    }
}
