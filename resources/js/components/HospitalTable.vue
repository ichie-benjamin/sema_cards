<script>
export default {
    props : ['hospitals','status'],
    data (){
        return {
            import : false
        }
    },
name: "HospitalTable",
    methods : {
        toogleImport(){
            this.import = !this.import
        },
        updateStatus(status, item){
            axios.put(item.update_url, item).then((res)=> {
                console.log(res.data);
                toastr.success('Hospital Status successfully updated')
            })
        }
    }
}
</script>

<style scoped>

</style>
