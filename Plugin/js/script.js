function clearVal() {
    document.querySelector("span[name='operator']").textContent = 'Select Operator';
    document.querySelector("input[name='operation']").value = '';
    document.querySelector("input[name='handle']").value = '';
    document.querySelector("input[name='email']").value = '';
    document.querySelector("input[name='ans']").value = '';
    document.getElementById("num1").value = '';
    document.getElementById("num2").value = '';
}

function calcAdd() {
    let inVal1 = document.getElementById("num1").value;
    let inVal2 = document.getElementById("num2").value;

    let numVal1 = Number(inVal1);
    let numVal2 = Number(inVal2);

    let ans = numVal1 + numVal2;

    document.querySelector("span[name='operator']").textContent = "Added by";
    document.querySelector("input[name='operation']").value = "Added by";
    document.querySelector("input[name='symbol']").value = " + ";
    document.querySelector("input[name='ans']").value = ans;
}
function calcSub() {
    let inVal1 = document.getElementById("num1").value;
    let inVal2 = document.getElementById("num2").value;

    let numVal1 = Number(inVal1);
    let numVal2 = Number(inVal2);

    let ans = numVal1 - numVal2;

    document.querySelector("span[name='operator']").textContent = "Subtracted by";
    document.querySelector("input[name='operation']").value = "Subtracted by";
    document.querySelector("input[name='symbol']").value = " - ";
    document.querySelector("input[name='ans']").value = ans;
}
function calcMul() {
    let inVal1 = document.getElementById("num1").value;
    let inVal2 = document.getElementById("num2").value;

    let numVal1 = Number(inVal1);
    let numVal2 = Number(inVal2);

    let ans = numVal1 * numVal2;

    document.querySelector("span[name='operator']").textContent = "Multiplied by";
    document.querySelector("input[name='operation']").value = "Multiplied by";
    document.querySelector("input[name='symbol']").value = " x ";
    document.querySelector("input[name='ans']").value = ans;
}
function calcDiv() {
    let inVal1 = document.getElementById("num1").value;
    let inVal2 = document.getElementById("num2").value;

    let numVal1 = Number(inVal1);
    let numVal2 = Number(inVal2);

    let ans = numVal1 / numVal2;

    document.querySelector("span[name='operator']").textContent = "Divided by";
    document.querySelector("input[name='operation']").value = "Divided by";
    document.querySelector("input[name='symbol']").value = " / ";
    document.querySelector("input[name='ans']").value = ans;
}