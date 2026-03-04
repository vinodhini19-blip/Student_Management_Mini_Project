function validateLogin() {

    let username = document.getElementById("username").value.trim();
    let password = document.getElementById("password").value.trim();
    let errorMsg = document.getElementById("errorMsg");

    if (username === "" || password === "") {
        errorMsg.innerHTML = "All fields are required!";
        return false;
    }

    if (password.length < 4) {
        errorMsg.innerHTML = "Password must be at least 4 characters!";
        return false;
    }

    return true;
}
