<?php

namespace App\Http\Transformers\Admin;

use App\Models\Admin;
use League\Fractal\TransformerAbstract;

class AdminTransformer extends TransformerAbstract
{
    public function transform(Admin $admin): array
    {
        return [
            'id' => $admin->id,
            'name' => $admin->name,
            'email' => $admin->email,
            'createdAt' => $admin->created_at->toDateTimeString(),
            'updatedAt' => $admin->updated_at->toDateTimeString(),
        ];
    }
}
