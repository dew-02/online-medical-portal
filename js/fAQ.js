

function toggleAnswer(element) {
    // Get the next sibling element which should be the answer div
    var answer = element.nextElementSibling;

    // Toggle the display property of the answer div
    if (answer.style.display === "block") {
        answer.style.display = "none";
    } else {
        answer.style.display = "block";
    }
}


