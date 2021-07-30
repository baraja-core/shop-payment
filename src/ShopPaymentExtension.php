<?php

declare(strict_types=1);

namespace Baraja\Shop\Payment;


use Baraja\Doctrine\ORM\DI\OrmAnnotationsExtension;
use Nette\DI\CompilerExtension;

final class ShopPaymentExtension extends CompilerExtension
{
	public function beforeCompile(): void
	{
		$builder = $this->getContainerBuilder();
		OrmAnnotationsExtension::addAnnotationPathToManager($builder, 'Baraja\Shop\Payment\Entity', __DIR__ . '/Entity');
	}
}
