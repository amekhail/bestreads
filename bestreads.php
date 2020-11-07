<?php
// Adam Mekhail
if(empty($_GET)){
    // File name: bestreads.php
    $bookArray = glob ( './books/*' );
    // print_r($bookArray);
    echo json_encode ( $bookArray );
}
else {
    $book = $_GET['book'];
    $bookArray = glob ( './books/*' );
    echoInformation($bookArray[$book]);
}

function echoInformation($book) {
    $img = "<img src='" . $book . "/cover.jpg'" . "alt='not found'>";
    
    $bookDesc = file($book . "/description.txt");
    $bookInfo = file($book . "/info.txt");
    $bookReview = file($book . "/review.txt");

    
    $info = "<b>  $bookInfo[0] </b><br> $bookInfo[1] <br><br>";
    $desc =  "$bookDesc[0]<br><br>";
    $reviewText = "<b>" . $bookReview[0] . " ";
    for ($i = 0; $i < $bookReview[1]; $i++) {
        $reviewText .= "*";
    }
    $reviewText .= "</b><br>" . $bookReview[2];

    $entireDescrition = $img . $info . $desc . $reviewText;


    $oneGiantHTMLstring = "<div class='onereview'> $entireDescrition </div>";
    echo $oneGiantHTMLstring;
}





?>