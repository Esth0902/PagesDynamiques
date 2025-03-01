
export class HamburgerMenu {
    constructor(menuToggleSelector, menuSelector) {
        this.menuToggle = document.querySelector(menuToggleSelector);
        this.menu = document.querySelector(menuSelector);
        this.init();
    }

    init() {
        if (this.menuToggle && this.menu) {
            this.menuToggle.addEventListener("click", () => this.toggleMenu());
        }
    }

    toggleMenu() {
        this.menu.classList.toggle("active");
        this.menuToggle.classList.toggle("open");
    }
}


