export default {
    methods: {
        ensureSingleSpanceBetweenWords(str) {
            return str.replace(/\s\s+/g, " ");
        },
    }
}