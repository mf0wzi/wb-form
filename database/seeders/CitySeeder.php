<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cities')->truncate();

        DB::table('cities')->insert(
            array(
                0 => array("id"=>1,"city_name"=>"Sana'a","city_name_ar"=>"صنعاء","city_title"=>"sanaa"),
                1 => array("id"=>2,"city_name"=>"Amanat Al Asimah","city_name_ar"=>"الامانه","city_title"=>"amanat_al_asimah"),
                2 => array("id"=>3,"city_name"=>"Aden","city_name_ar"=>"عدن","city_title"=>"aden"),
                3 => array("id"=>4,"city_name"=>"Taiz","city_name_ar"=>"تعز","city_title"=>"taiz"),
                4 => array("id"=>5,"city_name"=>"Hadramaut","city_name_ar"=>"حضرموت","city_title"=>"hadramot"),
                5 => array("id"=>6,"city_name"=>"Al-Hudaydah","city_name_ar"=>"الحديده","city_title"=>"al_hudaydah"),
                6 => array("id"=>7,"city_name"=>"Hajjah","city_name_ar"=>"حجة","city_title"=>"hajjah"),
                7 => array("id"=>8,"city_name"=>"Ibb","city_name_ar"=>"اب","city_title"=>"ibb"),
                8 => array("id"=>9,"city_name"=>"Abyan","city_name_ar"=>"ابين","city_title"=>"abyan"),
                9 => array("id"=>10,"city_name"=>"Al-Bayda","city_name_ar"=>"البيضاء","city_title"=>"al_bayda"),
                10 => array("id"=>11,"city_name"=>"Al-Jawf","city_name_ar"=>"الجوف","city_title"=>"al_jawf"),
                11 => array("id"=>12,"city_name"=>"Dhamar","city_name_ar"=>"ذمار","city_title"=>"dhamar"),
                12 => array("id"=>13,"city_name"=>"Shabwah","city_name_ar"=>"شبوه","city_title"=>"shabwah"),
                13 => array("id"=>14,"city_name"=>"Sa'dah","city_name_ar"=>"صعده","city_title"=>"sadah"),
                14 => array("id"=>15,"city_name"=>"Lahij","city_name_ar"=>"لحج","city_title"=>"lahij"),
                15 => array("id"=>16,"city_name"=>"Ma'rib","city_name_ar"=>"مارب","city_title"=>"marib"),
                16 => array("id"=>17,"city_name"=>"Al-Mahwit","city_name_ar"=>"المحويت","city_title"=>"al_mahwit"),
                17 => array("id"=>18,"city_name"=>"Al-Mahrah","city_name_ar"=>"المهره","city_title"=>"al_mahrah"),
                18 => array("id"=>19,"city_name"=>"Amran","city_name_ar"=>"عمران","city_title"=>"amran"),
                19 => array("id"=>20,"city_name"=>"Al-Dhale","city_name_ar"=>"الضالع","city_title"=>"al_dhale"),
                20 => array("id"=>21,"city_name"=>"Raymah","city_name_ar"=>"ريمه","city_title"=>"raymah"),
            )
        );
    }
}
