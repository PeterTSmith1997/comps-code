<!DOCTYPE html>

<html lang="en">

<head>

    <script>

        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){

                (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),

            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)

        })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');



        ga('create', 'UA-55673568-5', 'auto');

        ga('send', 'pageview');



    </script>

    <?php

    include_once '../includes/database_conn.php';

    ?>
    <meta charset="UTF-8">

    <link href="../css/main.css" rel="stylesheet" type="text/css">

    <meta name = "viewport" content="width=device-width, maximum-scale=1.0"/>

    <link rel="icon" href="../images/favicon.ico" type="image/x-icon"/>

    <title>Competitions - Genealogy Research Assistance</title>

</head>

<body>

<?php
include '../includes/navBar.php';
?>
<main>

    <h1 id="home"> Enter our current competitions</h1>


    <?php

    require_once '../includes/functions.php';
    
    ?>
    <?php
 $fname = $_REQUEST['firstname'];
 $lname = $_REQUEST['lastname'];
 $email = $_REQUEST['email'];
 require_once  '../includes/database_conn.php';      // make db connection
 addPerson($fname, $lname, $email);
 
    $conn = getConnetionComps();

 $questions = $_REQUEST['question'];
 $quNum =1;
 foreach ($questions as $question){
     $question =  filter_var($question, FILTER_SANITIZE_STRING);
     $data = [
            'email' => $email,
            'ans' => $question,
            'num' => $quNum,
         ];
        $sql = "INSERT INTO peoplesAns (email, answer, qunum) VALUES (:email, :ans, :num)";
        $stmt = $conn->prepare($sql);
        $stmt->execute($data);
        $quNum ++;
 }
 echo "Hi $fname Thanks for taking part we hope you enjoyed it. Your answers have been recorded";
?>
