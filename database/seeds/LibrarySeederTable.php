<?php

use Illuminate\Database\Seeder;
use App\Models\Library;

class LibrarySeederTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $Library = factory(Library::class, 10)->create();
    }
}
