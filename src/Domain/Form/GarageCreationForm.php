<?php


namespace App\Domain\Form;


use App\Domain\DTO\GarageCreationDTO;
use App\Domain\DTO\Interfaces\GarageCreationDTOInterface;
use App\Domain\Models\Marque;
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
        ->add('marque', EntityType::class, [
            'class' => Marque::class,
            'choice_label' => 'name'
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
                    $form->get('marque')->getData()
                );
            }
            ]);
    }
}