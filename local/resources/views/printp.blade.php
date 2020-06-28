<head>
    <meta charset="UTF-8">
    <link href="{{asset('css/style-rtl.css')}}" rel="stylesheet">
    <style>
        .tg  {border-collapse:collapse;border-spacing:0;}
        .tg td{font-family: Vazir;font-size:14px;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:black;}
        .tg th{font-family: Vazir;font-size:14px;font-weight:normal;padding:5px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:black;}
        .tg .tg-c3ow{border-color:inherit;text-align:center;vertical-align:top}
        .tg .tg-0pky{border-color:inherit;text-align:left;vertical-align:top}
    </style>
    <style>
        h4{
            font-size: 12px;
            font-family: Vazir;
        }
        h6{
            font-family: Vazir;
        }
    </style>
</head>

<body style="font-family: fa" dir="rtl">
<div style="display: flex;justify-content: space-around;align-items: center;margin-bottom: 20px">
    <img style="width: 80px; height:80px" src="{{asset('images/logo1.png')}}" alt="">
    <h4>وحدت رویاها</h4>
    <h4>نام و نام خانوادگی</h4>
    <h4>کد کاربر</h4>
    <h4>تاریخ و ساعت : {{Verta::now()}}</h4>
</div>

<table style="width: 100%" class="tg" align="center">
    <tr style="background: #ebebeb">
        <th class="tg-c3ow">ردیف</th>
        <th class="tg-c3ow">مشخصات محصول</th>
        <th class="tg-c3ow">تعداد</th>
        <th class="tg-c3ow">قیمت</th>
        <th class="tg-c3ow">مبلغ کل (تومان)</th>
    </tr>
        <tr>
            <td class="tg-c3ow">1</td>
            <td class="tg-c3ow">{{$pack->title}}</td>
            <td class="tg-c3ow">{{$pack->description}}</td>
            <td class="tg-c3ow">{{number_format($pack->price)}} تومان</td>
            <td class="tg-c3ow">{{number_format($pack->price)}} تومان</td>
        </tr>
    <tr>
            <td class="tg-0pky" colspan="4" style="text-align: center">جمع فاکتور (با احتساب 9 درصد مالیات بر ارزش افزوده)</td>
            <td class="tg-0pky" style="text-align: center">{{number_format(($pack->price*9)/100 + ($pack->price))}} تومان</td>
    </tr>
</table>

<div style="text-align: right;padding-right: 20px">
<h6>V a h d a t r o y a h a . c o m</h6>
</div>



</body>
