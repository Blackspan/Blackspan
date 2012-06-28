<?php

namespace Webapp\BlackspanBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class RequestType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder
            ->add('datestart')
            ->add('dateend')
            ->add('reference')
            ->add('firstname')
            ->add('lastname')
            ->add('mail')
            ->add('partner')
            ->add('partnerip')
            ->add('sitedest')
            ->add('siteversion')
            ->add('webhosting')
        ;
    }

    public function getName()
    {
        return 'webapp_blackspanbundle_requesttype';
    }
}
