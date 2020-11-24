<?php

namespace App\ModelFilters;

use EloquentFilter\ModelFilter;

class AgendamentosFilter extends ModelFilter
{
    public function situacao($id) {
        return $this->where('situacao', $id);
    }
}