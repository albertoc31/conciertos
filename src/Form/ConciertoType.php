<?php

namespace App\Form;

use App\Entity\Concierto;
use App\Service\RentabilidadCalculator;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ConciertoType extends AbstractType
{
    private $calculator;
    public function __construct(RentabilidadCalculator $calculator)
    {
        $this->calculator = $calculator;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('numero_espectadores')
            ->add('fecha')
            ->add('grupos')
            ->add('medios')
            ->add('promotor')
            ->add('recinto')
            ->add('rentabilidad', HiddenType::class, [
                'mapped' => true,
            ])
            ->addEventListener(
                FormEvents::POST_SUBMIT,
                [$this, 'postSubmit']
            )
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Concierto::class,
        ]);
    }

    public function postSubmit(FormEvent $event): void
    {
        $concierto = $event->getData();
        //var_dump($concierto);die();
        $concierto = $this->calculator->calcula($concierto);
        $event->setData($concierto);
    }
}
