<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateTimestamps extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('arme', function (Blueprint $table) {
            $table->timestamps();
        });

        Schema::table('client', function (Blueprint $table) {
            $table->timestamps();
        });

        Schema::table('entrepot', function (Blueprint $table) {
            $table->timestamps();
        });

        Schema::table('produit', function (Blueprint $table) {
            $table->timestamps();
        });

        Schema::table('role_user', function (Blueprint $table) {
            $table->timestamps();
        });

        Schema::table('stock', function (Blueprint $table) {
            $table->timestamps();
        });

        Schema::table('transport', function (Blueprint $table) {
            $table->timestamps();
        });

        Schema::table('vente', function (Blueprint $table) {
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('arme');
        Schema::dropIfExists('client');
        Schema::dropIfExists('entrepot');
        Schema::dropIfExists('produit');
        Schema::dropIfExists('role_user');
        Schema::dropIfExists('stock');
        Schema::dropIfExists('transport');
        Schema::dropIfExists('vente');
    }
}
