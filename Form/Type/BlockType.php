<?php
/**
 * Created by PhpStorm.
 * User: pmdc
 * Date: 17/01/17
 * Time: 9:27 AM
 */

namespace Viweb\SystemBundle\Form\Type;

use Sylius\Bundle\ResourceBundle\Form\Type\AbstractResourceType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Viweb\SystemBundle\Entity\Block;

class BlockType extends AbstractResourceType
{
    public function __construct($dataClass = null, $validationGroups = [])
    {
        if(!$dataClass){
            $dataClass = Block::class;
        }
        parent::__construct($dataClass, $validationGroups);
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('name', TextType::class, [
            'label' => 'Name'
        ])
            ->add('translations', BlockTranslationListType::class, [
                'entry_type' => BlockTranslationType::class
            ]);
    }

    public function getBlockPrefix()
    {
        return 'viweb_block';
    }

}