<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePermissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permissions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('group_id')->nullable()->unsigned();
            $table->string('name');
            $table->string('display_name');
            $table->boolean('system')->default(false);
            $table->smallInteger('sort')->default(0)->unsigned();
            $table->timestamps();
        });

        Schema::create('roles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
            $table->boolean('all')->default(false);
            $table->smallInteger('sort')->default(0)->unsigned();
            $table->timestamps();
        });

         Schema::create('groups', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('parent_id')->nullable();
            $table->string('name');
            $table->smallInteger('sort')->default(0);
            $table->timestamps();
        });

        Schema::create('user_roles', function ($table) {
            $table->increments('id');
            $table->bigInteger('user_id')->unsigned();
            $table->integer('role_id')->unsigned();

            /**
             * Add Foreign/Unique/Index
             */
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                //->constrained()
                ->onDelete('cascade');

            $table->foreign('role_id')
                ->references('id')
                ->on('roles')
                //->constrained()
                ->onDelete('cascade');
        });



        Schema::create('permission_roles', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('permission_id')->unsigned();
            $table->integer('role_id')->unsigned();

            /**
             * Add Foreign/Unique/Index
             */
            $table->foreign('permission_id')
                ->references('id')
                ->on('permissions')
                //->constrained()
                ->onDelete('cascade');

            $table->foreign('role_id')
                ->references('id')
                ->on('roles')
                //->constrained()
                ->onDelete('cascade');
        });



        Schema::create('permission_users', function ($table) {
            $table->increments('id');
            $table->integer('permission_id')->unsigned();
            $table->bigInteger('user_id')->unsigned();

            /**
             * Add Foreign/Unique/Index
             */
            $table->foreign('permission_id')
                ->references('id')
                ->on('permissions')
                //->constrained()
                ->onDelete('cascade');

            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                //->constrained()
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('user_roles');
        Schema::drop('permission_roles');
        Schema::drop('permission_users');
        Schema::drop('roles');
        Schema::drop('permissions');
        Schema::drop('groups');
    }
}
