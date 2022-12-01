<?php

namespace App\DataFixtures;

use App\Entity\Instrument;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class InstrumentFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $flute = new Instrument("Flute");
        $guitar = new Instrument("Guitar");
        $guitar->setIcon("fa-solid fa-guitar");
        $manager->persist($guitar);
        $manager->persist($flute);

        $manager->flush();
    }
}