<?php
/**
 * Created by PhpStorm.
 * User: pmdc
 * Date: 09/01/17
 * Time: 4:56 PM
 */

namespace Viweb\SystemBundle\Form\Type;


use Burgov\Bundle\KeyValueFormBundle\Form\Type\KeyValueType;
use Sylius\Bundle\ResourceBundle\Form\Type\AbstractResourceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Viweb\SystemBundle\Entity\SectionTranslation;

class SectionTranslationType extends AbstractResourceType
{
    public function __construct($dataClass = null, $validationGroups = [])
    {
        if(!$dataClass){
            $dataClass = SectionTranslation::class;
        }
        parent::__construct($dataClass, $validationGroups);
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', TextType::class)
            ->add('slug', TextType::class);
        $builder->add('seoCollection', KeyValueType::class, [
            'value_type' => TextType::class,
            'value_options' => ['attr' => ['class' => 'span6 pull-right']],
            'key_options' => ['attr' =>['class' => 'span4']],
            'required' => false
        ]);
//       $builder->get('seoCollection')->addViewTransformer(new SeoMetaTransformer($builder->getData()));

    }
}