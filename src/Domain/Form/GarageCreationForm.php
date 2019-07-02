<?php


namespace App\Domain\Form;


use App\Domain\DTO\GarageCreationDTO;
use App\Domain\DTO\Interfaces\GarageCreationDTOInterface;
use App\Domain\Models\Brand;
use App\Domain\Models\Marque;
use App\Domain\Models\Plaque;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class GarageCreationForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, [
                'label_attr' => ['class' => 'float'],
                'attr' => ['class' => 'floating-input', 'placeholder' => ' '],
                'label' => 'Nom du point de ventes *',
                'required' => true,
            ])
            ->add('code', TextType::class, [
                'label_attr' => ['class' => 'float'],
                'attr' => ['class' => 'floating-input', 'placeholder' => ' '],
                'label' => 'Code point de ventes *',
                'required' => false,
            ])
        ->add('plaque', EntityType::class, [
            'class' => Plaque::class,
            'choice_label' => 'name',
            'placeholder' => 'Selectionnez une plaque',
            'required' => false

        ])
        ->add('brand', EntityType::class, [
            'class' => Brand::class,
            'choice_label' => 'brand',
            'placeholder' => 'Selectionnez une marque',
            'required' => false
        ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => GarageCreationDTOInterface::class,
            'empty_data' => function (FormInterface $form) {
                return new GarageCreationDTO(
                    $form->get('name')->getData(),
                    $form->get('code')->getData(),
                    $form->get('plaque')->getData(),
                    $form->get('brand')->getData()
                );
            }
            ]);
    }
}