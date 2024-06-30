document.addEventListener('DOMContentLoaded', () => {
    const background = document.getElementById('background');

    function createLine() {
        const line = document.createElement('div');
        line.classList.add('line');

        line.style.left = Math.random() * 100 + 'vw';
        line.style.animationDuration = Math.random() * 3 + 3 + 's';

        background.appendChild(line);

        setTimeout(() => {
            line.remove();
        }, 5000);
    }

    setInterval(createLine, 300);
});
// license = Adamusekk