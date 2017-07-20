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
                    $table->float('B365H')->comment('Bet365 home win odds');
                    $table->float('B365D')->comment('Bet365 draw odds');
                    $table->float('B365A')->comment('Bet365 away win odds');
                    $table->float('BSH')->comment('Blue Square home win odds');
                    $table->float('BSD')->comment('Blue Square draw odds');
                    $table->float('BSA')->comment('Blue Square away win odds');
                    $table->float('BWH')->comment('Bet&Win home win odds');
                    $table->float('BWD')->comment('Bet&Win draw odds');
                    $table->float('BWA')->comment('Bet&Win away win odds');
                    $table->float('GBH')->comment('Gamebookers home win odds');
                    $table->float('GBD')->comment('Gamebookers draw odds');
                    $table->float('GBA')->comment('Gamebookers away win odds');
                    $table->float('IWH')->comment('Interwetten home win odds');
                    $table->float('IWD')->comment('Interwetten draw odds');
                    $table->float('IWA')->comment('Interwetten away win odds');
                    $table->float('LBH')->comment('Ladbrokes home win odds');
                    $table->float('LBD')->comment('Ladbrokes draw odds');
                    $table->float('LBA')->comment('Ladbrokes away win odds');
                    $table->float('PSH')->comment('Pinnacle home win odds');
                    $table->float('PSD')->comment('Pinnacle draw odds');
                    $table->float('PSA')->comment('Pinnacle away win odds');
                    $table->float('SOH')->comment('Sporting Odds home win odds');
                    $table->float('SOD')->comment('Sporting Odds draw odds');
                    $table->float('SOA')->comment('Sporting Odds away win odds');
                    $table->float('SBH')->comment('Sportingbet home win odds');
                    $table->float('SBD')->comment('Sportingbet draw odds');
                    $table->float('SBA')->comment('Sportingbet away win odds');
                    $table->float('SJH')->comment('Stan James home win odds');
                    $table->float('SJD')->comment('Stan James draw odds');
                    $table->float('SJA')->comment('Stan James away win odds');
                    $table->float('SYH')->comment('Stanleybet home win odds');
                    $table->float('SYD')->comment('Stanleybet draw odds');
                    $table->float('SYA')->comment('Stanleybet away win odds');
                    $table->float('VCH')->comment('VC Bet home win odds');
                    $table->float('VCD')->comment('VC Bet draw odds');
                    $table->float('VCA')->comment('VC Bet away win odds');
                    $table->float('WHH')->comment('William Hill home win odds');
                    $table->float('WHD')->comment('William Hill draw odds');
                    $table->float('WHA')->comment('William Hill away win odds');

                    $table->float('Bb1X2')->comment('Number of BetBrain bookmakers used to calculate match odds averages and maximums');
                    $table->float('BbMxH')->comment('Betbrain maximum home win odds');
                    $table->float('BbAvH')->comment('Betbrain average home win odds');
                    $table->float('BbMxD')->comment('Betbrain maximum draw odds');
                    $table->float('BbAvD')->comment('Betbrain average draw win odds');
                    $table->float('BbMxA')->comment('Betbrain maximum away win odds');
                    $table->float('BbAvA')->comment('Betbrain average away win odds');

                    //Key to total goals betting odds
                    $table->float('BbOU')->comment('Number of BetBrain bookmakers used to calculate over/under 2.5 goals (total goals) averages and maximums');
                    $table->float('BbMx>2.5')->comment('Betbrain maximum over 2.5 goals');
                    $table->float('BbAv>2.5')->comment('Betbrain average over 2.5 goals');
                    $table->float('BbMx<2.5')->comment('Betbrain maximum under 2.5 goals');
                    $table->float('BbAv<2.5')->comment('Betbrain average under 2.5 goals');
                    $table->float('GB>2.5')->comment('Gamebookers over 2.5 goals');
                    $table->float('GB<2.5')->comment('Gamebookers under 2.5 goals');
                    $table->float('B365>2.5')->comment('Bet365 over 2.5 goals');
                    $table->float('B365<2.5')->comment('Bet365 under 2.5 goals');

                    //Key to Asian handicap betting odds
                    $table->float('BbAH')->comment('Number of BetBrain bookmakers used to Asian handicap averages and maximums');
                    $table->float('BbAHh')->comment('Betbrain size of handicap (home team)');
                    $table->float('BbMxAHH')->comment('Betbrain maximum Asian handicap home team odds');
                    $table->float('BbAvAHH')->comment('Betbrain average Asian handicap home team odds');
                    $table->float('BbMxAHA')->comment('Betbrain maximum Asian handicap away team odds');
                    $table->float('BbAvAHA')->comment('Betbrain average Asian handicap away team odds');
                    $table->float('GBAHH')->comment('Gamebookers Asian handicap home team odds');
                    $table->float('GBAHA')->comment('Gamebookers Asian handicap away team odds');
                    $table->float('GBAH')->comment('Gamebookers size of handicap (home team)');
                    $table->float('LBAHH')->comment('Ladbrokes Asian handicap home team odds');
                    $table->float('LBAHA')->comment('Ladbrokes Asian handicap away team odds');
                    $table->float('LBAH')->comment('Ladbrokes size of handicap (home team)');
                    $table->float('B365AHH')->comment('Bet365 Asian handicap home team odds');
                    $table->float('B365AHA')->comment('Bet365 Asian handicap away team odds');
                    $table->float('B365AH')->comment('Bet365 size of handicap (home team)');

                    //Closing odds (last odds before match starts)
                    $table->float('PSCH')->comment('Pinnacle closing home win odds');
                    $table->float('PSCD')->comment('Pinnacle closing draw odds');
                    $table->float('PSCA')->comment('Pinnacle closing away win odds');

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
