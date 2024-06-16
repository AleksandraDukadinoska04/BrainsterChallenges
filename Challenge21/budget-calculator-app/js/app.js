$(document).ready(function(){

    const budgetInput = $('#budget-input');
    const budgetSubmit = $('#budget-submit');
    const budgetFeedback = $('.budget-feedback');
    const budgetAmount = $('#budget-amount');
    const expenseAmount = $('#expense-amount');
    const balanceAmount = $('#balance-amount');
    const balance = $('#balance');
    const expenseInput = $('#expense-input');
    const amountInput = $('#amount-input');
    const expenseSubmit = $('#expense-submit');
    const expenseTable = $('#expenseTable');
    const expenseFeedback = $('.expense-feedback');


    class BudgetApp{
        budget = 0; 
        expenses = 0;
        balance = 0;

        setBudget(number){
            this.budget = number;
        }
        setExpenses(number){
            this.expenses = number;
        } 
        setBalance(number){   
            this.balance = number;
            if(this.balance > 0){
                balance.removeClass('showRed');
                balance.addClass('showGreen');
            } else if(this.balance < 0) {
                balance.removeClass('showGreen');
                balance.addClass('showRed');
            } else {
                balance.removeClass('showGreen');
                balance.removeClass('showRed');
            }
        }

        getBudget(){
            return this.budget;
        }
        getExpenses(){
            return this.expenses;
        } 
        getBalance(){
            return this.balance;
        }

    }
    const budgetApp = new BudgetApp();


    budgetSubmit.on('click', updateBudget);

    function updateBudget(e){
        e.preventDefault();
        const budgetValue = parseInt(budgetInput.val());
        if(!budgetValue || budgetValue < 0){
            budgetFeedback.text('Value cannot be empty or negative!');
            budgetFeedback.show();
            return;
        }

        budgetApp.setBudget(budgetValue);
        budgetApp.setBalance(budgetValue - budgetApp.getExpenses());
        budgetAmount.text(budgetApp.getBudget());
        balanceAmount.text(budgetApp.getBalance());
        
        budgetInput.val('');
    }

    budgetInput.on('focus', function (){
        budgetFeedback.hide();
    })

    expenseSubmit.on('click', updateExpense);

    function updateExpense(e){
        e.preventDefault();

        const expenseTitle = expenseInput.val();
        const expenseValue = parseInt(amountInput.val());

        if(!expenseTitle || !expenseValue){
            expenseFeedback.text('All fields are requered!');
            expenseFeedback.show();
            return;
        }
        if(expenseValue < 0){
            expenseFeedback.text('Expense amount cannot be negative!');
            expenseFeedback.show();
            return;
        }

        const newExpense = budgetApp.getExpenses() + expenseValue;
        budgetApp.setExpenses(newExpense);
        const newBalance = budgetApp.getBalance() - expenseValue;
        budgetApp.setBalance(newBalance);

        expenseAmount.text(budgetApp.getExpenses());
        balanceAmount.text(budgetApp.getBalance());

        if(expenseTable.children().length === 0){
            const table = createTable();
            const tableBody = $('<tbody></tbody>');
            const tableRow = createTableRow(expenseTitle, expenseValue);
            tableRow.appendTo(tableBody);
            tableBody.appendTo(table);
            table.appendTo(expenseTable);

        } else {
            const tableBody = $('tbody');
            const tableRow = createTableRow(expenseTitle, expenseValue);
            tableRow.appendTo(tableBody);
        }


        expenseInput.val('');
        amountInput.val('');

    }

    expenseInput.on('focus', function (){
        expenseFeedback.hide();
    })
    amountInput.on('focus', function (){
        expenseFeedback.hide();
    })


    function createTable(){
        const table = $('<table></table>');
        table.addClass('text-center');
        table.addClass('w-100');
        table.addClass('m-0');
        table.addClass('p-0');

        const tableHead = $('<thead></thead>');

        const th1 = $('<th></th>');
        th1.html('<h4 class="fs-1 p-0 w-100 mb-3">Expense title</h4>');
        th1.appendTo(tableHead);

        const th2 = $('<th></th>');
        th2.html('<h4 class="fs-1 p-0 w-100 mb-3">Expense value</h4>');
        th2.appendTo(tableHead);

        const th3 = $('<th></th>');
        th3.html('<h4 class="fs-1 px-5"></h4>');
        th3.addClass('p-3');
        th3.appendTo(tableHead);

        tableHead.appendTo(table);

        return table;

    }

    function createTableRow(expenseTitle, expenseValue){
        const tableRow = $('<tr></tr>');

        const title = $('<td></td>');
        title.text('- ' + expenseTitle.toUpperCase());
        title.addClass('expense-title');

        const value = $('<td></td>')
        value.text(expenseValue);
        value.addClass('expense-amount');

        const buttons = $('<td></td>');

        const edit = $('<button></button>');
        edit.addClass('edit-icon');
        edit.html('<i class="fa-solid fa-pen-to-square"></i>');

        const deleteBtn = $('<button></button>');
        deleteBtn.addClass('delete-icon');
        deleteBtn.html('<i class="fa-solid fa-trash"></i>');


        edit.appendTo(buttons);
        deleteBtn.appendTo(buttons);
        title.appendTo(tableRow);
        value.appendTo(tableRow);
        buttons.appendTo(tableRow);

        deleteBtnEvent(deleteBtn, expenseValue, tableRow);
        editBtnEvent(edit, expenseTitle, expenseValue, tableRow);

        return tableRow;
    }


    function deleteBtnEvent(btn, expenseValue, tableRow){
        btn.on('click', () =>{
            const newExpense = budgetApp.getExpenses() - expenseValue;
            budgetApp.setExpenses(newExpense);
            const newBalance = budgetApp.getBalance() + expenseValue;
            budgetApp.setBalance(newBalance);
        
            expenseAmount.text(budgetApp.getExpenses());
            balanceAmount.text(budgetApp.getBalance());
        
            tableRow.remove();


        
        })
    }

    function editBtnEvent(btn, expenseTitle, expenseValue, tableRow){
        btn.on('click', () =>{
            const newExpense = budgetApp.getExpenses() - expenseValue;
            budgetApp.setExpenses(newExpense);
            const newBalance = budgetApp.getBalance() + expenseValue;
            budgetApp.setBalance(newBalance);
        
            expenseAmount.text(budgetApp.getExpenses());
            balanceAmount.text(budgetApp.getBalance());

            expenseInput.val(expenseTitle);
            amountInput.val(expenseValue);
        
            tableRow.remove();


        })
    }

});








