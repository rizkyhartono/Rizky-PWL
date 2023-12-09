<?php

namespace Database\Seeders;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Bookshelf;

class BookshelfSeeder extends Seeder
{
    public function run():void
    {
        $user = Bookshelf::insert([
        [
            'id' => '1',
            'code' =>  '620',
            'name' => 'Engineering',
            'created_at' => now(),
            'updated_at' => now()
        ],
        [
            'id' => '2',
            'code' =>  '621',
            'name' => 'Mechanical',
            'created_at' => now(),
            'updated_at' => now()
        ],
        [
            'id' => '3',
            'code' =>  '623',
            'name' => 'Topoographical',
            'created_at' => now(),
            'updated_at' => now()
        ],
    ]);
    }
}
