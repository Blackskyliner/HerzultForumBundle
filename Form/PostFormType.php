<?php

namespace Herzult\Bundle\ForumBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class PostFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('message', 'textarea', array('translation_domain' => 'HerzultForumBundle_forms'));
    }

    public function getDefaultOptions()
    {
        return array(
            'translation_domain' => 'HerzultForumBundle_forms',
        );
    }

    public function getName()
    {
        return 'Post';
    }
}
