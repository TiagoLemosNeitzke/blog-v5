<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Metric;

class MetricPolicy
{
    public function create(User $user) : bool
    {
        return false;
    }

    public function update(User $user, Metric $metric) : bool
    {
        return false;
    }

    public function delete(User $user, Metric $metric) : bool
    {
        return false;
    }
}
