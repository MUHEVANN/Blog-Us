<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class categories extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            'name'=>'sport',
        ]);
        DB::table('categories')->insert([
            'name'=>'technology',
        ]);
        DB::table('categories')->insert([
            'name'=>'web development',
        ]);
        DB::table('categories')->insert([
            'name'=>'ui/ux',
        ]);
        DB::table('categories')->insert([
            'name'=>'politic',
        ]);
    }
}