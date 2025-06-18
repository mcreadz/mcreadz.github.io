function clearVal(){
    document.getElementById('num1').value = '';
    document.getElementById('num2').value = '';
}

function calcAdd() {
    let inVal1 = document.getElementById("num1").value;
    let inVal2 = document.getElementById("num2").value;

    let numVal1 = Number(inVal1);
    let numVal2 = Number(inVal2);

    let ans = numVal1 + numVal2;

    document.getElementById("echo").innerHTML = ans;
}
    function calcSub() {
    let inVal1 = document.getElementById("num1").value;
    let inVal2 = document.getElementById("num2").value;

    let numVal1 = Number(inVal1);
    let numVal2 = Number(inVal2);

    let ans = numVal1 - numVal2;

    document.getElementById("echo").innerHTML = ans;
}
function calcMul() {
    let inVal1 = document.getElementById("num1").value;
    let inVal2 = document.getElementById("num2").value;

    let numVal1 = Number(inVal1);
    let numVal2 = Number(inVal2);

    let ans = numVal1 * numVal2;

    document.getElementById("echo").innerHTML = ans;
}
function calcDiv() {
    let inVal1 = document.getElementById("num1").value;
    let inVal2 = document.getElementById("num2").value;

    let numVal1 = Number(inVal1);
    let numVal2 = Number(inVal2);

    let ans = numVal1 / numVal2;

    document.getElementById("echo").innerHTML = ans;
}