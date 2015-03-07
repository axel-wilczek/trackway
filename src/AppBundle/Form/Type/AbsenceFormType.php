<?php

namespace AppBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class AbsenceFormType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('date', 'date')
            ->add('endsAt', 'time', ['required' => false])
            ->add('startsAt', 'time', ['required' => false])
            ->add('note', null, ['required' => false, 'trim' => true])
            ->add('reason');
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(['data_class' => 'AppBundle\Entity\Absence']);
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'appbundle_absence_form_type';
    }
}