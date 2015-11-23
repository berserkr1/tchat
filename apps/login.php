<?php
if(count($errors)>0){
    for($i = 0; $i < count($errors); $i++){
        require('./views/login/errors/'.$errors[$i].'.phtml');
    }
}
require('./views/login.phtml');



	