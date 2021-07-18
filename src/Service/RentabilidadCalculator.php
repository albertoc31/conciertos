<?php


namespace App\Service;


use App\Entity\Concierto;

class RentabilidadCalculator
{
    public function calcula(Concierto $concierto)
    {
        $entrada = $concierto->getNumeroEspectadores() * $concierto->getRecinto()->getPrecioEntrada();
        $costes_concierto = $concierto->getRecinto()->getCosteAlquiler();
        $grupos = $concierto->getGrupos();

        foreach ($grupos as $grupo)
        {
            $costes_concierto += $grupo->getCache();
            $costes_concierto += $entrada * 0.1;
        }
        $rentabilidad = $entrada - $costes_concierto;

        $concierto->setRentabilidad($rentabilidad);
        return $concierto;
    }
}