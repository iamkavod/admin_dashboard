<?php
include 'connect.php';
$id = $_GET['editid'];
$sql = "Select * from `admindash` where id = $id";
$result = mysqli_query($connect, $sql);
$row = mysqli_fetch_assoc($result);
// Splitting the $name into $firstname and $lastname
$nameParts = explode(' ', $row['name']);
$firstname = $nameParts[0];
$lastname = $nameParts[1];
$dob = $row['dob'];
$phone_number = $row['phone_number'];
$bank_account = $row['bank_account'];
$emailaddress = $row['email_address'];

if (isset($_POST['submit'])) {
 $firstname = $_POST['firstname'];
 $lastname = $_POST['lastname'];

 // Adding $firstname and $lastname in the $name field as one string
 $name = $firstname . ' ' . $lastname;
 $dob = $_POST['dob'];
 $phone_number = $_POST['phonenumber'];
 $bank_account = $_POST['bankaccount'];
 $emailaddress = $_POST['email'];

 $sql = "update `admindash` set id = $id, name = '$name', dob = '$dob', phone_number = '$phone_number', bank_account = '$bank_account', email_address = '$emailaddress'
  where id = $id";

 $result = mysqli_query($connect, $sql);
 if ($result) {
  header('location:home.php');
 } else {
  die(mysqli_error($connect));
 }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <link rel="stylesheet" href="css/style.css">
 <title>Admin Dashboard</title>
</head>

<body>

 <main class="container" id="mainPage">
  <!-- Menu Section -->
  <section class="menu__section">
   <!-- Logo -->
   <div class="logo">
    <img src="assets/logo.png" alt="Logo">
   </div>

   <!-- Menu Buttons -->
   <nav class="menu__items">
    <ul>
     <li>
      <img src="assets/menu.svg" alt="Dashboard">
     </li>
     <li>
      <img src="assets/people.svg" alt="People">
     </li>
     <li>
      <img src="assets/settings.svg" alt="Setting">
     </li>
    </ul>
    <ul>
     <li>
      <img src="assets/call.svg" alt="Phone">
     </li>
     <li>
      <img src="assets/analytics.svg" alt="Analytics">
     </li>
     <li>
      <img src="assets/light.svg" alt="Light">
     </li>
    </ul>
    <ul>
     <li>
      <img src="assets/logout.svg" alt="Logout">
     </li>
    </ul>
   </nav>
  </section>

  <!-- Body Section -->
  <section class="body__section">
   <!-- Body Header -->
   <header class="body__header">
    <nav class="body__header__items__container">
     <ul>
      <li class="search">
       <input type="text" placeholder="Search Everything ...">
       <img src="assets/search.svg" alt="Search">
      </li>
     </ul>
     <ul>
      <li>
       <img src="assets/message.svg" alt="Message">
       <p>Message</p>
      </li>
      <li>
       <img src="assets/notification.svg" alt="Notification">
      </li>
     </ul>
    </nav>
   </header>

   <!-- Hero Section -->
   <div class="body__hero__section">
    <!-- Activity Log -->
    <div class="activity__container">
     <h1>Activity Log</h1>
     <div class="today">
      <div class="today__heading">
       <div class="today__cir"></div>
       <h1>Today</h1>
      </div>
      <div class="time__activity__container">
       <div class="time__activity">
        <p>10:30pm</p>
        <p>Customer 1 was created</p>
       </div>
       <div class="time__activity">
        <p>11:30pm</p>
        <p>Customer is reading data</p>
       </div>
       <div class="time__activity">
        <p>12:30pm</p>
        <p>Customer 10 was Updated</p>
       </div>
       <div class="time__activity">
        <p>1:30pm</p>
        <p>Customer 2 has be deleted</p>
       </div>
      </div>
     </div>
    </div>

    <!-- Customer List -->
    <div class="customer__list">
     <!-- Customer List Heading -->
     <div class="customer__list__heading">
      <!-- Text -->
      <div class="customer__list__text">
       <h1>Customer List</h1>
       <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore
        magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
        consequat.</p>
      </div>

      <!-- Admin Profile Pic -->
      <div class="customer__list__admin">
       <img src="assets/profile.png" alt="Admin picture">
       <p>Admin 1</p>
      </div>

     </div>

     <!-- Customer List Body -->
     <div class="customer__list__body">
      <!-- Tickets -->
      <div class="tickets">
       <img src="assets/messages.svg" alt="Tickets">
       <p>Tickets</p>
      </div>

      <div class="divider"></div>

      <!-- Share Result -->
      <div class="share__result">
       <img src="assets/share.svg" alt="Share">
       <p>Share result</p>
      </div>
     </div>
    </div>
   </div>

   <!-- Body Content Section -->
   <main class="body__container">
    <!-- Add Customer -->
    <div class="add__customer">
     <h1>Update User Data</h1>
     <form method="post">
      <input type="text" placeholder="first name" name="firstname" autocomplete="off" value=<?php echo $firstname; ?>>
      <input type="text" placeholder="last name" name="lastname" autocomplete="off" value=<?php echo $lastname; ?>>
      <input type="date" placeholder="Date of Birth" name="dob" autocomplete="off" value=<?php echo $dob; ?>>
      <input type="phone" placeholder="Phone Number" name="phonenumber" autocomplete="off" value=<?php echo $phone_number; ?>>
      <input type="text" placeholder="Bank Account" name="bankaccount" autocomplete="off" value=<?php echo $bank_account ?>>
      <input type="email" placeholder="Email" name="email" autocomplete="off" value=<?php echo $emailaddress; ?>>

      <!-- Update and Cancle Buttons -->
      <button type="submit" class="btn" name="submit">Update Details</button>
      <a href="home.php" class="btn__cancle" onclick="closeForm()">Cancle</a>
     </form>
    </div>
   </div>

    <!-- List Of Customers -->
    <div class="list__customers">
     <h1>List of Customers</h1>
     <div class="list__table__container">
      <div class="new__old__customers">
       <p><a href="">New Customers</a></p>
       <p><a href="">Old Customers</a></p>
      </div>
      <div class="customer__checks">
       <div class="refresh list__image">
        <img src="assets/refresh.svg" alt="Refresh">
        <p>Refresh</p>
       </div>
       <div class="export list__image">
        <img src="assets/export.svg" alt="Export">
        <p>Export</p>
       </div>
       <div class="filter list__image">
        <img src="assets/filter.svg" alt="Filters">
        <p>Filters</p>
       </div>
       <div class="search list__image">
        <input type="text" placeholder="Name, date, etc..">
        <img src="assets/search.svg" alt="Search">
       </div>
      </div>
     </div>

     <div class="divider"></div>

     <div class="list__of__customers">
      <table>
       <thead>
        <th>id</th>
        <th>Name</th>
        <th>Date of birth</th>
        <th>Phone number</th>
        <th>Bank Account</th>
        <th>Email Address</th>
        <th>Edit</th>
        <th>Delete</th>
       </thead>
       <tbody>
        <?php

        include 'connect.php';
        $sql = "select * from `admindash`";
        $result = mysqli_query($connect, $sql);
        if ($result) {
         $row = mysqli_fetch_assoc($result);
         while ($row = mysqli_fetch_assoc($result)) {
          $id = $row["id"];
          $name = $row['name'];
          $dob = $row['dob'];
          $phone_number = $row['phone_number'];
          $bank_account = $row['bank_account'];
          $emailaddress = $row['email_address'];

          echo
           '<tr>
                  <td scope="row">' . $id . '</td>
                  <td>' . $name . '</td>
                  <td>' . $dob . '</td>
                  <td>' . $phone_number . '</td>
                  <td>' . $bank_account . '</td>
                  <td>' . $emailaddress . '</td>
                  <td>
                    <a href="edit.php?editid=' . $id . '" id="openPopup" onclick="openForm()"><img src="assets/edit.png" alt="Edit"></a>
                  </td>
                  <td>
                    <a href="delete.php?deleteid=' . $id . '"><img src="assets/delete.png" alt="Delete"></a>
                  </td>
              </tr>';
         }
        }
        ?>
       </tbody>
      </table>
     </div>
    </div>
   </main>
  </section>
 </main>

 

  <script src="js/script.js"></script>
</body>

</html>