<?php

namespace App\DataFixtures;

use App\Entity\Pub;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class PubFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $oConnels = new Pub();
        $oConnels->setName("O'Connel's");
        $oConnels->setImage("oconnell.jpg");
        $oConnels->setZipCode("35000");
        $oConnels->setCity("Rennes");
        $oConnels->setAddress("6 Pl. du Parlement de Bretagne");

        $templeBard = new Pub();
        $templeBard->setName("Temple Bar");
        $templeBard->setImage("templebar.jpg");
        $templeBard->setAddress("47-48 Temple Bar");
        $templeBard->setCity("Dublin");
        $templeBard->setZipCode("D02 N725");

        $this->addReference("pub-oconnels", $oConnels);
        $this->addReference("pub-templebard", $templeBard);
        $manager->persist($oConnels);
        $manager->persist($templeBard);
        $manager->flush();
    }
}
