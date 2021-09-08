<template>
<div>
    <div class="row ">
        <div class="col-md-6 mx-auto text-center">
            <div class="form-group">
                <input v-model="cpr_no" class="form-control" type="text" :placeholder="placeholder">
            </div>
            <img v-if="loading" height="30" width="30" src="/images/search.gif" />
         </div>
        </div>

    <template  v-if="card">
        <div class="row" >
            <div class="col-md-6 mx-auto">
                <div class="sema-card" style="background-image: url('/images/card.jpeg')">
                    <div class="row">
                        <div class="col-3 mx-auto text-center">
                            <div class="photo" style="width: 100%; height: 100%;" v-if="card.photo">
                                <img style="max-height: 160px; width: 100%" :src="card.photo" />
                            </div>
                        </div>
                        <div class="col-9 card-data">
                            <table>
                                <tr><td>Name </td><td style="text-transform: capitalize">:{{ card.full_name }}</td></tr>
                                <tr><td>CPR </td><td>:{{ card.cpr_no }}</td></tr>
                                <tr><td>ID No. </td><td>:{{ card.policy_no }}</td></tr>
                                <tr><td>Valid till </td><td>:{{ card.expiry_date }}</td></tr>
                            </table>
                            <h4 style="margin-top: 10px"><strong>This is Not Insurance Card</strong></h4>
                        </div>


                    </div>
                </div>
            </div>
        </div>

        <div class="row" >
            <div class="col-md-6 mx-auto">
                <a :href="'/online/card/'+card.policy_no+'?download'" class="btn btn-success" >Download</a>
                <a :href="'/online/card/'+card.policy_no+'?email'" class="btn btn-warning" >Email</a>
            </div>
        </div>
    </template>

    </div>
</template>

<script>
export default {
name: "Search",
    props : ['url','placeholder'],
    data (){
    return {
        loading : false,
        cpr_no : '',
        card : null,
    }
    },
    methods : {
    search(){
        this.card = null;
        this.loading = true;
        axios.post(this.url, {cpr:this.cpr_no}).then((res)=> {
            this.loading = false;
            if(res.data.status === 1){
                this.card = res.data.card;
            }
        })
    }
    },
    watch : {
    cpr_no(){
        if(this.cpr_no.length > 1){
            if(!this.loading){
                this.search();
                console.log('searching')
            }
        }
    }
    }
}
</script>

<style scoped>

</style>
