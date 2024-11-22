<?php

namespace App\Http\Livewire\Pages\Testimonials\Index;

use App\Models\ProductCategory;
use App\Models\Testimonial;
use Livewire\Component;

class TestimonialList extends Component
{


    public function handleSort($items)
    {
        $testimonials = $this->getTestimonials();
        foreach ($items as $item) {
            $model =  $testimonials->find($item['value']);
            $model->order_column = $item['order'];
            $model->save();
        }
    }

    public function render()
    {
        return view('livewire.pages.testimonials.index.testimonials-list', [
            'testimonials' => $this->getTestimonials()
        ]);
    }

    protected function  getTestimonials()
    {
        return Testimonial::orderBy('order_column')->get();
    }
}
