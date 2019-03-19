
const titleInput = document.querySelector("#title");

const messageInput = document.querySelector("#message");

const messagehelp = document.querySelector("#messagespan");

const titlehelp = document.querySelector("#titlemessage");

const bouwton = document.querySelector("#bouwton");

bouwton.addEventListener("click", function (e) {
    e.preventDefault();
    checkifempty();
});

function checkifempty() {

    if (titleInput.value.length >0 && messageInput.value.length >10){
        document.getElementById("addmessage").submit();
    } else {
        messagehelp.style.display = "initial";
        titlehelp.style.display = "initial";
    }
}


