var mb = $("#modebody");
var icon =  $("#iconmode");

function darkmode(){
  mb.addClass("dark-mode");
  icon.removeClass("fas fa-moon");
  icon.addClass("fas fa-sun");
  localStorage.setItem("mode", "dark");
}

function lightmode(){
  mb.removeClass("dark-mode");
  icon.removeClass("fas fa-sun");
  icon.addClass("fas fa-moon");
  localStorage.setItem("mode", "light");
}

if(localStorage.getItem("mode") == "dark"){
  darkmode();
}else{
  lightmode();
}

function ubahmode(){
    if(mb.hasClass("dark-mode")){
      lightmode();
    }else{
      darkmode();
    }
  } 