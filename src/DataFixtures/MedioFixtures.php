<?php

namespace App\DataFixtures;

use App\Entity\Medio;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class MedioFixtures extends Fixture implements DependentFixtureInterface
{
    public const MEDIO_REFERENCE = 'medio-';

    public function load(ObjectManager $manager)
    {
        $mediosConfig = [
            [
                'name' => 'La Vanguardia',
            ], [
                'name' => 'Rolling Stone',
            ]
        ];

        $i = 0;
        foreach ($mediosConfig as $medioConfig) {
            $concierto = $this->getReference(ConciertoFixtures::CONCIERTO_REFERENCE . $i);
            $medio = $this->createMedio($medioConfig, $concierto);
            $this->addReference(self::MEDIO_REFERENCE.$i, $medio);
            $manager->persist($medio);
            $i++;
        }

        $manager->flush();
    }
    private function createMedio($medioConfig, $concierto)
    {
        $medio = new Medio();
        $medio->setName($medioConfig['name']);
        $medio->addConcierto($concierto);

        return $medio;
    }

    public function getDependencies()
    {
        return array(
            ConciertoFixtures::class
        );
    }
}
