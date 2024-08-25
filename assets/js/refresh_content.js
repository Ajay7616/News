document.addEventListener("DOMContentLoaded", function() {
    $(document).ready(function() {
        function refreshChat() {
            $.ajax({
                url: "/chat/get_message.php", 
                type: "GET", 
                dataType: "html",
                data: $("#chat-form").serialize(),
                success: function(response) {
                    $("#chat-box").html(response);
                },
                error: function(error) {
                    console.log("Error:", error);
                }
            });
        }
        setInterval(refreshChat, 300);
        refreshChat();
    });
});
