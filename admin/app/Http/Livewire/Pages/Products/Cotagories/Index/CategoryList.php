<?php

namespace App\Http\Livewire\Pages\Products\Cotagories\Index;

use App\Models\ProductCategory;
use Livewire\Component;

class CategoryList extends Component
{


    public function handleSort($items)
    {
        $productCategories = $this->getProductCategories();
        foreach ($items as $item) {
            $model =  $productCategories->find($item['value']);
            $model->order_column = $item['order'];
            $model->save();
        }
    }

    public function render()
    {
        return view('livewire.pages.products.categories.index.categories-list', [
            'productCategories' => $this->getProductCategories()
        ]);
    }

    protected function  getProductCategories()
    {
        return ProductCategory::orderBy('order_column')->get();
    }
}
