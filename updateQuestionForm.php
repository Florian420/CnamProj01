<!DOCTYPE html>

<html lang="fr">
<head>
    <meta charset="utf-8"/>
    <title>quiz.io | Modifier les questions</title>
    <meta name="Description" content="Test tes connaissances !"/>
    <meta name="Title" content="quiz.io"/>
    <meta name="Author" content="YBE"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="css/sign.css"/>
    <link rel="stylesheet" href="css/style.css"/>
    <link rel="icon" href="quiz.png"/>

    <!--[if lt IE 9]>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <script src="https://use.fontawesome.com/9579361f48.js"></script>
</head>

<body class="text-center">
<?php 
 include("header.php");
 include("config.php");
 require "questionManager.php";
 $questionManager = new QuestionManager($DB);
 $question = $questionManager->getQuestion($_GET["idquestion"]);
 ?>
<div class="container">
<form  method="POST"  action="">
<div class="form-group">
    <input type="textArea" class="form-input" name="question" id="reponse" placeholder="Question" value="<?php echo $question["libelleQuestion"]; ?>"/>
</div>

<div class="form-group">
    <?php 
    $reponses = $questionManager->getReponse($question["idQuestion"]);
    ?>

<?php foreach($reponses as $reponse) { ?>
       <div class="row">
       <div class="col-12">
       <input type="text" value="<?php echo $reponse["libelleReponse"] ?>" name="<?php echo $reponse["idReponse"] ?>"/> 
       <input type="checkbox" name="isTrue<?php echo $reponse["idReponse"]; ?>" <?php if($reponse["isTrue"] == 1){echo "checked";} ?> style="display: inline-block;">
       </div>
       </div>
       <?php } ?>
</div>
<div class="form-group">
    <input type="submit" name="submit" id="submit" class="form-submit" value="Sauvegarder" />
</div>
<?php
    if(isset($_POST["submit"]))
    {
      $questionManager->updateQuestion($question["idQuestion"], $_POST["question"]);

     foreach($reponses as $reponse) {
      $libelleReponse = $_POST[$reponse["idReponse"]];
      $questionId = $question["idQuestion"];
      if (isset($_POST['isTrue'.$reponse["idReponse"]])) {
        $istrue = 1;
      } else {
        $istrue = 0;
      }

      $questionManager->updateReponse($reponse["idReponse"], $libelleReponse, $istrue);
     }
     $delai = 1; 
     $url = 'updateQuestionForm.php?idquestion='.$question["idQuestion"];
     header("Refresh: $delai;url=$url");
   
    }
?>
</form>
</div>

<?php 
include("footer.php");
?>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>