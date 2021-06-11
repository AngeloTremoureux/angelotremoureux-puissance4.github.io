function openNav() {
    document.getElementById("mySidenav").style.width = "250px";
    document.body.style.marginLeft = "250px";
    document.getElementById("panel").style.opacity = 0;
    sessionStorage.setItem('_user_preference_panel_active', 'true');
}

function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
    document.getElementById("panel").style.opacity = 1;
    document.body.style.marginLeft= "0";
    sessionStorage.setItem('_user_preference_panel_active', 'false');
}

$(function(){
    if (sessionStorage.getItem('_user_preference_panel_active') == 'true')
    {
        document.getElementById("mySidenav").classList.add('notransition');
        document.body.classList.add('notransition');
        document.getElementById("panel").classList.add('notransition');
        openNav();
        document.body.offsetHeight;
        document.getElementById("panel").offsetHeight;
        document.getElementById("mySidenav").classList.remove('notransition');
        document.body.classList.remove('notransition');
    }
    else {
        document.getElementById("panel").style.opacity = 1;
    }
});