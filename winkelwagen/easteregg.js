// Zoekt voor de letter combinatie game
const targetSequence = 'game';
let currentSequence = '';
function handleKeyDown(event) {
  currentSequence += event.key.toLowerCase();

  // checked of de targetsquence is gevonden in de currentsequence en als dat zo is opened hij de model
  if (currentSequence === targetSequence) {
    document.getElementById('popup').style.display = 'flex';
    currentSequence = '';
    }
  }

// luistered mee naar de keyboard input
document.addEventListener('keydown', handleKeyDown);

const puzzleContainer = document.getElementById('puzzle-container');
const pieces = Array.from({ length: 8 }, (_, index) => index + 1);
pieces.push(9);

// puzzle stukjes schudden
shuffleArray(pieces);

// creeren van puzzle stukjes
pieces.forEach((value, index) => {
  const piece = document.createElement('div');
  piece.className = 'puzzle-piece';
  // maakt de achtergrondafbeelding van het puzzelstukje in met behulp van de 'value' uit de 'pieces' array
  piece.style.backgroundImage = `url('puzzle-img/${value}.jpg')`;
  piece.dataset.index = index;
  // maakt de puzzelstukje sleepbaar (draggable)
  piece.draggable = true;

  // Voegt de eventlistener toe voor het slepen en neerzetten functionaliteit
  piece.addEventListener('dragstart', dragStart);
  piece.addEventListener('dragover', dragOver);
  piece.addEventListener('dragenter', dragEnter);
  piece.addEventListener('dragleave', dragLeave);
  piece.addEventListener('drop', drop);

  // Voegt de puzzelstukje toe aan de 'puzzleContainer'
  puzzleContainer.appendChild(piece);
});

// openen en sluiten van model
function closePopup() {
  document.getElementById('popup').style.display = 'none';
}

// schudt de elementen van een array willekeurig door elkaar
function shuffleArray(array) {
  for (let i = array.length - 1; i > 0; i--) {
    const j = Math.floor(Math.random() * (i + 1));
    [array[i], array[j]] = [array[j], array[i]];
  }
}

// activeerd wanneer het slepen van een element begint
function dragStart(e) {
  e.dataTransfer.setData('text/plain', e.target.dataset.index);
}

// activeerd wanneer een element over een geldig neerzetdoel wordt gesleept
function dragOver(e) {
  e.preventDefault();
}

// activeerd wanneer een gesleept element een geldig neerzetdoel binnenkomt
function dragEnter(e) {
  e.preventDefault();
  this.style.border = '2px dashed #000';
}

// activeerd wanneer een gesleept element een neerzetdoel verlaat
function dragLeave() {
  this.style.border = '2px solid #000';
}

// activeerd wanneer een gesleept element wordt neergezet op een geldig neerzetdoel
function drop(e) {
  e.preventDefault();
  const draggedIndex = e.dataTransfer.getData('text/plain');
  const targetIndex = this.dataset.index;

  [pieces[draggedIndex], pieces[targetIndex]] = [pieces[targetIndex], pieces[draggedIndex]];
  renderPuzzle();
}

// werkt de visuele weergave van de puzzel bij op basis van de huidige staat van de 'pieces' array
function renderPuzzle() {
  const puzzlePieces = document.querySelectorAll('.puzzle-piece');
  puzzlePieces.forEach((piece, index) => {
  piece.style.backgroundImage = `url('puzzle-img/${pieces[index]}.jpg')`;
  piece.style.border = '2px solid #000';
  });

  checkSolution();
}

// als de puzzel klaar is wordt de gebruiker geredirect
function checkSolution() {
const correctOrder = Array.from({ length: 8 }, (_, index) => index + 1);
correctOrder.push(9);

  if (JSON.stringify(pieces) === JSON.stringify(correctOrder)) {
    window.location.href = 'https://www.youtube.com/watch?v=xvFZjo5PgG0&ab_channel=Duran';
    closePopup();
  }
}