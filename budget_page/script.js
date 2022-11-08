let totalAmount = document.getElementById("budget-amount");
let expenseAmount = document.getElementById("expense-amount");
const balanceValue = document.getElementById("balance-amount");
const addBudget = document.getElementById("budget-amount-button");
const errorMessage = document.getElementById("budget-error");
const expenseValue = document.getElementById("expense-value");
let tempAmount = 0;

//Add Budget function
addBudget.addEventListener("click", () => {
    tempAmount = totalAmount.value ; 
    //empty or negative input
    if(tempAmount === "" || tempAmount < 0) {
        errorMessage.classList.remove("hide");
    }
    else{
        errorMessage.classList.add("hide");
    }
    //Set Budget
    amount.innerHTML = tempAmount;
    //Set Balance
    balanceValue.innerText = tempAmount - expenseValue.innerText;
    //Clear Input Box
    totalAmount.value = "" ;
}
);

//Function to Update Data                          !!-INCOMPLETE-!!
const updateData = (element, edit=false) => {
    //update Balance
    let currentBalance = balanceValue.innerText;
};
