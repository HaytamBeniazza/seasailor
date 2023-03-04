
const form = document.querySelector('form');
const firstName = document.getElementById('firstName');
const lastName = document.getElementById('lastName');
const email = document.getElementById('email');
const password = document.getElementById('password');
const submit = document.getElementById('submit-btn');

submit.addEventListener('click', (e) => {
    register();
});

function register() {
    let count = 0;
    const firstNameValue =  firstName.value.trim();
    const lastNameValue =  lastName.value.trim();
    const emailValue =  email.value.trim();
    const passwordValue = password.value.trim();

    if(firstNameValue === '') {
        setErrorFor(firstName, 'First Name cannot be blank');
    }else {
        count++;
    }
    if(lastNameValue === '') {
        setErrorFor(lastName, 'Last Name cannot be blank');
    }else {
        count++;
    }
    if(emailValue === '') {
        setErrorFor(email, 'Email cannot be blank');
    }else {
        count++;
    }
    if(passwordValue === '') {
        setErrorFor(password, 'Password cannot be blank');
    }else if(passwordValue.length < 6){
        setErrorFor(password, 'Enter a longer password');
    }else{ 
        count++;
    }

    console.log(count)
    if (count === 4) {
        console.log('all')
        form.submit()
    }
}

document.querySelectorAll("form input").forEach(element=>{
    element.addEventListener('keyup', function(){
        const formGroup = element.parentElement;
        const small = formGroup.querySelector('small');
        small.innerText = '';
        formGroup.className = 'form-group';
    })
})


function setErrorFor(input, message){
    const formGroup = input.parentElement;
    const small = formGroup.querySelector('small');
    small.innerText = message;
    formGroup.className = 'form-group error';
}