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

<table class="table" border>
    <tr>
     <td>Id</td>
     <td>Category</td>
     <td>Qty</td>
     <td>Discount/Price</td>
     <td>Date Rang</td>
     <td>Priority</td>
     <td>Exclusive</td>
     <td>Action</td>
    </tr>

    @foreach($discList as $value)
    <tr>
        
        <td>{{$value->id}}</td>
        <td>{{$value->category}}</td>
        <td>{{$value->min_qty .' - '.$value->max_qty}}</td>
        <td>{{$value->discount_type == 'Percentage' ? $value->discount_value .'%' : '₹'.$value->discount_value}}</td>
         
        <td>
            {{\Carbon\Carbon::parse($value->start_date)->format('M j')}} -
            {{\Carbon\Carbon::parse($value->end_date)->format('j')}}
        </td>
       
        <td>{{$value->priority}}</td>
        <td>{{($value->is_exclusive == 0 ? '❌':'✅')}}</td>
        <td>
            <a href="{{route('edit.disc',['id'=>$value->id])}}">Edit</a>|
            <a href="{{route('disc.delete',['id'=>$value->id])}}" onclick="return confirm('Are you sure you want to delete rocord.')">Delete</a>
        </td>
    </tr>
    @endforeach
</table>

</div>
</div>
</div>
</div>
</x-app-layout>
