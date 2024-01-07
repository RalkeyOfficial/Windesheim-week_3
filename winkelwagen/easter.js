// Zoekt voor de letter combinatie game
const targetSequence = 'rick';
let currentSequence = '';
let correctLetterIndex = 0;

function handleKeyDown(event) {
  // checked voor de puzzle 
  const currentKey = event.key.toLowerCase();

  if (targetSequence[correctLetterIndex] === currentKey) {
    correctLetterIndex++;
  } else {
    correctLetterIndex = 0;
  }

  // checked of de targetsquence is gevonden in de currentsequence en als dat zo is opened hij de model
  if (correctLetterIndex === targetSequence.length) {
    document.getElementById('popup').style.display = 'flex';
    currentSequence = '';
    correctLetterIndex = 0;
  } else {
    currentSequence += currentKey;

    // zoekt of de target sequence is gevonden in de current sequence
    if (currentSequence === targetSequence) {
      document.getElementById('popup').style.display = 'flex';
      currentSequence = '';
    }
  }
}

// luistered mee naar de keyboard input
document.addEventListener('keydown', handleKeyDown);

// openen en sluiten van model
function closePopup() {
  document.getElementById('popup').style.display = 'none';
}