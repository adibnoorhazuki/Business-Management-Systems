<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
  margin: 0;
}
.header {
  
  padding: 20px;
  text-align: center;
}
.logo {
  position: absolute;
  left: 20px;
  top: 10px; 
}
.content {
  background-color: #F1F1F1;
  padding: 20px;
  text-align: center;
}
.bottom {
position: fixed;
   left: 0;
   bottom: 0;
   width: 100%;
   
   text-align: center;
}
h1.solid 
   {border-style: solid;
    background-color: white;
    padding: 20px;
    text-align: center;
    border: 1px solid black;
    border-radius: 60px;
    
    
   
   }
 h1.solid2 
   {border-style: solid;
    background-color:#00FF7F;
    padding: 20px;
    text-align: center;
    border: 1px solid black;
    border-radius: 60px;
    
   
   }   
</style>
</head>
<body>
<div class="logo">
<img src="logo.png" style="width:100%; max-width:100px;">
</div>

<div class="header">
  <h1>Tracking</h1>
</div>

<div class="content">
@foreach ($invoiceserv as $invoiceserv)
  <h1>Invoice no:{{ $invoiceserv->id }}</h1>
  <h1>Customer:{{ $invoiceserv->Cust_name }}</h1>
  
  <h1 class="solid">Device:{{ $invoiceserv->device }}</h1>
  
  <h1 class="solid2">Status:{{ $invoiceserv->status }}</h1>
  @endforeach
</div>

<div class="bottom">
  <td>Customer care</td><br><br>
  <td>https://www.bms.com</td><br>
  <td>+6018-255 6064</td><br>
  <td>customerservice@bms.com</td><br><br>
  <td>@2019,Designed by Adib,Coded by Business Management System Team</td>
  
</div>

</body>
</html>
        


        
    

