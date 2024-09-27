<?php

use Illuminate\Pagination\AbstractPaginator;
use Illuminate\Support\Arr;
use League\Fractal\Pagination\IlluminatePaginatorAdapter;
use League\Fractal\Serializer\ArraySerializer;
use League\Fractal\TransformerAbstract;
use Spatie\Fractal\Fractal;

if (! function_exists('fractal_data')) {
    function fractal_data(mixed $data, TransformerAbstract $transformer, array $includes = []): array
    {
        return $data instanceof AbstractPaginator ?
            fractal_paginated_data($data, $transformer, $includes) :
            fractal_all_data($data, $transformer, $includes);
    }
}

if (! function_exists('fractal_paginated_data')) {
    function fractal_paginated_data(mixed $data, TransformerAbstract $transformer, array $includes = []): array
    {
        return Arr::only(
            fractal_with($data, $transformer, $includes)
                ->paginateWith(new IlluminatePaginatorAdapter($data))
                ->toArray(),
            ['data', 'meta'],
        );
    }
}

if (! function_exists('fractal_all_data')) {
    function fractal_all_data(mixed $data, TransformerAbstract $transformer, array $includes = []): array
    {
        return fractal_with($data, $transformer, $includes)->toArray();
    }
}

if (! function_exists('fractal_with')) {
    function fractal_with(mixed $data, TransformerAbstract $transformer, array $includes = []): Fractal
    {
        return fractal($data, $transformer)
            ->serializeWith(new ArraySerializer)
            ->parseIncludes($includes);
    }
}
