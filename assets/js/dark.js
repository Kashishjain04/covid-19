
var state;
light();

function toggle() {
    if(state){        
        dark();        
    }
    else{                    
        light();        
    }
}


function light() {
    state=1;
    document.getElementById("dark-css").disabled = true;
    document.getElementById("heading").classList.remove("bg-dark");
    document.getElementById("mode-toggle").classList.remove("fa-sun-o");
    document.getElementById("mode-toggle").classList.add("fa-moon-o");
    document.getElementById("name").classList.remove("text-light");
    document.getElementById("name").classList.add("text-dark");
    document.getElementById("nav").classList.remove("bg-dark");
    document.getElementById("nav").classList.add("bg-white");
    document.getElementById("brand").classList.remove("text-light");
    document.getElementsByClassName("foot-card").classList.remove("bg-dark");
    document.getElementsByClassName("foot-card").classList.add("bg-white");    
}
function dark() {
    state=0;
    document.getElementById("dark-css").disabled = false;
    document.getElementById("heading").classList.add("bg-dark");
    document.getElementById("mode-toggle").classList.add("fa-sun-o");
    document.getElementById("mode-toggle").classList.remove("fa-moon-o");
    document.getElementById("name").classList.add("text-light");
    document.getElementById("name").classList.remove("text-dark");
    document.getElementById("nav").classList.add("bg-dark");
    document.getElementById("nav").classList.remove("bg-white");
    document.getElementById("brand").classList.add("text-light");
    document.getElementsByClassName("foot-card").classList.add("bg-dark");
    document.getElementsByClassName("foot-card").classList.remove("bg-white");    
}