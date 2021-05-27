if (document.querySelector('.shape-collection')) {
    let app = new Vue({
        el: ".shape-collection",
        delimiters: ['${', '}'],

        data() {
            return {
                shape: '',
            }
        },

        computed: {

        },
        created() {

        },

        methods: {
            getShape(event) {
                let id = event.currentTarget.id;
                let newID = id.split('_');
                if (this.shape == '') {
                    let active = document.getElementById(id);
                    active.classList.add('shape--box');
                    console.log(active.children);
                    active.children[0].classList.add('selected--box');
                    document.getElementById("icon_" + newID[1]).classList.remove("d-none-my");
                } else {
                    //Last Check Icon Remove
                    let lastId = this.shape.split('_');
                    let getCheck = document.getElementById('icon_' + lastId[1]);
                    getCheck.classList.add("d-none-my");
                    //Last shape--box class remove
                    let deactivate = document.getElementById(this.shape);
                    deactivate.classList.remove('shape--box');
                    deactivate.children[0].classList.remove('selected--box');

                    //New Check Icon & shape--box class Add
                    document.getElementById("icon_" + newID[1]).classList.remove("d-none-my");
                    let active = document.getElementById(id);
                    active.classList.add('shape--box');
                    active.children[0].classList.add('selected--box');
                }

                this.shape = id;
                let btn = document.querySelector('.right-btn');
                btn.innerHTML = `<a href=\"/shape-collection-${newID[1]}/products\" class=\"lezada-button lezada-button--large lezada-button--icon lezada-button--icon--right\"> NEXT <i class=\"ti-angle-double-right\"></i></a>`;
            }
        }
    });
}
