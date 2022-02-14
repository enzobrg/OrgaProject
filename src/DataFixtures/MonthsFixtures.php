<?php

namespace App\DataFixtures;

use App\Entity\Months;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class MonthsFixtures extends Fixture
{
    const MONTHS = [
        'Janvier',
        'Février',
        'Mars',
        'Avril',
        'Mai',
        'Juin',
        'Juillet',
        'Aout',
        'Septembre',
        'Octobre',
        'Novembre',
        'Decembre',
        ];

    public function load(ObjectManager $manager)
    {
        foreach (self::MONTHS as $key => $monthsName) {
            $months = new Months();
            $months->setName($monthsName);

            $manager->persist($months);
        }
        $manager->flush();
    }
}
