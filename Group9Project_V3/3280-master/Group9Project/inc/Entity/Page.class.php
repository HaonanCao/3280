<?php

class Page  {

    public static $title = "Group 9 Project";

    static function header() { ?>

        <!doctype html>
        <html lang="en">
        <head>
            <!-- Required meta tags -->
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

            <!-- Bootstrap CSS -->
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

            <title><?php echo self::$title; ?></title>
            <!-- <meta http-equiv="refresh" content="3"> -->

        </head>
        <body>
        <div class="container">
            <h1><?php echo self::$title; ?></h1>

           
    <?php }

    static function footer()    { ?>
        </div>
            <!-- Optional JavaScript -->
                    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
                    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
                    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
                </body>
            </html>
    <?php }


    static function showLogin() { ?>
    
    <form class="form-signin" ACTION="" METHOD="POST" style="max-width: 330px">
        <h2 class="form-signin-heading">Please sign in</h2>
        <div class="form-group">
            <label for="inputUserId" class="sr-only">User ID</label>
            <input type="text" id="inputUserId" class="form-control" placeholder="User ID" required autofocus name="userid">
        </div>

        <div class="form-group">
            <label for="inputPassword" class="sr-only">Password</label>
            <input type="password" id="inputPassword" class="form-control" placeholder="Password" required name=password>
        </div>

        <div class="form-group">
            <button class="btn btn-lg btn-primary btn-block" type="submit">Log in</button>
        </div>
      </form>
    

    <?php }

//show booking
static function listBooking(Array $bookings)    {
    ?>
        <!-- Start the page's show data form -->
        <section class="main">
        <h2>Booking Information</h2>
        <table>
            <thead>
                <tr>
                    <th>Booking ID</th>
                    <th>User ID</th>
                    <th>Car ID</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <?php
                foreach($bookings as $booking)  {
                    echo "<tr>";
                    echo "<td>".$booking->getBookingId()."</td>";
                    echo "<td>".$booking->getUserId()."</td>";
                    echo "<td>".$booking->getCarId()."</td>";
                    echo '<td><a href="?action=edit&bookingid='.$booking->getBookingId().'">Edit</a></td>';
                    echo '<td><a href="?action=delete&bookingid='.$booking->getBookingId().'">Delete</td>';
                    echo "</tr>";
                } 
        
        echo '</table>
            </section>';
        
 }

 //show car
static function listCar(Array $cars)    {
    ?>
        <!-- Start the page's show data form -->
        <section class="main">
        <h2>Car Information</h2>
        <table>
            <thead>
                <tr>
                    <th>Car ID</th>
                    <th>Brand</th>
                    <th>Model</th>
                    <th>Price</th>
                    <th>Date</th>
                    <th>Availability</th>
                </tr>
            </thead>
            <?php
                foreach($cars as $car)  {
                    echo "<tr>";
                    echo "<td>".$car->getCarId()."</td>";
                    echo "<td>".$car->getBrand()."</td>";
                    echo "<td>".$car->getModel()."</td>";
                    echo "<td>".$car->getPrice()."</td>";
                    echo "<td>".$car->getDate()."</td>";
                    echo "<td>".$car->getAvailability()."</td>";
                    echo '<td><a href="?action=edit&bookingid='.$car->getCarId().'">Edit</a></td>';
                    echo '<td><a href="?action=delete&bookingid='.$car->getCarId().'">Delete</td>';
                    echo "</tr>";
                } 
        
        echo '</table>
            </section>';
  
    }

    //show user
static function listUser(Array $users)    {
    ?>
        <!-- Start the page's show data form -->
        <section class="main">
        <h2>User Information</h2>
        <table>
            <thead>
                <tr>
                    <th>User ID</th>
                    <th>FirstName</th>
                    <th>LastName</th>
                    <th>Password</th>
                </tr>
            </thead>
            <?php
                foreach($users as $user)  {
                    echo "<tr>";
                    echo "<td>".$user->getUserId()."</td>";
                    echo "<td>".$user->getFirstName()."</td>";
                    echo "<td>".$user->getLastName()."</td>";
                    echo "<td>".$user->getPassword()."</td>";
                    echo '<td><a href="?action=edit&bookingid='.$user->getUserId().'">Edit</a></td>';
                    echo '<td><a href="?action=delete&bookingid='.$user->getUserId().'">Delete</td>';
                    echo "</tr>";
                } 
        
        echo '</table>
            </section>';
  
    }


    static function createBooking()   { ?>        
        <section class="form1">
                <h2>Add Booking</h2>
                <form action="" method="post">
                    <table>
                        <tr>
                            <td>Booking ID</td>
                            <td><input type="text" name="bookingid"></td>
                        </tr>
                        <tr>
                            <td>User ID</td>
                            <td><input type="text" name="userid"></td>
                        </tr>                        
                        <tr>
                            <td>Car ID</td>
                            <td><input type="datextte" name="carid"></td>
                        </tr>
                    </table>
                    <!-- Use input type hidden to let us know that this action is to create -->
                    <input type="hidden" name="action" value="create">
                    <input type="submit" value="Add Booking">
                </form>
            </section>

    <?php }

static function createUser()   { ?>        
    <section class="form1">
            <h2>Add User</h2>
            <form action="" method="post">
                <table>
                    <tr>
                        <td>User ID</td>
                        <td><input type="text" name="userid"></td>
                    </tr>
                    <tr>
                        <td>First Name</td>
                        <td><input type="text" name="firstname"></td>
                    </tr>                        
                    <tr>
                        <td>Last Name</td>
                        <td><input type="text" name="lastname"></td>
                    </tr>
                    <tr>
                        <td>Password</td>
                        <td><input type="text" name="password"></td>
                    </tr>
                </table>
                <!-- Use input type hidden to let us know that this action is to create -->
                <input type="hidden" name="action" value="create">
                <input type="submit" value="Add User">
            </form>
        </section>

<?php }

static function createCar()   { ?>        
    <section class="form1">
            <h2>Add Car</h2>
            <form action="" method="post">
                <table>
                    <tr>
                        <td>Car ID</td>
                        <td><input type="text" name="carid"></td>
                    </tr>
                    <tr>
                        <td>Brand</td>
                        <td><input type="text" name="brand"></td>
                    </tr>                        
                    <tr>
                        <td>Model</td>
                        <td><input type="datextte" name="model"></td>
                    </tr>
                    <tr>
                        <td>Price</td>
                        <td><input type="datextte" name="price"></td>
                    </tr>
                    <tr>
                        <td>Date</td>
                        <td><input type="datextte" name="date"></td>
                    </tr>
                    <tr>
                        <td>Availability</td>
                        <td><input type="datextte" name="availability"></td>
                    </tr>
                </table>
                <!-- Use input type hidden to let us know that this action is to create -->
                <input type="hidden" name="action" value="create">
                <input type="submit" value="Add Car">
            </form>
        </section>

<?php }

    static function editBookingForm(Booking $booking)   {  ?>        
        <section class="form1">
            <h2>Edit Booking - <?php $booking->getBookingId()?></h2>
            <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
                <table>
                    <tr>
                        <td>Booking ID</td>
                        <td><?php $booking->getBookingId() ?></td>
                    </tr>
                    <tr>
                            <td>User ID</td>
                            <td><input type="text" name="userid" value=<?php $booking->getUserId() ?>></td>
                    </tr>
                    <tr>
                            <td>Car ID</td>
                            <td><input type="text" name="carid" value=<?php $booking->getCarId() ?>></td>
                    </tr>
                    
                </table>
                <!-- We need another hidden input for feedback id here. Why? -->
                <input type="hidden" name="id" value="<?php  $booking->getBookingId() ?>">
                
                <!-- Use input type hidden to let us know that this action is to edit -->
                <input type="hidden" name="action" value="edit">
                <input type="submit" value="Edit Booking">                
            </form>
        </section>

<?php }

static function editUserForm(User $user)   {  ?>        
    <section class="form1">
        <h2>Edit User - <?php $user->getUserId()?></h2>
        <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
            <table>
                <tr>
                    <td>User ID</td>
                    <td><?php $user->getUserId() ?></td>
                </tr>
                <tr>
                        <td>First Name</td>
                        <td><input type="text" name="firstname" value=<?php $user->getFirstName() ?>></td>
                </tr>
                <tr>
                        <td>Last Name</td>
                        <td><input type="text" name="lastname" value=<?php $user->getLastName() ?>></td>
                </tr>
                <tr>
                        <td>Passwork</td>
                        <td><input type="text" name="password" value=<?php $user->getPassword() ?>></td>
                </tr>
                
            </table>
            <!-- We need another hidden input for feedback id here. Why? -->
            <input type="hidden" name="id" value="<?php  $user->getUserId() ?>">
            
            <!-- Use input type hidden to let us know that this action is to edit -->
            <input type="hidden" name="action" value="edit">
            <input type="submit" value="Edit User">                
        </form>
    </section>

<?php }

static function editCarForm(Car $car)   {  ?>        
    <section class="form1">
        <h2>Edit Car - <?php $car->getCarId()?></h2>
        <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
            <table>
                <tr>
                    <td>Car ID</td>
                    <td><?php $car->getCarId() ?></td>
                </tr>
                <tr>
                        <td>Brand</td>
                        <td><input type="text" name="brand" value=<?php $car->getBrand() ?>></td>
                </tr>
                <tr>
                        <td>Model</td>
                        <td><input type="text" name="model" value=<?php $car->getModel() ?>></td>
                </tr>
                <tr>
                        <td>Price</td>
                        <td><input type="text" name="price" value=<?php $car->getPrice() ?>></td>
                </tr>
                <tr>
                        <td>Date</td>
                        <td><input type="text" name="date" value=<?php $car->getDate() ?>></td>
                </tr>
                <tr>
                        <td>Availability</td>
                        <td><input type="text" name="availability" value=<?php $car->getAvailability() ?>></td>
                </tr>
                
            </table>
            <!-- We need another hidden input for feedback id here. Why? -->
            <input type="hidden" name="id" value="<?php  $car->getCarId() ?>">
            
            <!-- Use input type hidden to let us know that this action is to edit -->
            <input type="hidden" name="action" value="edit">
            <input type="submit" value="Edit Car">                
        </form>
    </section>

<?php }
    

}

?>