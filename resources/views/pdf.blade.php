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

<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  <h3>ร้านที่มาขาย</h3>
</head>
<body>
  <table border="1" width = "100%">
      <tr>
          <th>หมายเลขร้าน</th>
          <th>ชื่อ</th>
          <th>นามสกุล</th>
          <th>ชื่อร้าน</th>
          <th>เบอร์โทรศัพท์</th>
          <th>หมายเหตุ</th>
      </tr>
      <?php
      foreach ($User as $u){
        $come = $u -> come;
        if ($come == 1) {
          <tr>
            <td>{{$u -> lock}}</td>
            <td>{{$u -> name}}</td>
            <td>{{$u -> surname}}</td>
            <td>{{$u -> store_name}}</td>
            <td>{{$u -> tel}}</td>
            <td> </td>
          </tr>
        };
      }
      ?>
  </table>
</body>
</html>