<?php

declare(strict_types=1);

namespace Baraja\Shop\Payment\Repository;


use Baraja\Shop\Payment\Entity\Payment;
use Doctrine\ORM\EntityRepository;

/**
 * @method Payment[] findAll()
 */
final class PaymentRepository extends EntityRepository
{
}
