<?php

namespace App\Form;

use App\Entity\Contact;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\{ EmailType,TextType};

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('firstName', TextType::class,[
                'label' => 'Prénom : ',
            ])
            ->add('lastName', TextType::class,[
                'label' => 'Nom : ',
            ])
            ->add('email', EmailType::class,[
                'label' => 'Email : ',
            ])
            ->add('phoneNumber', TextType::class,[
                'label' => 'Téléphone : ',
            ])
            ->add('tag', TextType::class,[
                'label' => 'Tag/Catégorie : ',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Contact::class,
        ]);
    }
}
