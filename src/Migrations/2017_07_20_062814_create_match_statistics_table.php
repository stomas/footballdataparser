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
                    $table->text ('Attendance')->nullable()->comment ('Crowd Attendance');
                    $table->text ('Referee')->nullable()->comment ('Match Referee');
                    $table->integer ('HS')->default(0)->comment ('Home Team Shots');
                    $table->integer ('AS')->default(0)->comment ('Away Team Shots');
                    $table->integer ('HST')->default(0)->comment ('Home Team Shots On Target');
                    $table->integer ('AST')->default(0)->comment ('Away Team Shots On Target');
                    $table->integer ('HHW')->default(0)->comment ('Home Team Hit Woodwork');
                    $table->integer ('AHW')->default(0)->comment ('Away Team Hit Woodwork');
                    $table->integer ('HC')->default(0)->comment ('Home Team Corners');
                    $table->integer ('AC')->default(0)->comment ("Away Team Corners");
                    $table->integer ('HF')->default(0)->comment ('Home Team Fouls Committed');
                    $table->integer ('AF')->default(0)->comment ('Away Team Fouls Committed');
                    $table->integer ('HO')->default(0)->comment ('Home Team Offsides');
                    $table->integer ('AO')->default(0)->comment ('Away Team Offsides');
                    $table->integer ('HY')->default(0)->comment ('Home Team Yellow Cards');
                    $table->integer ('AY')->default(0)->comment ('Away Team Yellow Cards');
                    $table->integer ('HR')->default(0)->comment ('Home Team Red Cards');
                    $table->integer ('AR')->default(0)->comment ('Away Team Red Cards');
                    $table->integer ('HBP')->default(0)->comment ('Home Team Bookings Points (10 = yellow, 25 = red)');
                    $table->integer ('ABP')->default(0)->comment ('Away Team Bookings Points (10 = yellow, 25 = red)');
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
