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
     <td>Date</td>
     <td>Total Bill</td>
     <td>Matched Rules</td>
     <td>Exclusive Rule</td>
     <td>Discount Applied</td>
     <td>Final Amount</td>
    </tr>

    @foreach($applyDisc as $value)
    <tr>
        
        <td>{{$value->id}}</td>
        <td>{{$value->category}}</td>
        <td>{{$value->qty}}</td>
        <td>{{$value->purchase_date}}</td>
        <td>₹ {{$value->total_bill_amount}}</td>
        <td>{{$value->matched_rules}}</td>
        <td>{{($value->exclusive_rules == 0 ? '❌':'✅')}}</td>
        <td>₹ {{$value->discount_applied}} Off</td>
        <td>₹ {{$value->final_amount}}</td>
    </tr>
    @endforeach
</table>

</div>
</div>
</div>
</div>
</x-app-layout>
