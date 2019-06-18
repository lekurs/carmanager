<?php


namespace App\Domain\Form;


use App\Domain\DTO\Interfaces\MarqueDTOInterface;
use App\Domain\DTO\MarqueDTO;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MarqueForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('marque', TextType::class, [
                'label_attr' => ['class' => 'float'],
                'attr' => ['class' => 'floating-input', 'placeholder' => ' '],
                'label' => 'Marque | Constructeur *',
                'required' => true,
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => MarqueDTOInterface::class,
            'empty_data' => function (FormInterface $form) {
                return new MarqueDTO($form->get('marque')->getData());
            }
            ]);
    }
}
