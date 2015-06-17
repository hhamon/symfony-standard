<?php

namespace AppBundle\Form\Issue10519;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

class IssueFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title1', 'text', [
                'mapped' => false,
                'constraints' => [
                    new NotBlank(),
                    new Length([ 'min' => 1, 'max' => 5 ]),
                ]
            ])
            ->add('title2', 'text', [
                'mapped' => false,
                'constraints' => [
                    new NotBlank(),
                    new Length([ 'min' => 2, 'max' => 10 ]),
                ]
            ]);
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults([
            'data_class' => __NAMESPACE__.'\\Issue10519',
            'error_mapping' => [ 'title1' => 'title2' ],
        ]);
    }

    /*public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => __NAMESPACE__.'\\Issue10519',
            'error_mapping' => [ 'title1' => 'title2' ],
        ]);
    }*/

    public function getName()
    {
        return 'issue_form';
    }
}
