<?php
//include("connection");

function check_loginParent($con){
    if(isset($_SESSION['email']))
    {
        $em = $_SESSION['email'];
        $query = "select * from parent where email = '$em' limit 1";
        $result = mysqli_query( $con , $query);
        if( $result && mysqli_num_rows($result) > 0)
        {
            $user_data = mysqli_fetch_assoc($result);
            return $user_data;
        }
    }

    //redirect to login
    header("Location: login.php");
    die;

}

function check_loginBabysitter($con){
    if(isset($_SESSION['email']))
    {
        $nat_id = $_SESSION['email'];
        $query = "select * from babysitter where email = '$nat_id' limit 1";
        $result = mysqli_query( $con , $query);
        if( $result && mysqli_num_rows($result) > 0)
        {
            $user_data = mysqli_fetch_assoc($result);
            return $user_data;
        }
    }

    //redirect to login
    header("Location: login.php");
    die;

}

function getRequests(){
    global $con;
    $query = "SELECT *
    FROM request
    INNER JOIN parent ON request.parent_id=parent.parent_id;";
    return mysqli_query( $con  , $query);
}

function getBookings(){
    global $con;
    $query = "SELECT bookings.booking_id, bookings.review , bookings.rating , request.* , offer.offer_id , offer.babysitter_id , offer.price , offer.status
    FROM bookings
     INNER JOIN request ON request.request_id = bookings.request_id 
     INNER JOIN offer ON request.request_id = offer.request_id";
    return mysqli_query( $con  , $query);
}
function getCurrentBookings(){
    global $con;
    $query = "SELECT bookings.booking_id, bookings.review , bookings.rating , request.* , offer.offer_id , offer.babysitter_id , offer.price , offer.status , parent.parent_id , babysitter.sitter_image , babysitter.name
    FROM bookings
     INNER JOIN request ON request.request_id = bookings.request_id && request.date >= (CAST(CURRENT_TIMESTAMP AS DATE))
     INNER JOIN offer ON request.request_id = offer.request_id
       INNER JOIN parent ON request.parent_id = parent.parent_id
       INNER JOIN babysitter ON offer.babysitter_id = babysitter.national_ID ";
    return mysqli_query( $con  , $query);
}
/*function getcurrentBookings()
{
    global $con;
    $query = "SELECT bookings.booking_id, bookings.review , bookings.rating , request.* , offer.offer_id , offer.babysitter_id , offer.price , offer.status
    FROM bookings
     INNER JOIN request ON request.request_id = bookings.request_id && request.date >(CAST(CURRENT_TIMESTAMP AS DATE));
     INNER JOIN offer ON request.request_id = offer.request_id";
    return mysqli_query( $con  , $query);    
}
*/

function geprevtBookings(){ //use if there is prev in database 
    global $con;
    $query = "SELECT bookings.booking_id, bookings.review , bookings.rating , request.* , offer.offer_id , offer.babysitter_id , offer.price , offer.status , babysitter.sitter_image , babysitter.name 
    FROM bookings
     INNER JOIN request ON request.request_id = bookings.request_id && request.date < (CAST(CURRENT_TIMESTAMP AS DATE))
     INNER JOIN offer ON request.request_id = offer.request_id 
     INNER JOIN babysitter ON offer.babysitter_id = babysitter.national_ID";
    return mysqli_query( $con  , $query);
}

function getCurrentoffers(){ //
    global $con;
    $query = "SELECT offer.*, babysitter.* , request.* 
    FROM offer
     INNER JOIN babysitter ON babysitter.national_id = offer.babysitter_id
     INNER JOIN request ON offer.request_id = request.request_id && request.date >= (CAST(CURRENT_TIMESTAMP AS DATE)) ";
    return mysqli_query( $con , $query);
}
function getoffers(){
    global $con;
    $query = "SELECT offer.*, babysitter.* , request.* 
    FROM offer
     INNER JOIN babysitter ON babysitter.national_id = offer.babysitter_id
     INNER JOIN request ON offer.request_id = request.request_id;";
    return mysqli_query( $con  , $query);
}
function getPrevoffers(){ //
    global $con;
    $query = "SELECT offer.*, parent.* , request.* 
    FROM offer
     INNER JOIN babysitter ON babysitter.national_id = offer.babysitter_id
     INNER JOIN request ON offer.request_id = request.request_id && request.date < (CAST(CURRENT_TIMESTAMP AS DATE))
     INNER JOIN parent ON offer.request_id = request.request_id && request.date < (CAST(CURRENT_TIMESTAMP AS DATE)) ;";
    return mysqli_query( $con  , $query);
}

function getPrevBookingsforID($id){
    global $con;
    $query = "SELECT bookings.booking_id, bookings.review , bookings.rating , request.* , offer.offer_id , offer.babysitter_id , offer.price , offer.status , parent.parent_id , parent.parent_image , babysitter.sitter_image , babysitter.name
    FROM bookings
     INNER JOIN request ON request.request_id = bookings.request_id && request.date < (CAST(CURRENT_TIMESTAMP AS DATE))
     INNER JOIN offer ON request.request_id = offer.request_id
       INNER JOIN parent ON request.parent_id = parent.parent_id
       INNER JOIN babysitter ON offer.babysitter_id = babysitter.national_ID WHERE babysitter.national_ID=$id ";
    return mysqli_query( $con  , $query);
}
 
function getPrevBookingsforID2($id){
    global $con;
    $query = "SELECT bookings.booking_id, bookings.review , bookings.rating , request.* , offer.offer_id , offer.babysitter_id , offer.price , offer.status , parent.parent_id , parent.parent_image , babysitter.sitter_image , parent.name
    FROM bookings
     INNER JOIN request ON request.request_id = bookings.request_id && request.date < (CAST(CURRENT_TIMESTAMP AS DATE))
     INNER JOIN offer ON request.request_id = offer.request_id
       INNER JOIN parent ON request.parent_id = parent.parent_id
       INNER JOIN babysitter ON offer.babysitter_id = babysitter.national_ID WHERE babysitter.national_ID=$id ";
    return mysqli_query( $con  , $query);
}

///////////////////// delete these 2 at the end if not used,, they didnt work well with me!
function  createConfirmationmbox() {  
    echo '<script type="text/javascript"> ';  
    echo ' function openulr(newurl) {';  
    echo '  if (confirm("Are you sure you want to Delete?")) {';  
    echo '    document.location = newurl;';  
    echo '  }';  
    echo '}';  
    echo '</script>';  
}   


function myFunction() {
    echo "<script>";
    echo "return confirm('Are you sure?');";
    echo "</script>";
}

/*function conflict( $s , $e , $id2 , $d){
    global $con;
    $query = "SELECT bookings.booking_id, bookings.review , bookings.rating , request.* , offer.offer_id , offer.babysitter_id , offer.price , offer.status , parent.parent_id , parent.parent_image , babysitter.sitter_image , babysitter.name
    FROM bookings
     INNER JOIN request ON request.request_id = bookings.request_id AND request.date < (CAST(CURRENT_TIMESTAMP AS DATE)) AND ($s < request.start_time or $s > request.end_time) AND ($e < request.start_time or $e> request.end_time) AND request.date=$d 
     INNER JOIN offer ON request.request_id = offer.request_id
       INNER JOIN parent ON request.parent_id = parent.parent_id
       INNER JOIN babysitter ON offer.babysitter_id = babysitter.national_ID WHERE babysitter.national_ID=$id2 ";
    return mysqli_query( $con  , $query);
}*/


?>