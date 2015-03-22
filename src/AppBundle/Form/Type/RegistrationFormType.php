<?php

namespace AppBundle\Form\Type;

use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * Class RegistrationFormType
 *
 * @package AppBundle\Form\Type
 */
class RegistrationFormType extends AbstractOverridableFormType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('email', 'email', $this->overrideOptions('email', ['label' => 'user.entity.email', 'required' => true], $options))
            ->add('username', null, $this->overrideOptions('username', ['label' => 'user.entity.username', 'required' => true], $options))
            ->add('password',
                'repeated',
                $this->overrideOptions('password',
                    ['type' => 'password',
                        'invalid_message' => 'The password fields must match.',
                        'options' => ['attr' => ['class' => 'password-field']],
                        'required' => true,
                        'first_options' => ['label' => 'user.entity.password'],
                        'second_options' => ['label' => 'user.entity.passwordRepeat']],
                    $options));
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(['data_class' => 'AppBundle\Entity\User', 'override' => false, 'validation_groups' => ['registration']]);
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'appbundle_registration_form_type';
    }
}
