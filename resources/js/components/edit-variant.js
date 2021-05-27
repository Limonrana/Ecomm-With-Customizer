if (document.querySelector('.edit-variant')) {
    let productForm = new Vue({
        el: ".edit-variant",
        delimiters: ['${', '}'],

        data() {
            return {
            }
        },

        computed: {

        },
        created() {

        },

        methods: {
            deleteImage(event) {
                targetId = event.currentTarget.id;
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        //Delete Request Send
                        axios.delete('/admin/photo/delete/v-' + targetId)
                            .then(response => {
                                var section = document.getElementById("images_"+targetId);
                                section.remove();
                                Swal.fire(
                                    'Deleted!',
                                    'Your file has been deleted.',
                                    'success'
                                )
                            })
                            .catch(error => {
                                toastr.warning("Opps! Something is wrong.");
                            })
                    }
                })
            }
        }
    });
}
