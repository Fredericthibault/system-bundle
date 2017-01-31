<?php
/**
 * Created by PhpStorm.
 * User: pmdc
 * Date: 09/01/17
 * Time: 4:56 PM
 */

namespace Viweb\SystemBundle\Form\Type;


use Sylius\Bundle\ResourceBundle\Form\Type\AbstractResourceType;
use Sylius\Bundle\ResourceBundle\Form\Type\ResourceTranslationsType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Viweb\SystemBundle\Entity\Section;

class SectionType extends AbstractResourceType
{
    public function __construct($dataClass = null, $validationGroups = [])
    {
        if(!$dataClass){
            $dataClass = Section::class;
        }
        parent::__construct($dataClass, $validationGroups);
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        return $builder
            ->add('name', TextType::class)
            ->add('parent', EntityType::class, [
                "label" => "Page Parent",
                "class" => 'ViwebSystemBundle:Section',
                "expanded" => false,
                "multiple" => false,
                'required' => false
            ])
           ->add('blocks', BlockListType::class, [
                'entry_type' => BlockType::class,
                'entry_options' => ['label' => 'Name']
            ])
            ->add('translations', ResourceTranslationsType::class, [
                'entry_type' => SectionTranslationType::class
            ]);
    }

}