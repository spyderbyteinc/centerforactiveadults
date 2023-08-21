<div class="modal_bg" id="pdf_file_upload">
    <div class="modal">
        <h4>Upload PDF</h4>

        <form action="upload_pdf.php" method="post" enctype="multipart/form-data">
            Select PDF to Upload:

            <input type="file" name="fileToUpload" id="fileToUpload" accept="application/pdf">
            <input type="submit" value="Upload Image" name="submit">
        </form>

        <div class="button_cont">
            <a href="#" class="bidzbutton orange" id="cancel_file_upload">Cancel</a>
        </div>
    </div>
</div>
<div class="modal_bg" id="newsletter_entry">
    <div class="modal">
        <h4>Create Newsletter Entry</h4>

        <select name="month1" id="month1" class="form_input form_select">
            <option value="">Choose The First Month</option>
            <option value="January">January</option>
            <option value="February">February</option>
            <option value="March">March</option>
            <option value="April">April</option>
            <option value="May">May</option>
            <option value="June">June</option>
            <option value="July">July</option>
            <option value="August">August</option>
            <option value="September">September</option>
            <option value="October">October</option>
            <option value="November">November</option>
            <option value="December">December</option>
        </select>
        <select name="month2" id="month2" class="form_input form_select">
            <option value="">Choose The Second Month</option>
            <option value="January">January</option>
            <option value="February">February</option>
            <option value="March">March</option>
            <option value="April">April</option>
            <option value="May">May</option>
            <option value="June">June</option>
            <option value="July">July</option>
            <option value="August">August</option>
            <option value="September">September</option>
            <option value="October">October</option>
            <option value="November">November</option>
            <option value="December">December</option>
        </select>
        <select name="year" id="year" class="form_input form_select">
            <option value="">Choose Year</option>
            <option value="2021">2021</option>
            <option value="2022">2022</option>
            <option value="2023">2023</option>
            <option value="2024">2024</option>
            <option value="2025">2025</option>
        </select>

    <div class="pdf_chooser">
        <?php
$path = "../newsletters";
$files = scandir($path);

for ($f = 3; $f < count($files); $f++) {
    $file_name = $files[$f];

    ?>

        <input type="hidden" name="pdf_choice" id="pdf_choice">
        <div class="pdf_item">
            <span class="pdf_name"><?php echo $file_name; ?></span>
            <span class="pdf_option">
                <span class="pdf_hole">
                    <div class="pdf_mark empty"></div>
                </span>
            </span>
        </div>

<?php
}
?>
    </div>

        <div class="button_cont">
            <a href="#" class="bidzbutton devart" id="save_new_newsletter_entry">Save</a>
            <a href="#" class="bidzbutton orange" id="cancel_newsletter_entry">Cancel</a>
        </div>
    </div>
</div>
<div id="newsletter_management_container">

    <h2 class="table_heading"><span class="heading_contents">Newsletters</span></h2>

    <div class="newsletter_button_container">
        <a href="#" class="bidzbutton devart" id="save_newsletters"><i class="fa-regular fa-floppy-disk"></i> &nbsp;Save Newsletters</a>
    </div>

    <div id="newsletter_container">

        <div class="left_container nl_cont">
            <h3 class="newsletter_heading">Current Newsletter</h3>
            <div class="currentNewsletter droppable">

                <?php
$sql = "SELECT * FROM `newsletters` WHERE `active`='active'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

$id = $row['id'];
$name = $row['name'];

$name = str_replace("%20", " ", $name);
$month = $row['month'];
$year = $row['year'];

if (mysqli_num_rows($result) > 0) {

    ?>

                <div class="pdf_item ui-draggable ui-draggable-handle ui-draggable-dragging editable" id="newsletter_<?php echo $id; ?>">
                    <a href="https://www.centerforactiveadults.com/newsletters/<?php echo $name; ?>" target="_blank" class="pdf_name"><?php echo $name; ?></a> <span class="pdf_date"><?php echo $month; ?> - <?php echo $year; ?></span>
                <i class="remove_newsletter fa-solid fa-circle-xmark"></i></div>
                <?php

}
?>

            </div>
        </div>
        <div class="center_container nl_cont">
            <div class="pdf_container">
                <h3 id="create_new_entry"><i class="fa-solid fa-square-plus"></i> &nbsp; Create New Newsletter</h3>
                <div class="pdf_list">
                    <?php
$sql = "SELECT * FROM `newsletters`";
$result = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_assoc($result)) {
    $id = $row['id'];
    $name = $row['name'];
    $month = $row['month'];
    $year = $row['year'];

    $name = str_replace("%20", " ", $name);

    ?>

                    <div class="pdf_item draggable" id="newsletter_<?php echo $id; ?>"><a href="https://www.centerforactiveadults.com/newsletters/<?php echo $name; ?>" target="_blank" class="pdf_name"><?php echo $name; ?></a> <span class="pdf_date"><?php echo $month; ?> - <?php echo $year; ?></span>
                                <i class="remove_newsletter fa-solid fa-circle-xmark"></i></div>

                        <?php
}
?>
                </div>
                <h3 id="add_new_pdf"><i class="fa-solid fa-file-circle-plus"></i>&nbsp; Add New PDF</h3>
            </div>
        </div>
        <div class="right_container nl_cont">
            <h3 class="newsletter_heading">Newsletter Archive</h3>

            <div id="newsletter_archive" class="droppable">

                <?php
$newsletter_order_sql = "SELECT * FROM `sorting` WHERE `type`='newsletters'";
$newsletter_order_result = mysqli_query($conn, $newsletter_order_sql);
$newsletter_order_row = mysqli_fetch_assoc($newsletter_order_result);

$sorted = $newsletter_order_row['sorted'];

$comps = explode(",", $sorted);

for ($c = 0; $c < count($comps); $c++) {
    $id = $comps[$c];

    $sql = "SELECT * FROM `newsletters` WHERE `id`=$id";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    $id = $row['id'];
    $name = $row['name'];

    $name = str_replace("%20", " ", $name);
    $month = $row['month'];
    $year = $row['year'];
    ?>
                <div class="pdf_item ui-draggable ui-draggable-handle ui-draggable-dragging editable" id="newsletter_<?php echo $id; ?>">
                    <a href="https://www.centerforactiveadults.com/newsletters/<?php echo $name; ?>" target="_blank" class="pdf_name"><?php echo $name; ?></a> <span class="pdf_date"><?php echo $month; ?> - <?php echo $year; ?></span>
                <i class="remove_newsletter fa-solid fa-circle-xmark"></i></div>

                <?php }?>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).on("click", "#add_new_pdf", function(){
        $("#pdf_file_upload").css("display", "block");
    })
    $(document).on("click", "#cancel_file_upload", function(){
        $("#pdf_file_upload").css("display", "none");
    });
    $(document).on("click", "#create_new_entry", function(){
        $(".pdf_mark").addClass("empty");
        $("#newsletter_entry").css("display", "block");
    })
    $(document).on("click", "#cancel_newsletter_entry", function(){
        $("#newsletter_entry").css("display", "none");
    })
    $(document).on("click", ".pdf_option", function(){
        $(".pdf_mark").addClass("empty");
        $(this).find(".pdf_mark").removeClass('empty');

        var chosen = $(this).prev().text();
        $("#pdf_choice").val(chosen);
    });

    $(document).on("click", ".remove_newsletter", function(){
        $(this).parent().remove();
    });
    $(document).on("click", "#save_newsletters", function(e){
        e.preventDefault();

        var out = [];
        var sorted = $("#newsletter_archive").sortable("toArray");

        for(var s=0; s<sorted.length; s++){
            var item = sorted[s];

            item = item.replace("newsletter_", "");

            out.push(item);
        }

        var active = $(".currentNewsletter").sortable("toArray");
        active = active[0].replace("newsletter_", "");

        out = out.join(",");

         $.ajax({
            type: 'POST',
            url: "ajax.php",
            async: false,
            dataType: "json",
            data: {
                'type': 'update_newsletters',
                'sorted': out,
                'active': active
            },
            success: function (out) {
                alert(out);
            }
        });
    });
    $(document).on("click", "#save_new_newsletter_entry", function(){
        var month1 = $("#month1").val();
        var month2 = $("#month2").val();
        var year = $("#year").val();
        var pdf_choice = $("#pdf_choice").val();

        if(month1 == "" || month2 == "" || year == "" || pdf_choice == ""){
            alert("Please the Form");
            return;
        }

         $.ajax({
            type: 'POST',
            url: "ajax.php",
            async: false,
            dataType: "json",
            data: {
                'type': 'add_newsletter',
                'month1': month1,
                'month2': month2,
                'year': year,
                'pdf_choice': pdf_choice
            },
            success: function (out) {
                console.log(out);
            }
        });
    })
</script>