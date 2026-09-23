
export function initbtn() {
    const xhttp = new XMLHttpRequest();
    xhttp.onload = function () {
        document.getElementById("btnContent").innerHTML = this.responseText;
        defineProcess()
        // closeModal()
        // getmodal(type)
    }
    xhttp.open("GET", "subpages/auth/auth.php", true);
    xhttp.send();


    // Get the button that opens the modal
    var lgnbtn = document.getElementById("loginBtn");
    var regbtn = document.getElementById("registerBtn");

    if (!lgnbtn || !regbtn) return

    lgnbtn.addEventListener("click", () => btn("lgnbtn"))
    regbtn.addEventListener("click", () => btn("regbtn"))

    // closeModal()

    // console.log(lgnbtn)
    // return [lgnbtn, regbtn, span]

}

function reqLogin() {
    const http = new XMLHttpRequest();
    http.onload = function () {
        console.log(this.responseText)
    }
    http.open("GET", "subpages/auth/loginprocess.php", true);
    http.send();
}

function defineProcess() {
    document.getElementById("submitLogin").addEventListener("click", () => {
        reqLogin()
    })
}

function btn(type) {
    // console.log("testtest")
    getmodal(type)
    closeModal(type)
    // defineInp()
}

function closeModal(type) {
    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];
    console.log(span)
    // When the user clicks on <span> (x), close the modal
    span.addEventListener("click", () => {
        console.log(type)
        if (type == "lgnbtn") {
            login.style.display = "none";
        } else if (type == "regbtn") {
            register.style.display = "none";
        }
    })


    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function (event) {
        if (event.target == login) {
            login.style.display = "none";
        }
        else if (event.target == register) {
            register.style.display = "none";
        }
    }
}

function getmodal(type) {

    // Get the modal
    var login = document.getElementById("login");
    var register = document.getElementById("register");

    console.log(type)

    if (type == "lgnbtn") {
        login.style.display = "block";
    } else if (type == "regbtn") {
        register.style.display = "block"
    }
}