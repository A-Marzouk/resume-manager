'use strict'

class SideNav {
    constructor () {
        this.sideNavEl = document.querySelector('.js-side-nav');
        this.sideNavContainerEl = document.querySelector('.js-side-nav-container');
        this.showButtonEl = document.querySelector('.js-menu-open');
        this.closeButtonEl = document.querySelector('.js-menu-close');

        this.openSideNav = this.openSideNav.bind(this);
        this.closeSideNav = this.closeSideNav.bind(this);
        this.blockClicks = this.blockClicks.bind(this);
        this.onTransitionEnd = this.onTransitionEnd.bind(this);

        this.addEventListeners();
    }

    addEventListeners() {
        this.showButtonEl.addEventListener('click', this.openSideNav);
        this.closeButtonEl.addEventListener('click', this.closeSideNav);
        this.sideNavEl.addEventListener('click', this.blockClicks);
        this.sideNavContainerEl.addEventListener('click', this.closeSideNav);
    }

    blockClicks(evt) {
        evt.stopPropagation();
    }

    onTransitionEnd(evt) {
        this.sideNavContainerEl.classList.remove('side-nav-animatable');
        this.sideNavContainerEl.removeEventListener('transitionend', this.onTransitionEnd);
    }

    openSideNav() {
        this.sideNavContainerEl.classList.add('side-nav-animatable');
        this.sideNavContainerEl.classList.add('side-nav-visible');
        this.sideNavContainerEl.addEventListener('transitionend', this.onTransitionEnd);

        // change the open icon to close icon
        $('#menu-open-icon').addClass('d-none');
        $('#menu-close-icon').removeClass('d-none');
    }

    closeSideNav() {
        this.sideNavContainerEl.classList.add('side-nav-animatable');
        this.sideNavContainerEl.classList.remove('side-nav-visible');
        this.sideNavContainerEl.addEventListener('transitionend', this.onTransitionEnd);

        // change the open icon to close icon
        $('#menu-close-icon').addClass('d-none');
        $('#menu-open-icon').removeClass('d-none');
    }
}

new SideNav();