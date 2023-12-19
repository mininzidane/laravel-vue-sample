<?php

declare(strict_types=1);

namespace App\Services;

use App\DTO\PropertySearchDTO;
use App\Models\Property;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;

final class SearchService
{
    /**
     * @return Collection<Property>
     */
    public function searchProperties(PropertySearchDTO $propertySearchDTO): Collection
    {
        return Property::query()
            ->when($propertySearchDTO->name, fn(Builder $query) => $query->where('name', 'LIKE', "%{$propertySearchDTO->name}%"))
            ->when($propertySearchDTO->bedrooms, fn(Builder $query) => $query->where('bedrooms', $propertySearchDTO->bedrooms))
            ->when($propertySearchDTO->bathrooms, fn(Builder $query) => $query->where('bathrooms', $propertySearchDTO->bathrooms))
            ->when($propertySearchDTO->storeys, fn(Builder $query) => $query->where('storeys', $propertySearchDTO->storeys))
            ->when($propertySearchDTO->garages, fn(Builder $query) => $query->where('garages', $propertySearchDTO->garages))
            ->when($propertySearchDTO->priceFrom, fn(Builder $query) => $query->where('price', '>=', $propertySearchDTO->priceFrom))
            ->when($propertySearchDTO->priceTo, fn(Builder $query) => $query->where('price', '<=', $propertySearchDTO->priceTo))
            ->forPage($propertySearchDTO->page, $propertySearchDTO->perPage)
            ->get()
        ;
    }
}
