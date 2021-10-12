<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class KratmeisterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     *
     *
     *
     *
     *
     */

    // $table->float('single_can_price'); // all carousel images, book will have an empty array
    // $table->float('single_small_bottle_price'); // all carousel images, book will have an empty array
    // $table->float('single_large_bottle_price'); // all carousel images, book will have an empty array
    // $table->float('sixpack_can_price'); // all carousel images, book will have an empty array
    // $table->float('sixpack_bottle_price'); // all carousel images, book will have an empty array
    // $table->float('beercase_price'); // all carousel images, book




    public function run()
    {


        DB::table('kratmeisters')->insert([
            'title'=>"De Koning",
            // 'back_label_text' =>"Qua drank is er keuze genoeg in de gemiddelde kroeg. Mensen kiezen, als alternatief voor bier, aldoor vaker een speciaal aperitief in een café. Bennie Ruighaver doet hier niet aan mee. Bij Bennie scoor je geen punten met een dure witte wijn. Naar eigen zeggen drinkt hij nog liever azijn. Bennie heeft een uitgesproken hekel aan rosé. Die spoelt hij naar eigen zeggen meteen door de wc. Bennie doe je geen plezier met een speciaalbier, ook al bevat het tal van bijzondere skills. Nee, doe Bennie Ruighaver maar gewoon pils. Hij zet de fles aan de lippen om ervan te nippen en kijk…. Bennie Ruighaver is de koning te rijk.",
            'back_label_text' =>"Qua drank is er keuze genoeg in de gemiddelde kroeg. Mensen kiezen, als alternatief voor bier, aldoor vaker een speciaal aperitief in een café. $$$$ doet hier niet aan mee. Bij $$$$ scoor je geen punten met een dure witte wijn. Naar eigen zeggen drinkt hij nog liever azijn. $$$$ heeft een uitgesproken hekel aan rosé. Die spoelt hij naar eigen zeggen meteen door de wc. $$$$ doe je geen plezier met een speciaalbier, ook al bevat het tal van bijzondere skills. Nee, doe $$$$ maar gewoon pils. Hij zet de fles aan de lippen om ervan te nippen en kijk…. $$$$ is de koning te rijk.",

            'front_label_image' =>"keizer_etiket.jpg",
            'carousel_images' => json_encode([["keizer_bierfles_met_etiket.jpg","keizer_krat_afbeelding.jpg","keizer_zijkant_krat_met_tekst.jpg"]]),
            'single_can_price'=>0,
            'single_small_bottle_price'=>0,
            'single_large_bottle_price'=>0,
            'sixpack_can_price'=>0,
            'sixpack_bottle_price'=>0,
            'beercase_price'=>40,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('kratmeisters')->insert([
            'title'=>"De Boer is De Keerl",
            'back_label_text' =>"$$$$ is maar een eenvoudige boerenknul. En daar schaamt hij zich niet voor. Door al die trekkertoertochten naar ‘s Gravenhage zal iedereen intussen wel weten: zonder boeren is er geen eten. Maar wat heel veel mensen vergeten: zonder boeren is ook geen bier. Wie moet er anders al die gerst, hop en tarwe verbouwen? Over hun rol als hoofdleverancier van de ingrediënten van bier zul je de boer echter niet horen pochen. De boer is een man met fatsoen. De boer dat is de keerl die ’t mot doen. Door zijn onverstoorbare zwoegen en ploegen kunt u nu genieten van een lekker flesje $$$$ Bier.",
            'front_label_image' =>"boer_etiket.jpg",
            'carousel_images' => json_encode([[]]),
            'single_can_price'=>0,
            'single_small_bottle_price'=>0,
            'single_large_bottle_price'=>0,
            'sixpack_can_price'=>0,
            'sixpack_bottle_price'=>0,
            'beercase_price'=>40,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('kratmeisters')->insert([
            'title'=>"De piraat",
            'back_label_text' =>"Test één twee, test één twee. Breaky, breaky. Mayday, mayday. Luisteraars en amateurs, hierbij een mededeling van de O.N.P., de Oost-Nederlandse Piratenbond. Het O.N.P. vormt een overkoepelende organisatie van geheime-zender-stations in allerlei soorten en maten. Het ene station is nog geheimer dan het andere. Sommige stations zijn zo geheim dat niemand ze kan ontvangen. Dat zijn de echte. Wij van het O.N.P. hebben nieuws. Goed nieuws. De dagen dat etherpiraten werden opgesloten in de cel behoren tot het verleden, want etherpiraten zijn toegevoegd aan de culturele erfgoedlijst. Dit houdt in dat alle geheime zenders ieder jaar een flinke subsidie mogen bijschrijven. Om dit heugelijke feit te vieren hebben wij zelf een biermerk ontwikkeld, gewijd aan ons erelid $$$$, een piraat in hart en nieren.",
            'front_label_image' =>"piraat_etiket.jpg",
            'carousel_images' => json_encode([[]]),
            'single_can_price'=>0,
            'single_small_bottle_price'=>0,
            'single_large_bottle_price'=>0,
            'sixpack_can_price'=>0,
            'sixpack_bottle_price'=>0,
            'beercase_price'=>40,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
              ]);

        DB::table('kratmeisters')->insert([
            'title'=>"'Doar Win Iej 'n Oorlog Met'",
            'back_label_text' =>"Voor Bennie Ruighaver is geen brug te ver.  Zijn motto luidt: ‘A’j d’r bunt, dan mo’j d’r wean.’ Te allen tijde gaat hij voorop in de strijd, ook al heeft hij gehavende benen, vol oorlogswonden, opgelopen in de tweede supermarktoorlog, toen hij bij kassa 4 keihard onderuit ging. De vele bijzondere verdiensten van Ruighaver resulteerden in een jasje vol eremetaal, waarvan de medaille voor de vierde plek in de Hengelose wandelvierdaagse misschien wel de meest imponerende plak is. Vanaf heden kan Bennie zijn uitgebreide palmares aanvullen met een eigen biermerk, voorzien van zijn eigen portret. Bennie Ruighaver, doar win iej ’n oorlog met. ",
            'front_label_image' =>"generaal_etiket.jpg",
            'carousel_images' => json_encode([[]]),
            'single_can_price'=>0,
            'single_small_bottle_price'=>0,
            'single_large_bottle_price'=>0,
            'sixpack_can_price'=>0,
            'sixpack_bottle_price'=>0,
            'beercase_price'=>40,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);



        DB::table('kratmeisters')->insert([
            'title'=>"Peaky blinders",
            'back_label_text' =>
            "Duistere wouden en ondoorgrondelijke moerassen vormden eeuwenlang een barrière tussen Oost- en West-Nederland. Hierdoor had de regering maar amper in de gaten welke taferelen zich er allemaal aan de rechterzijde van de IJssel afspeelden. Zodoende leefde men in het oosten al die tijd onder en boven de wet. Dit heeft uiteraard ook een uitwerking gehad op de volksaard. Als nationale volkssport hanteerde men hier bijvoorbeeld een eigen versie van de triathlon. Met als onderdelen stroperij, motorcrossen en etherpiraterij. Aan deze krachtmeting wagen zich enkel echte keerls, met echte skills. Vanaf heden kan deze triatlon worden voorzien van onderdeel nummer vier, te weten het brouwen van bier. Een van de veelbelovende triatleten presenteert aan u: Bennie Ruighaver Pils.",
            'front_label_image' =>"peaky_blinders_etiket.jpg",
            'carousel_images' => json_encode([[]]),
            'single_can_price'=>0,
            'single_small_bottle_price'=>0,
            'single_large_bottle_price'=>0,
            'sixpack_can_price'=>0,
            'sixpack_bottle_price'=>0,
            'beercase_price'=>40,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('kratmeisters')->insert([
            'title'=>"The Wild East",
            'back_label_text' =>"Bennie komt uit een regio met een hoge gunfactor. Zowat iedereen heeft er wel een buks op zolder liggen. Ruighaver is de snelste schutter van allemaal. Hij vuurt anderhalve tel sneller dan zijn eigen schaduw. Zijn motto luidt: Eerst schieten en dan praten. Bij verscheidene zomerfeesten heeft onze lokale John Wayne de schiettent helemaal aan diggelen geknald. Bennie mag graag in de lokale saloon deze belevenissen op een smakelijke manier opdissen. Bennie Ruighaver Pilsener is dan ook een smerum dat al binnen twee slokken de sterke verhalen in mensen naar boven haalt.",
            'front_label_image' =>"the_wild_east_etiket.jpg",
            'carousel_images' => json_encode([[]]),
            'single_can_price'=>0,
            'single_small_bottle_price'=>0,
            'single_large_bottle_price'=>0,
            'sixpack_can_price'=>0,
            'sixpack_bottle_price'=>0,
            'beercase_price'=>40,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);



}
}

