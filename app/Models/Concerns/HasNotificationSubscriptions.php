<?php

namespace App\Models\Concerns;

use Illuminate\Support\Arr;

trait HasNotificationSubscriptions
{
    public function subscribe($list)
    {
        $this->updateSubscription($list, true);
    }

    public function unsubscribe($list)
    {
        $this->updateSubscription($list, false);
    }

    public function updateSubscription(string $list, bool $status)
    {
        $subscriptions = $this->notification_subscriptions;
        Arr::set($subscriptions, $list, $status);
        $this->notification_subscriptions = $subscriptions;
        $this->save();
    }

    public function updateSubscriptions(mixed ...$properties)
    {
        if (array_key_exists(0, $properties)) {
            if (count($properties) === 1) {
                if (is_string($properties[0])) {
                    $properties = [$properties[0] => null];
                } elseif (Arr::isAssoc($properties[0])) {
                    $properties = $properties[0];
                } else {
                    $properties = array_fill_keys($properties[0], null);
                }
            } elseif (count($properties) === 2) {
                $properties = [$properties[0] => $properties[1]];
            }
        }

        foreach ($properties as $key => $value) {
            $this->updateSubscription($key, $value);
        }
    }
}
