<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLoginSecuritiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
	{
		Schema::create('login_securities', function (Blueprint $table) {
			$table->id();
			$table->integer('user_id');
			$table->boolean('two_factor_auth_enable')->default(false);
			$table->string('two_factor_auth_secret')->nullable();
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
        Schema::dropIfExists('login_securities');
    }
}
