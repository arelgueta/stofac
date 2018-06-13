<?php
session_start();

if(isset($_SESSION['usuario'])){
    include("mpdf/mpdf.php");

    //para convertir numeros a letras
    $V = new EnLetras();
    //recorro los array con los datos
    foreach($datos_factura as $factura){              }

    $html = '
    <!DOCTYPE html>
    <html>
    <head>
            <title>Impresion de Factura</title>
            <style>
                    *
                    {
                            margin:0;
                            padding:0;
                            font-family:Arial;
                            font-size:10pt;
                            color:#000;
                    }
                    body
                    {
                            width:100%;
                            font-family:Arial;
                            font-size:10pt;
                            margin:0;
                            padding:0;
                    }

                    p
                    {
                            margin:0;
                            padding:0;
                    }

                    #wrapper
                    {
                            width:180mm;
                            margin:0 15mm;
                    }

                    .page
                    {
                            height:297mm;
                            width:210mm;
                            page-break-after:always;
                    }

                    table
                    {
                            border-left: 1px solid #ccc;
                            border-top: 1px solid #ccc;

                            border-spacing:0;
                            border-collapse: collapse; 

                    }

                    table td 
                    {
                            border-right: 1px solid #ccc;
                            border-bottom: 1px solid #ccc;
                            padding: 2mm;
                    }

                    table.heading
                    {
                            height:50mm;
                    }

                    h1.heading
                    {
                            font-size:14pt;
                            color:#000;
                            font-weight:normal;
                    }

                    h2.heading
                    {
                            font-size:9pt;
                            color:#000;
                            font-weight:normal;
                    }

                    hr
                    {
                            color:#ccc;
                            background:#ccc;
                    }

                    #invoice_body
                    {
                            height: 149mm;
                    }

                    #invoice_body , #invoice_total
                    {	
                            width:100%;
                    }
                    #invoice_body table , #invoice_total table
                    {
                            width:100%;
                            border-left: 1px solid #ccc;
                            border-top: 1px solid #ccc;

                            border-spacing:0;
                            border-collapse: collapse; 

                            margin-top:5mm;
                    }

                    #invoice_body table td , #invoice_total table td
                    {
                            text-align:center;
                            font-size:9pt;
                            border-right: 1px solid #ccc;
                            border-bottom: 1px solid #ccc;
                            padding:2mm 0;
                    }

                    #invoice_body table td.mono  , #invoice_total table td.mono
                    {
                            font-family:monospace;
                            text-align:right;
                            padding-right:3mm;
                            font-size:10pt;
                    }

                    #footer
                    {	
                            width:180mm;
                            margin:0 15mm;
                            padding-bottom:3mm;
                    }
                    #footer table
                    {
                            width:100%;
                            border-left: 1px solid #ccc;
                            border-top: 1px solid #ccc;

                            background:#eee;

                            border-spacing:0;
                            border-collapse: collapse; 
                    }
                    #footer table td
                    {
                            width:25%;
                            text-align:center;
                            font-size:9pt;
                            border-right: 1px solid #ccc;
                            border-bottom: 1px solid #ccc;
                    }
            </style>
    </head>
    <body>
    <div id="wrapper">

        <p style="text-align:center; font-weight:bold; padding-top:5mm;">FACTURA C</p>
        <br />
        <table class="heading" style="width:100%;">
            <tr>
                    <td style="width:80mm;">
                            <h1 class="heading">ABC Corp</h1>
                                    <h2 class="heading">
                                            123 Happy Street<br />
                                            CoolCity - Pincode<br />
                                            Region , Country<br />

                                            Website : www.website.com<br />
                                            E-mail : info@website.com<br />
                                            Phone : +1 - 123456789
                                    </h2>
                            </td>
                            <td rowspan="2" valign="top" align="right" style="padding:3mm;"> 
                                    <table>
                                            <tr><td>Factura No : </td><td>' . $factura['id_factura'] .'</td></tr>
                                            <tr><td>Fecha : </td><td>' . $factura['fecha'] .'</td></tr>
                                            <tr><td>Tipo pago : </td><td>Contado</td></tr>
                                    </table>
                            </td>
                    </tr>
            <tr>
                    <td>
                            <b>Comprador</b> :<br />
                            Razon Social: ' . $factura['apellido'] .', ' . $factura['nombre'] .'<br />
                            Domicilio:' . $factura['direccion'] .'
                            <br />
                            Ciudad - CP , Pais<br />
                    </td>
            </tr>
        </table>


            <div id="content">

                    <div id="invoice_body">
                            <table>
                            <tr style="background:#eee;">
                                    <td style="width:8%;"><b>No.</b></td>
                                    <td><b>Producto</b></td>
                                    <td style="width:15%;"><b>Cantidad</b></td>
                                    <td style="width:15%;"><b>Precio Unit</b></td>
                                    <td style="width:15%;"><b>Total</b></td>
                            </tr>
                            </table>

                            <table>
        ';

        $total_final = 0;
        for($i=0;$i<count($datos_factdetalle);$i++) {

                $html = $html . '

                                        <tr>
                                            <td style="width:8%;">' . $datos_factdetalle[$i]['id_detalle'] .'</td>
                                            <td style="text-align:left; padding-left:10px;">' . $datos_factdetalle[$i]['nombre'] .'</td>
                                            <td class="mono" style="width:15%;">' . $datos_factdetalle[$i]['cantidad'] .'</td>
                                            <td style="width:15%;" class="mono">' . number_format($datos_factdetalle[$i]['precio'],2,",",".") .'</td>
                                            <td style="width:15%;" class="mono">' . number_format($datos_factdetalle[$i]['subtotal'],2,",",".") .'</td>
                                        </tr>		
                    ';
                $total_final = $total_final +  $datos_factdetalle[$i]['subtotal'];
        }

    $html = $html . '                        
                            <tr>
                                    <td colspan="3"></td>
                                    <td></td>
                                    <td></td>
                            </tr>

                            <tr>
                                    <td colspan="3"></td>
                                    <td>Total :</td>
                                    <td class="mono">' . number_format($total_final,2,",",".") .'</td>
                            </tr>
                    </table>
                    </div>
                    <div id="invoice_total">
                            Total Cuenta :
                            <table>
        ';

        //Total en letras
        $letras = $V->ValorEnLetras($total_final,"pesos");

    $html = $html . '                         
                                    <tr>
                                            <td style="text-align:left; padding-left:10px;">' . $letras .'</td>
                                            <td style="width:15%;">Pesos</td>
                                            <td style="width:15%;" class="mono">' . number_format($total_final,2,",",".") .'</td>
                                    </tr>
                            </table>
                    </div>
                    <br />
                    <hr />
                    <br />


            </div>

            <br />

            </div>

            <htmlpagefooter name="footer">
                    <hr />
                    <div id="footer">	

                    </div>
            </htmlpagefooter>
            <sethtmlpagefooter name="footer" value="on" />

    </body>
    </html>
    ';

    //==============================================================
    //==============================================================
    //==============================================================

    $mpdf=new mPDF('c','A4','','' , 0 , 0 , 0 , 0 , 0 , 0); 

    $mpdf->SetDisplayMode('fullpage');

    $mpdf->list_indent_first_level = 0;	// 1 or 0 - whether to indent the first level of a list

    $mpdf->WriteHTML($html);

    $mpdf->Output();

}else{
   // movePage(301,"index.php");
    header ("Location: index.php");
}
exit;


