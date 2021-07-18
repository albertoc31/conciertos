<?php

namespace App\DataFixtures;

use App\Entity\Concierto;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class ConciertoFixtures extends Fixture implements DependentFixtureInterface
{
    public const CONCIERTO_REFERENCE = 'concierto-';

    public function load(ObjectManager $manager)
    {
        $conciertosConfig = [
            [
                'name' => 'Food Aid',
                'numero_espectadores' => 15000,
                'fecha' => new \DateTime('now')
            ], [
                'name' => 'Summer Fest',
                'numero_espectadores' => 12000,
                'fecha' => new \DateTime('now')
            ]
        ];

        $i = 0;
        foreach ($conciertosConfig as $conciertoConfig) {
            $promotor = $this->getReference(PromotorFixtures::PROMOTOR_REFERENCE . $i);
            $recinto = $this->getReference(RecintoFixtures::RECINTO_REFERENCE . $i);
            $concierto = $this->createConcierto($conciertoConfig, $promotor, $recinto);
            $this->addReference(self::CONCIERTO_REFERENCE.$i, $concierto);
            $manager->persist($concierto);
            $i++;
        }

        $manager->flush();
    }
    private function createConcierto($conciertoConfig, $promotor, $recinto)
    {
        $concierto = new Concierto();
        $concierto->setName($conciertoConfig['name']);
        $concierto->setNumeroEspectadores($conciertoConfig['numero_espectadores']);
        $concierto->setFecha($conciertoConfig['fecha']);
        $concierto->setPromotor($promotor);
        $concierto->setRecinto($recinto);

        return $concierto;
    }

    public function getDependencies()
    {
        return array(
            PromotorFixtures::class,
            RecintoFixtures::class
        );
    }
}
