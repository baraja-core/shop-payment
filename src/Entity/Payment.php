<?php

declare(strict_types=1);

namespace Baraja\Shop\Payment\Entity;


use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: 'shop__payment')]
class Payment
{
	#[ORM\Id]
	#[ORM\Column(type: 'integer', unique: true, options: ['unsigned' => true])]
	#[ORM\GeneratedValue]
	protected int $id;

	#[ORM\Column(type: 'string', length: 32)]
	private string $name;

	#[ORM\Column(type: 'string', length: 32, unique: true)]
	private string $code;

	#[ORM\Column(type: 'text', nullable: true)]
	private ?string $description;

	#[ORM\Column(type: 'integer')]
	private int $price;

	#[ORM\Column(type: 'string', length: 7)]
	private ?string $color = null;


	public function __construct(string $name, string $code, int $price)
	{
		$this->name = $name;
		$this->code = $code;
		$this->price = $price;
	}


	public function getId(): int
	{
		return $this->id;
	}


	public function getName(): string
	{
		return $this->name;
	}


	public function getCode(): string
	{
		return $this->code;
	}


	public function getDescription(): ?string
	{
		return $this->description;
	}


	public function getPrice(): int
	{
		return $this->price;
	}


	public function getColor(): ?string
	{
		return $this->color;
	}


	public function setColor(?string $color): void
	{
		$this->color = $color;
	}
}
