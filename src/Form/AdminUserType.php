<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AdminUserType extends ApplicationType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('firstName', TextType::class, $this->getConfiguration("Prénom", "Prénom de l'utilisateur"))
            ->add('lastName', TextType::class, $this->getConfiguration("Nom", "Nom de l'utilisateur"))
            ->add('email', TextType::class, $this->getConfiguration("Email", "Email de l'utilisateur"))
            ->add('picture', TextType::class, $this->getConfiguration("Photo de profil", "Photo de l'utilisateur"))
            ->add('introduction', TextType::class, $this->getConfiguration("Introduction", "Introduction de l'utilisateur"))
            ->add('description', TextareaType::class, $this->getConfiguration("Description", "Description de l'utilisateur"))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
