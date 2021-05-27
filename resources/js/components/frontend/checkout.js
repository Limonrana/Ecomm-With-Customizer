if (document.querySelector('.checkout')) {
    let app = new Vue({
        el: ".checkout",
        delimiters: ['${', '}'],

        data() {
            return {
                pay_method: '',
            }
        },

        computed: {

        },
        created() {

        },

        methods: {
            showPayment(event) {
                let targetId = event.currentTarget.id;
                if (this.pay_method) {
                    let newContent = document.getElementById(targetId + '_content');
                    let oldContent = document.getElementById(this.pay_method + '_content');
                    oldContent.style.display = 'none';
                    newContent.style.display = 'block';
                    this.pay_method = targetId;
                } else {
                    let newContent = document.getElementById(targetId + '_content');
                    newContent.style.display = 'block';
                    this.pay_method = targetId;
                }
            },
            buttonEvent() {
                let btn_spinner = document.getElementById('spinner');
                let btn_text = document.getElementById('button-text');
                btn_text.style.display = 'none';
                btn_spinner.style.display = 'block';
            }
        }
    });
}
