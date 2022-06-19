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
        <h5>Licence# : <span > D-77181</span>    Order Date : <span > {{$InvoiceProductDetail->invoice_date}}</span>  Ship To : {{$InvoiceProductDetail->client->first_name}}  {{$InvoiceProductDetail->client->last_name}} </h5>

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



        @foreach ($InvoiceProductDetail->invoice_product as $product)
            <tr>
                <td > {{ $product['id'] }} </td>
                <td > {{ $product->product['design'] }} </td>
                <td > {{ $product['quantity'] }} </td>
                <td > {{ $product->product->lenght }} </td>
                <td >  {{ $product->product->width }}</td>
                <td > {{ ($product->product->lenght/100) * ($product->product->width/100)  }} </td>
                <td > {{ $product->product->price }}  </td>
                <td > {{ $product->quantity*(($product->product->lenght/100*$product->product->width/100)*$product->product->price) }} $</td>


            </tr>
        @endforeach
        </tbody>
    </table>

    <div id="borderblack">
        <ul >
            <p>Total Square Meter : {{$InvoiceProductDetail->total_square_meters}} </p>
            <p>Total Pieces : {{$InvoiceProductDetail->total_amount}}</p>
            <p>Total Bales : {{$InvoiceProductDetail->total_bales}}</p>
            <p>Total Price : {{$InvoiceProductDetail->total_price}}</p>
        </ul>
    </div>
</main>
<footer>
    Address: Elamak Baaft.West Kabul Carpet Market  Dawakhana Squre, District 3th Kabul,Afghanistan
</footer>
</body>
</html>'