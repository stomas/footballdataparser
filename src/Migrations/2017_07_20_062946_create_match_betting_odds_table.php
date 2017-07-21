<?php

    use Illuminate\Support\Facades\Schema;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Database\Migrations\Migration;

    class CreateMatchBettingOddsTable extends Migration
        {

        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up ()
        {

            Schema::create (
                'match_betting_odds', function (Blueprint $table) {

                    $table->increments ('id');
                    $table->integer('match_id');

                    //Key to 1X2 (match) betting odds data
                    $table->float('B365H')->default(0)->comment('Bet365 home win odds');
                    $table->float('B365D')->default(0)->comment('Bet365 draw odds');
                    $table->float('B365A')->default(0)->comment('Bet365 away win odds');
                    $table->float('BSH')->default(0)->comment('Blue Square home win odds');
                    $table->float('BSD')->default(0)->comment('Blue Square draw odds');
                    $table->float('BSA')->default(0)->comment('Blue Square away win odds');
                    $table->float('BWH')->default(0)->comment('Bet&Win home win odds');
                    $table->float('BWD')->default(0)->comment('Bet&Win draw odds');
                    $table->float('BWA')->default(0)->comment('Bet&Win away win odds');
                    $table->float('GBH')->default(0)->comment('Gamebookers home win odds');
                    $table->float('GBD')->default(0)->comment('Gamebookers draw odds');
                    $table->float('GBA')->default(0)->comment('Gamebookers away win odds');
                    $table->float('IWH')->default(0)->comment('Interwetten home win odds');
                    $table->float('IWD')->default(0)->comment('Interwetten draw odds');
                    $table->float('IWA')->default(0)->comment('Interwetten away win odds');
                    $table->float('LBH')->default(0)->comment('Ladbrokes home win odds');
                    $table->float('LBD')->default(0)->comment('Ladbrokes draw odds');
                    $table->float('LBA')->default(0)->comment('Ladbrokes away win odds');
                    $table->float('PSH')->default(0)->comment('Pinnacle home win odds');
                    $table->float('PSD')->default(0)->comment('Pinnacle draw odds');
                    $table->float('PSA')->default(0)->comment('Pinnacle away win odds');
                    $table->float('SOH')->default(0)->comment('Sporting Odds home win odds');
                    $table->float('SOD')->default(0)->comment('Sporting Odds draw odds');
                    $table->float('SOA')->default(0)->comment('Sporting Odds away win odds');
                    $table->float('SBH')->default(0)->comment('Sportingbet home win odds');
                    $table->float('SBD')->default(0)->comment('Sportingbet draw odds');
                    $table->float('SBA')->default(0)->comment('Sportingbet away win odds');
                    $table->float('SJH')->default(0)->comment('Stan James home win odds');
                    $table->float('SJD')->default(0)->comment('Stan James draw odds');
                    $table->float('SJA')->default(0)->comment('Stan James away win odds');
                    $table->float('SYH')->default(0)->comment('Stanleybet home win odds');
                    $table->float('SYD')->default(0)->comment('Stanleybet draw odds');
                    $table->float('SYA')->default(0)->comment('Stanleybet away win odds');
                    $table->float('VCH')->default(0)->comment('VC Bet home win odds');
                    $table->float('VCD')->default(0)->comment('VC Bet draw odds');
                    $table->float('VCA')->default(0)->comment('VC Bet away win odds');
                    $table->float('WHH')->default(0)->comment('William Hill home win odds');
                    $table->float('WHD')->default(0)->comment('William Hill draw odds');
                    $table->float('WHA')->default(0)->comment('William Hill away win odds');

                    $table->float('Bb1X2')->default(0)->comment('Number of BetBrain bookmakers used to calculate match odds averages and maximums');
                    $table->float('BbMxH')->default(0)->comment('Betbrain maximum home win odds');
                    $table->float('BbAvH')->default(0)->comment('Betbrain average home win odds');
                    $table->float('BbMxD')->default(0)->comment('Betbrain maximum draw odds');
                    $table->float('BbAvD')->default(0)->comment('Betbrain average draw win odds');
                    $table->float('BbMxA')->default(0)->comment('Betbrain maximum away win odds');
                    $table->float('BbAvA')->default(0)->comment('Betbrain average away win odds');

                    //Key to total goals betting odds
                    $table->float('BbOU')->default(0)->comment('Number of BetBrain bookmakers used to calculate over/under 2.5 goals (total goals) averages and maximums');
                    $table->float('BbMxOver25')->default(0)->comment('Betbrain maximum over 2.5 goals');
                    $table->float('BbAvOver25')->default(0)->comment('Betbrain average over 2.5 goals');
                    $table->float('BbMxUnder25')->default(0)->comment('Betbrain maximum under 2.5 goals');
                    $table->float('BbAvUnder25')->default(0)->comment('Betbrain average under 2.5 goals');
                    $table->float('GBOver25')->default(0)->comment('Gamebookers over 2.5 goals');
                    $table->float('GBUnder25')->default(0)->comment('Gamebookers under 2.5 goals');
                    $table->float('B365Over25')->default(0)->comment('Bet365 over 2.5 goals');
                    $table->float('B365Under25')->default(0)->comment('Bet365 under 2.5 goals');

                    //Key to Asian handicap betting odds
                    $table->float('BbAH')->default(0)->comment('Number of BetBrain bookmakers used to Asian handicap averages and maximums');
                    $table->float('BbAHh')->default(0)->comment('Betbrain size of handicap (home team)');
                    $table->float('BbMxAHH')->default(0)->comment('Betbrain maximum Asian handicap home team odds');
                    $table->float('BbAvAHH')->default(0)->comment('Betbrain average Asian handicap home team odds');
                    $table->float('BbMxAHA')->default(0)->comment('Betbrain maximum Asian handicap away team odds');
                    $table->float('BbAvAHA')->default(0)->comment('Betbrain average Asian handicap away team odds');
                    $table->float('GBAHH')->default(0)->comment('Gamebookers Asian handicap home team odds');
                    $table->float('GBAHA')->default(0)->comment('Gamebookers Asian handicap away team odds');
                    $table->float('GBAH')->default(0)->comment('Gamebookers size of handicap (home team)');
                    $table->float('LBAHH')->default(0)->comment('Ladbrokes Asian handicap home team odds');
                    $table->float('LBAHA')->default(0)->comment('Ladbrokes Asian handicap away team odds');
                    $table->float('LBAH')->default(0)->comment('Ladbrokes size of handicap (home team)');
                    $table->float('B365AHH')->default(0)->comment('Bet365 Asian handicap home team odds');
                    $table->float('B365AHA')->default(0)->comment('Bet365 Asian handicap away team odds');
                    $table->float('B365AH')->default(0)->comment('Bet365 size of handicap (home team)');

                    //Closing odds (last odds before match starts)
                    $table->float('PSCH')->default(0)->comment('Pinnacle closing home win odds');
                    $table->float('PSCD')->default(0)->comment('Pinnacle closing draw odds');
                    $table->float('PSCA')->default(0)->comment('Pinnacle closing away win odds');

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

            Schema::dropIfExists ('match_betting_odds');
        }
        }
