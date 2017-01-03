<?php

namespace Rindra\UserBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class UtilisateurType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom', 'text')
            ->add('prenoms', 'text')
            ->add('image', new ImageType())
            ->add('utilisateurAdresses', 'collection', array(
                'type' => new UtilisateurAdresseType(),
                'allow_add' => true,
                'allow_delete' => true,
                'by_reference' => false, // pour utiliser les getters et setters
            ))
            ->remove('current_password')
        ;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->getBlockPrefix();
    }

    public function getBlockPrefix()
    {
        return 'rindra_user_profile_form';
    }

    public function getParent()
    {
//        return new \FOS\UserBundle\Form\Type\ProfileFormType();
        return 'fos_user_profile';
    }
}
