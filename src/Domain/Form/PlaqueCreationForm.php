<?php


namespace App\Domain\Form;


use App\Domain\DTO\Interfaces\PlaqueCreationFormDTOInterface;
use App\Domain\DTO\PlaqueCreationFormDTO;
use App\Domain\Models\Zone;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PlaqueCreationForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, [

            ])
            ->add('zone', EntityType::class, [
                'class' => Zone::class,
                'choice_label' => 'name',
                'required' => false,
                'preferred_choices' => 'null ???'
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => PlaqueCreationFormDTOInterface::class,
            'empty_data' => function (FormInterface $form) {
                return new PlaqueCreationFormDTO(
                    $form->get('name')->getData(),
                    $form->get('zone')->getData()
                );
            }
            ]);
    }
}