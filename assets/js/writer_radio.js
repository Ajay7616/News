document.addEventListener("DOMContentLoaded", function() {
    const content = document.querySelector("#published_content");
    const previous = document.querySelector("#previous_visit_content");
    const writerselecttype = document.querySelectorAll("input[name='writer_radio']");

    if (content && previous) {
        content.style.display = "block";
        previous.style.display = "none";
    } else {
        console.error("One or both elements not found.");
    }

    writerselecttype.forEach((radiobutton) => {
        radiobutton.addEventListener("click", () => {
            if (radiobutton.value === "1") {
                if (previous && content) {
                    previous.style.display = "block";
                    content.style.display = "none";
                } else {
                    console.error("One or both elements not found.");
                }
            } else {
                if (content && previous) {
                    content.style.display = "block";
                    previous.style.display = "none";
                } else {
                    console.error("One or both elements not found.");
                }
            }
        });
    });
});
