<?php
$sql = "SELECT * FROM `class_type` WHERE `id`<> 5 ORDER BY `myorder`";
$result = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_assoc($result)) {
    $id = $row['id'];

    ?>

        <div id="class_module<?php echo $id; ?>" class="class_mod">
            <ul class="class_list" id="second_col_class">

                <?php
$csql = "SELECT * FROM `classes` WHERE `class_type`=$id";
    $cresult = mysqli_query($conn, $csql);
    while ($crow = mysqli_fetch_assoc($cresult)) {
        $c_id = $crow['id'];
        $class_name = ucwords(strtolower($crow['class_name']));

        ?>
                            <li class="class_list_item show_class_pic" id="col_2||entry_<?php echo $c_id; ?>">
                                <div class="hover">
                                    <div class="class_name">
                                        <?php echo $class_name; ?>
                                    </div>
                                    <div class="choc_bar"></div>
                                </div>
                            </li>
                        <?php
}
    ?>
            </ul>
        </div>

    <?php
}
?>
<!-- <div id="class_module1" class="class_mod">
    <ul class="class_list" id="second_col_class">
        <li class="class_list_item" id="col_2||entry_1">
            <div class="hover">
                <div class="class_name">
                    Entry 1
                </div>
                <div class="choc_bar"></div>
            </div>
        </li>
    </ul>
</div>

<div id="class_module2" class="class_mod">
    <ul class="class_list" id="second_col_class">
        <li class="class_list_item" id="col_2||entry_1">
            <div class="hover">
                <div class="class_name">
                    Entry 10
                </div>
                <div class="choc_bar"></div>
            </div>
        </li>
    </ul>
</div>

<div id="class_module3" class="class_mod">
    <ul class="class_list" id="second_col_class">
        <li class="class_list_item" id="col_2||entry_1">
            <div class="hover">
                <div class="class_name">
                    Entry 100
                </div>
                <div class="choc_bar"></div>
            </div>
        </li>
    </ul>
</div> -->
