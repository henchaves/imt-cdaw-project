
let userToken = localStorage.getItem('POKEMON_BATTLES_USER_JWT');
let authenticated = false;
let user = null;

fetch(`/api/checktoken/${userToken}`)
  .then(response => {
    if (response.status === 200) {
      authenticated = true;
      return response.json();
    } else {
      throw new Error('User is not authenticated');
    }
  })
  .then(data => {
    // console.log(data);
    user = data.user;
  })
  .catch(error => {
    // redirect to login page
    console.error(error);
    // window.location.href = '/login';
  });

// console.log(user);

