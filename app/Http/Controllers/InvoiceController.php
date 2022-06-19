<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use Illuminate\Support\Facades\View;
use App\Models\Invoice;
use App\Models\Order;
use App\Models\Client;
use App\Models\Invoicecart;
use App\Models\InvoiceProduct;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use DB;
Use PDF;


class InvoiceController extends Controller
{
    public function index()
    {
    
    }

    public function makeinvoice()
    {
      
        $clients= Client::get();
        $invoicecart = [];
        if(Auth::user()){
           $user_id = Auth::user()->id;
           
           $invoicecart=Invoicecart::where('user_id',$user_id)->get();
        }
       
         return view('SalseManagement.Invoice.MakeInvoice', compact("invoicecart","clients"));

    }
    
    public function invoicecart(Request $request)
    {

        $invoicecart=$request->toArray();
        $invoicecart['user_id']=Auth::user()->id;   
        Invoicecart::create($invoicecart);
        // return $request;
        return redirect(route('AllProduct_show'));

      
    //    //######## has problem #######
    //         // $data = $request->all();
    //         // Invoicecart::insert($data);
    //        // return $request;

    //        //get the requst in ajex
    //     if($request->ajax()){
    //         //both data come here
    //         $data = $request->all();
    //     }
    //     Invoicecart::insert($data);

       
    }
   
    public function create()
    {
        //
    }

 
    public function store(Request $request)
    {   
      
        $invoice = new Invoice;
        
        $invoice->invoice_date = $request->invoice_date;
        $invoice['user_id']=Auth::user()->id;       
        $invoice->client_id = $request->client_id;
        $invoice->total_price = $request->total_price;
        $invoice->total_amount = $request->total_amount;       
        $invoice->total_square_meters = $request->total_square_meters;
        $invoice->total_bales = $request->total_bales;
        $invoice->save();
        //    return $request;
         
        
         $invoice_id = DB::getPdo()->lastInsertId();
        $invoicecart = Invoicecart::where('user_id',Auth::user()->id)->get();
        foreach($invoicecart as $key =>$item)
        {
            $invoicecart = new InvoiceProduct;
            $invoicecart->product_id = $item['product_id'];
            $invoicecart->invoice_id=$invoice_id;
            $invoicecart->user_id = Auth::user()->id;

            $invoicecart->quantity = $item['quantity'];
            $invoicecart->save();

        }
        
        Invoicecart::where('user_id',Auth::user()->id)->delete();
        return redirect(route('makeinvoice'));
        
    }

 
    public function AllInvoice(Request $request)
    {

        $search = $request['search'] ?? "";
        if($search != "")
        {
            $invoices =  Invoice::with('invoice_product')->Where('invoice_date','like',"%$search%")->orWhere('total_amount','like',"%$search%")->paginate(10);
          
        }
    
        else{
            $invoices =  Invoice::with('invoice_product')->orderBy('id','Desc')->paginate(10);
              
        }
        
        return view('SalseManagement.Invoice.AllInvoice')->with(compact('invoices','search'));
    }

   
    public function invoice_product_detail($id){  
     $InvoiceProductDetail =Invoice::with('invoice_product')->where('id',$id)->first();
      return view('SalseManagement.Invoice.InvoiceProductDetail')->with(compact('InvoiceProductDetail'));
     
    } 
 

    public function UpdateInvoiceItemQuantity(Request $request)
    {
        //cheaking if data is coming or not
        if($request->ajax()){
            $data = $request->all();
            //  echo"<pre>";print_r($data); die;
            //  //update here 
            Invoicecart::where('id',$data['cartid'])->update(['quantity'=>$data['quantity']]);
            //get all cart item
            $invoiceCartitems =Cart::userCartitems();
            return response()->json(['view'=>(String)View::make('invoicecart')->
            with(compact('invoiceCartitems'))]);
        }


    }




    public function edit(Invoice $invoice)
    {
        //
    }

   
    public function update(Request $request, Invoice $invoice)
    {
        //
    }

   
    public function destroy($id)
    {
        $invoicecart =  Invoicecart::find($id);
        $invoicecart->delete();
        return redirect(route('makeinvoice'));
    }


    
    public function PrintPdfInvoice($id){
        $InvoiceProductDetail =Invoice::with('invoice_product')->where('id',$id)->first();
        $pdf = PDF::loadView('pdf.invoice', ['InvoiceProductDetail' =>  $InvoiceProductDetail])->setPaper('A4','landscape');
        return $pdf->download('Invoice '. Carbon::today(). '.pdf');
    }
}
