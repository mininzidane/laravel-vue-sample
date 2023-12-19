<?php

declare(strict_types=1);

namespace App\DTO;

final readonly class PropertySearchDTO
{
    public ?string $name;
    public ?int $bedrooms;
    public ?int $bathrooms;
    public ?int $storeys;
    public ?int $garages;
    public ?int $priceFrom;
    public ?int $priceTo;
    public int $page;
    public int $perPage;

    public static function factory(
        string $name = null,
        int $bedrooms = null,
        int $bathrooms = null,
        int $storeys = null,
        int $garages = null,
        int $priceFrom = null,
        int $priceTo = null,
    ): self {
        $instance = new self;
        $instance->name = $name;
        $instance->bedrooms = $bedrooms;
        $instance->bathrooms = $bathrooms;
        $instance->storeys = $storeys;
        $instance->garages = $garages;
        $instance->priceFrom = $priceFrom;
        $instance->priceTo = $priceTo;
        $instance->page = 1;
        $instance->perPage = 50;

        return $instance;
    }
}
