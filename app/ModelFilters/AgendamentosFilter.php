<?php

namespace App\ModelFilters;

use EloquentFilter\ModelFilter;

class AgendamentosFilter extends ModelFilter
{
    public function situacao($id) {
        if ($id == 1) {
            return $this;
        }
        return $this->where('situacao', $id-1);
    }
}