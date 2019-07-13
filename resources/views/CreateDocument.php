<?php 
$isAjax = (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest');
if(!$isAjax):?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?= $pageTitle?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="css/formStyle.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="css/bootstrap.min.css"/>
    <script src="js/addInput.js"></script>
</head>
<body>
<?php endif; ?>
<?php 
    if($isAjax){
       echo '<script src="js/addInput.js"></script>';
    }
?>
<div class="container">
    <h2 ><?= $pageTitle?><span></span></h2></br>
    <?php 
        if(isset( $errorMessage['addError'])){
            echo '<span class="error">' . $errorMessage['addError'] . '</span></br>'; 
        }
    ?>
    <a class="backBtn" href="index.php?controller=Document&action=default&document_type=<?php echo $documentType ?>&id_library=<?php echo $idLibrary ?>">Liste des documents</a>
    <form class="documentForm" role="form" action="<?= $action?>" method="post" enctype="multipart/form-data">
        <?php
            if(isset($errorMessage['documentTypeError'])){
                echo '<span class="error">' . $errorMessage['documentTypeError'] . '</span></br>';
            }
            if(isset($errorMessage['errorUpdate'])){
                echo '<span class="error">' . $errorMessage['errorUpdate'] . '</span></br>';
            }
            if(isset($_POST['submitted']) && isset($errorMessage)){
                if(empty($errorMessage)){
                    echo '<span class="success"> Document Ajouté avec succès</span></br>';
                }
            }
        ?>
        <p>Type de document:</p>
        <div id="radioInput">
            <input type="radio" onclick="addInputDictionnary()" value="dictionnaire" <?php if($documentType == 'dictionnaire'): echo 'checked'; endif; ?> id="dictionnary" name="documentType">
            <label for="dictionnary">Dictionnaire</label>

            <input type="radio" onclick="addInputReview()" value="revue" <?php if($documentType == 'revue'): echo 'checked'; endif; ?> id="review" name="documentType">
            <label for="review"> Revue </label>

            <input type="radio" onclick="addInputRoman()" value="roman" <?php if($documentType == 'roman'): echo 'checked'; endif; ?> id="roman"  name="documentType">
            <label for="roman">Roman</label>

            <input type="radio" onclick="addInputGuide()" value="manuel" <?php if($documentType == 'manuel'): echo 'checked'; endif; ?> id="guide" name="documentType">
            <label for="guide">Manuel</label></br>
        </div>
        <div id="textInput">
            <?php
                if(isset($errorMessage['priceError'])){
                    echo '<span class="error">' . $errorMessage['priceError'] . '</span></br>';
                }
            ?>
            <label for="price">Prix:</label>
            <input class="form-control" type="text" value="<?= $price?>" id="price" name="price" ></br>
            <?php
                if(isset($errorMessage['titleError'])){
                    echo '<span class="error">' . $errorMessage['titleError'] . '</span></br>';
                }
            ?>
            <label for="title">Titre:</label>
            <input class="form-control" type="text" value="<?= $title?>" id="title" name="title"></br>
            <?php
                if(isset($errorMessage['imageError'])){
                    echo '<span class="error">' . $errorMessage['imageError'] . '</span></br>';
                }
            ?>
            <label for="image">Image:</label>
            <input type="file" id="image" name="image"></br>
            <div id="divDictionnary" style="display:<?php if($documentType == 'dictionnaire'){echo 'block';}else{echo 'none';}?>">
            <?php
                    if(isset($errorMessage['languageError']) && $documentType == 'dictionnaire'){
                        echo '<span class="error">' . $errorMessage['languageError'] . '</span></br>';
                    }
            ?>
                <label for="language">Langue:</label>
                <input class="form-control" type="text" value="<?= $language?>" id="language" name="language"></br>
            </div>
            <div id="divReview" style="display:<?php if($documentType == 'revue'){echo 'block';}else{echo 'none';}?>">
                <?php
                    if(isset($errorMessage['monthError']) && $documentType == 'revue'){
                        echo '<span class="error">' . $errorMessage['monthError'] . '</span></br>';
                    }
                ?>
                <label for="month">Mois:</label>
                <input class="form-control" type="text" value="<?= $month?>" id="month" name="month"></br>
                <?php
                    if(isset($errorMessage['yearError']) && $documentType == 'revue'){
                        echo '<span class="error">' . $errorMessage['yearError'] . '</span></br>';
                    }
                ?>
                <label for="year">Année:</label>
                <input class="form-control" type="text" value="<?= $year?>" id="year" name="year"></br>
            </div>
            <div id="divRoman" style="display:<?php if($documentType == 'roman'){echo 'block';}else{echo 'none';}?>">
                <label for="literaryPrice">Prix littéraire:</label>
                <input class="form-control" type="text"  value="<?= $literaryPrice?>" id="literaryPrice" name="literaryPrice"></br>
            </div>
            <div id="divGuide" style="display:<?php if($documentType == 'manuel'){echo 'block';}else{echo 'none';}?>">
                <?php
                    if(isset($errorMessage['schoolLevelError']) && $documentType == 'manuel'){
                        echo '<span class="error">' . $errorMessage['schoolLevelError'] . '</span></br>';
                    }
                ?>
                <label for="schoolLevel">Niveau scolaire:</label>
                <input class="form-control" type="text"  value="<?= $schoolLevel?>" id="schoolLevel" name="schoolLevel"></br>
            </div>
            <div id="divRomanAndGuide" style="display:<?php if($documentType == 'roman' || $documentType == 'manuel'){echo 'block';}else{echo 'none';} ?>">
                <?php
                    if(isset($errorMessage['authorError']) && $documentType == 'roman'){
                        echo '<span class="error">' . $errorMessage['authorError'] . '</span></br>';
                    }elseif(isset($errorMessage['authorError']) && $documentType == 'manuel'){
                        echo '<span class="error">' . $errorMessage['authorError'] . '</span></br>';
                    }
                ?>
                <label for="author">Auteur:</label>
                <input class="form-control" type="text" value="<?= $author?>" id="author" name="author"></br>
                <?php
                    if(isset($errorMessage['numberOfPageError']) && $documentType == 'roman'){
                        echo '<span class="error">' . $errorMessage['numberOfPageError'] . '</span></br>';
                    }elseif(isset($errorMessage['numberOfPageError']) && $documentType == 'manuel'){
                        echo '<span class="error">' . $errorMessage['numberOfPageError'] . '</span></br>';
                    }
                ?>
                <label for="numberOfPage">Nombre de page:</label>
                <input class="form-control" type="text" value="<?= $numberOfPage?>" id="numberOfPage" name="numberOfPage"></br>
                <?php
                    if(isset($errorMessage['isbnError']) && $documentType == 'roman'){
                        echo '<span class="error">' . $errorMessage['isbnError'] . '</span></br>';
                    }elseif(isset($errorMessage['isbnError']) && $documentType == 'manuel'){
                        echo '<span class="error">' . $errorMessage['isbnError'] . '</span></br>';
                    }
                ?>
                <label for="isbn">Isbn:</label>
                <input class="form-control" type="text" value="<?= $isbn?>" id="isbn" name="isbn"></br>
            </div>
            <input class="btn btn-lg btn-success" id="createBtn" type="submit" value="<?= $submitValue ?>"></br>
            <input type="hidden" name="submitted" >
        </div> 
    </form>    
</div>
<?php if(!$isAjax):?>
</body>
</html>
<?php endif; ?>