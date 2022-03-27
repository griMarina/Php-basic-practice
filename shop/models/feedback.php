<?php

function getFeedback() {
    return getAssocResult("SELECT * FROM feedback ORDER BY id DESC"); 
}

function getFeedbackMessage($status) {
    
    $messages = [
        "ok" => "Your message has been sent!",
        "delete" => "The message was deleted!",
        "edit" => "Your message has been changed.",
        "error" => "Error. Something went wrong :(",
        "" => "Please, leave your feedback here."
    ];

    return $messages[$status];
}

function addFeedback() {
    $name = strip_tags(htmlspecialchars(mysqli_real_escape_string(getDb(), $_POST["name"])));
    $text = strip_tags(htmlspecialchars(mysqli_real_escape_string(getDb(), $_POST["text"])));
    
    executeSql("INSERT INTO feedback(name, text) VALUES ('$name', '$text')");

    $status = "ok";
    header("Location:/feedback/?status=$status");
    die();
}

function deleteFeedback() {
    $id = (int)$_GET['id'];

    executeSql("DELETE FROM feedback WHERE id=$id");
   
    $status = "delete";
    header("Location:/feedback/?status=$status");
    die();
}

function editFeedback() {
    $id = (int)$_GET['id'];
    $result = getOneResult("SELECT * FROM feedback WHERE id=$id");
    $buttonText = "Edit message";
    $actionFeedback = "save";
   
    return [
        "result" => $result,
        "buttonText" => $buttonText,
        "actionFeedback" => $actionFeedback
    ];

}

function saveFeedback() {
    $id = (int)$_POST['id'];

    $name = strip_tags(htmlspecialchars(mysqli_real_escape_string(getDb(), $_POST["name"])));
    $text = strip_tags(htmlspecialchars(mysqli_real_escape_string(getDb(), $_POST["text"])));

    executeSql("UPDATE feedback SET name='$name', text='$text' WHERE id = $id");
   
    $status = "edit";
    header("Location:/feedback/?status=$status");
    die();
}

function doFeedbackAction($action) {
    switch($action) {
        case "add":
            addFeedback();
        case "delete":
            deleteFeedback();
        case "edit":
            return editFeedback();
        case "save":   
            saveFeedback();
    }
    return [
        "result" => ["id" => "", "name" => "", "text" => ""],
        "buttonText" => "Add message",
        "actionFeedback" => "add"
    ];
}