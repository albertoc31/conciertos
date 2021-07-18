<?php

namespace App\DataFixtures;

use App\Entity\Grupo;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class GrupoFixtures extends Fixture implements DependentFixtureInterface
{
    public const GRUPO_REFERENCE = 'grupo-';

    public function load(ObjectManager $manager)
    {
        $gruposConfig = [
            [
                'name' => 'Keane',
                'cache' => 100000
            ], [
                'name' => 'Barbeque',
                'cache' => 120000
            ]
        ];

        $i = 0;
        foreach ($gruposConfig as $grupoConfig) {
            $concierto = $this->getReference(ConciertoFixtures::CONCIERTO_REFERENCE . $i);
            $grupo = $this->createGrupo($grupoConfig, $concierto);
            $this->addReference(self::GRUPO_REFERENCE.$i, $grupo);
            $manager->persist($grupo);
            $i++;
        }

        $manager->flush();
    }
    private function createGrupo($grupoConfig, $concierto)
    {
        $grupo = new Grupo();
        $grupo->setName($grupoConfig['name']);
        $grupo->setCache($grupoConfig['cache']);
        $grupo->addConcierto($concierto);

        return $grupo;
    }

    public function getDependencies()
    {
        return array(
            ConciertoFixtures::class
        );
    }
}
