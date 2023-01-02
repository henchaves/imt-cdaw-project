
let user = null;
let player = null;

async function checkToken() {
  const userToken = localStorage.getItem('POKEMON_BATTLES_USER_JWT');
  const response = await fetch(`/api/checktoken/${userToken}`);
  if (response.status === 200) {
    authenticated = true;
    const dataToken = await response.json();
    user = dataToken.user;
  } else {
    window.location.replace('/login');
  }
}

async function loadPlayerInfo() {
  const response = await fetch(`/api/players/${user.id}`);
  if (response.status === 200) {
    player = await response.json();
    // player.energies[0] --> {"id": 0, "name": "earth"}
    const energyNames = player.energies.map(energy => energy.energy.name);
    document.querySelector('#player-profile-username').innerText = player.name;
    document.querySelector('#player-profile-wins').innerText = player.victories;
    document.querySelector('#player-profile-level').innerText = player.level;
    document.querySelector('#player-profile-energies').innerText = energyNames.join(', ');
    // document.getElementById('player-gold').innerText = player.gold;
  } else {
    window.location.replace('/login');
  }
}


async function loadAll() {
  await checkToken();
  await loadPlayerInfo();
}

loadAll();


