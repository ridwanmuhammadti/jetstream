<div>
    <div class="">
        <div class="text-gray-700 text-center text-xl p-2">Edit Product</div>
      </div>
    <div class="grid grid-cols-1 md:grid-cols-1">
      
       
        <div class="p-6">
            <form class="w-full" wire:submit.prevent="update">

                <input type="hidden" wire:model="productId">

                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-password">
                        Nama Product
                        </label>
                        <input wire:model="name_product" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-password" type="text" placeholder="Nama Product">
                        @error('name_product') <p class="text-red-500 text-xs italic">{{ $message }}</p> @enderror

                        
                    </div>
                   
                    </div>
                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full md:w-1/2 px-3">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
                        Kode Produk
                        </label>
                        <input wire:model="code_product" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-last-name" type="text" placeholder="Kode Product">
                        @error('code_product') <p class="text-red-500 text-xs italic">{{ $message }}</p> @enderror
                    </div>
                <div class="w-full md:w-1/2 px-3">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
                    Harga Produk
                    </label>
                    <input wire:model="price" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-last-name" type="text" placeholder="Harga Product">
                    @error('price') <p class="text-red-500 text-xs italic">{{ $message }}</p> @enderror
                </div>
                </div>
              
                <div class="flex items-center justify-between">
                    <button class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                      Update
                    </button>
                
                </div>
            </form>

            
        </div>

     
     
      
    </div>
</div>
