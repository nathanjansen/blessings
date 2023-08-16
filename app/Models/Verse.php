<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Sushi\Sushi;

class Verse extends Model
{
    use Sushi;

    protected $rows = [
        [
            'id' => 1,
            'text' => 'Verblijd u altijd. Bid zonder ophouden. Dank God in alles. Want dit is de wil van God in Christus Jezus voor u.',
            'verse' => '1 Tessalonicenzen 5:16-18',
        ], [
            'id' => 2,
            'text' => 'Maar God zij dank, Die ons de overwinning geeft door onze Heere Jezus Christus.',
            'verse' => '1 Korintiërs 15:57',
        ], [
            'id' => 3,
            'text' => 'Wij moeten God altijd voor u danken, broeders, zoals het behoort, omdat uw geloof buitengewoon sterk groeit en de liefde van ieder van u allen tot elkaar steeds toeneemt.',
            'verse' => '2 Tessalonicenzen 1:3',
        ], [
            'id' => 4,
            'text' => 'Loof de HEERE, want Hij is goed, want Zijn goedertierenheid is voor eeuwig.',
            'verse' => '1 Kronieken 16:34',
        ], [
            'id' => 5,
            'text' => 'Want uit Hem en door Hem en tot Hem zijn alle dingen. Hem zij de heerlijkheid, tot in eeuwigheid. Amen.',
            'verse' => 'Romeinen 11:36',
        ], [
            'id' => 6,
            'text' => 'Ik zal de HEERE loven met heel mijn hart, ik zal al Uw wonderen vertellen.',
            'verse' => 'Psalm 9:2',
        ], [
            'id' => 7,
            'text' => 'En alles wat u doet met woorden of met daden, doe dat alles in de Naam van de Heere Jezus, terwijl u God en de Vader dankt door Hem.',
            'verse' => 'Kolossenzen 3:17',
        ], [
            'id' => 8,
            'text' => 'En laat de vrede van God heersen in uw harten, waartoe u ook in één lichaam geroepen bent; en wees dankbaar.',
            'verse' => 'Kolossenzen 3:15',
        ], [
            'id' => 9,
            'text' => 'Houd sterk aan in het gebed, en wees daarin waakzaam met dankzegging.',
            'verse' => 'Kolossenzen 4:2',
        ], [
            'id' => 10,
            'text' => 'Zo zult u in alles rijk worden, in staat tot alle vrijgevigheid, die door middel van ons dankzegging aan God teweegbrengt.',
            'verse' => '2 Korintiërs 9:11',
        ]
    ];
}
