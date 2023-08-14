<?php

namespace App\Actions;

use App\Models\Blessing;
use App\Models\User;

class CreateBlessing
{
    public function __invoke(
        User $user,
        string $description,
        string $date,
    ): ?Blessing {
        if (empty($description)) {
            return null;
        }

        return Blessing::create([
            'user_id' => $user->id,
            'description' => $description,
            'date' => $date,
        ]);
    }
}
