  <x-__basic-table :headings="['Name', 'Slug', 'Action']" tbodyAttributes="wire:sortable=handleSort ">
      @forelse ($productCategories as  $productCategory)
          <tr wire:key="{{ $productCategory->id }}" wire:sortable.item="{{ $productCategory->id }}">
              <td>
                  <div class="d-flex  gap-2 align-items-center">
                      <img src="{{ $productCategory->icon->getUrl() }}" width="39" height="39" />
                      <x-__typography component="a" :href="route('product-categories.edit', $productCategory->id)">{{ $productCategory->name }}</x-__typography>
                  </div>

              </td>
              <td class="text-nowrap">{{ $productCategory->slug }}</td>
              <td>
                  <x-layout.content.__stack gap='0'>
                      <x-__button color="lable" rounded type='link' :href="route('product-categories.edit', $productCategory->id)" varient="outline" icon><span
                              class="ti ti-edit text-primary"></span></x-__button>

                      <form action="{{ route('product-categories.destroy', $productCategory->id) }}" method="POST">
                          @csrf
                          @method('DELETE')
                          <x-__button confirmableAciton confirmableTitle='Are you sure?'
                              confirmableDesc="This will delete this category and also attached products permanently."
                              color="lable" rounded type='submit' varient="outline" icon><span
                                  class="ti ti-trash ti-xs text-danger"></span></x-__button>
                      </form>
                  </x-layout.content.__stack>
              </td>
          </tr>
      @empty
          <tr wire:key="not-found">
              <td colspan="3" align="center">No product category
                  found <x-__typography component="a" :href="route('product-categories.create')">Create now.</x-__typography> </td>
          </tr>
      @endforelse
  </x-__basic-table>
