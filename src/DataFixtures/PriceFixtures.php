<?php

namespace App\DataFixtures;

use App\Entity\Price;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker;

class PriceFixtures extends Fixture
{

    public function load(ObjectManager $manager)
    {
        $faker = Faker\Factory::create('fr_FR');
        for ($i = 1; $i <= 4; $i++) {
            $price = new Price();
            $price->setPriceType($faker->word);
            $price->setPrice($faker->numberBetween([1], [100]));

            $manager->persist($price);
        }
        $manager->flush();
    }
}
