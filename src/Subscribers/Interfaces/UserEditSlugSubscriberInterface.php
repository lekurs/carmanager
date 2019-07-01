<?php


namespace App\Subscribers\Interfaces;


use App\Services\Interfaces\SlugHelperInterface;
use Symfony\Component\Form\FormEvent;

interface UserEditSlugSubscriberInterface
{
    /**
     * UserEditSlugSubscriberInterface constructor.
     * @param SlugHelperInterface $slugify
     */
    public function __construct(SlugHelperInterface $slugify);

    /**
     * @param FormEvent $event
     * @return mixed
     */
    public function onSubmit(FormEvent $event);
}
