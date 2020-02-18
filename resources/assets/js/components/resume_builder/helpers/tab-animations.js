/**
 *
 * @export
 * @param {Event} e
 * @param {String} wrapperId
 * @param {VueComponent} component
 * 
 * @pre the VueComponent needs have the "setActiveTab" method and "activeTab" property
 * @pre the css classes of the wrapper needs css animations based on '.move-From-{tabname}'
 * 
 * @description
 *      The function get a tabwrapper and assign to this the active tabs to made the transtions between tabs.
 * 
 * 
 */
export function moveTabsHelper (e, wrapperId, component) {

    // Move decorator on tabs
    let linksWrapper = document.getElementById(wrapperId)
    let { target } = e
    linksWrapper.classList.toggle(`moveFrom-${component.activeTab}`)
    component.setActiveTab(target.getAttribute('data-target'))
    linksWrapper.classList.toggle(`moveFrom-${component.activeTab}`)

    let decorator = linksWrapper.querySelector('.decorator');
    decorator.style.width = target.offsetWidth + 'px';

    // Compplete move of the decorator
    decorator.style.transform = `translateX(${target.offsetLeft}px)`;
}