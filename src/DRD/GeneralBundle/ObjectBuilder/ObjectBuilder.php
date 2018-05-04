<?php

namespace DRD\GeneralBundle\ObjectBuilder;

use Symfony\Component\Form\FormFactory;
use Symfony\Component\Form\FormFactoryInterface;

class ObjectBuilder implements ObjectBuilderInterface
{
    /**
     * @var FormFactory
     */
    private $formFactory;

    /**
     * @param FormFactoryInterface $formFactory
     */
    public function __construct(FormFactoryInterface $formFactory)
    {
        $this->formFactory = $formFactory;
    }

    /**
     * {@inheritdoc}
     */
    public function build($object, $objectFormType, array $data)
    {
        assert(is_object($object));

        $form = $this->formFactory->create($objectFormType, $object, ['csrf_protection' => false]);

        $form->submit($data);

        return $object;
    }
}
