<?php include "includes/header.php"; ?>

<div class="modal_bg" id="archive_newsletters">
    <div class="modal">
        <h4>Archived CAA Newsletters</h4>
        

    <div class="table_container">
        <table id="fancy_table">
            <tr class="table_header">
                <th class="table_col">Issued Month(s)</th>
                <th class="table_col">Issued Year</th>
                <th class="table_col">Link</th>
            </tr>
            <tr>
                <td class="table_col">January, February</td>
                <td class="table_col">2023</td>
                <td class="table_col"><a target="_blank" href="http://centerforactiveadults.com/dev/newsletters/CAA Newsletter  Jan Feb 2023.pdf">Click Here</a></td>
            </tr>
            <tr>
                <td class="table_col">November, December</td>
                <td class="table_col">2022</td>
                <td class="table_col"><a target="_blank" href="http://centerforactiveadults.com/dev/newsletters/CAA Newsletter Nov.Dec. 2022.pdf">Click Here</a></td>
            </tr>
            <tr>
                <td class="table_col">September, October</td>
                <td class="table_col">2022</td>
                <td class="table_col"><a target="_blank" href="http://centerforactiveadults.com/dev/newsletters/CAA Sept-Oct Newsletter 2022.pdf">Click Here</a></td>
            </tr>
            <tr>
                <td class="table_col">July, August</td>
                <td class="table_col">2022</td>
                <td class="table_col"><a target="_blank" href="http://centerforactiveadults.com/dev/newsletters/CAA July August 2022 Newsletter.pdf">Click Here</a></td>
            </tr>
            <tr>
                <td class="table_col">May, June</td>
                <td class="table_col">2022</td>
                <td class="table_col"><a target="_blank" href="http://centerforactiveadults.com/dev/newsletters/CAA MayJune 2022.pdf">Click Here</a></td>
            </tr>
        </table>
    </div>

    <div class="close_button_container">
        <a href="#" class="bidzbutton orange close_archive">Close</a>
    </div>
    </div>
</div>
<div id="main_content">

    <div id="heading">
<img src="img/logo.png" alt="">
    </div>
    
    <hr class="gray_bar">

    <h2 class="section_heading"><span>Newsletter</span></h2>

    <section id="newsletters" class="full">
        <div class="newsletter_col">
            <span class="newsletter current_news">
                <a type="submit" target="_blank" class="fancy-submit fancy-button bg-gradient1 cursor_pointer" style="margin:auto;" id="create_account_submit" href="http://centerforactiveadults.com/dev/newsletters/CAA%20March%20April%202023%20Newsletter.pdf"><span><i class="fa-regular fa-folder-open"></i> Current Newsletter</span></a></span>

        <span class="newsletter newsarc"><a href="#" class="bidzbutton" id="archive_open"><i class="fa-solid fa-box-archive"></i> NEWSLETTER ARCHIVE</a></span>
        </div>
    </section>


    <h2 class="section_heading"><span>Staff</span></h2>

     

    <h2 class="section_heading"><span>Calendars</span></h2>

    
    <h2 class="section_heading"><span>Classes / Workshops</span></h2>

    <div id="class_section">
        <div class="class_column">
            <ul class="class_list">
                <?php
                    $col1_sql = "SELECT * FROM `class_type` WHERE `id`<> 5";
                    $col1_result = mysqli_query($conn, $col1_sql);
                    while($col1_row = mysqli_fetch_assoc($col1_result)):

                        $id = $col1_row['id'];
                        $type = $col1_row['type'];
                ?>
                <li class="class_list_item" id="col_1_entry_<?php echo $id; ?>">
                    <div class="hover">
                        <div class="class_name">
                            <?php echo $type; ?>
                        </div>
                        <div class="choc_bar"></div>
                    </div>
                </li>
                <?php endwhile; ?>
            </ul>
        </div>
        <div class="class_column">
            <ul class="class_list">
                <li class="class_list_item" id="col_2_entry_1">
                    <div class="hover">
                        <div class="class_name">
                            Entry 1
                        </div>
                        <div class="choc_bar"></div>
                    </div>
                </li>
                <li class="class_list_item" id="col_2_entry_2">
                    <div class="hover">
                        <div class="class_name">
                            Entry 2
                        </div>
                        <div class="choc_bar"></div>
                    </div>
                </li>
            </ul>
        </div>
        <div class="class_column">Time / Date</div>
    </div>
</div>
<script>

    $( "body" ).on( "click", ".close_archive", function(e) {
        e.preventDefault();
        $("#archive_newsletters").css("display", "none");
    });

    $("#archive_open").click(function(e){
        e.preventDefault();
        $("#archive_newsletters").css("display", "block");
    });
</script>
<?php include "includes/footer.php"; ?>