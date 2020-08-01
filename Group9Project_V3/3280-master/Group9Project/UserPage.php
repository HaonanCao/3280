<?php

require_once("inc/config.inc.php");
require_once("inc/Entity/User.class.php");
require_once("inc/Entity/Page.class.php");
require_once("inc/Entity/Booking.class.php");
require_once("inc/Entity/Car.class.php");

require_once("inc/Utility/LoginManager.class.php");
require_once("inc/Utility/PDOAgent.class.php");
require_once("inc/Utility/BookingDAO.class.php");
require_once("inc/Utility/CarDAO.class.php");
require_once("inc/Utility/UserDAO.class.php");



//Initialize the DAO(s)
UserDAO::init();


//If there was post data from an edit form then process it
if (!empty($_POST)) {
    // if it is an edit (remember the hidden input)
    if(false){
        //Assemble the Reservation to update        
        $fb = new User();
        $fb->setUserId($_POST["userid"]);
        $fb->setFirstName($_POST["firstname"]);
        $fb->setLastName($_POST["lastname"]);
        $fb->setPassword($_POST["password"]);
        

        //Send the Reservation to the DAO to be updated
        UserDAO::updateUser($fb);

    }
        
    // it is not an edit... it means create a new record
    else{
        //Assemble the Reservation to Insert/Create
        $fb = new User();
        $fb->setUserId($_POST["userid"]);
        $fb->setFirstName($_POST["firstname"]);
        $fb->setLastName($_POST["lastname"]);
        $fb->setPassword($_POST["password"]);
        //$fb->setDeptID($_POST["deptID"]);
        //Send the Reservation to the DAO for creation
        UserDAO::createUser($fb);
    }    
        
}

//If there was a delete that came in via GET
if (isset($_GET["action"]) && $_GET["action"] == "delete")  {
    //Use the DAO to delete the corresponding Feedback
    UserDAO::deleteUser($_GET["userid"]);
}

// Display the header (remeber to set the title/heading)
// Call the HTML header

Page::header();

// List all reservations.
// Note: You need to use the results from the corresponding DAO that gives you the reservation list
$cars = UserDAO::getUsers();
Page::listuser($cars);


//If there was a edit that came in via GET
if (isset($_GET["action"]) && $_GET["action"] == "edit")  {
    // Use the DAO to pull that specific reservation
    // Hint: notice the url link for delete.... you should have something similar with edit
    // And you can access it through $_GET
    $singleResult = UserDAO::getUser($_GET["userid"]);
    
    // Render the  Edit Section form with the reservation to edit. 
    // Rememver to use the correct DAO to get the facility list
    Page::edituserForm($singleResult);
} else {
    // Otherwise, it is a create reservation form
    Page::createUser();
}

// Finally I need to call the last function from the HTML
Page::footer();

