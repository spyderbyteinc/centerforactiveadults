var new_id = 20;

$(".draggable").draggable({
    cursor: "move",
    revert: "invalid",
    helper: function () {
        //alert($(this).attr('class'));

        var cloned = $(this).clone();
        // cloned.attr("id", (++new_id).toString());

        return cloned;
    },
    distance: 20,
});

$(".droppable")
    .droppable({
        hoverClass: "ui-state-active",
        tolerance: "pointer",

        accept: function (event, ui) {
            return true;
        },
        drop: function (event, ui) {
            //alert($(this).parent().html());
            //alert($(ui.helper).attr('class'));
            var obj;
            if ($(ui.helper).hasClass("draggable")) {
                //alert('draggable');
                obj = $(ui.helper).clone();
                obj.removeClass("draggable").addClass("editable").removeAttr("style");
                //obj.addClass('droppable');
                $(this).append(obj);

                console.log("jordan", obj);
            }

            //alert($(this).parent().html());
        },
    })
    .sortable({
        revert: false,
    });

$(".currentNewsletter")
    .droppable({
        hoverClass: "ui-state-active",
        tolerance: "pointer",

        accept: function (event, ui) {
            return true;
        },
        drop: function (event, ui) {
            //alert($(this).parent().html());
            //alert($(ui.helper).attr('class'));
            var obj;

            $(this).empty();

            if ($(ui.helper).hasClass("draggable")) {
                //alert('draggable');
                obj = $(ui.helper).clone();
                obj.removeClass("draggable").addClass("editable").removeAttr("style");
                //obj.addClass('droppable');
                $(this).append(obj);
            }

            //alert($(this).parent().html());
        },
    })
    .sortable({
        revert: false,
    });
