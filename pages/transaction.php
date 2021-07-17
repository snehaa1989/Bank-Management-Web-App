
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Send Money</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Anton&family=Gabriela&display=swap" rel="stylesheet">
    <style>
    body {
        padding: 0px;
        margin: 0;
        font-family: Verdana, Geneva, Tahoma, sans-serif;
        background: linear-gradient(57deg, #00C6A7 , #1E4D92 );
    }
    
    
    h1 {
        font-weight: 600;
        text-align: center;
        background-color: #1E4D92;
        color: #fff;
        padding: 10px 0px;
        
    }
  
    .card {
     
      box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
      transition: 0.3s;
      text-align: -webkit-center;
    }
   
   

    .container {
      padding: 20px 16px;
      margin: 40px;
      background: #00C6A7;
    }
  </style>
</head>



<body>
  


    <h1>TRANSFER MONEY</h1>

    <hr>
    <div class="card container">
      <?php
      if(isset($_GET['message'])){
      if ($_GET['message'] == 'success') {
        echo "<h3><p style='color:white;' >Transaction was completed successfully</p></h3>";
      }
      if ($_GET['message'] == 'transactionDenied') {
        echo "<h3><p style='color:red;' >Transaction Failed </p></h3>";
      }}
      ?>
   

        <form action="helper.php" method="POST">

        <b>Transfer To</b>
        <select name="reciever" id="dropdown" class="textbox" required>
          <option>Select Reciever</option>
          <?php
          $db = mysqli_connect("localhost", "root", "", "grip-bank");
          $res = mysqli_query($db, "SELECT * FROM users");
          while ($row = mysqli_fetch_array($res)) {
            echo ("<option> " . "  " . $row['Name'] . "</option>");
          }
          ?>
        </select>
        <br><br>
        <b>Transfer From</b><span style="font-size:1.2em;">
        <select name="sender" id="dropdown" class="textbox" required>
          <option>Select Sender</option>
          <?php
          $db = mysqli_connect("localhost", "root", "", "grip-bank");
          $res = mysqli_query($db, "SELECT * FROM users");
          while ($row = mysqli_fetch_array($res)) {
            echo ("<option> " . "  " . $row['Name'] . "</option>");
          }
          ?>
        </select>
        </span>
        <br><br>


        <b>Amount :</b>
        <input name="amount" type="number" min="100" class="textbox" required>
        <br><br>
        <a href="helper.php"><button id="transfer" name="transfer" onclick="">Transfer</button></a>
      </form>

</body>

</html>