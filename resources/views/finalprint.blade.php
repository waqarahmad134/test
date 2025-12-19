<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Case Receipt</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    @media print {
      body, html {
        margin: 0;
        padding: 0;
        width: 210mm;
        height: 297mm;
        font-size: 11px;
        background: #fff;
      }

      @page {
        size: A4;
        margin: 10mm;
      }

      .container {
        box-shadow: none !important;
        padding: 10px !important;
        margin: 0 !important;
        width: 100%;
        page-break-before: avoid;
      }

      .no-print {
        display: none !important;
      }

      .header-logo {
        width: 60px !important;
        height: 60px !important;
      }

      .header-title {
        font-size: 18px !important;
        font-weight: 700;
        color: #198754 !important;
      }

      .header-sub {
        font-size: 13px !important;
        color: #b8860b !important;
      }

      .photo-box,
      .qr-box {
        width: 120px !important;
        height: 150px !important;
      }

      .thumb-line {
        font-size: 10px !important;
      }

      .case-heading {
        font-size: 14px !important;
      }

      .urdu-box p {
        font-size: 12px;
      }

      .form-grid {
        gap: 10px !important;
      }

      .signature-section {
        height: 120px !important;
      }

      .title {
        font-size: 14px !important;
      }

      .line-input {
        border: none;
        border-bottom: 1px solid #555 !important;
        background: transparent !important;
        font-size: 15px !important;
      }

      .thumb-sign-label {
        font-size: 10px !important;
      }
    }

    body {
      font-family: 'Arial', sans-serif;
      padding: 20px;
      background: #f9f9f9;
    }

    .container {
      background: #fff;
      border-radius: 6px;
      padding: 20px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.05);
    }

    .header {
      display: flex;
      align-items: center;
      border-bottom: 2px solid #198754;
      margin-bottom: 20px;
      padding-bottom: 10px;
    }

    .header-logo {
      width: 60px;
      height: 60px;
      object-fit: fill;
      margin-right: 15px;
    }

    .header-title {
      color: #198754;
      font-weight: 700;
      font-size: 20px;
      margin-bottom: 4px;
    }

    .header-sub {
      color: #b8860b;
      font-size: 13px;
    }

    .photo-box,
    .qr-box {
      border: 1px solid #ddd;
      background: #f4f4f4;
      display: flex;
      align-items: center;
      justify-content: center;
      border-radius: 4px;
      overflow: hidden;
      width: 120px;
      height: 150px;
    }

    .thumb-line {
      border-top: 1px dashed #999;
      width: 120px;
      margin-top: 6px;
      text-align: center;
      font-size: 10px;
      color: #333;
    }

    .case-heading {
      font-size: 18px;
      font-weight: bold;
      text-align: center;
      margin: 20px 0;
      text-decoration: underline;
      color: #333;
    }

    .info-label {
      font-weight: 600;
      color: #333;
    }

    .info-value {
      border-bottom: 1px dotted #555;
      padding-left: 6px;
      font-style: italic;
    }

    .urdu-box {
      font-family: 'Noto Nastaliq Urdu', serif;
      border: 1px solid #000;
      padding: 10px;
      direction: rtl;
      text-align: right;
      font-size: 13px;
    }

    .form-section {
      margin-top: 15px;
    }

    .form-grid {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 15px;
    }

    .signature-section {
      border: 1px solid black;
      height: 150px;
      margin-top: 6px;
    }

    .title {
      text-align: center;
      font-size: 16px;
      margin: 30px 0 10px;
      text-decoration: underline;
    }

    .line-input {
      border: none;
      border-bottom: 1px solid #555;
      background: transparent;
      padding: 2px 4px;
      font-size: 20px;
      width: 100%;
      margin-bottom: 6px;
    }

    .text-end {
      text-align: end;
    }

    .btn-success {
      padding: 6px 16px;
      font-size: 14px;
    }

    .photo-qr-container {
      display: flex;
      justify-content: space-between;
      align-items: flex-start;
      margin-bottom: 10px;
    }

    .photo-qr-wrapper {
      display: flex;
      flex-direction: column;
      align-items: center;
    }

    .thumb-sign-line {
      border-top: 1px solid #000;
      width: 100%;
      margin: 20px 0 5px;
    }

    .thumb-sign-label {
      text-align: center;
      font-size: 12px;
      color: #000;
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="header">
      <!-- <img src="https://courtingthelaw.com/wp-content/uploads/FullAndFinalBook.jpg" alt="LHC Logo" class="header-logo">
      <div>
        <div class="header-title">District Judiciary Muzaffargarh</div>
        <div class="header-sub">INSTITUTION MANAGEMENT SYSTEM, {{$case->u($case->user_id)->ctype}}, {{$case->u($case->user_id)->tehsil}}</div>
      </div> -->
    </div>
<div class="thumb-sign-label" style="text-align:left !important">Picture of Petitioner/ Plaintiff</div>
    <div class="photo-qr-container">
      <div class="photo-qr-wrapper">
        <div class="photo-box mb-1">
            
          <img src="https://diary.dsjmuzaffargarh.com/storage/app/{{$case->pic}}" alt="Photo" style="width: 100%; height: 100%; object-fit: fill; filter: brightness(2);">
        </div>
      </div>
      <div class="qr-box">
        {!! $qrCode !!}
      </div>
    </div>
<div class="thumb-sign-label">Thumb Impressions & Signatures of Petitioner/ Plaintiff</div>
    <div class="thumb-sign-line" style="margin-top:0px !important;"></div>
    

    <div class="form-grid">
      <div>
        <label>Institution No:</label> @php
    $user = $case->u($case->user_id);
@endphp

@if ($user->ctype == "CIVIL COURTS")
    <input type="text" value="PB\MZG\C.C-No. {{$case->i_no}}/2025" readonly class="line-input">
@else
    <input type="text" value="PB\MZG\SC.C-No. {{$case->i_no}}/2025" readonly class="line-input">
@endif
        <label>Category of Case:</label> <input type="text" value="{{$case->cname($case->cat)}}" readonly class="line-input">
        <label>Sub Category:</label> <input type="text" value="{{$case->sname($case->subcat)}}" readonly class="line-input">
        <label>Jurisdiction of Case:</label> <input type="text" value="{{$case->jur}}" readonly class="line-input">
        <label>Date of Institution:</label> <input type="text" value="{{ \Carbon\Carbon::parse($case->i_date)->format('d-m-Y') }}" readonly class="line-input">
        <label>Date of Appearance:</label> <input type="text" value="{{ \Carbon\Carbon::parse($case->a_date)->format('d-m-Y') }}" readonly class="line-input">
        <label>Presented By:</label> <input type="text" value="{{$case->pby}}" readonly class="line-input">
        <label>Court Room No:</label> <input type="text" value="{{$case->cno}}" readonly class="line-input">
        <label>Entrusted To:</label> <input type="text" value="{{$case->jname($case->judge_id)}}" readonly class="line-input">
        <label>System No:</label> <input type="text" readonly class="line-input">
        <label>Court Reg. No:</label> <input type="text" readonly class="line-input">
        <label>Consignment No:</label> <input type="text" readonly class="line-input">
        <label>Consignment Date:</label> <input type="text" readonly class="line-input">
        <label>Name & Signature of institution clerk:</label>
        <input type="text" readonly class="line-input">
      </div>
      <div>
        <div class="urdu-box">
          <p>کیا فریق میں سے کسی کا کیس:</p>
          <p>کسی عدالت میں زیر التواء ہے</p>
          <p>اگر ہے تو کونسی عدالت میں</p>
          <p>اگر فیصلہ ہو چکا ہو کونسی عدالت</p>
          <br><br>
          <p style="text-align: center;">دستخط سائل / کونسل</p>
        </div>
        <br><br>
        <div class="title">Title Of Case</div>
        <div>
          <label>Party Name (Petitioner/ Plaintiff):</label> <input type="text" value="{{$case->p1}}" readonly class="line-input">
          <label>CNIC NO:</label> <input type="text" value="{{$case->cnic}}" readonly class="line-input">
          <label>CELL NO:</label> <input type="text" value="{{$case->m1}}" readonly class="line-input">
          <label>E-MAIL ADDRESS (If Any):</label> <input type="email" readonly class="line-input">
          <label>Party Name (Respondent/Defendant):</label> <input type="text" value="{{$case->p2}}" readonly class="line-input">
          <label>CNIC NO:</label> <input type="text" readonly class="line-input">
          <label>E-MAIL ADDRESS (If Any):</label> <input type="email" readonly class="line-input">
        </div>
        <div class="signature-section"></div>
      </div>
    </div>

    <div class="text-end no-print mt-4">
      <button class="btn btn-success" onclick="window.print()">Print Receipt</button>
    </div>
  </div>
</body>
</html>
