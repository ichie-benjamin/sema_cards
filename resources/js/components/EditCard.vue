<template>
    <div class="card" v-if="card">
        <div class="card-header">
            <div class="row">
                <div class="col">
                    <h4 class="card-title">Editing {{ card.full_name }} Card</h4>
                </div>
                <div class="col-auto align-self-center">
                    <button @click="updateStatus('draft')" class="btn " :class="card.status === 'draft' ? 'btn-success' : 'btn-outline-success'">Draft</button>
                    <button @click="updateStatus('done')" class="btn " :class="card.status === 'done' ? 'btn-success' : 'btn-outline-success'">Done</button>
                    <button @click="updateStatus('paid')" class="btn " :class="card.status === 'paid' ? 'btn-success' : 'btn-outline-success'">Paid</button>
                    <button @click="updateStatus('print')" class="btn " :class="card.status === 'print' ? 'btn-success' : 'btn-outline-success'">Print</button>
                    <button @click="updateStatus('expired')" class="btn " :class="card.status === 'expired' ? 'btn-success' : 'btn-outline-success'">Expired</button>
                </div>
            </div>
        </div>
        <!--end card-header-->

        <div class="card-body">

        <div class="row">
            <div class="col-6">
                <div class="form-group "><label>Full name</label>
                    <input required v-model="card.full_name" type="text" class="form-control" placeholder="Full name" />
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="form-group "><label>CPR No.</label>
                    <input required v-model="card.cpr_no" type="text" class="form-control" placeholder="CPR NO" />
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="form-group "><label>Email.</label>
                    <input  v-model="card.email" type="text" class="form-control" placeholder="Email Address" />
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="form-group "><label>Gender</label>
                    <select class="form-control" v-model="card.gender">
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                    </select>
                </div>
            </div>

            <div class="col-6 col-md-3">
                <div class="form-group "><label>Mobile No.</label>
                    <input  v-model="card.mobile" type="text" class="form-control" placeholder="mobile number" />
                </div>
            </div>

            <div class="col-6 col-md-3">
                <div class="form-group "><label>Phone No.</label>
                    <input  v-model="card.phone" type="text" class="form-control" placeholder="phone number" />
                </div>
            </div>

            <div class="col-6 col-md-3">
                <div class="form-group "><label>Card Type</label>
                    <select class="form-control" v-model="card.card_type">
                        <option v-for="item in card_types" :value="item">{{ item }}</option>
                    </select>
                </div>
            </div>

            <div class="col-12">
                <div class="form-group "><label>Address (Bld/house / Flat / Road , Block , Place , Country)</label>
                    <input   v-model="card.address" type="text" class="form-control" placeholder="address" />
                </div>
            </div>

            <div class="col-6">
                <div class="form-group"><label>Comment </label>
                    <textarea rows="4" class="form-control" v-model="card.comment"></textarea>
                </div>
            </div>
            <div class="col-6">
                <div class="upload-image">
                    <div class="dropzone dropzone-area dz-clickable" style="width: 100%" data-input="editImg" data-preview="editImg_holder">
                        <div class="dz-message lfm" data-input="editImg" data-preview="editImg_holder" >
                            <br />
                            <div id="editImg_holder" style="margin-top:15px; margin-bottom:20px;max-height:200px;"></div>
                        </div>
                        <p class="text-center text-capitalize">Click to select image </p>
                    </div>
                    <input v-model="editImg" id="editImg" class="form-control" type="hidden" name="photo">
                </div>
            </div>

            <template v-if="more">

                <div class="col-6 col-md-3">
                    <div class="form-group "><label>Payment Method</label>
                        <select class="form-control" v-model="card.payment_method">
                            <option class="text-capitalize" v-for="item in p_methods">{{ item }}</option>
                        </select>
                    </div>
                </div>

                <div class="col-6 col-md-3">
                    <div class="form-group "><label>Contact Method</label>
                        <select class="form-control" v-model="card.contact_method">
                            <option class="text-capitalize" v-for="item in con_methods">{{ item }}</option>
                        </select>
                    </div>
                </div>

                <div class="col-6 col-md-3">
                    <div class="form-group "><label>Package Type</label>
                        <select class="form-control" v-model="card.package_type">
                            <option class="text-capitalize"  v-for="item in p_types" :value="item.id">{{ item.name }}</option>
                        </select>
                    </div>
                </div>

                <div class="col-6 col-md-3">
                    <div class="form-group "><label>Period</label>
                        <select class="form-control" v-model="card.period">
                            <option value="3">3 Months</option>
                            <option value="6">6 Months</option>
                            <option value="12">1 Year</option>
                            <option value="24">2 Years</option>
                            <option value="60">5 Years</option>
                        </select>
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="form-group "><label>Status</label>
                        <select class="form-control" v-model="card.status">
                            <option class="text-capitalize" v-for="item in status">{{ item }}</option>
                        </select>
                    </div>
                </div>

                <div class="col-6 col-md-3">
                    <div class="form-group "><label>Issue Date</label>
                        <input v-model="card.issue_date" type="date" class="form-control" placeholder="2021-06-04"  />
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="form-group "><label>Expiry Date</label>
                        <input v-model="card.expiry_date" type="text" disabled class="form-control" placeholder="2021-06-04"  />
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="form-group "><label>First Issue Date</label>
                        <input v-model="card.first_issue_date" type="date" class="form-control" placeholder="2021-06-04"  />
                    </div>
                </div>

            </template>



            <div class="col-12 mb-2" v-if="members.length > 0">
                <hr />
                <h4>Members ({{ members.length}})</h4>
                <div class="table-responsive mb-0" data-pattern="priority-columns">
                    <table id="tech-companies-1" class="table table-striped table-bordered mb-0">
                        <thead>
                        <tr>
                            <th>Full name</th>
                            <th data-priority="1">CPR No</th>
                            <th data-priority="3">Phone No.</th>
                            <th data-priority="3">Email</th>
                            <th data-priority="3">Status</th>
                            <th data-priority="6">Paid</th>
                            <th data-priority="6">Expiry Date</th>
                            <th data-priority="6">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-for="item in members">
                            <td class="text-capitalize">{{ item.full_name }}</td>
                            <td>{{ item.cpr_no }}</td>
                            <td>{{ item.phone }}</td>
                            <td>{{ item.email }}</td>
                            <td class="text-capitalize">
                                <select v-model="item.status" @change="updateCardStatus(item.status, item)" class="form-control">
                                    <option v-for="it in status" :value="it"> {{ it }}</option>
                                </select>
<!--                                {{ item.status }}-->
                            </td>
                            <td>{{ item.paid ? 'Yes' : 'No' }}</td>
                            <td>{{ item.expiry_date }}</td>
                            <td>
                                <a class="btn btn-danger" href=""><i class="fa fa-trash"></i> </a>
                                <button type="button" class="btn btn-warning" @click="editMember(item)"><i class="fa fa-edit"></i> </button>
                            </td>

                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>



            <div class="col-12">
                <button v-if="!more" @click="more = true" class="btn btn-warning" type="button">View more details</button>
                <button v-else @click="more = false" class="btn btn-danger" type="button">Hide details</button>
                <button type="button" class="btn btn-success" @click="addMember"> Add more people</button>
<!--                <button  @click="update" type="button" class="btn btn-primary" >Save</button>-->
                <a :href="'/admin/card/'+card.policy_no" v-if="card.paid > 0" class="btn btn-primary" >View Cards</a>
                <a :href="'/admin/card/'+card.policy_no+'?download'" v-if="card.paid > 0" class="btn btn-success" >Print Cards</a>
                <a href="#" class="btn btn-primary">Invoice</a>
                <button type="button" @click="saveEditImage" class="btn btn-success">Save Photo</button>
                <button type="button" @click="sendEmail(card.id)" :disabled="loading" class="btn btn-warning" v-if="card.paid > 0">Send Email</button>

            </div>
        </div>

        <!--end form-group-->
            <div class="modal fade" ref="modal" id="addMore" tabindex="-1" role="dialog" aria-labelledby="addMore" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title m-0" id="exampleModalDefaultLogin">{{ add_title}}</h6>
                    <button  type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="la la-times"></i></span>
                    </button>
                </div>
                <!--end modal-header-->
                <div class="modal-body">
                    <div class="card-body p-0">
                        <errors :errors="errors" v-if="errors"></errors>
                        <form @submit.prevent="memberSubmit" method="POST" class="form-parsley">
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group "><label>Full name</label>
                                        <input required v-model="form.full_name" type="text" class="form-control" placeholder="Full name" />
                                    </div>
                                </div>
                                <div class="col-6 col-md-6">
                                    <div class="form-group "><label>CPR No.</label>
                                        <input required v-model="form.cpr_no" type="text" class="form-control" placeholder="CPR NO" />
                                    </div>
                                </div>
                                <div class="col-6 col-md-4">
                                    <div class="form-group "><label>Email.</label>
                                        <input v-model="form.email" type="text" class="form-control" placeholder="Email Address" />
                                    </div>
                                </div>
                                <div class="col-6 col-md-4">
                                    <div class="form-group "><label>Gender</label>
                                        <select class="form-control" v-model="form.gender">
                                            <option value="male">Male</option>
                                            <option value="female">Female</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-6 col-md-4">
                                    <div class="form-group "><label>Mobile No.</label>
                                        <input  v-model="form.mobile" type="text" class="form-control" placeholder="mobile number" />
                                    </div>
                                </div>

                                <div class="col-6 col-md-4">
                                    <div class="form-group "><label>Phone No.</label>
                                        <input  v-model="form.phone" type="text" class="form-control" placeholder="phone number" />
                                    </div>
                                </div>

                                <div class="col-6 col-md-4">

                                    <div class="form-group "><label>Card Status</label>
                                        <select class="form-control" v-model="form.status">
                                            <option v-for="item in status">{{ item }}</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-6 col-md-4">
                                    <div class="form-group "><label>Package Type</label>
                                        <select class="form-control" v-model="card.package_type">
                                            <option class="text-capitalize"  v-for="item in p_types" :value="item.id">{{ item.name }}</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-6 col-md-4">
                                    <div class="form-group "><label>Period</label>
                                        <select class="form-control" v-model="card.period">
                                            <option value="3">3 Months</option>
                                            <option value="6">6 Months</option>
                                            <option value="12">1 Year</option>
                                            <option value="24">2 Years</option>
                                            <option value="60">5 Years</option>
                                        </select>
                                    </div>
                                </div>



                                <div class="col-12">
                                    <div class="form-group "><label>Address (Bld/house / Flat / Road , Block , Place , Country)</label>
                                        <input   v-model="form.address" type="text" class="form-control" placeholder="address" />
                                    </div>
                                </div>

                                <div class="col-6 col-md-6">
                                    <div class="form-group"><label>Comment </label>
                                        <textarea rows="4" class="form-control" v-model="form.comment"></textarea>
                                    </div>
                                </div>

                                <div class="col-6 col-md-6">
                                    <div class="upload-image">
                                        <div class="dropzone dropzone-area dz-clickable" style="width: 100%" data-input="memImg" data-preview="mem_holder">
                                            <div class="dz-message lfm" data-input="memImg" data-preview="mem_holder" >
                                                <br />
                                                <div id="mem_holder" style="margin-top:15px; margin-bottom:20px;max-height:200px;"></div>
                                            </div>
                                            <p class="text-center text-capitalize">Click to select image </p>
                                        </div>
                                        <input id="memImg" class="form-control" type="hidden" name="memImg">
                                    </div>
                                </div>




                                <div class="col-12">
                                    <button  class="btn btn-primary" type="submit">{{ edit ? 'Update Member' : 'Save Member'}}</button>
                                </div>
                            </div>

                            <!--end form-group-->
                        </form>
                    </div>
               </div>
                <!--end modal-body-->
            </div>
            <!--end modal-content-->
        </div>
        <!--end modal-dialog-->
    </div>
        </div>
    </div>
</template>

<script>
import Errors from "./Errors";
export default {
    components: {Errors},

    props:['card_data','url','send_mail','p_methods','con_methods','status','post_url','members','p_types','card_types','view_card'],
name: "EditCard",
    data() {
        return {
            more : false,
            editImg:'',
            edit : false,
            add_title : 'Add more member',
            loaded : false,
            errors : null,
            card : null,
            form: {
                'full_name' : '',
                'api' : true,
                'gender' : 'male',
                'period' : this.card_data.period,
                'cpr_no' : '',
                'mobile' : '',
                'mobile2' : '',
                'phone' : '',
                'address' : '',
                'card_type' : '',
                'payment_method' : this.card_data.payment_method,
                'contact_method' : this.card_data.contact_method,
                'package_type' : this.card_data.package_type,
                'comment' : '',
                'agent_id' : this.card_data.agent_id,
                'status' : 'draft',
                'issue_date' : '',
                'expiry_date' : '',
                'first_issue_date' : '',
                'email' : '',
                'card_id' : this.card_data.id,
                'is_parent' : 0,
                'policy_no': '',
            },
            loading:false
        }
    },
    mounted() {
        this.card = this.card_data

        setTimeout(()=>{
            this.loaded = true
        },3000);
    },
    methods : {
        toast(){
            toastr.success('Have fun storming the castle!', 'Miracle Max Says')
        },
        saveEditImage(){
            let img = $('input[id=editImg]').val()
            if(img){
                this.card.photo = img;
                this.update();
            }else{
                toastr.error('No new photo uploaded')
            }

        },
        updateCardStatus(status, item){
            axios.put(item.update_url, item).then((res)=> {
                console.log(res.data);
                toastr.success('Card Status successfully updated')
            })
        },
        updateStatus(status){
            this.card.status = status;
        },
        update(){
            this.loading = true;
            this.error = null
            this.loaded = false
            axios.put(this.url, this.card).then((res)=>{
                console.log(res.data);
                this.loading = false;
                this.card = res.data
                toastr.success('Card information updated')
                setTimeout(()=>{
                    this.loaded = true
                },3000);
            }).catch((error)=>{
                this.loading = false
                if (error.response.status === 422){
                    this.errors = error.response.data.errors;
                }
            })
        },
        sendEmail(id){
            axios.post(this.send_mail, {id:id}).then((res)=>{
                if(res.data.status === 1){
                    toastr.success('Mail successfully sent to card user')
                }
                else if(res.data.status === 2){
                    toastr.error('Invalid email address, pls correct card email address to send mail')
                }
                else {
                    toastr.success('Something went wrong')
                }

            });
        },
        updateMember(){
            this.loading = true;
            this.error = null
            let img = $('input[id=memImg]').val();
            if(img){
                this.form.photo = img;
            }
            axios.put(this.form.update_url, this.form).then((res)=>{
                // this.members = res.data
                this.loading = false;
                toastr.success('Member details updated successfully')
                let element = this.$refs.modal
                $(element).modal('hide')
            }).catch((error)=>{
                this.loading = false
                if (error.response.status === 422){
                    this.errors = error.response.data.errors;
                }
            })
        },
        addMember(){
            this.add_title = 'Add New Member';
            this.edit = false;
            this.clearForm();
            let element = this.$refs.modal
            $(element).modal('show')
        },
        editMember(item){
            this.edit = true;
            this.add_title = 'Editing '+ item.full_name;
            this.form = item
            // alert(item.update_url)
            let element = this.$refs.modal
            $(element).modal('show')
            console.log(item)
        },
        clearForm(){
            this.form.full_name = ''; this.form.email = ''; this.form.cpr_no = ''; this.form.gender = ''; this.form.gender = 'male'; this.form.phone = '';
            this.form.card_type = ''; this.form.address = ''; this.form.comment = '';
        },
        memberSubmit(){
            if(this.edit){
                this.updateMember()
            }else {
                this.submitMember();
            }
        },
        submitMember(){
            this.loading = true;
            this.error = null;
            this.form.photo = $('input[id=memImg]').val();

            axios.post(this.post_url, this.form).then((res)=>{
                this.loading = false
                this.members = res.data
                this.clearForm();
                let element = this.$refs.modal
                $(element).modal('hide')
                toastr.success('New member successfully added');
            }).catch((error)=>{
                this.loading = false
                if (error.response.status === 422){
                    this.errors = error.response.data.errors;
                }
            })
        },
        submit(){

            this.loading = true;
            axios.post(this.url,{
                plan_id : this.active_plan.id,
                unit : this.unit,
                name : this.active_plan.name,
                amount : parseInt(this.active_plan.price) * parseInt(this.unit)
            }).then((res)=>{
                console.log(res.data);
                if(res.data.status === 1){
                    window.location = res.data.url
                }
                this.loading = false
            }).catch((error)=>{
                this.loading = false
            })
        }
    },
    computed : {
        pImg(){
            return  $('input[id=editImg]').val();
        }
    },
    watch : {
        card: {
            deep: true,
            // We have to move our method to a handler field
            handler(){
                if(this.loaded){
                    this.update();
                }


            }
    }
    }

}
</script>

<style scoped>

</style>
