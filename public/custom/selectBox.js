const userCheckAll=document.querySelector('#userselectAll');
const parentCheckbox=document.querySelector('.userCheckBoxes');

checkAll(userCheckAll,parentCheckbox);

const roleCheckAll=document.querySelector('#roleselectAll');
const roleParentSelect=document.querySelector('.roleCheckBoxes');

checkAll(roleCheckAll,roleParentSelect);

const customerCheckAll=document.querySelector('#customersselectAll');
const customerParentSelect=document.querySelector('.customersCheckBoxes');

checkAll(customerCheckAll,customerParentSelect);

function checkAll(mainCheckBox,parentCheckbox) {
    mainCheckBox.addEventListener('change',()=>{
        const childChekBoxes=parentCheckbox.querySelectorAll('.form-check-input');
        childChekBoxes.forEach(checkbox => {
        if(mainCheckBox.checked){
            checkbox.checked=true;
        }else{
            checkbox.checked=false;
        }
        });

})
}
