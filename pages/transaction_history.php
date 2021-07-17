<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaction History</title>
</head>

<style>
    body {
        padding: 0px;
        margin: 0;
        font-family: Verdana, Geneva, Tahoma, sans-serif;
        background: linear-gradient(57deg, #00C6A7 , #1E4D92 );
    }
    
    table {
        position: absolute;
        left: 50%;
        top: 50%;
        transform: translate(-50%, -50%);
        border-collapse: collapse;
        width: 1500px;
        height: 200px;
        border: 1px solid #bdc3c7;
        box-shadow: 2px 2px 12px rgba(0, 0, 0, 0.2), -1px -1px 8px rgba(0, 0, 0, 0.2);
        
    }
    
    tr {
        transition: all .2s ease-in;
        cursor: pointer;
    }
    
    th,
    td {
        padding: 1px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }
    
    #header {
        background-color: #16a085;
        color: #fff;
    }
    
    h1 {
        font-weight: 600;
        text-align: center;
        background-color: #1E4D92;
        color: #fff;
        padding: 10px 0px;
        
    }
    
    tr:hover {
        background-color: #f5f5f5;
        transform: scale(1.02);
        box-shadow: 2px 2px 12px rgba(0, 0, 0, 0.2), -1px -1px 8px rgba(0, 0, 0, 0.2);
    }
    
    @media only screen and (max-width: 768px) {
        table {
            width: 90%;
        }
    }
</style>

<body>

    <h1>RECENT TRANSACTIONS</h1>
    <hr>

    <table>
        <tr id="header">
            <th>Sender</th>
            <th>SenderID</th>
            <th>Reciever</th>
            <th>RecieverID</th>
            <th>Amount</th>
            <th>Date and Time</th>
        </tr>
        <?php
        
 $con = mysqli_connect("localhost", "root", "", "grip-bank");
// Check connection
if ($con->connect_error) {
die("Connection failed: " . $con->connect_error);
}
$sql = "SELECT * FROM transaction";
$result = $con->query($sql);
if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
echo "<tr>
<td>" . $row["SENDER NAME"]. "</td>
<td>" . $row["SENDER ID"] . "</td>
<td>" . $row["RECIEVER NAME"]. "</td>
<td>" . $row["RECIEVER ID"]. "</td>
<td>" . $row["AMOUNT"]. "</td>
<td>" . $row["DATE AND TIME"]. "</td>
</tr>";
}
echo "</table>";
} else { echo "0 results"; }
$con->close();
?>

    </table>

</body>

</html>