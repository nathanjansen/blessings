<?php

namespace App\Actions;

use App\Models\Blessing;

class CreateBlessing
{
    public function __invoke(
        string $description,
        string $date,
    ): ?Blessing {
        if (empty($description)) {
            return null;
        }

        return Blessing::create([
            'description' => $description,
            'date' => $date,
        ]);
    }
}
