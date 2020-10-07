<div>

  <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
    
    <div>
      @if (session()->has('message'))
        <script>
          Swal.fire(
              'Good job!',
              '{!! session('message') !!}',
              'success'
            )
        </script>
      @endif
  </div>

    @if ($updateProduct)
    @livewire('product.update')
    @else
    @livewire('product.create')
    @endif

      
      

      <div class="flex flex-col py-4 px-3">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
          <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">

            </div>
           

          <div class="flex mb-4 mt-3">
            <div class="w-1/2  h-12">
              <div class="flex flex-row mb-1 sm:mb-0">
                <div class="relative">
                    <select wire:model="paginate"
                        class="appearance-none h-full rounded-l border block appearance-none w-full bg-white border-gray-400 text-gray-700 py-2 px-4 pr-8 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                        <option value="3">3</option>
                        <option value="5">5</option>
                        <option value="7">7</option>
                    </select>
                    <div
                        class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                        </svg>
                    </div>
                </div>
              
            </div>
            </div>
            <div class="w-3/5">

            </div>
            <div class="w-1/5  h-12">
              <div class="block relative">
                <span class="h-full absolute inset-y-0 left-0 flex items-center pl-2">
                    <svg viewBox="0 0 24 24" class="h-4 w-4 fill-current text-gray-500">
                        <path
                            d="M10 4a6 6 0 100 12 6 6 0 000-12zm-8 6a8 8 0 1114.32 4.906l5.387 5.387a1 1 0 01-1.414 1.414l-5.387-5.387A8 8 0 012 10z">
                        </path>
                    </svg>
                </span>
                <input placeholder="Search" wire:model="search"
                    class="appearance-none rounded-r rounded-l items-end sm:rounded-l-none border border-gray-400 border-b block pl-8 pr-6 py-2  bg-white text-sm placeholder-gray-400 text-gray-700 focus:bg-white focus:placeholder-gray-600 focus:text-gray-700 focus:outline-none" />
            </div>
            </div>
          </div>
          

              <table class="min-w-full divide-y divide-gray-200 ">
                <thead>
                  <tr>
                    <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                      No
                    </th>
                    <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                      Name Product
                    </th>
                    <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                      Code Product
                    </th>
                    <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                      Price
                    </th>
                    <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                      Action
                    </th>
                   
                    <th class="px-6 py-3 bg-gray-50"></th>
                  </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($products as $product)
                        
                  <tr>
                  
                    <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">
                      {{ $loop->iteration }}
                    </td>
                  
                    <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">
                      {{ $product->name_product }}
                    </td>
                    <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">
                      {{ $product->code_product }}
                    </td>
                    <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">
                     Rp  {{ number_format($product->price) }}
                    </td>

                    <td>
                        <button wire:click="getProduct({{ $product->id }})" class="bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-2 px-2 rounded">
                            Edit
                          </button>

                          <button wire:click="$emit('deleteProduct', {{ $product->id }})" class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-2 rounded">
                            Delete
                          </button>
                    </td>
                   
                  </tr>
      
                  @endforeach
                  <!-- More rows... -->
                </tbody>
              </table>

              <div class="py-2 mt-2">
                {{ $products->links() }}
              </div>
              
            </div>
          </div>
        </div>

       
      </div>
      <div class="p-3">
        
      </div>
    </div>
</div>

@push('script')
<script>
  document.addEventListener('livewire:load', function () {
    @this.on('deleteProduct', idProduct => {
      Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, delete it!',
        cancelButtonText: 'No, cancel!',
        reverseButtons: true
      }).then((result) => {
       
        if (result.isConfirmed) {
          @this.call('deleteProduct', idProduct)
          Swal.fire(
            'Deleted!',
            'Your file has been deleted.',
            'success'
          )
        } else if (
          /* Read more about handling dismissals below */
          result.dismiss === Swal.DismissReason.cancel
        ) {
          Swal.fire(
            'Cancelled',
            'Your imaginary file is safe :)',
            'error'
          )
        }
      })
    })
  })
</script>

@endpush
