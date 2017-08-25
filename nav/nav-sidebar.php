<div class="col-sm-2 col-md-2">
    <?php if ($_SESSION['role'] == 'headmaster'){ ?>

    <ul class="nav nav-tabs nav-stacked">
        <li>
            <a href="../index.php">Home | Class List</a>
        </li>
        <li><a href="school-statistics.php">School Statistics</a></li>
        <li><a href="enable-report.php">Enable Report Access</a></li>
    </ul>

    <?php }

    if ($_SESSION['role'] == 'teacher') {
        ?>
        <ul class="nav nav-tabs nav-stacked">
            <li>
                <a href="index.php">Home</a>
            </li>
            <li><a href="add-new-student.php">Add New Student</a></li>
        </ul>
    <?php }
    ?>

</div>