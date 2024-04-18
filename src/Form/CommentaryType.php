<?php

namespace App\Form;

use App\Entity\Chocoblast;
use App\Entity\Commentary;
use App\Entity\User;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CommentaryType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('content')
            ->add('createAt', null, [
                'widget' => 'single_text',
            ])
            ->add('status')
            ->add('author', EntityType::class, [
                'class' => User::class,
                'choice_label' => 'id',
            ])
            ->add('chocoblast', EntityType::class, [
                'class' => Chocoblast::class,
                'choice_label' => 'id',
            ])
            ->add('save', SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Commentary::class,
        ]);
    }
}
