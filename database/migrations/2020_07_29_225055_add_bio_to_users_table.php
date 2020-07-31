<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddBioToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            // Add additional columns to the users table

            $table->text('organization')->after('fullName');
            $table->text('profile_image')->after('organization');
            $table->text('bio')->after('profile_image');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            // Drop the created columns
            $table->dropColumn('fullName');
            $table->dropColumn('organization');
            $table->dropColumn('profile_image');
            $table->dropColumn('bio');
        });
    }
}
