<?php

namespace App\Actions;

use App\Models\Blessing;
use App\Models\User;

class SaveBlessing
{
    public function __invoke(
        User $user,
        Blessing $blessing,
    ): ?Blessing {
        if (empty($blessing->description)) {
            return null;
        }

        if (empty($blessing->date)) {
            return null;
        }

        $blessing->user_id ??= $user->id;
        $blessing->save();

        return $blessing;
    }
}
