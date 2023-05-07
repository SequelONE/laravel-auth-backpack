<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::rename('user_follower', 'followables');

        Schema::table('followables', function (Blueprint $table) {
            $table->renameColumn('following_id', 'followable_id');
            $table->renameColumn('follower_id', config('follow.user_foreign_key', 'user_id'));
            $table->string("followable_type")->default(addslashes((new User)->getMorphClass()));
            $table->index(config('follow.user_foreign_key', 'user_id'));
            $table->index(['followable_type', 'accepted_at']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user_follower', function (Blueprint $table) {
            //
        });
    }
};
