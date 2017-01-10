<?php

//use Project\Classes\DB\DB;
class Ratings
{
    public function getRating_IP($id_sent)
    {
        //connect to database :
        $db = Database::getDB();
        $selectStatment = "SELECT rating_id FROM ratings WHERE rating_id ='$id_sent'";
        $q = $db->prepare($selectStatment);

        $query = $q->execute();

        //Take the id of the movie and compare that id with databse id if it's already exist
        //then don't allow user to add the same id to database and if not exist then add to database
        if(empty($q->fetch()))
        {

            $addQuery = "insert into ratings (rating_id,date) values ('$id_sent',curdate())";
            $addStatment = $db->prepare($addQuery);
            $addStatment ->execute();

        }

    }
    public function displayValues($id_sent)
    {
        //connect to database :
        $db = Database::getDB();
        // total_votes means how many peoples have voted this movies and total_value how much they have rated grab that value from database
        $stm = "SELECT total_votes, total_value, used_ips FROM ratings WHERE rating_id='$id_sent' ";
        $query= $db->prepare($stm);
        $query->execute();

        //$numbers = $db->fetch(PDO::FETCH_ASSOC);

        $number  = $query->fetch(PDO::FETCH_ASSOC);
        $query->closeCursor();
        return $number;
    }
    public function usedIP($ip,$id_sent)
    {
        //connect to database :
        $db = Database::getDB();
        $query = "SELECT used_ips FROM ratings WHERE used_ips LIKE '%".$ip."%' AND rating_id =' ".$id_sent."' ";
        $votedIP = $db->prepare($query);
        $vote = $votedIP->execute();
        $vote= $votedIP->fetch();
        $votedIP->closeCursor();
        return $vote;
    }
    public function updateRating($added,$sum,$insertIP,$id_sent)
    {
        //connect to database :
        $db = Database::getDB();
        $updateQuery = "UPDATE ratings SET total_votes='".$added."', total_value='".$sum."', used_ips='".$insertIP."' WHERE rating_id='$id_sent'";
        $update = $db->prepare($updateQuery);
        $results = $update->execute();
        $update->closeCursor();
        return $results;
    }
    public function displayRating_user($id)
    {
        //connect to database :
        $db = Database::getDB();
        $query = "SELECT total_votes, total_value FROM ratings WHERE rating_id = '$id'";
        $queryPre = $db ->prepare($query);
        $result = $queryPre->execute();
        //  $result = $queryPre->fetch();
        $rows = $queryPre->fetch(PDO::FETCH_ASSOC);
        $queryPre->closeCursor();
        return $rows;
    }

                    /*
                     * ===Admin Part===
                     *
                     */

    public function displayRatings()
    {
        //connect to database :
        $db = Database::getDB();
        //once connected execute below query.

        $sql = "SELECT * FROM ratings ORDER BY date ASC";
        $statement1 = $db->prepare($sql);
        $statement1->execute();
        $selectResults= $statement1->fetchAll();
        $statement1->closeCursor();

        return $selectResults;
    }

    public function editRating($rating_id)
    {
        //connect to database :
        $db = Database::getDB();
        //Execute the Query
        $sql = "SELECT * FROM ratings WHERE rating_id = '$rating_id'";
        $result = $db->prepare($sql);
        $result->execute();
        $editRatings = $result->fetch();
        $result->closeCursor();
        return $editRatings;
    }
    public function deleteMovie($rating_id)
    {
        //connect to database :
        $db = Database::getDB();
        //Execute the Query
        $query = "DELETE FROM ratings
          WHERE rating_id = '$rating_id' ";
        $deletedMovies= $db->prepare($query);
        $deletedMovies->execute();
        $deletedMovies->closeCursor();
        
    }
    public function ratingUpdate($total_votes,$total_value,$used_ips,$date,$rating_id)
    {
        //connect to database :
        $db = Database::getDB();
        //Execute the Query
        $query = "UPDATE ratings SET total_votes ='$total_votes',total_value='$total_value',used_ips ='$used_ips',date='$date' WHERE rating_id = '$rating_id'";
        $ratingUpdateQuery= $db->prepare($query);
        $ratingUpdateQuery->execute();
        $ratingUpdateQuery->closeCursor();
    }
}