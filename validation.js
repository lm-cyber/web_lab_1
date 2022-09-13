const FLOAT_REGEX = /^-?\d+(?:\.\d+)?$/;



function funcClick() {
    let xP = document.getElementById("X");
    const x = parseFloat(xP.options[xP.selectedIndex].value);
    const y = document.getElementById("Y").value;
    const r = document.getElementById("R").value;

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