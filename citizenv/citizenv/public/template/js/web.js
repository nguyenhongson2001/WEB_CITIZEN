//  Jquery for bx-menu, icon-link
$(document).ready(function(){
    $('.bx-menu').click(function(){
        $('#sidebar').toggleClass('close');
        $('#header').toggleClass('close');
        Breadcrumb
    });

    $('.icon-link').click(function(){
        $(this).next('.sub-menu').slideToggle();
        $(this).find('.arrow').toggleClass('rotate');
    });
});

//  Change color when click
let select = document.querySelector(".select");
let tablinks = document.querySelectorAll(".tablinks");
for (let i = 0; i < tablinks.length; i++) {
    tablinks[i].addEventListener("click", () => {
        for(let j = 0; j < tablinks.length; j++) {
            if (i == j) {
                tablinks[i].classList.add("colorTab");
            } else {
                tablinks[j].classList.remove("colorTab");
            }
        }
    });
}

// Navigation 
function opensidebar(evt, cityName) {
    // Declare all variables
    var i, tabcontent, tablinks;

    // Get all elements with class="tabcontent" and hide them
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }

    // Get all elements with class="tablinks" and remove the class "active"
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }

    // Show the current tab, and add an "active" class to the link that opened the tab
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";
}   
    // Get the element with id="defaultOpen" and click on it
    document.getElementById("defaultOpen").click();