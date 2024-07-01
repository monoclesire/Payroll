<?php

require_once __DIR__ . '/vendor/autoload.php';

$mpdf = new \Mpdf\Mpdf(['format' => 'Letter', 'orientation' => 'L']);

$html = '
<html>
<head>
    <style>
        body { font-family: sans-serif; margin: 0; padding: 0; }
        .header, .footer { text-align: center; }
        .content { width: 95%; margin: 0 auto; border: 1px solid black; padding: 10px; }
        .section { margin-bottom: 5px; }
        .section-title { font-weight: bold; margin-bottom: 3px; }
        .align-right { text-align: right; }
        .signature { margin-top: 30px; }
        .amount { float: right; }
    </style>
</head>
<body>

<div class="header">
    <h3>REPUBLIC OF THE PHILIPPINES</h3>
    <h4>Department of Transportation</h4>
    <h5>MARITIME INDUSTRY AUTHORITY</h5>
    <p>Bonifacio Drive corner 20th Street, Port Area, Manila</p>
</div>

<div class="content">
    <div class="section">
        <p>Name: RODRIGUEZ, NAZARIO VINCENT S.</p>
        <p>Position: Admin. Assistant V</p>
        <p>Daily Rate: P 1,014.36</p>
        <p>Emp. ID: J1102 - 0203</p>
        <p>Employment Status: JOB ORDER</p>
    </div>
    
    <div class="section">
        <div class="section-title">GROSS PAY AMOUNT</div>
        <p>Wages this period (P1,014.36 x 18 days)<span class="amount">18,258.48</span></p>
        <p class="align-right"><strong>Total: 18,258.48</strong></p>
    </div>
    
    <div class="section">
        <div class="section-title">DEDUCTIONS</div>
        <p>Philhealth Contribution<span class="amount">0.00</span></p>
        <p>Other Deductions<span class="amount">0.00</span></p>
        <p class="align-right"><strong>Total: 0.00</strong></p>
    </div>
    
    <div class="section">
        <p class="align-right"><strong>NET PAY: 18,258.48</strong></p>
    </div>
    
    <div class="section">
        <p>Received the amount of Php18,258.48 for the period Dec 01-15 2023 & Dec 16-31 2023</p>
        <p>Payment Scheme: Auto-Debit</p>
    </div>
    
    <div class="signature">
        <p>Authenticated By:</p>
        <p>CLARISA M. TORRES</p>
        <p>Signature:</p>
    </div>
</div>

<div class="footer">
    <p>Payroll Period: 01-15 December 2023 / 16-31 December 2023</p>
    <p>Cut this portion and return to Payroll Master. J1102 - 0203</p>
    <p>CERTIFICATION</p>
</div>

</body>
</html>
';

$mpdf->WriteHTML($html);
$mpdf->Output("payslip","D");

?>