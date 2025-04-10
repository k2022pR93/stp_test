<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DiscountRule;
use App\Models\ApplyDisc;

class DiscountController extends Controller
{
     
    public function submitDiscount(Request $request){
     
      $data = $request->validate([
        'category'=>'required|string',
        'min_qty'=>'required|integer|min:1',
        'max_qty'=>'required|integer|gte:min_qty',
        'start_date'=>'required|date|before_or_equal:end_date',
        'end_date'=>'required|date|after_or_equal:start_date',
        'discount_type'=>'required|in:Percentage,Fixed',
        'discount_value'=>'required|numeric|min:1',
        'priority'=>'required|integer|min:1|max:5',
        'is_exclusive'=>'required'
       ]);

     $rule =  DiscountRule::create($data);

      return redirect()->back()->with('success','Rules added succuessfully.');

    }


    public function showList(){
        $discList =  DiscountRule::latest()->get();
        return view('show-list',compact('discList'));
    }


    public function editDiscount(Request $request, $id){
        $getDetails = DiscountRule::findOrFail($id)->toArray();
        return view('dashboard',compact('getDetails'));
    }

    public function updatesDisc(Request $request, $id){
       
        $data = $request->validate([
            'category'=>'required|string',
            'min_qty'=>'required|integer|min:1',
            'max_qty'=>'required|integer|gte:min_qty',
            'start_date'=>'required|date|before_or_equal:end_date',
            'end_date'=>'required|date|after_or_equal:start_date',
            'discount_type'=>'required|in:Percentage,Fixed',
            'discount_value'=>'required|numeric|min:1',
            'priority'=>'required|integer|min:1|max:5',
            'is_exclusive'=>'required'
           ]);
    
         $discFind =  DiscountRule::find($id);
         $discFind->category =$request->category;
         $discFind->min_qty =$request->min_qty;
         $discFind->max_qty =$request->max_qty;
         $discFind->start_date =$request->start_date;
         $discFind->end_date =$request->end_date;
         $discFind->discount_type =$request->discount_type;
         $discFind->discount_value =$request->discount_value;
         $discFind->priority =$request->priority;
         $discFind->is_exclusive =$request->is_exclusive;
         $discFind->save();

          return redirect('/discount-list')->with('success','Rules updated succuessfully.');
         
    }

    public function deleteDisc($id){
     $disc = DiscountRule::find($id);

     if($disc){
        $disc->delete();
        return redirect()->back()->with('success','Deleted Successfully');
     }else{
        return redirect()->back()->with('error','Record not found');
     }
    }


    public function applyDiscForm(){
        return view('apply-form');
    }


    public function applyDiscount(Request $request){

        $data = $request->validate([
            'category'=>'required|string',
            'qty'=>'required|integer',
            'purchase_date'=>'required|date',
            'total_bill_amount'=>'required|numeric'
           ]);

           
     $rules =  DiscountRule ::where('category',$data['category'])
     ->where('min_qty','<=',$data['qty'])
     ->where('max_qty','>=',$data['qty'])
     ->whereDate('start_date','<=',$data['purchase_date'])
     ->whereDate('end_date','>=',$data['purchase_date'])
     ->where('is_exclusive',1)
     ->orderby('priority')
     ->get()->toArray();


     if(empty($rules)){
        return redirect('/apply-discount-form')->with('error','No Discount Available');
     }

       $discount=0;
     if($rules){
           $dataOffer = $rules[0];
           if($dataOffer['discount_type'] == 'Fixed'){
               $discount = $dataOffer['discount_value'];
           }else{
            $discount =  ($data['total_bill_amount'] * $dataOffer['discount_value'])/100;
           }
      }
 
    
     $applied = array(
         'category'=>$data['category'],
         'qty' =>$data['qty'],
         'purchase_date'=>$data['purchase_date'],
         'total_bill_amount' =>$data['total_bill_amount'],
         'matched_rules'=>$dataOffer['priority'],
         'exclusive_rules'=>$dataOffer['is_exclusive'],
         'discount_applied'=>$discount,
         'final_amount'=>($data['total_bill_amount']-$discount)
     );

     
     $result = ApplyDisc::create($applied);
           

       if( $result){
        return redirect('/apply-discount-form')->with('success','Appled discount succuessfully.');
       }else{
        return redirect('/apply-discount-form')->with('error','Failed to apply discount');
       }

    }



    public function showAppliedDiscList(){
        $applyDisc =  ApplyDisc::latest()->get();
        return view('applied-discount-list',compact('applyDisc'));

    }

}
