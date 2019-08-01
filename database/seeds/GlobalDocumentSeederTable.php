<?php

use Illuminate\Database\Seeder;
use App\Models\GlobalDocument;

class GlobalDocumentSeederTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        factory(GlobalDocument::class, 10)->create();
        return true;
    }
}
