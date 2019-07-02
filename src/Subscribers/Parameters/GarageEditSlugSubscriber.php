<?php


namespace App\Subscribers\Parameters;


use App\Services\Interfaces\SlugHelperInterface;
use App\Subscribers\Interfaces\GarageEditSlugSubscriberInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;

final class GarageEditSlugSubscriber implements EventSubscriberInterface, GarageEditSlugSubscriberInterface
{
    private $slugify;

    /**
     * GarageEditSlugSubscriber constructor.
     * @param $slugify
     */
    public function __construct(SlugHelperInterface $slugify)
    {
        $this->slugify = $slugify;
    }

    public static function getSubscribedEvents()
    {
        return [
           FormEvents::SUBMIT => 'onSubmit',
        ];
    }

    public function onSubmit(FormEvent $event)
    {
        $event->getData()->slug = $this->slugify->replace($event->getData()->name);
    }
}