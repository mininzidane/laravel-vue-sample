<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\DTO\PropertySearchDTO;
use App\Services\SearchService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

final class SearchController extends Controller
{
    public function search(Request $request, SearchService $searchService): JsonResponse
    {
        $instance = PropertySearchDTO::factory(
            $request->get('name'),
            $request->query->getInt('bedrooms'),
            $request->query->getInt('bathrooms'),
            $request->query->getInt('storeys'),
            $request->query->getInt('garages'),
            $request->query->getInt('priceFrom'),
            $request->query->getInt('priceTo'),
        );
        $properties = $searchService->searchProperties($instance);
        $output = [];
        foreach ($properties as $property) {
            $output[] = $property->toArray();
        }

        return response()->json([
            'success' => true,
            'data' => $output,
        ]);
    }
}
