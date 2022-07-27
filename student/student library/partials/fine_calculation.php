<?php
function dayCalculationFromSeconds($seconds)
{
    $day = floor($seconds / (60 * 60 * 24));
    return $day;
}
// db connection already include in the file which include this file

$sid = $_SESSION['sid'];
// Checking expired or not (Making expired to the books that cross return_date)
$sql = "SELECT * FROM issue_book WHERE approve='yes' AND sid='$sid'";
$stmt = $conn->prepare($sql);
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_OBJ);
$curr_date = date("Y-m-d");

foreach ($result as $row) {
    if ($curr_date > $row->return_date) { // checking if the issued book is expired
        $sql = "UPDATE issue_book SET approve = 'expired' WHERE issueBook_id = '$row->issueBook_id'"; // setting yes to expired
        $stmt = $conn->prepare($sql);
        $stmt->execute();
    }
}




// Selecting those issued books which are expired and fine is not added to them
$sql = "SELECT * FROM issue_book WHERE sid='$sid' AND approve='expired' AND fine_added='no'";
$stmt = $conn->prepare($sql);
$stmt->execute();


while ($row = $stmt->fetch(PDO::FETCH_OBJ)) {
    // Fine calculation
    $curr_date = strtotime(date("Y-m-d"));
    $issued_date = strtotime($row->return_date);
    $diffInDay = dayCalculationFromSeconds($curr_date - $issued_date);
    $fine = $diffInDay * 10;
    // Insert them into the fine table
    $sql = "INSERT INTO `fine` (`sid`, `bid`, `issueBook_id`, `day`, `fine_amount`, `status`) VALUES ('$sid', '$row->bid', '$row->issueBook_id', '$diffInDay', '$fine', 'not paid'); ";
    $stmt2 = $conn->prepare($sql);
    $stmt2->execute();

}
// Setting fine_added = 'yes' after inserting fine to fine table
$sql = "UPDATE `issue_book` SET `fine_added` = 'yes' WHERE sid = '$sid' AND fine_added='no'";
$stmt3 = $conn->prepare($sql);
$stmt3->execute();




// Updation
// For updaing the fine
$sql = "SELECT * FROM issue_book WHERE sid = '$sid' AND fine_added='yes'";
$stmt = $conn->prepare($sql);
$stmt->execute();


// fine table contains the issueBook_id . so,
while ($row = $stmt->fetch(PDO::FETCH_OBJ)) {
    // Joining the table issue_book and fine by issueBook_id
    // This will only select one record corresponding to current row
    $sql = "SELECT * FROM `fine` INNER JOIN issue_book ON fine.issueBook_id = issue_book.issueBook_id WHERE fine.issueBook_id = '$row->issueBook_id' AND fine.status='not paid'";
    $stmt2 = $conn->prepare($sql);
    $stmt2->execute();
    $row2 = $stmt2->fetch(PDO::FETCH_OBJ);

    if($row2){
    // Re-calculating the fine
    $curr_date = strtotime(date("Y-m-d"));
    $issued_date = strtotime($row2->return_date);
    $diffInDay = dayCalculationFromSeconds($curr_date - $issued_date);
    $fine = $diffInDay * 10;
    // $row->issue_date compare with current date 
    // and update in fine table's fine amount where issueBook_id = '$row->issueBook_id';

    // Updating the fine and day
    $sql = "UPDATE `fine` SET `fine_amount` = '$fine',`day`='$diffInDay' WHERE `fine`.`fine_id` = $row2->fine_id";
    $stmt3=$conn->prepare($sql);
    $stmt3->execute();
}

}



// Total fine calculation
$sql = "SELECT `fine_amount` FROM `fine` WHERE sid='$sid' AND fine.status='not paid'";
$stmt=$conn->prepare($sql);
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_OBJ);

$totalFine = 0 ;
foreach ($result as $row) {
    $totalFine += $row->fine_amount;
}
$_SESSION['totalFine'] =$totalFine;
