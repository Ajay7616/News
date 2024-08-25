$(document).ready(function() {
    $("form").submit(function(e) {
        e.preventDefault(); 
        var formData = $(this).serialize();

        $.ajax({
            url: "/chat/insert_message.php",
            type: "POST",
            data: formData,
            success: function(response) {

                console.log("Response from server:", response);
            },
            error: function(error) {
                console.error("Error:", error);
            }
        });
    });
});