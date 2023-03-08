if ( window.history.replaceState ) {
    window.history.replaceState( null, null, window.location.href );
}

function body_scroll_lock(status) {
    const body = document.querySelector('body')
    if (status == false) {
        body.classList.remove("overflow-hidden")
    }

    if (status == true) {
        body.classList.add("overflow-hidden")
    }
}
