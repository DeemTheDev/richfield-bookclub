const toggleButton = document.getElementsByClassName('toggle')[0]
const navbarLinks = document.getElementsByClassName('navbar__links')[0]

toggleButton.addEventListener('click', () => {
    navbarLinks.classList.toggle('active')
});
