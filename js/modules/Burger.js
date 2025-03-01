let btn = null;

function openMenu() {
    if (!btn) return;
    btn.setAttribute("aria-expanded", "true");
    btn.setAttribute("aria-label", "Cacher le menu");
}

function closeMenu() {
    if (!btn) return;
    btn.setAttribute("aria-expanded", "false");
    btn.setAttribute("aria-label", "Afficher le menu");
}

const handleBtnClick = (e) => {
    e.preventDefault();
    if (!btn) return;

    if (btn.getAttribute('aria-expanded') === "false") {
        openMenu();
    } else {
        closeMenu();
    }
};

const handleWindowKeyDown = (e) => {
    if (e.key === "Escape" || e.key === "Esc") {
        e.preventDefault();
        if (!btn) return;

        btn.focus();
        closeMenu();
    }
};

function initMenuBurger(buttonElement) {
    if (!buttonElement) {
        console.error("Erreur : Aucun bouton trouvé pour initMenuBurger !");
        return;
    }

    btn = buttonElement;

    closeMenu();

    btn.addEventListener('click', handleBtnClick);
    window.addEventListener('keydown', handleWindowKeyDown);
}

export { initMenuBurger };

