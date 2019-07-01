<?php


namespace App\Subscribers;


use App\Services\Interfaces\SlugHelperInterface;
use App\Subscribers\Interfaces\UserEditSlugSubscriberInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;

final class UserEditSlugSubscriber implements EventSubscriberInterface, UserEditSlugSubscriberInterface
{
    private $slugify;

    /**
     * UserEditSlugSubscriber constructor.
     *
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
        $event->getData()->slug = $this->slugify->replace($event->getData()->username . '-' . $event->getData()->lastName);
    }
}