if (document.querySelector('.single--product')) {
    let app = new Vue({
        el: ".single--product",
        delimiters: ['${', '}'],

        data() {
            return {
                product: false,
                getLength: '',
                getWidth: '',
                getHeight: '',
                image: '',
            }
        },

        computed: {
            afterFillForm() {
                if (this.getLength && this.getWidth && this.getHeight) {
                    let btn = document.querySelector('#sizeFillBTN');
                    btn.style.opacity = '1';
                    btn.style.cursor = 'pointer';
                    btn.disabled = false;
                }
            }
        },
        created() {

        },

        methods: {
            loadProduct() {
                document.querySelector('.sofa--size').style.display = 'none';
                document.querySelector('.product--single').style.display = 'block';
            },
            loadSize() {
                document.querySelector('.sofa--size').style.display = 'block';
                document.querySelector('.product--single').style.display = 'none';
            },
            getMate(id) {
                console.log(id);
            },
            addToCart(id, cat_id) {
                let getImageSrc = document.querySelector('.getScreenShotImage');
                let getLength = this.getLength;
                let getWidth = this.getWidth;
                let getHeight = this.getHeight;

                Unlimited3D.getSnapshot({
                    width: 1280,
                    height: 720,
                }, function(err, result) {
                    getImageSrc.src = result.data;

                    let image = getImageSrc.src;
                    axios.post('/cart', { image: image, id: id, price: 20, category_id: cat_id, getLength: getLength, getWidth: getWidth, getHeight: getHeight })
                        .then(response => {
                            toastr.success("Cart Added Successfully!");
                        })
                        .catch(error => {
                            toastr.warning("Opps! Something is wrong.");
                        })
                });
            }
        }
    });
}
