<?php

namespace Herzult\Bundle\ForumBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Herzult\Bundle\ForumBundle\Model\CategoryRepositoryInterface;

class NewTopicFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('subject', null, array('translation_domain' => 'HerzultForumBundle_forms'));
        $builder->add('category' , null, array('translation_domain' => 'HerzultForumBundle_forms'));
        $builder->add('firstPost', $options['post_form'], array('data_class' => $options['post_class']));
    }

    public function getDefaultOptions()
    {
        return array(
            'post_class'    => '',
            'post_form'     => '',
            'data_class'    => '',
            'translation_domain' => 'HerzultForumBundle_forms',
        );
    }

    public function getName()
    {
        return 'NewTopic';
    }
}
