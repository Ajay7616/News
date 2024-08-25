document.addEventListener("DOMContentLoaded", function() {
    const content = document.querySelector("#content_list");
    const writer = document.querySelector("#author_list");
    const writerSelectType = document.querySelectorAll("input[name='content_list_radio']");

    if (content && writer) {
        content.style.display = "block";
        writer.style.display = "none";
    } else {
        console.error("One or both elements not found.");
    }
    console.log("Content element:", content);
    console.log("Writer element:", writer);


    writerSelectType.forEach((radioButton) => {
        radioButton.addEventListener("change", () => {
            console.log("Radio button value:", radioButton.value);
            if (radioButton.value === "1") {
                if (writer && content) {
                    writer.style.display = "block";
                    content.style.display = "none";
                } else {
                    console.error("One or both elements not found.");
                }
            } else {
                if (content && writer) {
                    content.style.display = "block";
                    writer.style.display = "none";
                } else {
                    console.error("One or both elements not found.");
                }
            }
        });
    });
});
