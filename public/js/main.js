const toggleMenu = () => {
    menu.classList.toggle('hidden')
    openIcon.classList.toggle('!hidden')
    closeIcon.classList.toggle('!hidden')
    document.body.style.overflow = document.body.style.overflow === 'hidden' ? 'auto' : 'hidden'
}

const menu = document.getElementById('menu')
const menuBtn = document.getElementById('menu-button')
const openIcon = document.getElementById('open-menu-icon')
const closeIcon = document.getElementById('close-menu-icon')

menuBtn.addEventListener('click', toggleMenu)
