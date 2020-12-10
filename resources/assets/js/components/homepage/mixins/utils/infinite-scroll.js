import { reject } from "lodash";

export default {
    data() {
        return {
            apiUrl: null,
            perPage: null,
            lastPage: null,
            currentPage: null,
            loadMoreMethodName: null,
            loadingMore: false,
        }
    },
    methods: {
        initialLoad(apiUrl, page = 1, count = 10, loadMoreMethodName = 'loadMore') {
            return new Promise((resolve, reject) => {
                this.apiUrl = apiUrl;
                this.loadMoreMethodName = loadMoreMethodName;

                axios.get(`${apiUrl}?page=${page}&count=${count}`).then(({ data: { current_page, data, last_page, per_page } }) => {
                    this.perPage = parseInt(per_page);
                    this.lastPage = parseInt(last_page);
                    this.currentPage = parseInt(current_page);

                    resolve(data);
                });
            });
        },
        loadMore() {
            return new Promise((resolve, reject) => {
                this.loadingMore = true;
                axios.get(`${this.apiUrl}?page=${this.currentPage + 1}&count=${this.perPage}`).then(({ data: { current_page, data, last_page, per_page } }) => {
                    this.perPage = parseInt(per_page);
                    this.lastPage = parseInt(last_page);
                    this.currentPage = parseInt(current_page);
                    setTimeout(() => { this.loadingMore = false; }, 1000);
                    resolve(data);
                });
            });
        },
        onScroll({ target: body }) {
            const scrollBottom = body.scrollHeight - body.scrollTop - body.clientHeight;
            if (!this.loadingMore && this.currentPage < this.lastPage && scrollBottom <= 92) {
                this[this.loadMoreMethodName]();
            }
        }
    },
    mounted() {
        $('body').on('scroll', this.onScroll);
    },
}