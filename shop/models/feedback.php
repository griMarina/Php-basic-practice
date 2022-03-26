<?php

function getFeedback() {
    return getAssocResult("SELECT * FROM feedback ORDER BY id DESC"); 
}