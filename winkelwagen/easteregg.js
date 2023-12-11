// Zoekt voor de letter combinatie game
const targetSequence = 'game';
    let currentSequence = '';
    function handleKeyDown(event) {
      currentSequence += event.key.toLowerCase();

      // Check if the target sequence is detected
      if (currentSequence === targetSequence) {
        document.getElementById('popup').style.display = 'flex';
        currentSequence = '';
      }
    }

    // Attach the keydown event listener to the document
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
      piece.innerHTML = value.toString();
      piece.dataset.index = index;
      piece.draggable = true;

      piece.addEventListener('dragstart', dragStart);
      piece.addEventListener('dragover', dragOver);
      piece.addEventListener('dragenter', dragEnter);
      piece.addEventListener('dragleave', dragLeave);
      piece.addEventListener('drop', drop);

      puzzleContainer.appendChild(piece);
    });

    // openen en sluiten van model
    function closePopup() {
      document.getElementById('popup').style.display = 'none';
    }

    function shuffleArray(array) {
      for (let i = array.length - 1; i > 0; i--) {
        const j = Math.floor(Math.random() * (i + 1));
        [array[i], array[j]] = [array[j], array[i]];
      }
    }

    function dragStart(e) {
      e.dataTransfer.setData('text/plain', e.target.dataset.index);
    }

    function dragOver(e) {
      e.preventDefault();
    }

    function dragEnter(e) {
      e.preventDefault();
      this.style.border = '2px dashed #000';
    }

    function dragLeave() {
      this.style.border = '2px solid #000';
    }

    function drop(e) {
      e.preventDefault();
      const draggedIndex = e.dataTransfer.getData('text/plain');
      const targetIndex = this.dataset.index;

      [pieces[draggedIndex], pieces[targetIndex]] = [pieces[targetIndex], pieces[draggedIndex]];
      renderPuzzle();
    }

    function renderPuzzle() {
      const puzzlePieces = document.querySelectorAll('.puzzle-piece');
      puzzlePieces.forEach((piece, index) => {
        piece.innerHTML = pieces[index].toString();
        piece.style.border = '2px solid #000';
      });

      checkSolution();
    }

    function checkSolution() {
  const correctOrder = Array.from({ length: 8 }, (_, index) => index + 1);
  correctOrder.push(9);

  if (JSON.stringify(pieces) === JSON.stringify(correctOrder)) {
    window.location.href = 'https://www.youtube.com/watch?v=JHdkLUl3hxM';
    closePopup();
  }
}