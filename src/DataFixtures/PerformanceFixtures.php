<?php

namespace App\DataFixtures;

use App\Entity\Performance;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker;

class PerformanceFixtures extends Fixture
{

    public function load(ObjectManager $manager)
    {
        $faker = Faker\Factory::create('fr_FR');
        for ($i = 1; $i <= 4; $i++) {
            $performance = new Performance();
            $performance->setTitle($faker->word);
            $performance->setDescription($faker->paragraphs(2, true));
            $performance->setUpdatedAt($faker->dateTime);

            $manager->persist($performance);
        }
        $manager->flush();
    }
}
