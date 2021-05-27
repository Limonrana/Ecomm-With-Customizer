if (document.querySelector('.product')) {
    let productForm = new Vue({
        el: ".product",
        delimiters: ['${', '}'],

        data() {
            return {
                form: {
                    product_id: '',
                    attribute_id: '',
                    value: '',
                    sku: '',
                    price: '',
                    description: '',
                    images: []
                }
            }
        },

        computed: {

        },
        created() {

        },

        methods: {
            updateVariant(id) {
                console.log(id);
            }
        }
    });
}
