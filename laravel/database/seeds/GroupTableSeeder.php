<?php

use Illuminate\Database\Seeder;

class GroupTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $groups = [
           '5Mb_group100',
           '10Mb_group102',
           'Disabled103',
           'Expired104',
        ];
        foreach ($groups as $group) {
            DB::table('groups')
                ->insert([
                    'groupname' => $group,
                    'created_at' =>\Carbon\Carbon::now(),
                    'updated_at' =>\Carbon\Carbon::now()
                ]);
        }

    }
}
