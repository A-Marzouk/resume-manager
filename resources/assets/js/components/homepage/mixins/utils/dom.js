export default {
    methods: {
        isElementFocused(elementId) {
            return document.activeElement.id === elementId;
        }
    },
}