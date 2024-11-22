  <x-__basic-table :headings="['', 'Name', 'Designation', 'Comment', 'Action']" tbodyAttributes="wire:sortable=handleSort ">
      @forelse ($testimonials as  $testimonial)
          <tr wire:key="{{ $testimonial->id }}" wire:sortable.item="{{ $testimonial->id }}">
              <td>
                  <i class="ti ti-arrows-sort"></i>
              </td>
              <td style="min-width: 180px">
                  <div class="d-flex  gap-2 align-items-center">
                      <img src="{{ $testimonial->avatar->getUrl() }}" width="39" height="39" class="rounded"
                          style="object-fit: cover;" />
                      <x-__typography component="a" :href="route('testimonials.edit', $testimonial->id)">{{ $testimonial->name }}</x-__typography>
                  </div>

              </td>
              <td class="text-nowrap">{{ $testimonial->designation }}</td>
              <td class="">{{ $testimonial->comment }}</td>
              <td>
                  <x-layout.content.__stack gap='0'>
                      <x-__button color="lable" rounded type='link' :href="route('testimonials.edit', $testimonial->id)" varient="outline" icon><span
                              class="ti ti-edit text-primary"></span></x-__button>

                      <form action="{{ route('testimonials.destroy', $testimonial->id) }}" method="POST">
                          @csrf
                          @method('DELETE')
                          <x-__button confirmableAciton confirmableTitle='Are you sure?'
                              confirmableDesc="This will delete this testimonial permanently." color="lable" rounded
                              type='submit' varient="outline" icon><span
                                  class="ti ti-trash ti-xs text-danger"></span></x-__button>
                      </form>
                  </x-layout.content.__stack>
              </td>
          </tr>
      @empty
          <tr wire:key="not-found">
              <td colspan="3" align="center">No testimonial found <x-__typography component="a"
                      :href="route('testimonials.create')">Create now.</x-__typography> </td>
          </tr>
      @endforelse
  </x-__basic-table>
