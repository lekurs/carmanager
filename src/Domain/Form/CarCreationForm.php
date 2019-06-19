<?php


namespace App\Domain\Form;


use App\Domain\DTO\CarCreationDTO;
use App\Domain\DTO\Interfaces\CarCreationDTOInterface;
use App\Domain\Models\Brand;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CarCreationForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('model', TextType::class, [
                'label_attr' => ['class' => 'float'],
                'attr' => ['class' => 'floating-input', 'placeholder' => ' '],
                'label' => 'Modèle du véhicule *',
                'required' => true,
            ])
            ->add('brand', EntityType::class, [
                'class' => Brand::class,
                'choice_label' => 'brand',
                'label' => 'Choix de la marque'
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => CarCreationDTOInterface::class,
            'empty_data' => function (FormInterface $form) {
                return new CarCreationDTO(
                    $form->get('model')->getData(),
                    $form->get('brand')->getData()
                );
            }
            ]);
    }
}