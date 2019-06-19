<?php


namespace App\Domain\Form;


use App\Domain\DTO\Interfaces\BrandDTOInterface;
use App\Domain\DTO\BrandDTO;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class BrandForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('brand', TextType::class, [
                'label_attr' => ['class' => 'float'],
                'attr' => ['class' => 'floating-input', 'placeholder' => ' '],
                'label' => 'Marque | Constructeur *',
                'required' => true,
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => BrandDTOInterface::class,
            'empty_data' => function (FormInterface $form) {
                return new BrandDTO($form->get('brand')->getData());
            }
            ]);
    }
}
