<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

             
                @if(session('success'))
                 <div style="color:green">{{session('success')}}</div>
                @endif


                    
                   
                    <form action ="{{(empty($getDetails)) ? route('add.disc') : route('update.disc',['id'=>$getDetails['id']])}}" method="post">
                        @csrf
                        <x-input-label for="Category" :value="__('Category')" />
                         <select type ="text" name="category" id="category">
                            <option value="">-Select-</option>
                            <option value="Electronics" {{old('category',(isset($getDetails) && $getDetails!="") ? $getDetails['category']:'') == 'Electronics' ? 'selected':''}}>Electronics</option>
                            <option value="Fashion" {{old('category',(isset($getDetails) && $getDetails!="") ? $getDetails['category']:'') == 'Fashion' ? 'selected':''}}>Fashion</option>
                            <option value="Books" {{old('category', (isset($getDetails) && $getDetails!="") ? $getDetails['category']:'') == 'Books' ? 'selected':''}}>Books</option>
                         </select>
                         @error('category')
                         <div style="color:red">{{$message}}</div>
                         @enderror
                         <br>

                       
                        <x-input-label for="Qty" :value="__('Qty')" />
                        <input type="number" name="min_qty" id="min_min" value="{{old('min_qty',(isset($getDetails) && $getDetails!="") ? $getDetails['min_qty']:'')}}">
                        @error('min_qty')
                        <div style="color:red">{{$message}}</div>
                        @enderror
                        <input type="number" name="max_qty" id="max_min" value="{{old('max_qty',(isset($getDetails) && $getDetails!="") ? $getDetails['max_qty']:'')}}">
                        @error('max_qty')
                        <div style="color:red">{{$message}}</div>
                        @enderror
                        
                        <br>
                        <x-input-label for="Date" :value="__('Date')" />
                        <input type="date" name="start_date" id="start_date" value="{{old('start_date',(isset($getDetails) && $getDetails!="") ? $getDetails['start_date']:'')}}">
                        @error('start_date')
                        <div style="color:red">{{$message}}</div>
                        @enderror
                        <input type="date" name="end_date" id="end_date" value="{{old('end_date',(isset($getDetails) && $getDetails!="") ? $getDetails['end_date']:'')}}">
                        @error('end_date')
                        <div style="color:red">{{$message}}</div>
                        @enderror
                        <br>
                        <x-input-label for="Disc Type" :value="__('Disc Type')" />
                        <select type ="text" name="discount_type" id="discount_type">
                            <option value="">-Select-</option>
                            <option value="Percentage" {{old('discount_type',(isset($getDetails) && $getDetails!="") ? $getDetails['discount_type']:'') == 'Percentage' ? 'selected':''}}>Percentage</option>
                            <option value="Fixed" {{old('discount_type',(isset($getDetails) && $getDetails!="") ? $getDetails['discount_type']:'') == 'Fixed' ? 'selected':''}}>Fixed</option>
                         </select>
                         @error('discount_type')
                         <div style="color:red">{{$message}}</div>
                         @enderror
                         <br>
                         <x-input-label for="Disc Value" :value="__('Disc Value')" />
                        <input type="text" name="discount_value" id="discount_value" value="{{old('discount_value',(isset($getDetails) && $getDetails!="") ? $getDetails['discount_value']:'')}}">
                         
                        @error('discount_value')
                        <div style="color:red">{{$message}}</div>
                        @enderror
                        
                        <br>
                        <x-input-label for="Priority" :value="__('Priority')" />
                        <select type ="text" name="priority" id="priority">
                            <option value="1" {{old('priority',(isset($getDetails) && $getDetails!="") ? $getDetails['priority']:'') == '1' ? 'selected':''}}>1</option>
                            <option value="2" {{old('priority',(isset($getDetails) && $getDetails!="") ? $getDetails['priority']:'') == '2' ? 'selected':''}}>2</option>
                            <option value="3" {{old('priority',(isset($getDetails) && $getDetails!="") ? $getDetails['priority']:'') == '3' ? 'selected':''}}>3</option>
                            <option value="4" {{old('priority',(isset($getDetails) && $getDetails!="") ? $getDetails['priority']:'') == '4' ? 'selected':''}}>4</option>
                            <option value="5" {{old('priority',(isset($getDetails) && $getDetails!="") ? $getDetails['priority']:'') == '5' ? 'selected':''}}>5</option>
                         </select>
                         @error('priority')
                         <div style="color:red">{{$message}}</div>
                         @enderror
                        <br>
                        <x-input-label for="Exclusive" :value="__('Exclusive')" />
                        <select type ="text" name="is_exclusive" id="is_exclusive">
                            <option value="1" {{old('is_exclusive',(isset($getDetails) && $getDetails!="") ? $getDetails['is_exclusive']:'') == '1' ? 'selected':''}}>True</option>
                            <option value="0" {{old('is_exclusive',(isset($getDetails) && $getDetails!="") ? $getDetails['is_exclusive']:'') == '0' ? 'selected':''}}>False</option>
                        </select>
                        @error('is_exclusive')
                        <div style="color:red">{{$message}}</div>
                        @enderror
                       <br>
                       
                       <button type="submit" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">{{(isset($getDetails) && $getDetails!="") ?'Update':'Submit'}}</button>
                    </form>

                   
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
