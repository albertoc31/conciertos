<?php

namespace App\DataFixtures;

use App\Entity\Recinto;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class RecintoFixtures extends Fixture
{
    public const RECINTO_REFERENCE = 'recinto-';

    public function load(ObjectManager $manager)
    {
        $recintosConfig = [
            [
                'name' => 'Wanda',
                'coste_alquiler' => 55000,
                'precio_entrada' => 30
            ], [
                'name' => 'Zendal',
                'coste_alquiler' => 50000,
                'precio_entrada' => 25
            ]
        ];

        $i = 0;
        foreach ($recintosConfig as $recintoConfig) {
            $recinto = $this->createRecinto($recintoConfig);
            $manager->persist($recinto);
            $this->addReference(self::RECINTO_REFERENCE.$i, $recinto);
            $i++;
        }

        $manager->flush();
    }
    private function createRecinto($recintoConfig)
    {
        $recinto = new Recinto();
        $recinto->setName($recintoConfig['name']);
        $recinto->setCosteAlquiler($recintoConfig['coste_alquiler']);
        $recinto->setPrecioEntrada($recintoConfig['precio_entrada']);

        return $recinto;
    }
}
