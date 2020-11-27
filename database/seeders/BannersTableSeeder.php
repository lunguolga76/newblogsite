<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Banner;

class BannersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $bannerRecords=[
            ['id'=>5,'image'=>'banner1.jpg','link'=>'','title'=>'A digital marketing blog','alt'=>'A digital marketing blog','status'=>1],
        ];
        Banner::insert($bannerRecords);
    }
}
