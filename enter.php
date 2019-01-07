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
    
    <form method="post" action="process.php">
        <fieldset>
    <legend>
        <label>About You</label>
    </legend>
    <label for="firstname">First name</label>
    <input type="text" name="firstname" id="firstname" required />
    <label for="lastname">Last name</label>
    <input type="text" name="lastname" id="lastname" />
    <label for="email">Email address </label>
    <input id="email" name="email" type="email" required>
    </fieldset>
    <fieldset>
    <legend>
        <label>Questions</label>
    </legend>
    <?php
        $sql = "select question, Qu_post, Date_text, id
                from cato JOIN main on (catID = comid)
                WHERE comid = 4";
    $num = 1;
    $queryResult = doSqlComps($sql, $link);
    while ($rowObj = $queryResult->fetchObject()) {
        $Qu_post = $rowObj->Qu_post;
        $Date_text = $rowObj->Date_text;
        $id =  $rowObj->id;
            $qMark = "?";
        
            $qutext = $rowObj->question;
            $dash = "-";
            echo "<label for=$id><span class='ans'> $Date_text</span>, Question $num $dash $qutext$qMark</label>
            <textarea name='question[]' id=$id rows='5' cols='35' required></textarea>
    ";
            $num = $num + 1;
        }

    ?>
    </fieldset>
    <input type="submit" value="send it!">
    </form>
