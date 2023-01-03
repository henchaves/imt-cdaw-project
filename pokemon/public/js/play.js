
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
    const energyNames = player.energies.map(energy => energy.energy.name);
    document.querySelector('#player-profile-username').innerText = player.name;
    document.querySelector('#player-profile-wins').innerText = player.victories;
    document.querySelector('#player-profile-level').innerText = player.level;
    document.querySelector('#player-profile-energies').innerText = energyNames.join(', ');
  } else {
    window.location.replace('/login');
  }
}

function loadHistoricalBattle() {
  const battles = player.combats;
  const battleBody = document.querySelector('#battles-table-body');
  battles.forEach(battle => {
    const battleRow = document.createElement('tr');
    const battleDate = new Date(battle.created_at);
    const battleOpponent = battle.opponent.name;
    const battleResult = battle.is_winner ? 'WIN' : 'LOSE';
    const battleResultColor = battle.is_winner ? 'green' : 'red';
    const replayButton = document.createElement('button');
    // add boostrap class
    replayButton.classList.add('btn', 'btn-outline-secondary', 'btn-sm', 'flex');
    replayButton.innerText = 'Replay';
    replayButton.addEventListener('click', () => {
      window.location.replace(`/replay/${battle.id}`);
    });

    battleRow.innerHTML = `
      <td>${battleDate.toLocaleString()}</td>
      <td>${battleOpponent}</td>
      <td style="color:${battleResultColor}">${battleResult}</td>
    `;
    battleRow.appendChild(replayButton);
    battleBody.appendChild(battleRow);
  });

}


async function loadAll() {
  await checkToken();
  await loadPlayerInfo();
  loadHistoricalBattle();

}

loadAll();


