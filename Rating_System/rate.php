<?php
// disable the catch from the client browser
header("Cache-Control: no-cache");
require_once 'database.php';
include '../autoloader.php';
require_once './Model/Ratings.php';
$db = Database::getDB();
$units = Database::unit();
$getRollId = Project\Auth\models\AuthModel::getUser('roleId');
if($getRollId===false)
{
    echo "Please Login First to Rate the movies !! Thank You.";
}
else
{
 $ip =\Project\Auth\models\AuthModel::getUser('id');

//getting id of movie-1,2,3 which one is click that id from the rating.js page
$id_sent = preg_replace("/[^0-9]/","",$_REQUEST['id']);

//Take the value of star based on user select Ex-user select 1-5 star take that value
$vote_sent = preg_replace("/[^0-9]/","",$_REQUEST['stars']);

// Get The IP address of the local server host machine.

//$ip =$_SERVER['REMOTE_ADDR'] ;

$getIP = new Ratings();
$getIP ->getRating_IP($id_sent);

// kill the script
if ($vote_sent > $units)
{
    die("Sorry, vote appears to be invalid.");
}

$disAll = new Ratings();
$numbers = $disAll->displayValues($id_sent);

$checkIP = unserialize($numbers['used_ips']);

$count = $numbers['total_votes'];   //Grab total votes from database column
$current_rating = $numbers['total_value'];  //total number of rating added together and stored
$sum = $vote_sent+$current_rating;      // add together the current vote value and the total vote value

$tense = ($count==1) ? "vote" : "votes";    //plural form votes/vote

// checking to see if the first vote has been tallied
// or increment the current number of votes
($sum==0 ? $added=0 : $added=$count+1);

// if it is an array i.e. already has entries the push in another value

((is_array($checkIP)) ? array_push($checkIP,$ip) : $checkIP=array($ip));
$insertIP=serialize($checkIP);  //it serialize IP to {i:0;s:9:"127.0.0.1} this formate


//IP check when voting if there is no cookie then create the cookie
if(!isset($_COOKIE['rating_'.$id_sent])) //concatenating rating_ with whichever user select movie from the list
{
    $usedIp=new Ratings();
    $voted = $usedIp->usedIP($ip,$id_sent);
}
else
{
    $voted=1;
}
//var_dump($id_sent);
if(!$voted) {     //if the user hasn't yet voted, then vote normally...

    if (($vote_sent >= 1 && $vote_sent <= $units))  // keep votes within range, make sure IP matches
    {

        $updateRate = new Ratings();
        $result = $updateRate->updateRating($added,$sum,$insertIP,$id_sent);

        if($result)
       {
           setcookie("rating_".$id_sent,1, time()+ 2592000,'/');
       }
    }
} //end for the "if(!$voted)"

// these are new queries to get the new values!


$disAll = new Ratings();
$numbers = $disAll->displayValues($id_sent);

//$numbers = mysql_fetch_assoc($newtotals);
$count = $numbers['total_votes'];  //how many votes total
$current_rating = $numbers['total_value'];  //total number of rating added together and stored
$tense = ($count==1) ? "vote" : "votes";  //plural form votes/vote

// $new_back is what gets 'drawn' on your page after a successful 'AJAX/Javascript' vote

if($voted)
{
    $sum = $current_rating; //storing total_value from database to new varibale
    $added = $count; //storing total_votes from database to new varibale
}

$new_back = array();

for($i=0;$i<5;$i++)
{
    $j = $i + 1;

    if ($i < @number_format($current_rating / $count, 1) - 0.5)
    {
        $class = "ratings_stars ratings_vote";

    }
    else {
        $class = "ratings_stars";
    }

    $new_back[] .= '<div class="star_' . $j . ' ' . $class . '"></div>';

}

$new_back[] .= ' <div class="total_votes"><p class="voted"> Rating: <strong>'.@number_format($sum/$added,1).'</strong>/'.$units.' ('.$count.' '.$tense.' cast) ';

if(!$voted)
{
    $new_back[] .= '<span class="thanks">Thanks for voting!</span></p>';
}

else
{
    $new_back[] .= '<span class="invalid">Already voted for this item</span></p></div>';
}
$newResult = join("\n", $new_back);

// ========================


$output = $newResult;
echo $output;

}
?>