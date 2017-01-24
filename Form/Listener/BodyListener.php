<?php
/**
 * Created by PhpStorm.
 * User: pmdc
 * Date: 17/01/17
 * Time: 11:40 AM
 */

namespace Viweb\SystemBundle\Form\Listener;


use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;

class BodyListener implements EventSubscriberInterface
{
    public static function getSubscribedEvents()
    {
        // Tells the dispatcher that you want to listen on the form.pre_set_data
        // event and that the preSetData method should be called.
        return array(FormEvents::PRE_SET_DATA => 'preSetData');
    }

    public function preSetData(FormEvent $event)
    {
        $type = false;
        if($event->getData()){
            foreach ($event->getData() as $d)
            $type = $d->getTranslatable()->getType();
        }

        $form = $event->getForm();

        if ($type && $type->getForm() !== null) {
            $form->add('body', $type->getForm(), [
                'label' => 'contenu'
            ]);
        } else {
            $form->add('body', TextareaType::class, [
                'label' => 'contenu'
            ]);
        }
    }
}