<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            //
            // $table->addColumn('string', 'avatar');

            /**
             * Now after making the migration 
             * php artisan make:migration update_user_table_add_avatar_field  --table=users
             * this migration file is created with a new field to be added
             *  The after key word ensures that the field is inserted jst after the field (email)specified
             * the nullable() caters for the previous data sets before this field was added
             * 
             * after adding the fileds you run
             * php artisan migrate : to activate all the changes intended
             * 
             */
            $table->string('avatar')->after('email')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            //
            $table->dropColumn('avatar');
        });
    }
};
