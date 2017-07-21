<?php

    use Illuminate\Support\Facades\Schema;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Database\Migrations\Migration;

    class CreateMatchesTable extends Migration
        {

        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up ()
        {
            Schema::create (
                'matches', function (Blueprint $table) {
                    $table->increments ('id');
                    $table->string('Div')->comment('League Division');
                    $table->date('Date')->comment('Match date');
                    $table->string('HomeTeam')->comment('Home team');
                    $table->string('AwayTeam')->comment('Away team');
                    $table->integer('FTHG')->comment('Full Time Home Team Goals');
                    $table->integer('FTAG')->comment('Full Time Away Team Goals');
                    $table->string('FTR')->comment('Full Time Result (H=Home Win, D=Draw, A=Away Win');
                    $table->integer('HTHG')->comment('Half Time Home Team Goals');
                    $table->integer('HTAG')->comment('Half Time Away Team Goals');
                    $table->string('HTR')->comment('Half Time Result (H=Home Win, D=Draw, A=Away Win');
                    $table->unique(['Date', 'HomeTeam', 'AwayTeam']);
                    $table->timestamps ();
                }
            );
        }

        /**
         * Reverse the migrations.
         *
         * @return void
         */
        public function down ()
        {

            Schema::dropIfExists ('matches');
        }
        }
