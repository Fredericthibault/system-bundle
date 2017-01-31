<?php
/**
 * Created by PhpStorm.
 * User: pmdc
 * Date: 31/01/17
 * Time: 11:18 AM
 */

namespace Viweb\SystemBundle\Form\Type;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;

class BlockTranslationListType extends AbstractType
{
    public function getParent()
    {
        return CollectionType::class;
    }

    public function getBlockPrefix()
    {
        return 'viweb_block_translation_list';
    }
}