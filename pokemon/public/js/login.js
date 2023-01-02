const formButton = document.getElementById('form-button');
const emailInput = document.getElementById('email-input');
const usernameInput = document.getElementById('username-input');
const passwordInput = document.getElementById('password-input');
const message = document.getElementById('form-message');


async function handleCheckEmail() {
  const email = emailInput.value;
  const checkEmailURL = `/checkemail/${email}`;
  const response = await fetch(checkEmailURL);
  if (response.status === 200) {
    message.innerText = 'Insert your password to login'
    changeFormButtonBehaviour('login');
  } else {
    message.innerText = 'Insert your password to create an account'
    usernameInput.parentElement.toggleAttribute('hidden');
    changeFormButtonBehaviour('register');
  }
  passwordInput.parentElement.toggleAttribute('hidden');
}

function changeFormButtonBehaviour(behaviour) {
  formButton.dataset.behaviour = behaviour;
  formButton.innerText = behaviour;
}

formButton.addEventListener('click', (e) => {
  e.preventDefault();
  const buttonBehaviour = formButton.dataset.behaviour;
  if (buttonBehaviour === 'check-email') {
    handleCheckEmail();
  } else {
    alert('Unknown button behaviour');
  }
});