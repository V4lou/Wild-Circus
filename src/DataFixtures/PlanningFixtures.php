<?php

namespace App\DataFixtures;

use App\Entity\Planning;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker;

class PlanningFixtures extends Fixture
{

    public function load(ObjectManager $manager)
    {
        $faker = Faker\Factory::create('fr_FR');
        for ($i = 1; $i <= 4; $i++) {
            $planning = new Planning();
            $planning->setTitle($faker->word);
            $planning->setLocation($faker->word);
            $planning->setinfoDate($faker->dateTime);

            $manager->persist($planning);
        }
        $manager->flush();
    }
}
