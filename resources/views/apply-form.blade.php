<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Discount Apply form') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

             
                @if(session('error'))
                 <div style="color:red">{{session('error')}}</div>
                @endif

                @if(session('success'))
                <div style="color:green">{{session('success')}}</div>
               @endif

                    <form action ="{{route('apply.disc')}}" method="post">
                        @csrf
                        <x-input-label for="Category" :value="__('Category')" />
                         <select type ="text" name="category" id="category">
                            <option value="">-Select-</option>
                            <option value="Electronics" {{old('category') == 'Electronics' ? 'selected':''}}>Electronics</option>
                            <option value="Fashion" {{old('category') == 'Fashion' ? 'selected':''}}>Fashion</option>
                            <option value="Books" {{old('category') == 'Books' ? 'selected':''}}>Books</option>
                         </select>
                         @error('category')
                         <div style="color:red">{{$message}}</div>
                         @enderror
                         <br>

                       
                        <x-input-label for="Qty" :value="__('Purchase Quantity')" />
                        <input type="number" name="qty" id="min" value="{{old('qty')}}">
                        @error('qty')
                        <div style="color:red">{{$message}}</div>
                        @enderror
                    
                        <br>
                        <x-input-label for="Date" :value="__('Purchase Quantity')" />
                        <input type="date" name="purchase_date" id="purchase_date" value="{{old('purchase_date')}}">
                        @error('purchase_date')
                        <div style="color:red">{{$message}}</div>
                        @enderror
                       
                         <br>
                         <x-input-label for="Total Bill Amount" :value="__('Total Bill Amount')" />
                        <input type="text" name="total_bill_amount" id="total_bill_amount" value="{{old('total_bill_amount')}}"> 
                        @error('total_bill_amount')
                        <div style="color:red">{{$message}}</div>
                        @enderror
                        <br>
                       <button type="submit" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Apply Discount</button>
                    </form>

                   
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
