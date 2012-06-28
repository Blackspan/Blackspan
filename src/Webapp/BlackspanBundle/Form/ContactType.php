<?php

namespace Webapp\BlackspanBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class ContactType extends AbstractType {
    public function buildForm(FormBuilder $builder, array $options) {
        $builder->add('name', 'text', array('label' => 'Nom'));
        $builder->add('email', 'email', array('label' => 'Email'));
        $builder->add('subject', 'text', array('label' => 'Sujet'));
        $builder->add('body', 'textarea', array('label' => 'Message'));
    }

    public function getName() {
        return 'contact';
    }
}
?>