const formButton = document.getElementById('form-button');
const emailInput = document.getElementById('email-input');
const usernameInput = document.getElementById('username-input');
const passwordInput = document.getElementById('password-input');
const message = document.getElementById('form-message');
const errorMessage = document.getElementById('error-message-text');


async function handleCheckEmail() {
  const email = emailInput.value;
  const checkEmailURL = `/api/checkemail/${email}`;
  const response = await fetch(checkEmailURL);
  if (response.status === 200) {
    message.innerText = 'Insert your password to login'
    usernameInput.parentElement.hidden = true;
    passwordInput.parentElement.hidden = false;
    changeFormButtonBehaviour('login');
  } else {
    message.innerText = 'Insert your password to create an account'
    usernameInput.parentElement.hidden = false;
    passwordInput.parentElement.hidden = false;
    changeFormButtonBehaviour('register');
  }
}

async function handleLogin() {
  const email = emailInput.value;
  const password = passwordInput.value;
  const loginURL = `/api/authenticate`;
  const response = await fetch(loginURL, {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json'
    },
    body: JSON.stringify({ email, password })
  });

  errorMessage.parentNode.hidden = true;

  if (response.status === 200) {
    const data = await response.json();
    localStorage.setItem('POKEMON_BATTLES_USER_JWT', data.token);
    window.location.href = '/';
  } else {
    errorMessage.parentNode.hidden = false;
    errorMessage.innerHTML = 'Error while trying to login. Please check your data and try again.';
  }
}

async function handleRegister() {
  const email = emailInput.value;
  const name = usernameInput.value;
  const password = passwordInput.value;
  const registerURL = `/api/register`;
  const response = await fetch(registerURL, {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json'
    },
    body: JSON.stringify({ email, name, password })
  });
  errorMessage.parentNode.hidden = true;

  if (response.status === 201) {
    message.innerText = 'Account created successfully. Proceed to login.';
    usernameInput.parentElement.hidden = true;
    changeFormButtonBehaviour('login');
  } else {
    errorMessage.parentNode.hidden = false;
    errorMessage.innerText = 'Error while trying to create an account. Please check your data and try again.';
  }
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
  } else if (buttonBehaviour === 'login') {
    handleLogin();
  } else if (buttonBehaviour === 'register') {
    handleRegister();
  } else {
    alert('Unknown button behaviour');
  }
});