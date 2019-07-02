<?php


namespace App\Domain\Form\Parameters;


use App\Domain\DTO\Interfaces\CreditTypeDTOInterface;
use App\Domain\DTO\Parameters\CreditTypeDTO;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CreditTypeForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('type', TextType::class, [
                'label_attr' => ['class' => 'float'],
                'attr' => ['class' => 'floating-input', 'placeholder' => ' '],
                'label' => 'Type de financement *',
                'required' => true,
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => CreditTypeDTOInterface::class,
            'empty_data' => function (FormInterface $form) {
                return new CreditTypeDTO($form->get('type')->getData());
            }
            ]);
    }
}