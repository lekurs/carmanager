<?php


namespace App\Domain\Form\Security;


use App\Domain\DTO\Interfaces\UserEditFormDTOInterface;
use App\Domain\DTO\Security\UserEditFormDTO;
use App\Domain\Models\Garage;
use App\Subscribers\Interfaces\UserEditSlugSubscriberInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserEditForm extends AbstractType
{
    private $userEditSlugSubscriber;

    /**
     * UserEditForm constructor.
     * @param $userEditSlugSubscriber
     */
    public function __construct(UserEditSlugSubscriberInterface $userEditSlugSubscriber)
    {
        $this->userEditSlugSubscriber = $userEditSlugSubscriber;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('username', TextType::class, [
                'label_attr' => ['class' => 'float'],
                'attr' => ['class' => 'floating-input', 'placeholder' => ' '],
                'label' => 'Nom *',
                'required' => true,
            ])
            ->add('lastName', TextType::class, [
                'label_attr' => ['class' => 'float'],
                'attr' => ['class' => 'floating-input', 'placeholder' => ' '],
                'label' => 'Prénom *',
                'required' => true,
            ])
            ->add('password', PasswordType::class, [
                'label_attr' => ['class' => 'float'],
                'attr' => ['class' => 'floating-input', 'placeholder' => ' '],
                'label' => 'Password *',
                'required' => false,
            ])
            ->add('roles', ChoiceType::class, [
                'choices' => [
                    'Administrateur' => 'ROLE_ADMIN',
                    'Chef des ventes' => 'ROLE_SUPERUSER',
                    'Vendeur' => 'ROLE_USER',
                ],
            ])
            ->add('email', EmailType::class, [
                'label_attr' => ['class' => 'float'],
                'attr' => ['class' => 'floating-input', 'placeholder' => ' '],
                'label' => 'email@email.com *',
                'required' => true,
            ])
            ->add('garage', EntityType::class, [
                'class' => Garage::class,
                'choice_label' => 'name'
            ])
            ->addEventSubscriber($this->userEditSlugSubscriber);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => UserEditFormDTO::class,
            'empty_data' => function (FormInterface $form) {
                return new UserEditFormDTO(
                    $form->get('username')->getData(),
                    $form->get('lastName')->getData(),
                    $form->get('password')->getData(),
                    $form->get('roles')->getData(),
                    $form->get('email')->getData(),
                    $form->get('garage')->getData()
                );
            }
            ]);
    }
}