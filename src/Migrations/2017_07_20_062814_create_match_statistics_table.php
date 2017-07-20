<?php

    use Illuminate\Support\Facades\Schema;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Database\Migrations\Migration;

    class CreateMatchStatisticsTable extends Migration
        {

        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up ()
        {

            Schema::create (
                'match_statistics', function (Blueprint $table) {

                    $table->increments ('id');
                    $table->integer ('match_id');
                    $table->text ('Attendance')->comment ('Crowd Attendance');
                    $table->text ('Referee')->comment ('Match Referee');
                    $table->integer ('HS')->comment ('Home Team Shots');
                    $table->integer ('AS')->comment ('Away Team Shots');
                    $table->integer ('HST')->comment ('Home Team Shots On Target');
                    $table->integer ('AST')->comment ('Away Team Shots On Target');
                    $table->integer ('HHW')->comment ('Home Team Hit Woodwork');
                    $table->integer ('AHW')->comment ('Away Team Hit Woodwork');
                    $table->integer ('HC')->comment ('Home Team Corners');
                    $table->integer ('AC')->comment ("Away Team Corners");
                    $table->integer ('HF')->comment ('Home Team Fouls Committed');
                    $table->integer ('AF')->comment ('Away Team Fouls Committed');
                    $table->integer ('HO')->comment ('Home Team Offsides');
                    $table->integer ('AO')->comment ('Away Team Offsides');
                    $table->integer ('HY')->comment ('Home Team Yellow Cards');
                    $table->integer ('AY')->comment ('Away Team Yellow Cards');
                    $table->integer ('HR')->comment ('Home Team Red Cards');
                    $table->integer ('AR')->comment ('Away Team Red Cards');
                    $table->integer ('HBP')->comment ('Home Team Bookings Points (10 = yellow, 25 = red)');
                    $table->integer ('ABP')->comment ('Away Team Bookings Points (10 = yellow, 25 = red)');
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

            Schema::dropIfExists ('match_statistics');
        }
        }
