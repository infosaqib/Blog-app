<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Library extends Model
{
    //if you have different table name, use:
    //protected $table = "table_name";

    public function test()
    {
        echo "This is a test function";
    }
}
