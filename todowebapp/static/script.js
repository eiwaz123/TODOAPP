$(document).ready(function() {
    $("#submit").on("click", function() {
        var task = $("#task").val();
        var type = $("#task-type").val();

        $.ajax({
            type: "POST",
            url: "taskinput.php",
            data: {task: task, type: type},
           
        });
    });
});