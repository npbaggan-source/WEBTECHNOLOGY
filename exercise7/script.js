function showMessage() {
    alert("Welcome to my personal website!");
}

function changeColor() {
    document.body.style.backgroundColor = "#bbdefb";
}

function zoomIn(img) {
    img.style.transform = "scale(1.2)";
}

function zoomOut(img) {
    img.style.transform = "scale(1)";
}

function validateForm() {
    let name = document.getElementById("name").value.trim();
    let email = document.getElementById("email").value.trim();

    if (name === "" || email === "") {
        alert("Please fill all fields!");
        return false;
    }

    if (!email.includes("@")) {
        alert("Enter valid email!");
        return false;
    }

    alert("Form submitted successfully!");
    return true;
}