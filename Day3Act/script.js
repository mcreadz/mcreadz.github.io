function clearVal(){
    document.querySelector("input[name='name1']").value = '';
    document.querySelector("input[name='email1']").value = '';
    document.getElementById("num1").value = '';
    document.getElementById("num2").value = '';
    document.getElementById("numop").value = '';
    document.getElementById("ans0").value = '';
}

function calcAdd() {
    let inVal1 = document.getElementById("num1").value;
    let inVal2 = document.getElementById("num2").value;

    let numVal1 = Number(inVal1);
    let numVal2 = Number(inVal2);

    let ans = numVal1 + numVal2;

    document.getElementById("numop").textContent = "Added by";
    document.querySelector("input[name='operation1']").value = " + ";
    document.getElementById("ans0").value = ans;
}
    function calcSub() {
    let inVal1 = document.getElementById("num1").value;
    let inVal2 = document.getElementById("num2").value;

    let numVal1 = Number(inVal1);
    let numVal2 = Number(inVal2);

    let ans = numVal1 - numVal2;

    document.getElementById("numop").textContent = "Subtracted by";
    document.querySelector("input[name='operation1']").value = " - ";
    document.getElementById("ans0").value = ans;
}
function calcMul() {
    let inVal1 = document.getElementById("num1").value;
    let inVal2 = document.getElementById("num2").value;

    let numVal1 = Number(inVal1);
    let numVal2 = Number(inVal2);

    let ans = numVal1 * numVal2;

    document.getElementById("numop").textContent = "Multiplied by";
    document.querySelector("input[name='operation1']").value = " x ";
    document.getElementById("ans0").value = ans;
}
function calcDiv() {
    let inVal1 = document.getElementById("num1").value;
    let inVal2 = document.getElementById("num2").value;

    let numVal1 = Number(inVal1);
    let numVal2 = Number(inVal2);

    let ans = numVal1 / numVal2;

    document.getElementById("numop").textContent = "Divided by";
    document.querySelector("input[name='operation1']").value = " / ";
    document.getElementById("ans0").value = ans;
}
