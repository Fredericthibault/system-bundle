<?php
/**
 * Created by PhpStorm.
 * User: pmdc
 * Date: 17/01/17
 * Time: 9:35 AM
 */

namespace Viweb\SystemBundle\Form\Type;


use Sylius\Bundle\ResourceBundle\Form\Type\AbstractResourceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Viweb\SystemBundle\Entity\BlockTranslation;
use Viweb\SystemBundle\Form\Listener\BodyListener;

class BlockTranslationType extends AbstractResourceType
{
    public function __construct($dataClass = null, $validationGroups = [])
    {
        if(!$dataClass){
            $dataClass = BlockTranslation::class;
        }
        parent::__construct($dataClass, $validationGroups);
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder->addEventSubscriber(new BodyListener());
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => BlockTranslation::class,
        ));
    }

    public function getBlockPrefix()
    {
        return 'viweb_block_translation';
    }


}