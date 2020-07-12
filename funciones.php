
<?php
    function cambiar_color($color)
    {
        switch ($color) {
            case 1:
                echo "<body style='background-color:red'>";
            break;
            case 2:
                echo "<body style='background-color:blue'>";
            break;
            case 3:
                echo "<body style='background-color:green'>";
            break;
            case 4:
                echo "<body style='background-color:orange'>";
            break;
            case 5:
                echo "<body style='background-color:yellow'>";
            break;
            default:
                echo "<body style='background-color:white'>";
            }
    }   
?>
