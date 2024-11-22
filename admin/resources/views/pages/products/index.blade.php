@extends('layout.main')
@section('meta-title', 'Products')


@section('content')



    <x-layout.content.__row class="mb-4">
        <x-layout.content.__col lg="7">
            <x-layout.content.__breadcrumb :items="[['title' => 'Product List']]" />
        </x-layout.content.__col>
        <x-layout.content.__col lg="5">
            <div class="d-flex gap-2 flex-column flex-lg-row justify-content-lg-end">
                <x-__button color="primary" type='link' :href="route('product-categories.index')" varient='outline'><span
                        class="ti ti-category me-0 me-sm-1 ti-xs"></span> Manage Categories</x-__button>
                <x-__button color="primary" type='link' :href="route('products.create')"><span
                        class="ti ti-plus me-0 me-sm-1 ti-xs"></span> Add Product</x-__button>

            </div>
        </x-layout.content.__col>
    </x-layout.content.__row>

    <x-layout.content.__row gap='4'>
        <x-layout.content.__col lg="12">
            <x-layout.content.__card>
                <x-__basic-table :headings="['#ID', 'Title', 'Category', 'Action']">
                    @forelse ($products as  $product)
                        <tr>
                            <td>#{{ $product->id }}</td>
                            <td>
                                <div class="d-flex  gap-2 align-items-center">
                                    <img src="{{ $product->gallery->first()->getUrl() }}" width="100" height="100"
                                        class="rounded" style="object-fit: cover;" />
                                    <x-__typography component="a" :href="route('products.edit', $product->id)">{{ $product->name }}</x-__typography>
                                </div>

                            </td>
                            <td class="text-nowrap">
                                <div class="d-flex  gap-2 align-items-center">
                                    <img src="{{ $product->productCategory->icon->getUrl() }}" width="39"
                                        height="39" />
                                    <x-__typography component="a"
                                        :href="route('product-categories.edit', $product->productCategory->id)">{{ $product->productCategory->name }}</x-__typography>
                                </div>
                            </td>
                            <td>
                                <x-layout.content.__stack gap='0'>
                                    <x-__button color="lable" rounded type='link' :href="route('products.edit', $product->id)" varient="outline"
                                        icon><span class="ti ti-edit text-primary"></span></x-__button>

                                    <form action="{{ route('products.destroy', $product->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <x-__button confirmableAciton confirmableTitle='Are you sure?'
                                            confirmableDesc="This will delete this product permanently." color="lable"
                                            rounded type='submit' varient="outline" icon><span
                                                class="ti ti-trash ti-xs text-danger"></span></x-__button>
                                    </form>
                                </x-layout.content.__stack>
                            </td>
                        </tr>
                    @empty
                        <tr wire:key="not-found">
                            <td colspan="3" align="center">No product
                                found <x-__typography component="a" :href="route('products.create')">Create now.</x-__typography> </td>
                        </tr>
                    @endforelse
                </x-__basic-table>
                <div class="pt-5 px-4 pb-3">
                    {{ $products->links('components.__table-pagination') }}
                </div>

            </x-layout.content.__card>
        </x-layout.content.__col>

    </x-layout.content.__row>
@endsection
