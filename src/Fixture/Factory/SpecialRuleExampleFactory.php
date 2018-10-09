<?php

declare(strict_types=1);

namespace Setono\SyliusBulkSpecialsPlugin\Fixture\Factory;

use Setono\SyliusBulkSpecialsPlugin\Model\SpecialRuleInterface;
use Setono\SyliusBulkSpecialsPlugin\Special\Factory\SpecialRuleFactoryInterface;
use Sylius\Bundle\CoreBundle\Fixture\Factory\AbstractExampleFactory;
use Sylius\Bundle\CoreBundle\Fixture\Factory\ExampleFactoryInterface;
use Symfony\Component\OptionsResolver\Options;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Class SpecialRuleExampleFactory
 */
class SpecialRuleExampleFactory extends AbstractExampleFactory implements ExampleFactoryInterface
{
    /**
     * @var SpecialRuleFactoryInterface
     */
    protected $specialRuleFactory;

    /**
     * @var array
     */
    protected $specialRules;

    /**
     * @var OptionsResolver
     */
    protected $optionsResolver;

    /**
     * SpecialRuleExampleFactory constructor.
     *
     * @param SpecialRuleFactoryInterface $specialRuleFactory
     * @param array $specialRules
     */
    public function __construct(
        SpecialRuleFactoryInterface $specialRuleFactory,
        array $specialRules
    ) {
        $this->specialRuleFactory = $specialRuleFactory;
        $this->specialRules = $specialRules;

        $this->optionsResolver = new OptionsResolver();

        $this->configureOptions($this->optionsResolver);
    }

    /**
     * {@inheritdoc}
     */
    public function create(array $options = []): SpecialRuleInterface
    {
        $options = $this->optionsResolver->resolve($options);

        return $this->specialRuleFactory->createByType(
            $options['type'],
            $options['configuration']
        );

        return $specialRule;
    }

    /**
     * {@inheritdoc}
     */
    protected function configureOptions(OptionsResolver $resolver): void
    {
        $resolver
            ->setDefault('type', function (Options $options): string {
                $specialRuleCodes = array_keys($this->specialRules);

                return $specialRuleCodes[array_rand($specialRuleCodes)];
            })
            ->setDefined('configuration')
            ->setAllowedTypes('configuration', ['string', 'array'])
        ;
    }
}