<?php

declare(strict_types=1);

namespace Setono\SyliusBulkSpecialsPlugin\Model;

use Sylius\Component\Core\Model\ProductInterface as BaseProductInterface;

/**
 * Interface ProductInterface
 */
interface ProductInterface extends SpecialSubjectInterface, BaseProductInterface
{
}