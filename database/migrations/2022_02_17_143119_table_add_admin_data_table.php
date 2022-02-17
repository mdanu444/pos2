<?php

use App\Models\Admin;
use App\Models\Group;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

class TableAddAdminDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $data =
        [
            'name' => 'Md. Anwar Hossain'
            ,'email' => 'mdanu444@gmail.com'
            ,'email_verified_at' => now()
            ,'password' => Hash::make('123456')
            ,'remember_token' => ""
            ,'address' => "Dhaka, Bangladesh."
        ];
        Admin::create($data);

        $groupData =
        [
            'title' => 'Admin'
        ];
        Group::create($groupData);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
