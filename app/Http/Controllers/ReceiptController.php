<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\View;

use App\Models\Receipt;
use App\Models\Suplier;
use App\Models\Receiptcart;
use App\Models\ReceiptProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use Dompdf\Dompdf;

class ReceiptController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function makereceipt()
    {
      
        $supliers= Suplier::get();
        $receiptcart = [];
        if(Auth::user()){
           $user_id = Auth::user()->id;
           
           $receiptcart=Receiptcart::where('user_id',$user_id)->get();
        }
       
         return view('PurcheseManagement.Receipt.MakeReceipt', compact("receiptcart","supliers"));

    }
    

    public function receiptcart(Request $request)
    {

        $receiptcart=$request->toArray();
        $receiptcart['user_id']=Auth::user()->id;   
        Receiptcart::create($receiptcart);
        // return $request;
        return redirect(route('AllProduct_show'));
       
    }

    public function UpdateReceiptItemQuantity(Request $request)
    {
        //cheaking if data is coming or not
        if($request->ajax()){
            $data = $request->all();
            //  echo"<pre>";print_r($data); die;
            //  //update here 
            Receiptcart::where('id',$data['cartid'])->update(['quantity'=>$data['quantity']]);
            //get all cart item
            $receiptCartitems =Cart::userCartitems();
            return response()->json(['view'=>(String)View::make('receiptcart')->
            with(compact('receiptCartitems'))]);
        }


    }

    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
          
        $receipt = new Receipt;
        
        $receipt->receipt_date = $request->receipt_date; 
        $receipt['user_id']=Auth::user()->id;      
        $receipt->suplier_id = $request->suplier_id;
        $receipt->total_price = $request->total_price;
        $receipt->total_amount = $request->total_amount;       
        $receipt->total_square_meters = $request->total_square_meters;
        $receipt->total_bales = $request->total_bales;
         $receipt->save();
        //    return $request;
         
        
         $receipt_id = DB::getPdo()->lastInsertId();
        $receiptcart = Receiptcart::where('user_id',Auth::user()->id)->get();
        foreach($receiptcart as $key =>$item)
        {
            $receiptcart = new ReceiptProduct;
            $receiptcart->product_id = $item['product_id'];
            $receiptcart->receipt_id=$receipt_id;           
            $receiptcart->user_id = Auth::user()->id;

            $receiptcart->quantity = $item['quantity'];
            $receiptcart->save();
        
           }
        
           Receiptcart::where('user_id',Auth::user()->id)->delete();
           return redirect(route('makereceipt'));
    }


    public function AllReceipt(Request $request){
        $search = $request['search'] ?? "";
        if($search != "")
        {
            $receipts =  Receipt::with('receipt_product')->Where('receipt_date','like',"%$search%")->orWhere('total_amount','like',"%$search%")->paginate(10);
          
        }
    
        else{
           
            $receipts =  Receipt::with('receipt_product')->orderBy('id','Desc')->paginate(10);   
        }
        
              
        return view('PurcheseManagement.Receipt.AllReceipt')->with(compact('receipts','search'));

    }

    public function receipt_product_detail($id){  
        $ReceiptProductDetail =Receipt::with('receipt_product')->where('id',$id)->first();
         return view('PurcheseManagement.Receipt.ReceiptProductDetail')->with(compact('ReceiptProductDetail'));
        
   } 

    public function show(Receipt $receipt)
    {
        //
    }

   
    public function edit(Receipt $receipt)
    {
        //
    }

    
    public function update(Request $request, Receipt $receipt)
    {
        //
    }

    public function destroy($id)
    {
        $receiptcart =  Receiptcart::find($id);
        $receiptcart->delete();
        return redirect(route('makereceipt'));
    }


    
    public function PrintPdfReceipt($id){
        $ReceiptProductDetail =Receipt::with('receipt_product')->where('id',$id)->first();
            
              $output ='
              <!DOCTYPE html>
              <html lang="en">
                <head>
                  <meta charset="utf-8">
                  <title></title>
                  <style>
                  .clearfix:after {
                    content: "";
                    display: table;
                    clear: both;
                  }
                  
                  a {
                    color: #5D6975;
                    text-decoration: underline;
                  }
                  
                  body {
                    position: relative;
                    width: 21cm;  
                    height: 29.7cm; 
                    margin: 0 auto; 
                    color: #001028;
                    background: #FFFFFF; 
                    font-family: Arial, sans-serif; 
                    font-size: 12px; 
                    font-family: Arial;
                  }
                  
                  header {
                    padding: 10px 0;
                    margin-bottom: 30px;
                  }
                  
                  #logo {
                    text-align: center;
                    margin-bottom: 10px;
                  }
                  
                  #logo img {
                    width: 90px;
                  }
                  
                  h1 {
                    border-top: 1px solid  #5D6975;
                    border-bottom: 1px solid  #5D6975;
                    color: #5D6975;
                    font-size: 2.4em;
                    line-height: 1.4em;
                    font-weight: normal;
                    text-align: center;
                    margin: 0 0 20px 0;
                    background: url(dimension.png);
                  }
                  
                  #project {
                    float: left;
                  }
                  
                  #project span {
                    color: #5D6975;
                    text-align: right;
                    width: 52px;
                    margin-right: 10px;
                    display: inline-block;
                    font-size: 0.8em;
                  }
                  
                  #company {
                    float: right;
                    text-align: right;
                  }
                  
                  #project div,
                  #company div {
                    white-space: nowrap;        
                  }
                  
                  table {
                    width: 100%;
                    border-collapse: collapse;
                    border-spacing: 0;
                    margin-bottom: 20px;
                  }
                  
                  table tr:nth-child(2n-1) td {
                    background: #F5F5F5;
                  }
                  
                  table th,
                  table td {
                    text-align: center;
                  }
                  
                  table th {
                    padding: 5px 20px;
                    color: #5D6975;
                    border-bottom: 1px solid #C1CED9;
                    white-space: nowrap;        
                    font-weight: normal;
                  }
                  
                  table .service,
                  table .desc {
                    text-align: left;
                  }
                  
                  table td {
                    padding: 20px;
                    text-align: right;
                  }
                  
                  table td.service,
                  table td.desc {
                    vertical-align: top;
                  }
                  
                  table td.unit,
                  table td.qty,
                  table td.total {
                    font-size: 1.2em;
                  }
                  
                  table td.grand {
                    border-top: 1px solid #5D6975;;
                  }
                  
                  #notices .notice {
                    color: #5D6975;
                    font-size: 1.2em;
                  }
                  
                  footer {
                    color: #5D6975;
                    width: 100%;
                    height: 30px;
                    position: absolute;
                    bottom: 0;
                    border-top: 1px solid #C1CED9;
                    padding: 8px 0;
                    text-align: center;
                  }
                  #borderblack{
                    border-top: 1px solid  #5D6975;
                      /*  */
                      
                  }
                  ul{
                      float: right;
                      direction: none;
                  }
                  h2{
                    text-align: center;
                  }
                  
                  
                  </style>

                </head>
                <body>
                  <header class="clearfix">
                    <div id="logo">
                    
                    </div>
                    <h1>ELMAAK BAAFT</h1>
                    <div id="company" class="clearfix">
                        <div>Elamak Baaft.West Kabul Carpet Market</div>
                        <div>  Dawakhana Squre,</div>
                        <div>  District 3th Kabul,Afghanistan</div>
                    </div>
                    <div id="project">
                      <div>P:+93773252214 | +93774000439 </div>
                      <div> E: info@afghancarpetnshc.com</div>
                      <div> W:WWW.afghancarpetnshc.com</div>                     
                    <h5>Licence# : <span > D-77181</span>    Order Date : <span > '.$ReceiptProductDetail->receipt_date.'</span>  Ship To : '.$ReceiptProductDetail->suplier->first_name.' '.$ReceiptProductDetail->suplier->last_name.' </h5>

                 </div>
                  </header> 
                     <div><h2> Inventory<h2> </div>
                  <main>
                 
                    <table>
                    
                      <thead>
                        <tr>
                            <th>Order#</th>
                            <th>Design</th>
                            <th>Quantity</th>
                            <th>Lenght</th>
                            <th>Width</th>
                            <th>Total</th>
                            <th>Price/meter</th>
                            <th>Total Price</th>
                     

                        </tr>
                      </thead>
                      <tbody>
                
                        @foreach ($ReceiptProductDetail[receipt_product] as $product) 
                        <tr>                   
                            <td > .$product->id}} </td>
                            <td > {{$product->product->design}} </td> 
                            <td > {{$product->quantity}} </td>
                            <td > {{$product->product->lenght}} </td>
                            <td >  {{$product->product->width}}</td>                            
                            <td > {{($product->product->lenght/100*$product->product->width/100)}} </td> 
                            <td >{{$product->product->price}} $ </td>
                            <td > {{($product->quantity*(($product->product->lenght/100*$product->product->width/100)*$product->product->price))}} $</td>
               
                  
                        </tr>
                        @endforeach
                 </tbody>
                    </table>
                   
                    <div id="borderblack">
                            <ul >                                   
                                <p>Total Square Meter : '.$ReceiptProductDetail->total_square_meters.' </p>
                                <p>Total Pieces : '.$ReceiptProductDetail->total_amount.'</p>
                                <p>Total Bales : '.$ReceiptProductDetail->total_bales.'</p>
                                <p>Total Price : '.$ReceiptProductDetail->total_price.'</p>
                            </ul>
                    </div>
                  </main>
                  <footer>
                  Address: Elamak Baaft.West Kabul Carpet Market  Dawakhana Squre, District 3th Kabul,Afghanistan
                  </footer>
                </body>
              </html>';
              
                // instantiate and use the dompdf class
                $dompdf = new Dompdf();
                $dompdf->loadHtml($output);

                // (Optional) Setup the paper size and orientation
                $dompdf->setPaper('A4', 'landscape');

                // Render the HTML as PDF
                $dompdf->render();

                // Output the generated PDF to Browser
                $dompdf->stream();
                return view('PurcheseManagement.Receipt.ReceiptProductDetail')->with(compact('ReceiptProductDetail'));
               
                
    }

}
