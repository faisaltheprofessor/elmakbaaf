<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\View;
use App\Models\Invoice;
use App\Models\Order;
use App\Models\Client;
use App\Models\Invoicecart;
use App\Models\InvoiceProduct;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use DB;
// use pdf;
use Dompdf\Dompdf;

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
                    <h5>Licence# : <span > D-77181</span>    Order Date : <span > '.$InvoiceProductDetail->invoice_date.'</span>  Ship To : '.$InvoiceProductDetail->client->first_name.'  '.$InvoiceProductDetail->client->last_name.' </h5>

                 </div>
               
                  </header>
                  <main>
                       <div><h2> Invoice<h2> </div>
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
                       

                      
                      @foreach ($InvoiceProductDetail[invoice_product] as $product) 
                      <tr>                   
                          <td > '.$product['id'].' </td>
                          <td > '.$product['design'].' </td> 
                          <td > '.$product['quantity'].' </td>
                          <td > '.$product['product->lenght'].' </td>
                          <td >  '.$product['product->width'].'</td>                            
                          <td > '.$product['(product->lenght/100*$product->product->width/100)'].' </td> 
                          <td >'.$product['product->price'].'  </td>
                          <td > '.$product['(quantity*(($product->product->lenght/100*$product->product->width/100)*$product->product->price))'].' $</td>
             
                 
                      </tr>
                      @endforeach
                 </tbody>
                    </table>
                   
                    <div id="borderblack">
                            <ul >                                   
                                <p>Total Square Meter : '.$InvoiceProductDetail->total_square_meters.' </p>
                                <p>Total Pieces : '.$InvoiceProductDetail->total_amount.'</p>
                                <p>Total Bales : '.$InvoiceProductDetail->total_bales.'</p>
                                <p>Total Price : '.$InvoiceProductDetail->total_price.'</p>
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
                return view('SalseManagement.Invoice.InvoiceProductDetail')->with(compact('InvoiceProductDetail'));
                
                // return $InvoiceProductDetail;
                
    }
}
