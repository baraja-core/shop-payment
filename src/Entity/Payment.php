<?php

declare(strict_types=1);

namespace Baraja\Shop\Payment\Entity;


use Baraja\EcommerceStandard\DTO\PaymentInterface;
use Baraja\Shop\Payment\Repository\PaymentRepository;
use Baraja\Shop\Price\Price;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PaymentRepository::class)]
#[ORM\Table(name: 'shop__payment')]
class Payment implements PaymentInterface
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
	protected ?string $description;

	/** @var numeric-string */
	#[ORM\Column(type: 'decimal', precision: 15, scale: 4, options: ['unsigned' => true])]
	private string $price;

	#[ORM\Column(type: 'string', length: 7)]
	private ?string $color = null;

	#[ORM\Column(type: 'text', nullable: true)]
	private ?string $authorizatorKey = null;


	/**
	 * @param numeric-string $price
	 */
	public function __construct(string $name, string $code, string $price)
	{
		$this->name = $name;
		$this->code = $code;
		$this->price = Price::normalize($price);
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


	public function getPrice(): string
	{
		return Price::normalize($this->price);
	}


	public function getColor(): ?string
	{
		return $this->color;
	}


	public function setColor(?string $color): void
	{
		$this->color = $color;
	}


	public function getAuthorizatorKey(): ?string
	{
		return $this->authorizatorKey;
	}


	public function setAuthorizatorKey(?string $authorizatorKey): void
	{
		$this->authorizatorKey = $authorizatorKey;
	}
}
