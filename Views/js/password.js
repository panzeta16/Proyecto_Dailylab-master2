$(function(){

    var mayus = new RegExp("ˆ(?=.*[A-Z].*[A-Z].*[A-Z])");
    var special = new RegExp("ˆ(?=.*[!@#$%&*].*[!@#$%&*].*[!@#$%&*])");
    var numbers = new RegExp("ˆ(?=.*[0-9])");
    var lower = new RegExp("ˆ(?=.*[a-z])");
    var len = new RegExp("ˆ(?=.{8,})");

    var regExp = [mayus, special, numbers, lower, lower, len];
    var elementos = [$("#mayus"),$("#special"),$("#numbers"),$("#lower"),$("#len"),];

    $("#password").on("keyup", function(){
        var pass = $("#password").val();

for (var i = 0; i < 5; i++){
    if(regExp[i].test(pass)){
        elementos[i].hide();
    }else{
    elementos[i].show();

    }
}

    });
});