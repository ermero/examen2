<?php

namespace FCTBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\ResetType;


class EmpresaType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nombre', 
                  TextType::class, 
                  array('label'=>'Nombre de la empresa',
                        'label_attr'=>array('class'=>'nombre'),
                        'attr'=>array('class'=>'fondo')
                       )
                 )
            ->add('direccion',
                  TextType::class,
                  array('label'=>'Dirección de la empresa',
                        'label_attr'=>array('class'=>'nombre'),
                        'attr'=>array('class'=>'fondo')
                        )
                  )
            ->add('cp',
                  TextType::class,
                  array('label'=>'CP',
                        'label_attr'=>array('class'=>'nombre'),
                        'attr'=>array('class'=>'fondo')
                       )
                  )
            ->add('telefono1',
                  TextType::class,
                  array('label'=>'Telefono1',
                        'label_attr'=>array('class'=>'nombre'),
                        'attr'=>array('class'=>'fondo')
                        )
                  )
            ->add('telefono2',
                  TextType::class,
                  array('label'=>'Telefono2',
                        'label_attr'=>array('class'=>'nombre'),
                        'attr'=>array('class'=>'fondo')
                        )
                  )
            ->add('fechaCreacion', 
                DateType::class,
                array('label'=>'Fecha de Creación')
                )
            ->add('Guardar',
                SubmitType::class,
                array('label'=>'Guardar',
                    'attr'=>array('class'=>'fondoBtn')
                    )
                )
            ->add('Borrar',
                ResetType::class,
                array('label'=>'Borrar',
                    'attr'=>array('class'=>'fondoBtn')
                    )
                )
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'FCTBundle\Entity\Empresa'
        ));
    }
}
