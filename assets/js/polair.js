jQuery(document).ready(function($) {
    /*alert("laad de pagina");*/
    /*Accordion function - right block */
    var acc = document.getElementsByClassName("accordion");
    var i;

    for (i = 0; i < acc.length; i++) {
        acc[i].addEventListener("click", function() {
            /* Toggle between adding and removing the "active" class,
            to highlight the button that controls the panel */
            this.classList.toggle("active");

            /* Toggle between hiding and showing the active panel */
            var panel = this.nextElementSibling;
            if (panel.style.display === "block") {
                panel.style.display = "none";
            } else {
                panel.style.display = "block";
            }
        });
    }
    // pad van de link
    var path = window.location.pathname.split("/").pop();
    if (path == ''){
        path = 'index.php';
    }

    var target = $('li.nav-item a[href="'+path+'"]');
    //voeg de activelink classe toe aan de doellink
    target.addClass("activelink");

});


