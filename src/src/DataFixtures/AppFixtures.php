<?php

namespace App\DataFixtures;

use App\Entity\Paises;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
 
            $paisesarray = array(
                            1=>array("name"=>"India","population"=>1409902000),
                            2=>array("name"=>"China","population"=>1403426000),
                            3=>array("name"=>"Estados Unidos","population"=>331800000),
                            4=>array("name"=>"Indonesia","population"=>271629000),
                            5=>array("name"=>"Pakistán","population"=>224654000),
                            6=>array("name"=>"Nigeria","population"=>219743000),
                            7=>array("name"=>"Brasil","population"=>211420000),
                            8=>array("name"=>"Bangladés","population"=>181781000),
                            9=>array("name"=>"Rusia","population"=>146712000),
                            10=>array("name"=>"México","population"=>127792000),
                            11=>array("name"=>"Japón","population"=>126045000),
                            12=>array("name"=>"Filipinas","population"=>108772000),
                            13=>array("name"=>"Egipto","population"=>101000000),
                            14=>array("name"=>"Etiopía","population"=>100882000),
                            15=>array("name"=>"Vietnam","population"=>97591000),
                            16=>array("name"=>"Republica del Congo","population"=>89561000),
                            17=>array("name"=>"Irán","population"=>83914000),
                            18=>array("name"=>"Turquía","population"=>83752000),
                            19=>array("name"=>"Alemania","population"=>83421000),
                            20=>array("name"=>"Tailandia","population"=>68232000)

            );

            foreach($paisesarray as $pais){
                $paises=new Paises();
                foreach($pais as $key=>$value){
                     if($key=="name"){
                         $paises->setName($value);
                     }else{
                        $paises->setPopulation($value);

                     }
                }
                $manager->persist($paises);
                
            }
 

        $manager->flush();
    }
}
