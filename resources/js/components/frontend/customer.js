if (document.querySelector('.customer-dashboard')) {
    let app = new Vue({
        el: ".customer-dashboard",
        delimiters: ['${', '}'],

        data() {
            return {
                order: [],
                OrderData: true,
                passUpdate: {
                    oldpass: '',
                    password: '',
                    password_confirmation: ''
                }
            }
        },

        computed: {
            macthNewPass() {
                let newPass = this.passUpdate.password;
                let confirmPass = this.passUpdate.password_confirmation;
                setTimeout(function(){
                    if (newPass != confirmPass) {
                        document.getElementById('confirm_pwd').style.border = "1px solid red";
                    } else {
                        document.getElementById('confirm_pwd').style.border = "1px solid #e8e8e8";
                    }
                }, 1000);
            }
        },
        created() {

        },

        methods: {
            showAddress(id) {
                let address         = document.getElementById('address');
                let address_fields  = document.getElementById('address_fields');
                if (id == 1) {
                    address.style.display = 'none';
                    address_fields.style.display = 'block';
                } else {
                    address.style.display = 'block';
                    address_fields.style.display = 'none';
                }
            },
            changePassword() {
                let oldpass     = this.passUpdate.oldpass;
                let newPassword    = this.passUpdate.password;
                let passConfirm = this.passUpdate.password_confirmation;
                if (oldpass == '') {
                    toastr.warning("Current password is empty!");
                } else if(newPassword == '') {
                    toastr.warning("New password is empty!");
                } else if(passConfirm == '') {
                    toastr.warning("Confirm password is empty!");
                } else {
                    axios.post('/customer/password/update', this.passUpdate)
                        .then(response => {
                            if (response.data == 'new pass not match') {
                                toastr.warning("Opps! Confirm password not matched!");
                            } else if(response.data == 'old pass not match') {
                                toastr.warning("Opps! Current password is wrong!");
                            } else {
                                window.location.href = "/customer/dashboard";
                                toastr.success("Password Successfully Changed!");
                            }
                        })
                        .catch(error => {
                            toastr.warning("Opps! Something is wrong.");
                        })
                }
            },
            getOrder($id) {
                axios.get('/customer/order/' + $id)
                    .then(response => {
                        this.order = response.data;
                        this.OrderData = false;
                    })
                    .catch(error => {
                        toastr.warning("Opps! Something is wrong.");
                    })
            },
            getOrdersAgain() {
                this.order = [];
                this.OrderData = true;
            }
        }
    });
}
