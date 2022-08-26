const FLOAT_REGEX = /^-?\d+(?:\.\d+)?$/;



function funcClick() {
    var x = document.getElementById("X");
    x = parseFloat(x.options[x.selectedIndex].value);
    var y = document.getElementById("Y").value;
    var r = document.getElementById("R").value;

    if(!validationFloat(y)) {
        alert("Y not validation");
        document.getElementById("Y").value = ""
        return;
    }
    if(!domainFloat(parseFloat(y), -3., 3. )) {
        alert("Y value out of bounds");
        document.getElementById("Y").value = ""
        return;

    }
    if(!validationFloat(r)) {
        alert("R not validation");
        document.getElementById("R").value = ""
        return;
    }
    if(!domainFloat(parseFloat(r), 2., 5. )) {
        alert("R value out of bounds");
        document.getElementById("R").value = ""
        return;
    }
	document.getElementById("main_form").submit();
}
function domainFloat(floatNum, leftBorder, rightBorder) {
    if(floatNum >= rightBorder || floatNum <= leftBorder) {
        return false;
    }
    return true;
}

function validationFloat(strFloat) {
    return FLOAT_REGEX.test(strFloat);
}