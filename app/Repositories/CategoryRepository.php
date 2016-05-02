<?php

namespace App\Repositories;

use Finance\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CategoryRepository
{
    /**
     * Search for all subcategories grouped by category
     *
     * @return array
     */
    public function getGrouped()
    {
        return Category::join('category as sub', 'category.id', '=', 'sub.parent_id')
            ->get(
                array(
                    'category.name_es as categoryName',
                    'sub.name_es as subCategoryName',
                    'sub.id as subCategoryId'
                )
            );
    }
}