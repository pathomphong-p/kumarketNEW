<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <style>
    @@font-face {
        font-family:'THSarabunNew';
        font-style: normal;
        font-weight: normal;
        src:url("{{asset('fonts/THSarabunNew.ttf')}}")format('truetype');
    }
    @@font-face {
        font-family:'THSarabunNew';
        font-style: normal;
        font-weight: bold;
        src:url("{{asset('fonts/THSarabunNew Bold.ttf')}}")format('truetype');
    }
    @@font-face {
        font-family:'THSarabunNew';
        font-style: italic;
        font-weight: normal;
        src:url("{{asset('fonts/THSarabunNew ITalic.ttf')}}")format('truetype');
    }
    @@font-face {
        font-family:'THSarabunNew';
        font-style: italic;
        font-weight: bold;
        src:url("{{asset('fonts/THSarabunNew BoldItalic.ttf')}}")format('truetype');
    }
    body{
        font-family: "THSarabunNew";
    }
    table{
        border-collapse: collapse;
    }
    td,th{
        border: 1px solid;
    }
    </style>
</head>

<body>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <h3 align="center">ร้านที่มาขาย</h3>
    <table border="1" width = "100%">
    <thead>
    <tr>
        <th align="center">หมายเลขร้าน</th>
        <th align="center">ชื่อ</th>
        <th align="center">นามสกุล</th>
        <th align="center">ชื่อร้าน</th>
        <th align="center">เบอร์โทรศัพท์</th>
        <th align="center">หมายเหตุ</th>
    </tr>
    </thead>
    <tbody>
        @foreach ($User as $u)
            @if($u->admin != 1)
                @if($u->come == 1)
                    <tr>
                    <td>{{$u['lock']}}</td>
                    <td>{{$u['name']}}</td>
                    <td>{{$u['surname']}}</td>
                    <td>{{$u['store_name']}}</td>
                    <td>{{$u['tel']}}</td>
                    <td> </td>
                    </tr>
                @endif
            @endif
        @endforeach
    </tbody>
    </table>
</body>
</html>


