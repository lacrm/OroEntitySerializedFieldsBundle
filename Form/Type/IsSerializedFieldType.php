<?php

namespace Oro\Bundle\EntitySerializedFieldsBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\FormView;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class IsSerializedFieldType extends AbstractType
{
    protected $serializableTypes = [
        'string',
        'integer',
        'smallint',
        'bigint',
        'boolean',
        'decimal',
        'date',
        'datetime',
        'text',
        'float',
        'money',
        'percent'
    ];

    /**
     * {@inheritdoc}
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(
            [
                'choices'         => [
                    0 => 'oro.entity_serialized_fields.form.is_serialized.yes',
                    1 => 'oro.entity_serialized_fields.form.is_serialized.no'
                ],
                'auto_initialize' => false,
                'required'        => true,
                'label'           => 'oro.entity_serialized_fields.form.is_serialized.label',
                'mapped'          => false,
                'block'           => 'general',
                'tooltip'         => 'oro.entity_serialized_fields.field.is_serialized.tooltip'
            ]
        );
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'oro_serialized_fields_is_serialized_type';
    }

    /**
     * {@inheritdoc}
     */
    public function getParent()
    {
        return 'choice';
    }

    /**
     * {@inheritdoc}
     */
    public function finishView(FormView $view, FormInterface $form, array $options)
    {
        $view->vars['serializableTypes'] = $this->serializableTypes;
    }
}