<template>
    <div class="">

        <form v-if="done" style="color: #000" class="col-sm-12 col-sm-8 col-lg-8 m-auto form-data">
            <h3 class="text-center mt-4 mb-4" >Form successfully submitted</h3>
        </form>
        <form v-else @submit.prevent="submitForm" method="POST"  class="col-sm-12 col-sm-8 col-lg-8 m-auto form-data">
            <errors :errors="errors" v-if="errors"></errors>

            <div class="requset-crad-form">
                <div class="form-group">
                    <div class="col-sm-12 col-sm-offset-2">

                    </div>
                </div>
                <div class="form-group col-12">
                    <input required="" type="text" class="form-control text-left " id="name" v-model="form.full_name" autocomplete="off" placeholder="Full Name">
                </div>

                <div class="form-group col-12">
                    <select v-model="form.gender" required="" class="custom-select text-left ltr">
                        <option  value="male" selected="selected">Gender</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                    </select>
                </div>

                <div class="form-group col-12">
                    <input required v-model="form.cpr_no" type="text" class="form-control text-left"  placeholder="CPR No.">
                </div>

                <div class="form-group col-12">
                    <input v-model="form.mobile" required="" type="text" class="form-control text-left " id="mobile" name="mobile" autocomplete="off" placeholder="Mobile 1">
                </div>
                <div class="form-group col-12">
                    <input v-model="form.mobile2" type="text" class="form-control text-left " id="mobile_2" autocomplete="off" placeholder="Mobile 2">
                </div>

                <div class="form-group col-12">
                    <input type="text" v-model="form.address" class="form-control text-left " id="block" autocomplete="off" placeholder="Address">
                </div>

                <div required="" class="form-group col-12">
                    <input type="email" v-model="form.email" class="form-control text-left "  autocomplete="off" placeholder="Email">
                </div>

                <div class="form-group col-12">
                    <textarea v-model="form.comment" class="form-control text-left " rows="2" autocomplete="off" placeholder="Notes"></textarea>
                </div>
            </div>


            <div class="" v-if="show_add">
                <br>
                <hr class="row d-flex m-0 w-100">
                <br>

                <div class="row min-form-additional-data" v-if="members.length > 0">

                    <h4 class="d-block row w-100 text-info text-center">More People</h4>
                    <br>

                    <template v-for="i in members">
                    <div class="row m-0 input-list">
                        <div class="form-group col-12 col-md-6 float-left">
                            <input v-model="i.full_name" disabled type="text" class="form-control text-left"  autocomplete="off" placeholder="Full Name">
                        </div>

                        <div class="form-group col-12 col-md-6">
                            <select disabled v-model="i.gender" class="custom-select text-left ltr">
                                <option value="male" selected="selected">Gender</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                            </select>
                        </div>

                        <div class="form-group col-12 col-md-6">
                            <input disabled type="text" class="form-control text-left" v-model="i.cpr_no" autocomplete="off" placeholder="CPR No.">
                        </div>

                        <div class="form-group col-12 col-md-6">
                            <input disabled type="text" class="form-control text-left" v-model="i.mobile" autocomplete="off" placeholder="Mobile 1">
                        </div>

                        <div class="form-group col-12 col-md-6">
                            <input disabled type="text" class="form-control text-left" v-model="i.mobile2" autocomplete="off" placeholder="Mobile 2">
                        </div>

                        <div class="form-group col-12 col-md-6">
                            <input disabled type="text" class="form-control text-left"  v-model="i.address" autocomplete="off" placeholder="Address">
                        </div>

                        <div class="form-group col-12 col-md-6">
                            <button class="btn btn-danger" @click="deleteUser(i.id)"><i class="fa fa-trash"></i> Delete Person</button>
                        </div>


                        <div class="form-group col-12 col-md-6">
                            <input disabled type="email" class="form-control text-left" v-model="i.email" autocomplete="off" placeholder="Email">
                        </div>

                    </div>

                    </template>
                </div>


                <div class="row min-form-additional-data">
                    <h4 class="d-block row w-100 text-info text-center">Add Other People</h4>
                    <div v-if="can_add">
                        <errors :errors="errors" v-if="errors"></errors>
                    </div>
                    <br>
                    <div class="row m-0 input-list">
                        <div class="form-group col-12 col-md-6 float-left">
                            <input v-model="formMember.full_name" type="text" class="form-control text-left"  autocomplete="off" placeholder="Full Name">
                        </div>

                        <div class="form-group col-12 col-md-6">
                            <select v-model="formMember.gender" class="custom-select text-left ltr">
                                <option value="male" selected="selected">Gender</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                            </select>
                        </div>

                        <div class="form-group col-12 col-md-6">
                            <input type="text" class="form-control text-left" v-model="formMember.cpr_no" autocomplete="off" placeholder="CPR No.">
                        </div>

                        <div class="form-group col-12 col-md-6">
                            <input type="text" class="form-control text-left" v-model="formMember.mobile" autocomplete="off" placeholder="Mobile 1">
                        </div>

                        <div class="form-group col-12 col-md-6">
                            <input type="text" class="form-control text-left" v-model="formMember.mobile2" autocomplete="off" placeholder="Mobile 2">
                        </div>

                        <div class="form-group col-12 col-md-6">
                            <input type="text" class="form-control text-left"  v-model="formMember.address" autocomplete="off" placeholder="Address">
                        </div>


                        <div class="form-group col-12 col-md-6">
                            <input type="email" class="form-control text-left" id="additional_email" v-model="formMember.email" autocomplete="off" placeholder="Email">
                        </div>

                    </div>

                    <div class="row m-0 p-3 w-100 d-flex add-more-btn">
                        <button @click="addMoreMember" type="button" class="btn btn-info save-data-and-add-more col-4 btn-block p-1 m-auto">
                            <span data-icon="&#xe973"></span>Add More                        </button>

                    </div>

                </div>
            </div>

            <div class="row m-0 p-3 w-100 d-flex">
                <br>
                <button type="submit" class="btn btn-dark btn-send-data col-4 col-md-4 p-1 ml-auto" name="submit">
                    <span data-icon="&#xf1f6"></span> Send                </button>

                <button @click="addMembers" type="button" class="btn btn-light btn-add-more col-8 col-md-4 p-1 mr-auto">
                    <span data-icon="&#xf067"></span> Add Other People                </button>

            </div>

        </form>

    </div>
</template>

<script>
import Errors from "./Errors";
export default {
    components: {Errors},

    props:['post_url'],

    name: "EditCard",
    data() {
        return {
            more : false,
            editImg:'',
            show_add:false,
            add_title : 'Add more member',
            loaded : false,
            done : false,
            errors : null,
            members : [],
            can_add:false,
            form: {
                'full_name' : '',
                'api' : true,
                'gender' : 'male',
                'cpr_no' : '',
                'is_online' : 1,
                'mobile' : '',
                'status' : 'cancelled',
                'price' : '',
                'mobile2' : '',
                'phone' : '',
                'address' : '',
                'card_type' : '',
                'comment' : '',
                'issue_date' : '',
                'expiry_date' : '',
                'first_issue_date' : '',
                'email' : '',
                'members' : [],
                'is_parent' : 1,
                'policy_no': '',
                'period': 12,
            },
            formMember: {
                'full_name' : '',
                'cpr_no' : '',
                'gender' : 'male',
                'mobile' : '',
                'mobile2' : '',
                'is_parent' : 0,
                'status' : 'pending',
                'phone' : '',
                'address' : '',
                'comment' : '',
                'email' : '',
            },
            formMemberNew: {
                'full_name' : '',
                'cpr_no' : '',
                'gender' : 'male',
                'mobile' : '',
                'mobile2' : '',
                'phone' : '',
                'address' : '',
                'is_parent' : 0,
                'comment' : '',
                'email' : '',
            },
            loading:false,
        }
    },
    mounted() {

    },
    methods : {
        deleteUser(id){
            if(confirm("Do you really want to delete this card ?")){
                axios.get('/admin/card/destroy/'+id).then((res)=> {
                    this.update()
                });
            }
        },
        addMembers(){
            if(this.form.full_name.length < 2 || this.form.cpr_no.length < 2){
                toastr.error('Enter your full name and cpr before adding members')
            }else {
                if(!this.can_add){
                    this.submitCardP();
                }else{
                    this.toggleCard();
                }
            }
        },

        toggleCard(){
            this.show_add = !this.show_add
        },

        submitForm(){
            if(this.formMember.full_name.length > 2){
                if(this.form.cpr_no.length < 2){
                    toastr.error('Enter member CPR number to proceed')
                }else {
                    this.formMember.card_id = this.form.id;
                    this.errors = null;
                    axios.post(this.post_url, this.formMember).then((res)=>{
                        this.loading = false
                        this.members = res.data
                        console.log(this.members)
                        this.clearForm();
                        this.submitCard();
                    }).catch((error)=>{
                        this.loading = false
                        if (error.response.status === 422){
                            this.errors = error.response.data.errors;
                        }
                    })
                }
            }else{
                this.submitCard();
            }
        },

        submitCardP(){
            this.loading = true;
            this.errors = null;
            axios.post(this.post_url, this.form).then((res)=>{
                this.loading = false
                this.form.id = res.data.id;
                this.formMember.period = res.data.period;
                this.formMember.package_type = res.data.package_type;
                this.form.update_url = res.data.update_url;
                this.form.price = res.data.price;
                this.form.package_type = res.data.package_type;
                this.toggleCard();
                this.can_add = true;
                this.loaded = true;
                toastr.success('New member successfully added');
            }).catch((error)=>{
                this.loading = false
                if (error.response.status === 422){
                    this.errors = error.response.data.errors;
                }
            })
        },

        submitMember(){
            this.loading = true;
            this.formMember.card_id = this.form.id;
            this.errors = null;
            axios.post(this.post_url, this.formMember).then((res)=>{
                this.loading = false
                this.members = res.data
                console.log(this.members)
                this.clearForm();
                toastr.success('New member successfully added');
            }).catch((error)=>{
                this.loading = false
                if (error.response.status === 422){
                    this.errors = error.response.data.errors;
                }
            })
        },

        submitCard(){
            this.form.status = 'pending';
            if(!this.can_add){
                this.submitCardP();
            }
            this.update();
            this.done = true;
            toastr.success('Card successfully submit')
            this.clearForm();
            this.members = [];
            this.form.cpr_no = '';
            this.form.full_name = '';
            this.form.mobile = '';   this.form.mobile2 = '';  this.form.address = '';
        },

        addMoreMember(){
            if(this.formMember.full_name.length < 2 || this.formMember.cpr_no.length < 2){
                toastr.error('Enter name and cpr number')
            }else{
                this.submitMember();
            }
            // toastr.success('Add more member')
        },

        clearForm(){
            this.formMember.full_name = ''; this.formMember.email = ''; this.formMember.cpr_no = '';
            this.formMember.address = '';    this.formMember.mobile = '';
        },

        update(){
            this.loading = true;
            this.error = null
            this.loaded = false
            axios.put(this.form.update_url, this.form).then((res)=>{
                this.members = res.data;
                this.loading = false;
                // toastr.success('Card information updated')
                setTimeout(()=>{
                    this.loaded = true
                },3000);
            }).catch((error)=>{
                this.loading = false
                this.loaded = true
                if (error.response.status === 422){
                    this.errors = error.response.data.errors;
                }
            })
        },
    },
    computed : {

    },
    watch : {
        form: {
            deep: true,
            // We have to move our method to a handler field
            handler(){
                if(this.can_add && this.loaded){
                    this.update();
                }


            }
    }
    }

}
</script>

<style scoped>

</style>
