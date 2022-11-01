window.addEventListener('scroll', function(e){
    this.console.log(document.documentElement.scrollTop); //chiffre pour scrollTop
}); 

window.onscroll = function () {

    if(document.documentElement.scrollTop > 230) { 
        document.getElementById("navscroll").style.opacity = "1";
        document.getElementById("navscroll").style.boxShadow ="3px 3px 3px grey";
    } else {
        document.getElementById("navscroll").style.opacity = "0.9";
        document.getElementById("navscroll").style.boxShadow ="none";
    }
} 

