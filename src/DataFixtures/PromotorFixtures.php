<?php

namespace App\DataFixtures;

use App\Entity\Promotor;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class PromotorFixtures extends Fixture
{
    public const PROMOTOR_REFERENCE = 'promotor-';

    public function load(ObjectManager $manager)
    {
        $promotoresConfig = [
            [
                'name' => 'Pablo'
            ], [
                'name' => 'Pedro'
            ]
        ];

        $i = 0;
        foreach ($promotoresConfig as $promotorConfig) {
            $promotor = $this->createPromotor($promotorConfig);
            $manager->persist($promotor);
            $this->addReference(self::PROMOTOR_REFERENCE.$i, $promotor);
            $i++;
        }

        $manager->flush();
    }
    private function createPromotor($promotorConfig)
    {
        $promotor = new Promotor();
        $promotor->setName($promotorConfig['name']);

        return $promotor;
    }
}
