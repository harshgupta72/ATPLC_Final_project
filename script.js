
function showWelcomeMessage() {
    alert("Welcome to Tathagat Boys' Hostel Website!");
}


function setupButtonHover() {
    const viewRoomsBtn = document.getElementById('viewRoomsBtn');
    viewRoomsBtn.addEventListener('mouseover', function() {
        viewRoomsBtn.style.backgroundColor = '#4CAF50';
        viewRoomsBtn.style.color = '#fff';
    });
    viewRoomsBtn.addEventListener('mouseout', function() {
        viewRoomsBtn.style.backgroundColor = '';
        viewRoomsBtn.style.color = '';
    });
}

function setupImageToggle() {
    const heroImg = document.getElementById('heroimg');
    let enlarged = false;

    heroImg.addEventListener('click', function() {
        if (!enlarged) {
            heroImg.style.transform = 'scale(1.3)';
            heroImg.style.transition = 'transform 0.3s';
            enlarged = true;
        } else {
            heroImg.style.transform = 'scale(1)';
            enlarged = false;
        }
    });
}

function setupNavHighlight() {
    const navLinks = document.querySelectorAll('nav ul li a');
    navLinks.forEach(link => {
        link.addEventListener('mouseover', () => {
            link.style.color = 'orange';
        });
        link.addEventListener('mouseout', () => {
            link.style.color = '';
        });
    });
}

window.onload = function() {
    showWelcomeMessage();
    setupButtonHover();
    setupImageToggle();
    setupNavHighlight();
};
