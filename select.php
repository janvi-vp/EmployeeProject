<?php
    session_start();
    if(isset($_SESSION["desig"])) {
        if($_SESSION["desig"] == "Teacher") {
?>
    <form>
        <!-- sjgusrbg -->
    </form>
<?php
        } else {
?>
    <form>
        <!-- Lab assistant -->
    </form>
<?php
        }
    }
?>
