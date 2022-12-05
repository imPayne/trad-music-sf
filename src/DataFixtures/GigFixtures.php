<?php

namespace App\DataFixtures;

use App\Entity\Gig;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class GigFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $today = new \DateTimeImmutable();
        $gig1 = new Gig();
        $gig1->setDateStart($today->modify("+2 day"));
        $gig1->setPub($this->getReference("pub-oconnels"));
        $manager->persist($gig1);

        $gig2 = new Gig();
        $gig2->setDateStart($today->modify("-1 month"));
        $gig2->setDateEnd($gig2->getDateStart()->modify("+2 hour"));
        $gig2->setPub($this->getReference("pub-oconnels"));
        $manager->persist($gig2);

        $gig3 = new Gig();
        $gig3->setDateStart($today->modify("+2 day"));
        $gig3->setDateEnd($gig3->getDateStart()->modify("+4 hour"));
        $gig3->setPub($this->getReference("pub-templebard"));
        $manager->persist($gig3);
        $manager->flush();
    }

    public function getDependencies()
    {
        return [PubFixtures::class]; //defined order load of fixtures
    }
}
