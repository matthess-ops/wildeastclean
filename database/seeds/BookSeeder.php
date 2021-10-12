<?php

use Illuminate\Support\Facades\Auth;

use Illuminate\Database\Seeder;

use Illuminate\Support\Carbon;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        error_log("test seeder runned");
        DB::table('books')->insert([
            'title'=>"The Wild East - Een Roadtrip door d'n Achterhoek",
            'description' => "D’n Achterhoek is een bijzondere regio. En dat is 't. Je kunt er wel een boek over schrijven. Dat heb ik dan ook gedaan. Met een pens vol power en een goeie zin dook ik de binnenlanden in. In deze avonturenroman fiets ik op een ludieke manier door d’n Achterhoek en zijn bewogen maar veelal onderbelichte historie.",
            'blurb' => "empty blurb",
            'passage' => "D’n Achterhoek is een bijzondere regio. En dat is 't. Je kunt er wel een boek over schrijven. Dat heb ik dan ook gedaan. Met een pens vol power en een goeie zin dook ik de binnenlanden in. In deze avonturenroman fiets ik op een ludieke manier door d’n Achterhoek en zijn bewogen maar veelal onderbelichte historie.

            Zo weten maar weinigen dat het aan het einde van de jaren zeventig in Achterhoekse kroegen verboden was om een nummer van Normaal te laten horen na tien uur ’s avonds. Er lagen veiligheidsoverwegingen ten grondslag aan deze verordening. In een café tussen Varsseveld en Sinderen hebben ze deze maatregel een keer genegeerd. ‘Tussen Varsseveld en Sinderen?’ hoor ik u denken. ‘Daar heb je toch helemaal geen café?’ Nee, nu niet meer. Met eigen ogen kon ik aanschouwen dat er nu nog enkel een door onkruid overwoekerde biertap overgebleven is.

            De route voerde mij verder langs onder meer de Zelhemse kerktoren, die na de harde confrontatie met Smokshanne, de vliegende dorpsheks, een paar centimeter overhelt. En even later kwam ik aan bij Café de Tol, stamcafé van Hendrik Hietbrink. Na weer een bezoek aan de Tol is Hendrik ooit op een brommer een roggeland ingevlogen. De volgende morgen stond er in koeienletters in de Gelderlander: Mysterieuze graancirkels in Hummelo.

            Al fietsende kwam ik oren en ogen tekort om al deze bijzondere zaken te noteren. De kladblokken vlogen erdoorheen. Deze krabbels heb ik in een paar schoenendozen verzameld en omgezet in een verhaal vol sterke vertellingen over een regio waarin ‘sprekken’, oftewel sterke verhalen vertellen, de nationale sport was. Deze vaak al eeuwenoude verhalen over witte wieven, smokkelpraktijken en jeneverstokerijen werden ’s avonds aan het open vuur overgedragen van vader naar zoon, krachtens erfrecht.

            Deze vertellingen worden echter in deze mobiele tijden met uitsterven bedreigd. Ik ben blij dat ik ze voor de vergetelheid heb kunnen behoeden door ze te bundelen in ‘The Wild East – Een Roadtrip door d’n Achterhoek’.",
            'price' => 20,
            'main_image' => 'the_wild_east_een_roadtrip_door_de_achterhoek_600.jpg',
            'carousel_images' => json_encode(['the_wild_east_een_roadtrip_door_de_achterhoek_600.jpg']),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);



/////////////////////////////////////////////////

error_log("test seeder runned");
        DB::table('books')->insert([
            'title'=>"Wimken van Diene - Ik Blief Altied Normaal",
            'description' => "bla bladkfjaklsdfjaksdjf klasjdf test test bla.",
            'blurb' => "empty blurb",
            'passage' => "D’n Achterhoek is een bijzondere regio. En dat is 't. Je kunt er wel een boek over schrijven. Dat heb ik dan ook gedaan. Met een pens vol power en een goeie zin dook ik de binnenlanden in. In deze avonturenroman fiets ik op een ludieke manier door d’n Achterhoek en zijn bewogen maar veelal onderbelichte historie.

            Zo weten maar weinigen dat het aan het einde van de jaren zeventig in Achterhoekse kroegen verboden was om een nummer van Normaal te laten horen na tien uur ’s avonds. Er lagen veiligheidsoverwegingen ten grondslag aan deze verordening. In een café tussen Varsseveld en Sinderen hebben ze deze maatregel een keer genegeerd. ‘Tussen Varsseveld en Sinderen?’ hoor ik u denken. ‘Daar heb je toch helemaal geen café?’ Nee, nu niet meer. Met eigen ogen kon ik aanschouwen dat er nu nog enkel een door onkruid overwoekerde biertap overgebleven is.

            De route voerde mij verder langs onder meer de Zelhemse kerktoren, die na de harde confrontatie met Smokshanne, de vliegende dorpsheks, een paar centimeter overhelt. En even later kwam ik aan bij Café de Tol, stamcafé van Hendrik Hietbrink. Na weer een bezoek aan de Tol is Hendrik ooit op een brommer een roggeland ingevlogen. De volgende morgen stond er in koeienletters in de Gelderlander: Mysterieuze graancirkels in Hummelo.

            Al fietsende kwam ik oren en ogen tekort om al deze bijzondere zaken te noteren. De kladblokken vlogen erdoorheen. Deze krabbels heb ik in een paar schoenendozen verzameld en omgezet in een verhaal vol sterke vertellingen over een regio waarin ‘sprekken’, oftewel sterke verhalen vertellen, de nationale sport was. Deze vaak al eeuwenoude verhalen over witte wieven, smokkelpraktijken en jeneverstokerijen werden ’s avonds aan het open vuur overgedragen van vader naar zoon, krachtens erfrecht.

            Deze vertellingen worden echter in deze mobiele tijden met uitsterven bedreigd. Ik ben blij dat ik ze voor de vergetelheid heb kunnen behoeden door ze te bundelen in ‘The Wild East – Een Roadtrip door d’n Achterhoek’.",
            'price' => 20,
            'main_image' => 'wimken_van_diene_ik_blief_normaal_600.jpg',
            'carousel_images' => json_encode(['wimken_van_diene_ik_blief_normaal_600.jpg']),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);







    }
}

// $table->bigIncrements('id');
// $table->string('title'); // titel boek of muziek etc
// $table->longText('description')->nullable(); // boek omschrijving
// $table->longText('blurb')->nullable(); // maintext for product
// $table->longText('passage')->nullable(); // probably only used for books, this is an example text for a book
// $table->float('price'); // price
// $table->string('main_image'); // this is the image shown on the index page
// $table->json('carousel_images')->nullable();
