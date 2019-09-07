<?php

namespace App\Form;

use App\Entity\RespuestaEvaluacion;
use App\Entity\OpcionPregunta;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Doctrine\ORM\EntityManagerInterface;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class RespuestaEvaluacionType extends AbstractType
{
    private $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $opciones = $this->em
                ->getRepository(OpcionPregunta::class)
                ->findBy([
                    'idPregunta' => $options['idPregunta'],
                ]);

        $builder
            ->add('idOpcionPregunta', EntityType::class, [
                'class' => OpcionPregunta::class,
                'choices' => $opciones,
                'choice_label' => 'textoOpcionPregunta',
                'placeholder' => '--Seleccione--',
                'expanded' => true,
                'multiple' => false,
            ])
            ->add('save', SubmitType::class, [
                'label' => 'Siguiente',
                'attr' => [
                    'class' => 'btn btn-primary'
                ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => RespuestaEvaluacion::class,
            'idPregunta' => null,
        ]);
    }
}
